// resources/js/hooks/use-cart.js (ou .jsx/.ts(x))
import { createContext, useContext, useEffect, useState } from 'react';
import { router } from '@inertiajs/react';

const CartContext = createContext();
const CART_KEY = 'my_cart';

export function CartProvider({ children }) {
    const [cart, setCart] = useState([]);

    // Charger depuis localStorage au montage
    useEffect(() => {
        const stored = localStorage.getItem(CART_KEY);
        if (stored) setCart(JSON.parse(stored));
    }, []);

    // Persister dans localStorage
    useEffect(() => {
        localStorage.setItem(CART_KEY, JSON.stringify(cart));
    }, [cart]);

    // Helper pour extraire id/prix/images proprement
    const getProductFields = (product) => {
        const id = product.uniqueId ?? product.id;
        // Choix du prix : sales_price > price > parsing string
        let price = 0;
        if (typeof product.sales_price === 'number') price = product.sales_price;
        else if (typeof product.price === 'number') price = product.price;
        else if (typeof product.price === 'string') price = parseFloat(product.price.replace(/[^\d.-]/g, '')) || 0;

        const image = product.image_src ?? product.image ?? null;

        return { id, name: product.name, price, image };
    };

    // 🔼 Ajouter (optimiste + sync serveur + refresh badge)
    const addToCart = (product, quantity = 1) => {
        const { id, name, price, image } = getProductFields(product);

        // 1) Optimiste local
        setCart((prev) => {
            const existing = prev.find((i) => (i.uniqueId ?? i.id) === id);
            if (existing) {
                return prev.map((i) =>
                    (i.uniqueId ?? i.id) === id ? { ...i, quantity: (i.quantity ?? 0) + quantity } : i
                );
            }
            return [...prev, { ...product, id, price, image, quantity }];
        });

        // 2) Sync serveur
        router.post(
            route('cart.add'),
            { id, name, price, image, qty: quantity }, // ⚠️ en prod, envoie seulement { id, qty } et calcule le prix côté serveur
            {
                preserveScroll: true,
                onSuccess: () => router.reload({ only: ['cartCount'] }),
                onError: () => {
                    // rollback simple si nécessaire (optionnel)
                    setCart((prev) => {
                        const item = prev.find((i) => (i.uniqueId ?? i.id) === id);
                        if (!item) return prev;
                        const newQty = (item.quantity ?? 0) - quantity;
                        if (newQty <= 0) return prev.filter((i) => (i.uniqueId ?? i.id) !== id);
                        return prev.map((i) =>
                            (i.uniqueId ?? i.id) === id ? { ...i, quantity: newQty } : i
                        );
                    });
                },
            }
        );
    };

    // 🗑️ Retirer un produit (optimiste + sync serveur + refresh badge)
    const removeFromCart = (productId) => {
        const id = productId;

        // 1) Optimiste local
        setCart((prev) => prev.filter((i) => (i.uniqueId ?? i.id) !== id));

        // 2) Sync serveur
        router.post(
            route('cart.remove'),
            { id },
            {
                preserveScroll: true,
                onSuccess: () => router.reload({ only: ['cartCount'] }),
                // onError: (err) => ... (optionnel: rollback)
            }
        );
    };

    // 🔁 Mettre à jour la quantité (local + server)
    // Si tu n’as pas d’endpoint dédié update, on peut faire remove puis add
    const updateQuantity = (productId, quantity) => {
        if (quantity <= 0) return removeFromCart(productId);

        // local
        setCart((prev) =>
            prev.map((i) => ((i.uniqueId ?? i.id) === productId ? { ...i, quantity } : i))
        );

        // server (naïf): remove puis add avec la nouvelle qty
        // -> idéalement, crée un endpoint cart.update pour faire ça en 1 requête
        router.post(route('cart.remove'), { id: productId }, {
            preserveScroll: true,
            onSuccess: () => {
                // On a besoin d'un objet "product" pour réutiliser addToCart proprement:
                const prod = cart.find((i) => (i.uniqueId ?? i.id) === productId);
                if (!prod) return router.reload({ only: ['cartCount'] });
                addToCart(prod, quantity); // addToCart fera le reload cartCount
            },
        });
    };

    // 🧹 Vider le panier
    const clearCart = () => {
        // local
        setCart([]);

        // server
        router.post(
            route('cart.clear'),
            {},
            {
                preserveScroll: true,
                onSuccess: () => router.reload({ only: ['cartCount'] }),
            }
        );
    };

    return (
        <CartContext.Provider
            value={{ cart, addToCart, removeFromCart, updateQuantity, clearCart }}
        >
            {children}
        </CartContext.Provider>
    );
}

export function useCart() {
    return useContext(CartContext);
}
