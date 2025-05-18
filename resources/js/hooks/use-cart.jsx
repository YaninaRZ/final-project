import { createContext, useContext, useEffect, useState } from 'react';

const CartContext = createContext();

const CART_KEY = 'my_cart';

export function CartProvider({ children }) {
    const [cart, setCart] = useState([]);

    // Charger le panier depuis localStorage au démarrage
    useEffect(() => {
        const stored = localStorage.getItem(CART_KEY);
        if (stored) {
            setCart(JSON.parse(stored));
        }
    }, []);

    // Sauvegarder dans localStorage à chaque changement
    useEffect(() => {
        localStorage.setItem(CART_KEY, JSON.stringify(cart));
    }, [cart]);

    const addToCart = (product, quantity = 1) => {
        setCart((prev) => {
            const existing = prev.find((item) => item.id === product.id);
            if (existing) {
                return prev.map((item) => (item.id === product.id ? { ...item, quantity: item.quantity + quantity } : item));
            }
            return [...prev, { ...product, quantity }];
        });
    };

    const removeFromCart = (productId) => {
        setCart((prev) => prev.filter((item) => item.id !== productId));
    };

    const updateQuantity = (productId, quantity) => {
        setCart((prev) => prev.map((item) => (item.id === productId ? { ...item, quantity } : item)));
    };

    const clearCart = () => setCart([]);

    return <CartContext.Provider value={{ cart, addToCart, removeFromCart, updateQuantity, clearCart }}>{children}</CartContext.Provider>;
}

export function useCart() {
    return useContext(CartContext);
}
