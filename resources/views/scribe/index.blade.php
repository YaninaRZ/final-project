<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.3.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.3.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-categories-admin" class="tocify-header">
                <li class="tocify-item level-1" data-unique="categories-admin">
                    <a href="#categories-admin">Catégories (Admin)</a>
                </li>
                                    <ul id="tocify-subheader-categories-admin" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="categories-admin-GETadmin-categories">
                                <a href="#categories-admin-GETadmin-categories">Lister toutes les catégories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-admin-POSTadmin-categories-create">
                                <a href="#categories-admin-POSTadmin-categories-create">Créer une nouvelle catégorie</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-admin-PUTadmin-categories--id-">
                                <a href="#categories-admin-PUTadmin-categories--id-">Mettre à jour une catégorie</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-admin-DELETEadmin-categories-delete--category_id-">
                                <a href="#categories-admin-DELETEadmin-categories-delete--category_id-">Supprimer une catégorie</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-admin-GETadmin-categories-hierarchy">
                                <a href="#categories-admin-GETadmin-categories-hierarchy">Récupérer la hiérarchie des catégories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-admin-POSTadmin-categories-store-parent">
                                <a href="#categories-admin-POSTadmin-categories-store-parent">Créer une catégorie parente (sans parent_id)</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-checkout" class="tocify-header">
                <li class="tocify-item level-1" data-unique="checkout">
                    <a href="#checkout">Checkout</a>
                </li>
                                    <ul id="tocify-subheader-checkout" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="checkout-POSTcheckout">
                                <a href="#checkout-POSTcheckout">Créer une session Stripe Checkout pour la dernière commande de l’utilisateur

Démarre un paiement pour la dernière commande du client connecté.
Retourne une redirection (Inertia::location) vers la page Stripe.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="checkout-GETcheckout-success">
                                <a href="#checkout-GETcheckout-success">Succès de paiement Stripe

Vérifie la session Stripe et marque la commande comme "paid" si le paiement est réussi.
Renvoie une page Inertia avec l’ID de commande.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="checkout-GETcheckout-cancel">
                                <a href="#checkout-GETcheckout-cancel">Annulation du paiement Stripe

Affiche une page d’annulation simple.</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETdocs">
                                <a href="#endpoints-GETdocs">Invoke the controller method.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETup">
                                <a href="#endpoints-GETup">GET up</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GET-">
                                <a href="#endpoints-GET-">GET /</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETour-collection">
                                <a href="#endpoints-GETour-collection">GET our-collection</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETabout">
                                <a href="#endpoints-GETabout">GET about</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETcontact">
                                <a href="#endpoints-GETcontact">GET contact</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETterms-of-services">
                                <a href="#endpoints-GETterms-of-services">GET terms-of-services</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETprivacy-policy">
                                <a href="#endpoints-GETprivacy-policy">GET privacy-policy</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETlicence">
                                <a href="#endpoints-GETlicence">GET licence</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETcart">
                                <a href="#endpoints-GETcart">GET cart</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETmerci">
                                <a href="#endpoints-GETmerci">GET merci</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETproducts-category--category-">
                                <a href="#endpoints-GETproducts-category--category-">GET products/category/{category}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETproducts--id-">
                                <a href="#endpoints-GETproducts--id-">GET products/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETpost-detail--id-">
                                <a href="#endpoints-GETpost-detail--id-">GET post-detail/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-product-detail--id-">
                                <a href="#endpoints-GETadmin-product-detail--id-">GET admin/product-detail/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-add-product">
                                <a href="#endpoints-GETadmin-add-product">GET admin/add-product</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETadmin-order-summary--id-">
                                <a href="#endpoints-GETadmin-order-summary--id-">GET admin/order-summary/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETtest-categories">
                                <a href="#endpoints-GETtest-categories">GET test-categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-account">
                                <a href="#endpoints-GETuser-account">GET user-account</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETuser-password">
                                <a href="#endpoints-GETuser-password">GET user-password</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETsettings">
                                <a href="#endpoints-GETsettings">Invoke the controller method.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETsettings-profile">
                                <a href="#endpoints-GETsettings-profile">Show the user's profile settings page.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEsettings-profile">
                                <a href="#endpoints-DELETEsettings-profile">Delete the user's account.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETsettings-password">
                                <a href="#endpoints-GETsettings-password">Show the user's password settings page.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTsettings-password">
                                <a href="#endpoints-PUTsettings-password">Update the user's password.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETsettings-appearance">
                                <a href="#endpoints-GETsettings-appearance">GET settings/appearance</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETregister">
                                <a href="#endpoints-GETregister">Show the registration page.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTregister">
                                <a href="#endpoints-POSTregister">Handle an incoming registration request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETlogin">
                                <a href="#endpoints-GETlogin">Show the login page.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlogin">
                                <a href="#endpoints-POSTlogin">Handle an incoming authentication request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETforgot-password">
                                <a href="#endpoints-GETforgot-password">Show the password reset link request page.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTforgot-password">
                                <a href="#endpoints-POSTforgot-password">Handle an incoming password reset link request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETreset-password--token-">
                                <a href="#endpoints-GETreset-password--token-">Show the password reset page.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTreset-password">
                                <a href="#endpoints-POSTreset-password">Handle an incoming new password request.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETverify-email">
                                <a href="#endpoints-GETverify-email">Show the email verification prompt page.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETverify-email--id---hash-">
                                <a href="#endpoints-GETverify-email--id---hash-">Mark the authenticated user's email address as verified.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTemail-verification-notification">
                                <a href="#endpoints-POSTemail-verification-notification">Send a new email verification notification.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETconfirm-password">
                                <a href="#endpoints-GETconfirm-password">Show the confirm password page.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTconfirm-password">
                                <a href="#endpoints-POSTconfirm-password">Confirm the user's password.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTlogout">
                                <a href="#endpoints-POSTlogout">Destroy an authenticated session.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETstorage--path-">
                                <a href="#endpoints-GETstorage--path-">GET storage/{path}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-orders" class="tocify-header">
                <li class="tocify-item level-1" data-unique="orders">
                    <a href="#orders">Orders</a>
                </li>
                                    <ul id="tocify-subheader-orders" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="orders-POSTorders-store">
                                <a href="#orders-POSTorders-store">Créer une commande (admin ou client connecté)

Crée une commande et attache les produits (id + quantity).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-GETclient-orders">
                                <a href="#orders-GETclient-orders">Factures de l’utilisateur (client)

Liste des commandes de l’utilisateur connecté (par client_id).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-GETadmin-dashboard">
                                <a href="#orders-GETadmin-dashboard">Tableau de bord des ventes (admin)

Statistiques (totaux, pending, paid, etc.) + ventes mensuelles 2025.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-GETadmin-order-list">
                                <a href="#orders-GETadmin-order-list">Lister toutes les commandes (admin)

Retourne la page Inertia avec la liste des commandes (clients + produits).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-GETadmin-orders--id-">
                                <a href="#orders-GETadmin-orders--id-">Détails d’une commande (admin)

Affiche le résumé d’une commande avec client + produits + montant calculé.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-DELETEadmin-orders--orders_id-">
                                <a href="#orders-DELETEadmin-orders--orders_id-">Supprimer une commande (admin)

Supprime la commande et redirige avec un message de succès.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-GETuser-billing">
                                <a href="#orders-GETuser-billing">Factures de l’utilisateur (client)

Liste des commandes de l’utilisateur connecté (par client_id).</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="orders-GETclient-view-order--id-">
                                <a href="#orders-GETclient-view-order--id-">Voir une commande (client)

Affiche une commande précise appartenant au user connecté (sécurisée).</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-panier" class="tocify-header">
                <li class="tocify-item level-1" data-unique="panier">
                    <a href="#panier">Panier</a>
                </li>
                                    <ul id="tocify-subheader-panier" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="panier-POSTcart-add">
                                <a href="#panier-POSTcart-add">Ajouter un produit au panier</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="panier-POSTcart-remove">
                                <a href="#panier-POSTcart-remove">Retirer un produit du panier</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="panier-POSTcart-clear">
                                <a href="#panier-POSTcart-clear">Vider le panier</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-produits-admin" class="tocify-header">
                <li class="tocify-item level-1" data-unique="produits-admin">
                    <a href="#produits-admin">Produits (Admin)</a>
                </li>
                                    <ul id="tocify-subheader-produits-admin" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="produits-admin-GETadmin-products">
                                <a href="#produits-admin-GETadmin-products">Lister tous les produits (admin)


lalalla</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produits-admin-POSTadmin-products">
                                <a href="#produits-admin-POSTadmin-products">Créer un produit</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produits-admin-PUTadmin-products--allProduct_id-">
                                <a href="#produits-admin-PUTadmin-products--allProduct_id-">Mettre à jour un produit</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produits-admin-GETadmin-products--allProduct_id-">
                                <a href="#produits-admin-GETadmin-products--allProduct_id-">Voir le détail d’un produit</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="produits-admin-DELETEadmin-products--allProduct_id-">
                                <a href="#produits-admin-DELETEadmin-products--allProduct_id-">Supprimer un produit</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-produits-client" class="tocify-header">
                <li class="tocify-item level-1" data-unique="produits-client">
                    <a href="#produits-client">Produits (Client)</a>
                </li>
                                    <ul id="tocify-subheader-produits-client" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="produits-client-GETproducts">
                                <a href="#produits-client-GETproducts">Lister les produits côté client</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-users" class="tocify-header">
                <li class="tocify-item level-1" data-unique="users">
                    <a href="#users">Users</a>
                </li>
                                    <ul id="tocify-subheader-users" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="users-GETadmin-client">
                                <a href="#users-GETadmin-client">Lister les clients

Retourne la liste des utilisateurs avec le rôle "client".</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-POSTadmin-client-create">
                                <a href="#users-POSTadmin-client-create">Créer un nouvel utilisateur

Crée un nouvel utilisateur avec nom, email et mot de passe.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="users-DELETEadmin-client-delete--id-">
                                <a href="#users-DELETEadmin-client-delete--id-">Supprimer un utilisateur

Supprime un utilisateur par son ID.</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: September 11, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="categories-admin">Catégories (Admin)</h1>

    

                                <h2 id="categories-admin-GETadmin-categories">Lister toutes les catégories</h2>

<p>
</p>



<span id="example-requests-GETadmin-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;props&quot;: {
        &quot;categories&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Hair&quot;,
                &quot;parent&quot;: null
            }
        ],
        &quot;parentCategories&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Hair&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-categories" data-method="GET"
      data-path="admin/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-categories"
                    onclick="tryItOut('GETadmin-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-categories"
                    onclick="cancelTryOut('GETadmin-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="categories-admin-POSTadmin-categories-create">Créer une nouvelle catégorie</h2>

<p>
</p>



<span id="example-requests-POSTadmin-categories-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/admin/categories-create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Masks\",
    \"parent_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/categories-create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Masks",
    "parent_id": 1
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-categories-create">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Redirection vers la liste des cat&eacute;gories&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6Im1zeFIxd2VGbksyU1lGdlZIMDUvWXc9PSIsInZhbHVlIjoiTHJmbHM4TnI3ZHZuWnVPKzBNTnRka3RveHJmUzFYYVVFODNFVUVDVHNOdWN1L1ArWGJ4ejRjTjg2NlFFMy9uMXNTWENqV1U3SXVqb3M2VVUra1g4ZjgwYk51dUhqZWdZZGYrek9Hcm0wUk43VFE1WlVudlkzdmRSOEo3eExmclciLCJtYWMiOiI5MDQ1ZDUwZTk1MmNjYTAwNzJlMGMxYTUzMWMxZjIyZTJhYzI2ZTQ4MTViMzAzMGY2N2U0YWZiNDJmOWM2MDE2IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTadmin-categories-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-categories-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-categories-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-categories-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-categories-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-categories-create" data-method="POST"
      data-path="admin/categories-create"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-categories-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-categories-create"
                    onclick="tryItOut('POSTadmin-categories-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-categories-create"
                    onclick="cancelTryOut('POSTadmin-categories-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-categories-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/categories-create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-categories-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-categories-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTadmin-categories-create"
               value="Masks"
               data-component="body">
    <br>
<p>Nom de la catégorie. Example: <code>Masks</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="parent_id"                data-endpoint="POSTadmin-categories-create"
               value="1"
               data-component="body">
    <br>
<p>ID d’une catégorie parente (optionnel). Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="categories-admin-PUTadmin-categories--id-">Mettre à jour une catégorie</h2>

<p>
</p>



<span id="example-requests-PUTadmin-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/admin/categories/14" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Conditionner\",
    \"parent_id\": 1
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/categories/14"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Conditionner",
    "parent_id": 1
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-categories--id-">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Redirection avec succ&egrave;s&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6InFoYzNuTDV5THpTVTUvQlJkR0xiNXc9PSIsInZhbHVlIjoiQmNPWjJpZHgwSmF1emdVYTdWUTFmazVPSytqY0pzSEZOZ1A4MGJaRXJQN2N3Y0RPbkhaY2xDNUtkL1hSdWp2bUNMUnp0ZFBnb3JkbHp4dUNWck0wTjdRZGl4THY4Y1E2OHlZS0hmSXZFRmYvZ2NUUUNBSStNaFYreXludkVueHgiLCJtYWMiOiIzNGNkZTg0YmNkNDI5NmMzMTQyYTFiZGI2NzA1ODA1MTFmNWNkMzc2MzBhYTI4Nzc1MGM2NzUwNWNmNzFmODRhIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTadmin-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-categories--id-" data-method="PUT"
      data-path="admin/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-categories--id-"
                    onclick="tryItOut('PUTadmin-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-categories--id-"
                    onclick="cancelTryOut('PUTadmin-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTadmin-categories--id-"
               value="14"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>14</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category"                data-endpoint="PUTadmin-categories--id-"
               value="2"
               data-component="url">
    <br>
<p>ID de la catégorie. Example: <code>2</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTadmin-categories--id-"
               value="Conditionner"
               data-component="body">
    <br>
<p>Nouveau nom de la catégorie. Example: <code>Conditionner</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>parent_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="parent_id"                data-endpoint="PUTadmin-categories--id-"
               value="1"
               data-component="body">
    <br>
<p>ID de la catégorie parente. Example: <code>1</code></p>
        </div>
        </form>

                    <h2 id="categories-admin-DELETEadmin-categories-delete--category_id-">Supprimer une catégorie</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-categories-delete--category_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/admin/categories-delete/14" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/categories-delete/14"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-categories-delete--category_id-">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Cat&eacute;gorie supprim&eacute;e avec succ&egrave;s&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6Ii9BWFpHTVhiQTY2a2c0OE9kU0s0ZGc9PSIsInZhbHVlIjoiVHloR2d0Znd5R1J3U2tKckRZSUgyTE42Yy9OWnBDZGEvLzdwZW9rS1ZuMUdBNVRzSEdwdjZJZ1Rpc2Q3OXBvS3hCZVhSc2NkWDFRb1I3eG9WMlkyM041MTdqYUp4WTVveVZKak4rOEY1c1Vmdy93SjBXQnY3anRsZU9VZXFKUEgiLCJtYWMiOiI4NDZjOWNjZjMxMGUxYWQ4ZDFmOTU4OWY4NGZjODFkMDhhODcwMDAwZGI0NTY1ZDhjNGYxYmI4OTg4YzIzMTQxIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEadmin-categories-delete--category_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-categories-delete--category_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-categories-delete--category_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-categories-delete--category_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-categories-delete--category_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-categories-delete--category_id-" data-method="DELETE"
      data-path="admin/categories-delete/{category_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-categories-delete--category_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-categories-delete--category_id-"
                    onclick="tryItOut('DELETEadmin-categories-delete--category_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-categories-delete--category_id-"
                    onclick="cancelTryOut('DELETEadmin-categories-delete--category_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-categories-delete--category_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/categories-delete/{category_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-categories-delete--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-categories-delete--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="DELETEadmin-categories-delete--category_id-"
               value="14"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>14</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category"                data-endpoint="DELETEadmin-categories-delete--category_id-"
               value="3"
               data-component="url">
    <br>
<p>ID de la catégorie. Example: <code>3</code></p>
            </div>
                    </form>

                    <h2 id="categories-admin-GETadmin-categories-hierarchy">Récupérer la hiérarchie des catégories</h2>

<p>
</p>



<span id="example-requests-GETadmin-categories-hierarchy">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/categories/hierarchy" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/categories/hierarchy"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-categories-hierarchy">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;props&quot;: {
        &quot;categories&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Hair&quot;,
                &quot;children&quot;: [
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;Shampoo&quot;
                    }
                ]
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-categories-hierarchy" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-categories-hierarchy"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-categories-hierarchy"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-categories-hierarchy" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-categories-hierarchy">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-categories-hierarchy" data-method="GET"
      data-path="admin/categories/hierarchy"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-categories-hierarchy', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-categories-hierarchy"
                    onclick="tryItOut('GETadmin-categories-hierarchy');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-categories-hierarchy"
                    onclick="cancelTryOut('GETadmin-categories-hierarchy');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-categories-hierarchy"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/categories/hierarchy</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-categories-hierarchy"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-categories-hierarchy"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="categories-admin-POSTadmin-categories-store-parent">Créer une catégorie parente (sans parent_id)</h2>

<p>
</p>



<span id="example-requests-POSTadmin-categories-store-parent">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/admin/categories/store-parent" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Hair\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/categories/store-parent"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Hair"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-categories-store-parent">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Cat&eacute;gorie parente cr&eacute;&eacute;e avec succ&egrave;s&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTadmin-categories-store-parent" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-categories-store-parent"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-categories-store-parent"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-categories-store-parent" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-categories-store-parent">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-categories-store-parent" data-method="POST"
      data-path="admin/categories/store-parent"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-categories-store-parent', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-categories-store-parent"
                    onclick="tryItOut('POSTadmin-categories-store-parent');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-categories-store-parent"
                    onclick="cancelTryOut('POSTadmin-categories-store-parent');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-categories-store-parent"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/categories/store-parent</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-categories-store-parent"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-categories-store-parent"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTadmin-categories-store-parent"
               value="Hair"
               data-component="body">
    <br>
<p>Nom de la catégorie parente. Example: <code>Hair</code></p>
        </div>
        </form>

                <h1 id="checkout">Checkout</h1>

    

                                <h2 id="checkout-POSTcheckout">Créer une session Stripe Checkout pour la dernière commande de l’utilisateur

Démarre un paiement pour la dernière commande du client connecté.
Retourne une redirection (Inertia::location) vers la page Stripe.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTcheckout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/checkout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/checkout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTcheckout">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Redirection vers Stripe Checkout.</code>
 </pre>
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6IjhYaEwrZVFQK0VXeDl0NUFJN0RValE9PSIsInZhbHVlIjoiTDJzSDNCVXJQcmNzdXU1RGwxUTBvOEtnUmhZZmdqeENQcmlEZUxRYmwva21jOUZqL2ViVGtvcDVvZTF2VHhoVGhVMGZuN0Z2SlRrVlNLV2RhQlZjMkNxSDJSMHUzd2g1ZEIrNVBKaUNNaEJ1RXh1bHJzcE9SeHBDUG5uQW9nNmQiLCJtYWMiOiI0NmYwYTFjOWI0ZDkwNWNkNWJjNzYzMzkwNjY3ZGIzZjE4Y2UwNTdjMzQ3YjU0YTI3YTEzZDE2YzEzOWZmNTk1IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkJycW5OWmVMMkhjZUtSK0V4UFgvNXc9PSIsInZhbHVlIjoiWFk4K1pQZExCeFlpVlZaZGpROXdEWXBJSC9aRXpXbklCajJKekFhdzdpVTh2VXU5NDV5TE1tUzhjUUMzd2RNdkVKWlphdDQramE1dXRGbnRubGRnNUQwbnpJNEZnWEh6NFk5V01QczY1bGgwSG81SmZ1aG4yQlNuYS9ZU09mdEEiLCJtYWMiOiJhOTMwY2YzMGM5ZTY4ZDdjNjY3ZWVmM2FjYTk4MWM0MmJhNTJkMGMxMWQ0MmIzMTZmODlkZWE3ZWFlN2NmMjRkIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTcheckout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTcheckout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTcheckout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTcheckout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcheckout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTcheckout" data-method="POST"
      data-path="checkout"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTcheckout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTcheckout"
                    onclick="tryItOut('POSTcheckout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTcheckout"
                    onclick="cancelTryOut('POSTcheckout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTcheckout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>checkout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTcheckout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTcheckout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

    <h3>Response</h3>
    <h4 class="fancy-heading-panel"><b>Response Fields</b></h4>
    <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
<br>
<p>URL Stripe Checkout (transportée via redirection côté client)</p>
        </div>
                        <h2 id="checkout-GETcheckout-success">Succès de paiement Stripe

Vérifie la session Stripe et marque la commande comme &quot;paid&quot; si le paiement est réussi.
Renvoie une page Inertia avec l’ID de commande.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETcheckout-success">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/checkout/success?session_id=cs_test_a1b2c3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/checkout/success"
);

const params = {
    "session_id": "cs_test_a1b2c3",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETcheckout-success">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;props&quot;: {
        &quot;orderId&quot;: 42
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETcheckout-success" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETcheckout-success"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETcheckout-success"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETcheckout-success" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcheckout-success">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETcheckout-success" data-method="GET"
      data-path="checkout/success"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETcheckout-success', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETcheckout-success"
                    onclick="tryItOut('GETcheckout-success');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETcheckout-success"
                    onclick="cancelTryOut('GETcheckout-success');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETcheckout-success"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>checkout/success</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETcheckout-success"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETcheckout-success"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>session_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="session_id"                data-endpoint="GETcheckout-success"
               value="cs_test_a1b2c3"
               data-component="query">
    <br>
<p>Identifiant renvoyé par Stripe. Example: <code>cs_test_a1b2c3</code></p>
            </div>
                </form>

                    <h2 id="checkout-GETcheckout-cancel">Annulation du paiement Stripe

Affiche une page d’annulation simple.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETcheckout-cancel">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/checkout/cancel" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/checkout/cancel"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETcheckout-cancel">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;component&quot;: &quot;checkout/cancel&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETcheckout-cancel" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETcheckout-cancel"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETcheckout-cancel"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETcheckout-cancel" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcheckout-cancel">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETcheckout-cancel" data-method="GET"
      data-path="checkout/cancel"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETcheckout-cancel', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETcheckout-cancel"
                    onclick="tryItOut('GETcheckout-cancel');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETcheckout-cancel"
                    onclick="cancelTryOut('GETcheckout-cancel');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETcheckout-cancel"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>checkout/cancel</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETcheckout-cancel"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETcheckout-cancel"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETdocs">Invoke the controller method.</h2>

<p>
</p>



<span id="example-requests-GETdocs">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/docs" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/docs"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETdocs">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6IitLWGVUWkJBT29CSG1COFR3WnY2SkE9PSIsInZhbHVlIjoiR3NiZExnd0lpUEJQYmZCOHBOSTJ3bVgxajRGKzIrMnF3dFY1WVlJMU5DZ3BtalhSVzkwdmhaa3dxZEZXb01TSG5mcTZMR2djZDdtS0JGL01ac1MwZXVPZmhwM0xwR1RScjRhNXhuNFpJMUJWUzJOamZlOXAwcGIzOU9jaXpyeTQiLCJtYWMiOiIwZDJjMzllZjI1NGU4ODkxYWYwNzNjODg3Nzk3NTI5ZTMwNzQ4ZTdmMzVmNDUyNWE1NzQ0MzI3OTE5MmM3NWVkIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Ik9pWVBQbHE3UE5YeGVBRUJ3ejZnUmc9PSIsInZhbHVlIjoiYzJHYklYWmFGWXpkOWgwWTZiR2hqb1M1azcwVkxnSHFSNk04ZjNBYU1xa2xFTzZIWUhWMU1vbWIraURTV1pRR3MvSXVlVlRDbHVRZnlZRjFrQVBrUlhJTFR0Zld4dnR6ZmRFMTllTllyRVh5ZVBUOGY0c2VhbExVN0VTSzJyNmkiLCJtYWMiOiJlM2YzYWMyMDBmYTdhOGYyNmIyNTBlNjkxMjdmMGJjZGNiN2VjZDEwYjI2NDlmMWFjOGRhZDBiZThjYjIyNjg4IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETdocs" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETdocs"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETdocs"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETdocs" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdocs">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETdocs" data-method="GET"
      data-path="docs"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETdocs', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETdocs"
                    onclick="tryItOut('GETdocs');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETdocs"
                    onclick="cancelTryOut('GETdocs');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETdocs"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>docs</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETdocs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETdocs"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETup">GET up</h2>

<p>
</p>



<span id="example-requests-GETup">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/up" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/up"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETup">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">&lt;!DOCTYPE html&gt;
&lt;html lang=&quot;en&quot;&gt;
&lt;head&gt;
    &lt;meta charset=&quot;utf-8&quot;&gt;
    &lt;meta name=&quot;viewport&quot; content=&quot;width=device-width, initial-scale=1&quot;&gt;

    &lt;title&gt;Laravel&lt;/title&gt;

    &lt;!-- Fonts --&gt;
    &lt;link rel=&quot;preconnect&quot; href=&quot;https://fonts.bunny.net&quot;&gt;
    &lt;link href=&quot;https://fonts.bunny.net/css?family=figtree:400,600&amp;display=swap&quot; rel=&quot;stylesheet&quot; /&gt;

    &lt;!-- Styles --&gt;
    &lt;script src=&quot;https://cdn.tailwindcss.com&quot;&gt;&lt;/script&gt;

    &lt;script&gt;
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: [&#039;Figtree&#039;, &#039;ui-sans-serif&#039;, &#039;system-ui&#039;, &#039;sans-serif&#039;, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;],
                    }
                }
            }
        }
    &lt;/script&gt;
&lt;/head&gt;
&lt;body class=&quot;antialiased&quot;&gt;
&lt;div class=&quot;relative flex justify-center items-center min-h-screen bg-gray-100 selection:bg-red-500 selection:text-white&quot;&gt;
    &lt;div class=&quot;w-full sm:w-3/4 xl:w-1/2 mx-auto p-6&quot;&gt;
        &lt;div class=&quot;px-6 py-4 bg-white from-gray-700/50 via-transparent rounded-lg shadow-2xl shadow-gray-500/20 flex items-center focus:outline focus:outline-2 focus:outline-red-500&quot;&gt;
            &lt;div class=&quot;relative flex h-3 w-3 group &quot;&gt;
                &lt;span class=&quot;animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 group-[.status-down]:bg-red-600 opacity-75&quot;&gt;&lt;/span&gt;
                &lt;span class=&quot;relative inline-flex rounded-full h-3 w-3 bg-green-400 group-[.status-down]:bg-red-600&quot;&gt;&lt;/span&gt;
            &lt;/div&gt;

            &lt;div class=&quot;ml-6&quot;&gt;
                &lt;h2 class=&quot;text-xl font-semibold text-gray-900&quot;&gt;Application up&lt;/h2&gt;

                &lt;p class=&quot;mt-2 text-gray-500 dark:text-gray-400 text-sm leading-relaxed&quot;&gt;
                    HTTP request received.

                                            Response rendered in 210ms.
                                    &lt;/p&gt;
            &lt;/div&gt;
        &lt;/div&gt;
    &lt;/div&gt;
&lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
 </pre>
    </span>
<span id="execution-results-GETup" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETup"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETup"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETup" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETup">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETup" data-method="GET"
      data-path="up"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETup', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETup"
                    onclick="tryItOut('GETup');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETup"
                    onclick="cancelTryOut('GETup');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETup"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>up</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETup"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETup"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GET-">GET /</h2>

<p>
</p>



<span id="example-requests-GET-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GET-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6IkRkczEvTFJpN0hpaDZyWkNEdUNmT2c9PSIsInZhbHVlIjoiYUNTWW9iK3FhK3BpODExaGc5UVJyK1JXMTN2WWpZQVR1WDI1L3RQRTA3WUVrVUlzTnJPUXhQNU1UdUZVellSRkJMOHQ5UFhYTjE5R0dYTmNFRW8yb1BKWXVrMjVkN2R3ZnRBUlFWSU0xVURqdFNSSkRESWpKQ2VvZkhXMlFXZHoiLCJtYWMiOiI5YzU4NzU5OTZmNzA0MGIzMDcwMzM0YWIyNzQ2ODVhNTM5ODdiZmVmNjIxMGJlZTU0N2VkNGY3MjFmZWU2Njc2IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlQ3WWVUVnJURVBlczFaV0Q1RFJ2MlE9PSIsInZhbHVlIjoiVkEyV0VQR1Q4RWE0QXNObEZIUGVaZTFra21ZWkpLNlpabUNBdzErQmMzSHY2TVExaElkcCtkakg0WnhUc2djeWJ0ajBibTlHdkVwckp0dURNMDY1dmtzZ0gya0I2Sk1LTFFTVk8rR1ZuSDhuR1BjNEJvS29MZ3RFMFQwWHpqZmoiLCJtYWMiOiJkOTA2OWY5MjBkY2U2ZDViNTI1ZGFmMjQ0MzhkOTBiZjk3MzJmZjU5Mjk0Mjc4NWYwNzY3Y2MzYzM1YTEzMmJkIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GET-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GET-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GET-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GET-" data-method="GET"
      data-path="/"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GET-"
                    onclick="tryItOut('GET-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GET-"
                    onclick="cancelTryOut('GET-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GET-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>/</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GET-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GET-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETour-collection">GET our-collection</h2>

<p>
</p>



<span id="example-requests-GETour-collection">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/our-collection" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/our-collection"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETour-collection">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6IjdjSlFwekFiSDNIdk9QZ0x4akd0aHc9PSIsInZhbHVlIjoiVGpObGVad2tTQTR2UWFMTkpHcGtwUkpDbG1BUkJ3T1VFL2E5NHkvemVlWGJvVDAwQTdYRUsrUm5MM0Z6NnNjY2NlUzNTSGM5aC9yQ21id2VpUUF6UTNVR25KTG9ybUJGVG1OMEFVdEM2Vm9TSkVBTTVEaUE4U1ZNWTB3OGdac0kiLCJtYWMiOiI4OTRkYjZmMDJkNGM1NGYzMTdkZmExODIwMzY1YmU2YmM4NGUwODNiMzNjOTcyYWUzZTM4YWFlMjFhNjc4NDZjIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InR1QTRyU0w0Y3cyWThJcDI1RTRNQ1E9PSIsInZhbHVlIjoiaGJhbWdxeklJbmJXeUJGZjBoUXVGQ0dXY1pFb2dhUUIwRW9uWkZPa24zRUk3dWFsblV6SEdyanFmaXh2ckNhSFpJTDBQZEhJeHpwUkhQdHdGZS9Jd2tjK3VmYTRJQi9yZDNEY25hbUw3ZlloNEhzbHF4SEFMZDR2bXdrR0xLeU4iLCJtYWMiOiIxYTY1OWIxNDgxZTY5MDdhZTU2ZDkxNDE2NDI0NDdmNWI2NTI0OGQyNjQxYTA0NTUxYjgzYmVhZjdlYWFjMTdmIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETour-collection" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETour-collection"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETour-collection"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETour-collection" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETour-collection">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETour-collection" data-method="GET"
      data-path="our-collection"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETour-collection', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETour-collection"
                    onclick="tryItOut('GETour-collection');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETour-collection"
                    onclick="cancelTryOut('GETour-collection');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETour-collection"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>our-collection</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETour-collection"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETour-collection"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETabout">GET about</h2>

<p>
</p>



<span id="example-requests-GETabout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/about" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/about"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETabout">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6Imtkd2tMelVIRVNaRm9RREhnUy8zS0E9PSIsInZhbHVlIjoiN0E0QmRNVmlsYWFhSjJ5OHdRTE9LOUdtZWt2WTQ0a01HVldlUE5vWWFzLzNEc1hGSHdQUXN5Tkl2Wmx1VmJYT1NBU0x1dVNYMTIrU1BneXBWVE9wVThnTlFPbko5aEFTbkVYZjJndkgxbnV4SE9KTytEMHMyMFFVQTNaRTB6VzgiLCJtYWMiOiI1ZjY3NjRkNzc3MDdlYjViYjg3YzdhMTY3NjMwNDU4NzMxNzliMjIxOTY5ZGUzMDgwYzFkZTgwNzlhMDc1M2U5IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlJZWkJ2Q2pkdWNNTzc3NGxNM3pPYmc9PSIsInZhbHVlIjoiTXZZOWhQWkRTUklodXIvYjBGdVhjckpWNzNnQ3IyTHhZWHc2SnhwTHNmYjRMZThQR2R4YzI0K0xFY29lTHUvRE5xS3RIRVV2Y1Z4YU5MMm1FTG5WbStTRnVkWWh1RXlac3JZdEdDZGhJZHg4cFBTY0J5SzBCQjlPMUJkbitxZ1giLCJtYWMiOiI3Mjc3NmViMTYxYTc5MmU2M2FjNGY0ZjZlMGYzZGUwYTY0NjI5ZTZkNzVlOTJlNDk4MzBkOTM1ZDhlOTI1NDlkIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETabout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETabout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETabout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETabout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETabout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETabout" data-method="GET"
      data-path="about"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETabout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETabout"
                    onclick="tryItOut('GETabout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETabout"
                    onclick="cancelTryOut('GETabout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETabout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>about</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETabout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETabout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETcontact">GET contact</h2>

<p>
</p>



<span id="example-requests-GETcontact">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/contact" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/contact"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETcontact">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6Ikk0elpLUU95a245c2NhRGVQak9rU2c9PSIsInZhbHVlIjoieE5MNnBzWUhTcVpZR0FPT2RIL3JwZ3k0eFMrTEdFZkJiSFBqOG1ud3g4d2cwbHVCcEJabjk4alFGWmZNdVN6YVVvbVJJc3VlaU53aG9HSlFGbm03ejRmazJrN1RqYzdnMk1kd0dlZG4vaDFuLzJUK3R2MUZ2S09uZC93eHVGT1QiLCJtYWMiOiIxMzMyOTNmYjc0MDA1MjQzNDhhNjA4NmM2MDdiN2YyMWQ3NjVjY2FiMzgwNjE3NDNlOGVlYjhjZjI2ODU1N2NjIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IitJWHc0QzV5ODJBVWZSbitoZkRZYWc9PSIsInZhbHVlIjoiTkozQkt3Y1c5TVliVENDWFA3aUgxOHRSbHh6UWQwd29xRU5JRlAxVjg3dXBwYjdldW10SEpTMWpDS2Mvb3JPbUZpQnFienc1QVVxbWlSaThVYnB1VkNlQ1dwWTRPQkdwV0Fwd0RaTTVCM2FMOUZIOWJnRUQ0RXVRZXZEaGszRmUiLCJtYWMiOiI1Nzg5NWE2ZDUyY2RkY2NjOTZjMDE4ODkwNzNiNGNiODI5YzFjNDVjNjE0MjI5YTY0MjdkMTZhMTM2NjU5MDcwIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETcontact" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETcontact"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETcontact"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETcontact" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcontact">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETcontact" data-method="GET"
      data-path="contact"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETcontact', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETcontact"
                    onclick="tryItOut('GETcontact');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETcontact"
                    onclick="cancelTryOut('GETcontact');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETcontact"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>contact</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETcontact"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETcontact"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETterms-of-services">GET terms-of-services</h2>

<p>
</p>



<span id="example-requests-GETterms-of-services">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/terms-of-services" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/terms-of-services"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETterms-of-services">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6IkplakxVT3V3YjVBV1F6YzRUdENHZmc9PSIsInZhbHVlIjoiK0R1N0svMzJOWEw1ZFRqN1hMZHVoU3B4REowR0FNemhmbjA2eGxBakdORXFVbkJtdkc1c1M3cHBEOHRLR05PNlBuTWd3djNqcHlhbW4yOUtjYUpQRXp2VlBFdjNPT0F2OHltU2tzNGdHMWdCVXg0SG45Q0ZJc2wybmdEdGY2NU0iLCJtYWMiOiI2ZjMxMTYyZDYxYmJkMDgxYzQwNGNhOTAzMWNmYmFkMjI0OWFkNTE2OWE5MjNjZjI2MDEzOTBiZjc2ZGQ0ZmY4IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Imo1R1lpU2NURTFpbFB5NHQyanRockE9PSIsInZhbHVlIjoiRWI4Sm9rMm51OUhhZ0RUL0lPcE9HZDZ0VTFaQ2VZcmFEVFdXR2dwUHFVcXRUdlNkMlVscDZYY1Y3M1BvK2tDYXo4YUdhTktVTlVyN3Y5Nnp4STBIU0JFdUJ4c1NIeGxVditDOW9jUEhYZ0tOZWFzRGFScjJ6SVFGcEZuZS9jWmsiLCJtYWMiOiIwMTc2M2QzMzRmNGFiZGQ3YzUzZTUzNDU3ZTEwNjIyNTQ3YmI2MDNiM2ViZjgzYTc5OTMxN2E3MDFmOWU4NjYwIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETterms-of-services" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETterms-of-services"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETterms-of-services"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETterms-of-services" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETterms-of-services">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETterms-of-services" data-method="GET"
      data-path="terms-of-services"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETterms-of-services', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETterms-of-services"
                    onclick="tryItOut('GETterms-of-services');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETterms-of-services"
                    onclick="cancelTryOut('GETterms-of-services');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETterms-of-services"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>terms-of-services</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETterms-of-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETterms-of-services"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETprivacy-policy">GET privacy-policy</h2>

<p>
</p>



<span id="example-requests-GETprivacy-policy">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/privacy-policy" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/privacy-policy"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETprivacy-policy">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6Ik5oYU5KR2tmQjhhNWJxL3ZRVWZOZnc9PSIsInZhbHVlIjoiVnJTbWl4SHFmbHAvcGlad1hNTkZVZ0lxd0lXZ2d6eDVxdFpYMzd0SDJjek5uWGxkTFBqbjRrUTZIbTJUZ1pjQVUwMEtPQ3lZeldQRTdFYTdWT0J6QXhmMXhqSkpNc09wM2lDYTZRaXRyVnVoanBaYnFGb3lDK242MUtWM0VpY1YiLCJtYWMiOiIyMzkyOWEzMTc2NDI0NjZiYzFhMmY5ODUyMGUyMWVkNWY0Y2M4ZDljNDU4MTE0ZjgyZjBiNDkxM2Y3OWE1Y2M3IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InJhV3pMcFdPYUdkWm1Tdi9SVkRZS2c9PSIsInZhbHVlIjoiUHN6VmRuNzBNbW5sMUVFeEpicHZFRUdobW5pUG5xUzg3N0VUQ2N5SDhxVWRlZGFRSkFDWUh0L3lqcFkrRUQ2NFhHaGdqQWRNRHZPWWlCbE9OUG9KbjZtTkVaekwyQ3RzUFAxczA4S3BVSFNKSmNiZE82QzlYOHFNdzZjcXB6V3EiLCJtYWMiOiI5ZDBjMjA0YTY4YjM0ODRkMjRkYzQ2ZWMxNTFkNjY3NzgyNGEzNjE1NDA5MjhhZWYzNDVjMTBjYTUwMjc0NmJjIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETprivacy-policy" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETprivacy-policy"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETprivacy-policy"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETprivacy-policy" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETprivacy-policy">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETprivacy-policy" data-method="GET"
      data-path="privacy-policy"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETprivacy-policy', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETprivacy-policy"
                    onclick="tryItOut('GETprivacy-policy');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETprivacy-policy"
                    onclick="cancelTryOut('GETprivacy-policy');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETprivacy-policy"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>privacy-policy</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETprivacy-policy"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETprivacy-policy"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETlicence">GET licence</h2>

<p>
</p>



<span id="example-requests-GETlicence">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/licence" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/licence"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETlicence">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6Ijc5eEhkNC92QmRxRUFtcW4raGpMZ1E9PSIsInZhbHVlIjoiSXlmd3B0NnI3WFlkVWFmSDEwVHA3WGNwS0t2aGhHbEd0N0ZVQkRvSTRMemFvRUFxbzJPL2FvZTVWb3pPYjJUOFpaTDNMNWtCaTc1d2Y1d1VXY3FXZDBNQWs0ampZRmxLNjlta0RpK05CdjQrSi9oUUVFaUNXa3Q4WFhSZzhuSmEiLCJtYWMiOiJhODA1YjE3YWY5NTViMDgzZGY2YWRiZmZmY2I1OWVkMDllYWY1ZTlhM2ZmMDIzYWQyYTc3NTRhZDNhYzYxNWMwIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImdFbDIxSmIvZWhEQU1YQ1dGZzJ0Nmc9PSIsInZhbHVlIjoieU5oZGpQV2crdGRvWnRRQVVVWEcxTTU3ZjR3TjFCWVdvVUFWQTEvbHR2WFZ1NTdnemRibTlCdVNLR25RM1lQYnNjd1MxUGlJb0RwakI2Ni9DR0czL243UXBqQXF3OXBUWnVUcmtVMjAwZ25neExnWmlTc0hTdUIyRGVpVy9MVHAiLCJtYWMiOiIxZmJiZWM5YjQzN2IyZWFlYWIxYmI4ZDBmYTc3MDA5ZTNkNWM3ZDRkYjhlZDAzMDM5NmI4YTAxZmJkMzAwMjkwIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETlicence" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlicence"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlicence"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlicence" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlicence">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlicence" data-method="GET"
      data-path="licence"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlicence', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlicence"
                    onclick="tryItOut('GETlicence');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlicence"
                    onclick="cancelTryOut('GETlicence');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlicence"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>licence</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlicence"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETlicence"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETcart">GET cart</h2>

<p>
</p>



<span id="example-requests-GETcart">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/cart" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/cart"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETcart">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6IjgxSDNhMjVjZ0JXK3NOQ2RRY1JRWnc9PSIsInZhbHVlIjoiaDVSd3pnZGI4OWdvMndxRzhueXZxUnJuSTZISGorZEZ4OHpYaFVIdlpvdmk5K0NzSGFwYkJndVBidzl2a2FLclVxTDFPek9valFYaEpmMGk1alNXQTBVbGZHNjUxNGRLVUZDUitRWVBveU9CWVdoeWF2VW1MVU4ybG5sRDVtK3MiLCJtYWMiOiI3ZWQwOTdmOWE2NThjZGJlZjlkOWQzZDc0MTY5NTg1NTM3ZjQxYjdmNDE2Y2YyNTA1NmM3Y2U3NGVjZjM4MDJkIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Iks2UCtEaytEYTFzdFFQZ2ozcWRrQmc9PSIsInZhbHVlIjoiSkcyVEFia0xXaTBGT1ZadjBxVkdtSUxaWU5ZbXBkUStFeWROWm10STJUVGRLMWVFdmdyZnFtZUZZelBIZklNSlVWdzJtMzVNVXdLVUhkcnJSZzVraGRFVWlQRXZZM0hnUGlVMmdBbkNYOWJNbFpMWThaQlQ3MkQxeVUyOWZaQ3ciLCJtYWMiOiI2MTFkNGVkMTg2ZGU0NGZkNTFiMTU4NDkxZmE1ZWU2M2MzMzg3YzFiNTg3ZDRmZTk4ZDNmZDgzNmIxNTg0ZTg0IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETcart" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETcart"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETcart"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETcart" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETcart">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETcart" data-method="GET"
      data-path="cart"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETcart', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETcart"
                    onclick="tryItOut('GETcart');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETcart"
                    onclick="cancelTryOut('GETcart');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETcart"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>cart</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETcart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETcart"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETmerci">GET merci</h2>

<p>
</p>



<span id="example-requests-GETmerci">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/merci" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/merci"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETmerci">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6Ik1LTVdnNUVrSktjWEViZWtJN1kwcWc9PSIsInZhbHVlIjoiY0VtSUwxWFBZcHBtVm92a292L2crZlhMMFI2TGlidHMvVzc2RjN3KytYTXdrcHNKV3QvbzBDV2pvbzlOeU9VRWx6N1RmMERQQ3BxQi92bXZCb0h6c2V3S01OWkE1UFQxcFJ1M2duUkd5aVcweU5sODN6Z2FsOEd6aVo1dVByQlUiLCJtYWMiOiJjODFiODkwMjcwNGY1ODZmNTZlNzc3ODkzMjE4MThiMmQzMjgxMTgwMmIyMTU5NjcxZTU5ZGEzMDJjY2U0NGQzIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InZ0RWx1MnNWK3gxMFo2N0wyUDBOWHc9PSIsInZhbHVlIjoidStwNXZrK1lPb1h6cGtvd1RISjJ1bHhQdjRMTU5RNG5ZdVE3OUdza0g4eHlleGpHaEliM3hxeFVUNW83cVlCN25QU1hNV2treVoyZmRKeC94eDJmbU5hak5zS1Rub1NvWUx3TnJsSXZIRWdlbjFNeHZrNHo4eC9mOXFRR2tFeWUiLCJtYWMiOiI3MjM2ZWM0NDQwOTM2MDU3ZjY5MmI5OTg5NjQ1MTIyNTZlYTg0YjFlZDZhYTVlYjI3ZTQ2Y2M5ZWEwMmM0NDMzIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETmerci" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETmerci"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETmerci"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETmerci" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETmerci">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETmerci" data-method="GET"
      data-path="merci"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETmerci', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETmerci"
                    onclick="tryItOut('GETmerci');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETmerci"
                    onclick="cancelTryOut('GETmerci');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETmerci"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>merci</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETmerci"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETmerci"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETproducts-category--category-">GET products/category/{category}</h2>

<p>
</p>



<span id="example-requests-GETproducts-category--category-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/products/category/14" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/products/category/14"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETproducts-category--category-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6Im0vZDdlV3BMYTJXVUFvMlh6SUF2RWc9PSIsInZhbHVlIjoiUWdNbzM5OU5tUTRCazlvdnIrRkpGV0NFazNSNHJtZzRrazAvcGhBTFFEa1JUd003OUYxM2NpNldZL1NpNWpGblpjRzI3Q3BWV0phYlpxRmNBVWo5em5vWkJLNTB6Vkx0SW9yalZpODIxTlZOVWszM0xxek5WS2FVV0ptc0lYOXgiLCJtYWMiOiJmZmNlMmI2ZjY2OWYzYWUwM2UxNTEzNTYzMzk5NmI4YzRhODI1MWE2MTg2MWVjYmE3NDVmZjMyOGI3YzkwZWQyIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Imp1Y3paa3RzblNST1BDelVpSU12RHc9PSIsInZhbHVlIjoiYUtqK2ZaUHZOOEN5bEc4dHE2bEROZTU5Y3lWbWFjYUs5NWJoa1lRRHp3eTNKaVNvOXg3TnVCRG8rMEhncC9sNFc4UG5IZm43S3R5MzFKalJxN3NlYk5RelBYSzdpcjErZ1NtMnl3TmFwckNsKzNLYmFnYW5vaENid29TcDQ2a24iLCJtYWMiOiIxZjI0Mzg3N2U3MGNmMjQ5NjY3NjZlZDgwYWM1YmY1MjUzOWFiNWI3ODQ5YzE3Y2UwYmExMDFmYzRmMmRlZjE2IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Category].&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETproducts-category--category-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETproducts-category--category-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETproducts-category--category-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETproducts-category--category-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETproducts-category--category-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETproducts-category--category-" data-method="GET"
      data-path="products/category/{category}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETproducts-category--category-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETproducts-category--category-"
                    onclick="tryItOut('GETproducts-category--category-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETproducts-category--category-"
                    onclick="cancelTryOut('GETproducts-category--category-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETproducts-category--category-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>products/category/{category}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETproducts-category--category-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETproducts-category--category-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category"                data-endpoint="GETproducts-category--category-"
               value="14"
               data-component="url">
    <br>
<p>The category. Example: <code>14</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETproducts--id-">GET products/{id}</h2>

<p>
</p>



<span id="example-requests-GETproducts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETproducts--id-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6IjBKaURnT0pEV0syY01JUEQySlBoM1E9PSIsInZhbHVlIjoiYUI5UDVjb3FXMHlkR3dkZS9Udk9wWjZLeHVDSUpTZlZuZUdUdWg4RGNMZm9hY0J5S0FEdHhjTE1GbnJkNTVYazc2T3BSSjlkKytyZjhRMGFlczl6ZWhWbHZrVVVxL056ODdnWHF4eTBHR1dLUk1DaWdCWWVPZDlxcjluRUhJSjIiLCJtYWMiOiI2Nzc5OWEzNzY1NDk0Y2I2MWNhZDAwNWE5YzgwODg0NjgyNTU5NDE2ZjBlOTU0NTZmZWE2ZTg5OTRjMTUzMWY2IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InpNUzFqZTVtSWNNWGEzdVBPUStjRHc9PSIsInZhbHVlIjoiQVUwSWxoTVMzN0pNcUdyVXhVVnJoc0VVUTNweXlpdTZIWmMySlJjanU5TjFjeGlwVEtweklhVHFqTUVsRlZSdi91dURQMk15c2VvcWY3YlRvWld1bU15bWEvOEVscWFDbmN6ek9ZWG9jWEJOclBaRkZxQ240VFhINzZPZnF3V2wiLCJtYWMiOiJjMjg5MTE3ZmY1MzBlODQ1M2NhZDVhMmJlYzBiOGEwYjZlNDAzYTI3NTU5NGI1MDdiZmQwMGRlN2ViYjIyMDJjIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETproducts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETproducts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETproducts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETproducts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETproducts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETproducts--id-" data-method="GET"
      data-path="products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETproducts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETproducts--id-"
                    onclick="tryItOut('GETproducts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETproducts--id-"
                    onclick="cancelTryOut('GETproducts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETproducts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETproducts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETproducts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETproducts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETpost-detail--id-">GET post-detail/{id}</h2>

<p>
</p>



<span id="example-requests-GETpost-detail--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/post-detail/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/post-detail/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETpost-detail--id-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6IkR0N2RuaU80MTJ4eVJZNUdqVzIweWc9PSIsInZhbHVlIjoiY0NteFVjN29pWE5kMzZibUpGQy9RSDhGNllFVjBuZk9XOUEzWlZZdXZGbzhXRmc2aVdjaWFpNUhWR21FSXMxZGFBVzFZMy9zQTQvVVRvTitMVmFBZGgyc1NMQUY4MGY1aERZdlBlWWw4UnIwamVVZFdCUUd2VG53Ym1IaFd3NXgiLCJtYWMiOiJjZDJiYzFhMzZiMDIwNDdhM2JjZDRiY2RmMjk3NzBkYTZiZjdiNWQzZDU3NzQ4Y2I4NmE1OGRiYTM4NDEyYzc5IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InBDdW9jdnNxN3VPWU1Ic0Y3UkZLc3c9PSIsInZhbHVlIjoicDU5OStnNmMzQzJmNmZSYzVoREpjNzhKWEFKRXB1RndrNHlqRGhZQjJlNStVQTAvdm1PQWVDSisveUowNHlmb3lsOWxDb0lqcUNwTnJ0eUZKdSt4OVEwQVRiRDdBSjBVajhMaUtxSGNrTTNHM1J1S1cwMHRZaGU1ZllXMzB6ZzEiLCJtYWMiOiJhNjU2NmM3MzZlMGJlOTVkYmRjY2I5MmIzNWRmYTczMzRkNjE3MDk0Njk5MWJlOGJhMjMwMmNiY2Q2YzlhNWUxIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETpost-detail--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETpost-detail--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETpost-detail--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETpost-detail--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETpost-detail--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETpost-detail--id-" data-method="GET"
      data-path="post-detail/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETpost-detail--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETpost-detail--id-"
                    onclick="tryItOut('GETpost-detail--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETpost-detail--id-"
                    onclick="cancelTryOut('GETpost-detail--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETpost-detail--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>post-detail/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETpost-detail--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETpost-detail--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETpost-detail--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the post detail. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-product-detail--id-">GET admin/product-detail/{id}</h2>

<p>
</p>



<span id="example-requests-GETadmin-product-detail--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/product-detail/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/product-detail/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-product-detail--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InRMUjhHbVB6RStKMitXOXltaTF2YlE9PSIsInZhbHVlIjoiVGpkOGNHSlV3UWVOTXYrbW1JUFh4TTA4cFVmUUswU3h1aFJvUDlJczFJSk90SzNFK1Z4UzBqOUgrb21hejl0YXp3UGtKWjg4S3ZXb25qT25YQ0Z0endDSWR3K1pob05aOC90TFYyNFZhQ0hia0M5R2RGVjI3ZGo1bXovd2tBZDIiLCJtYWMiOiJlOGFiZjkyNGY5ZTVjMzEzMDJhNzY1MGJkN2E2ZDRkNDE1Nzg4YWRkYjU3YzVkYmIwNzA4OTY0NDFhMjhiZTQzIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImZZajlUdEowSTk5Q0V3My94Z2NVMVE9PSIsInZhbHVlIjoiUUJBNTQrMDBqWXF0TXo4NExtRHA3WEpCUElRV1hMQ0xyL0tTVzhJM09jWXQ1bnNSRFFGM0p4K1o5UnZOSUR6R1hlOEd1R2RvMTJJczFNRW90OTYrYngrdWxORm1aSU9uZlloekV5VnowWS9PTVRnV0lQcWZSU0FmeDYwbXc3MUIiLCJtYWMiOiI2MWUzNzM0OTM1ODVmN2YzZmZjYzBhOWJkNjBhMDQ0ZDFkZDI0YjM2NmU1ZDJkOWZkODdhZTRjMjgxYzU0ZGVmIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-product-detail--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-product-detail--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-product-detail--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-product-detail--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-product-detail--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-product-detail--id-" data-method="GET"
      data-path="admin/product-detail/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-product-detail--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-product-detail--id-"
                    onclick="tryItOut('GETadmin-product-detail--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-product-detail--id-"
                    onclick="cancelTryOut('GETadmin-product-detail--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-product-detail--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/product-detail/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-product-detail--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-product-detail--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETadmin-product-detail--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the product detail. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETadmin-add-product">GET admin/add-product</h2>

<p>
</p>



<span id="example-requests-GETadmin-add-product">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/add-product" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/add-product"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-add-product">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6InhGcDRlM2FIOS92STZBaHhQVnNEL3c9PSIsInZhbHVlIjoidnF5YjZkNGZDVWdZSXRxWnFMaXZqQVQxRmhsemJMRGl5VWV3TkU0TVV6M0xtVWRMd2VBdFl2bk82dk5mODBYNTRtNkd2cW1iUWhWd0p1Y2phdDJRMGlxYTBkTiszNVI1UHdUd1FocUdTVDNzb0MzRTZva21xOFFuUGNhcTdzNlkiLCJtYWMiOiI2Y2YxZjIyNzNiMTZiYWE5Y2MxMjE3YmIzM2E3ZGJkZjc0MjllMGUzZWEyYzEwNjQ0YzJhNDJkYmQzYmJhNzYyIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Im9QWFlyOFNnY0hZd241Y3NSUTFodlE9PSIsInZhbHVlIjoiTVNlVHY1dTkvZzNXUndrWWZXOVpjUFpjTkptT2JPbWhGSndjeGVkd3Q5STlHU25vOTROTS9QSGxhOVY0MTZRWUtiMW4zREM3VG8vajQwL2E1V0ZSRUtUT2hMLzdrZTVuQzJVRk92QlNJRnQvZ2VzRFcyWHZUQTZmblg5dm1pbEUiLCJtYWMiOiIxOTU4ZGZiZTNiOGIxMmQ0Y2MxZWExNWMzZmM3OWQ1MGZhM2VmNWU0ZGZhYzcyN2U0NjE5NzNmMGRjYzIxM2I2IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-add-product" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-add-product"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-add-product"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-add-product" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-add-product">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-add-product" data-method="GET"
      data-path="admin/add-product"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-add-product', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-add-product"
                    onclick="tryItOut('GETadmin-add-product');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-add-product"
                    onclick="cancelTryOut('GETadmin-add-product');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-add-product"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/add-product</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-add-product"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-add-product"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETadmin-order-summary--id-">GET admin/order-summary/{id}</h2>

<p>
</p>



<span id="example-requests-GETadmin-order-summary--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/order-summary/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/order-summary/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-order-summary--id-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6Ik5sa3lBalJUUDBZYjZuRG14QURDOVE9PSIsInZhbHVlIjoiT0pRYWdYS05CdTQ5Sko4R29kSS8vSHI0cHIwcDhqZ1FKV3pVcDBDNU9ycmJBVm1VM3RnQ3YwMlEvWHAwdk9YeTU1c3JJNzdHZkRuSGNBWHhjaVVoQ2xseUZtcjQxWWk3UUFKcGN2ZmlEOE9MTzVqaUZGQkR4K0tiVFdUb3FkTkYiLCJtYWMiOiJhM2QyMzk2MTViZTg2M2RhZTI3NmUzYzJiYWFlNzJmMjc1MWRhYjRmNDU4MDg2MWViZjU5ZGFjYjdiYzhkYzIzIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Ik5TZ0hLNGQ1S3dsTExXcmpGaFJYdFE9PSIsInZhbHVlIjoiaDBEM3JNdmRnaHlrVWRRT0ZLY2lVK2piVnJ1VHBVbXlRRnVLdXlsS2NSZDlkcC82ZTVlbytVaHJrOFRlVEJDUXZYNmtqSjNsY2hSVmh2blZLbFltT3B4akt5cWJrRlBzTXA4YytIWkQvUVR0QXBlQnNLVnJKRjRGUUxBWHpDOXMiLCJtYWMiOiJiZDhhNTczZGI2NzczNDAyN2Y4MDcyNGFkOTc4ZTkzMTQwYTBlZjhlZWFjYzEzN2I5OWFmYWEwM2YxYmFkM2M4IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-order-summary--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-order-summary--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-order-summary--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-order-summary--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-order-summary--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-order-summary--id-" data-method="GET"
      data-path="admin/order-summary/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-order-summary--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-order-summary--id-"
                    onclick="tryItOut('GETadmin-order-summary--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-order-summary--id-"
                    onclick="cancelTryOut('GETadmin-order-summary--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-order-summary--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/order-summary/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-order-summary--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-order-summary--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETadmin-order-summary--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the order summary. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETtest-categories">GET test-categories</h2>

<p>
</p>



<span id="example-requests-GETtest-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/test-categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/test-categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETtest-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6IlNJTis3V3ZyUWpkUVQ0U1d4MGQ4UXc9PSIsInZhbHVlIjoiWVhkdEJIMkk4WXpycDJ0cFo5Yy9DZ1gxSENROWZ0MUlxNGJMQThuNk5LcEFQd2Y0dy94K1JlbkdwUFg0MUJSRmdTOExvditDNHA4VUE5NjB4cnpXbVhDQUVESjdFeU85c0xlaUlDQWs1N09nRk11eUJsSm5OQTMxdXFvU3Vxa1EiLCJtYWMiOiJmY2IwNzI0ZGQxM2I5YTY1NDcyYmM3NjYzOTkwYTYzMGY0NDQyMmM5ZDllZjUxYjA1ZTNiYTMwNmYxYjNkOWZjIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Ii9keEdQQk0xNTBIWGM3djhBWkFyVmc9PSIsInZhbHVlIjoia05MVGw3Y3pDY05PZlA1aWhEN295bFB0VHFWOEdXbTB2dUFQN2gwNHlOY1ZaQ1Ira2Zka0hUYWVOR1pWb1JXMktDSnN2SDNFbk1ybkFrTnY2d3Frd2dkSThZRzlCbkhVcEtVTjhING9XSXgvcFBuWDNhT29meWdTY3Q3ajhDN00iLCJtYWMiOiJlMDhhNzY0ZTgzNWE4OWFkY2EyY2Y4MTk5NTcxYTUxZjQ0MjgxNGVmMGFkZTkzNjg0YjRmMjRiOThjYjI0MjUyIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 14,
        &quot;created_at&quot;: &quot;2025-06-03T12:19:18.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-16T08:01:37.000000Z&quot;,
        &quot;name&quot;: &quot;New Arrivals&quot;,
        &quot;parent_id&quot;: 14,
        &quot;parent&quot;: {
            &quot;id&quot;: 14,
            &quot;created_at&quot;: &quot;2025-06-03T12:19:18.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-16T08:01:37.000000Z&quot;,
            &quot;name&quot;: &quot;New Arrivals&quot;,
            &quot;parent_id&quot;: 14
        },
        &quot;children&quot;: [
            {
                &quot;id&quot;: 14,
                &quot;created_at&quot;: &quot;2025-06-03T12:19:18.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-16T08:01:37.000000Z&quot;,
                &quot;name&quot;: &quot;New Arrivals&quot;,
                &quot;parent_id&quot;: 14
            }
        ]
    },
    {
        &quot;id&quot;: 29,
        &quot;created_at&quot;: &quot;2025-06-16T08:02:55.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-16T08:02:55.000000Z&quot;,
        &quot;name&quot;: &quot;Body&quot;,
        &quot;parent_id&quot;: null,
        &quot;parent&quot;: null,
        &quot;children&quot;: [
            {
                &quot;id&quot;: 30,
                &quot;created_at&quot;: &quot;2025-06-16T08:03:05.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-16T08:03:05.000000Z&quot;,
                &quot;name&quot;: &quot;Gel&quot;,
                &quot;parent_id&quot;: 29
            }
        ]
    },
    {
        &quot;id&quot;: 30,
        &quot;created_at&quot;: &quot;2025-06-16T08:03:05.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-16T08:03:05.000000Z&quot;,
        &quot;name&quot;: &quot;Gel&quot;,
        &quot;parent_id&quot;: 29,
        &quot;parent&quot;: {
            &quot;id&quot;: 29,
            &quot;created_at&quot;: &quot;2025-06-16T08:02:55.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-16T08:02:55.000000Z&quot;,
            &quot;name&quot;: &quot;Body&quot;,
            &quot;parent_id&quot;: null
        },
        &quot;children&quot;: []
    },
    {
        &quot;id&quot;: 31,
        &quot;created_at&quot;: &quot;2025-06-16T08:04:58.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-16T08:04:58.000000Z&quot;,
        &quot;name&quot;: &quot;Face&quot;,
        &quot;parent_id&quot;: null,
        &quot;parent&quot;: null,
        &quot;children&quot;: [
            {
                &quot;id&quot;: 32,
                &quot;created_at&quot;: &quot;2025-06-16T08:05:16.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-16T08:05:16.000000Z&quot;,
                &quot;name&quot;: &quot;Masks&quot;,
                &quot;parent_id&quot;: 31
            }
        ]
    },
    {
        &quot;id&quot;: 32,
        &quot;created_at&quot;: &quot;2025-06-16T08:05:16.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-16T08:05:16.000000Z&quot;,
        &quot;name&quot;: &quot;Masks&quot;,
        &quot;parent_id&quot;: 31,
        &quot;parent&quot;: {
            &quot;id&quot;: 31,
            &quot;created_at&quot;: &quot;2025-06-16T08:04:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-16T08:04:58.000000Z&quot;,
            &quot;name&quot;: &quot;Face&quot;,
            &quot;parent_id&quot;: null
        },
        &quot;children&quot;: []
    },
    {
        &quot;id&quot;: 33,
        &quot;created_at&quot;: &quot;2025-09-04T12:08:31.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-09-04T12:08:31.000000Z&quot;,
        &quot;name&quot;: &quot;Cleanser&quot;,
        &quot;parent_id&quot;: null,
        &quot;parent&quot;: null,
        &quot;children&quot;: [
            {
                &quot;id&quot;: 34,
                &quot;created_at&quot;: &quot;2025-09-04T12:08:51.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-09-04T12:08:51.000000Z&quot;,
                &quot;name&quot;: &quot;Face Cleanser&quot;,
                &quot;parent_id&quot;: 33
            }
        ]
    },
    {
        &quot;id&quot;: 34,
        &quot;created_at&quot;: &quot;2025-09-04T12:08:51.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-09-04T12:08:51.000000Z&quot;,
        &quot;name&quot;: &quot;Face Cleanser&quot;,
        &quot;parent_id&quot;: 33,
        &quot;parent&quot;: {
            &quot;id&quot;: 33,
            &quot;created_at&quot;: &quot;2025-09-04T12:08:31.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-09-04T12:08:31.000000Z&quot;,
            &quot;name&quot;: &quot;Cleanser&quot;,
            &quot;parent_id&quot;: null
        },
        &quot;children&quot;: []
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETtest-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETtest-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETtest-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETtest-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETtest-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETtest-categories" data-method="GET"
      data-path="test-categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETtest-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETtest-categories"
                    onclick="tryItOut('GETtest-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETtest-categories"
                    onclick="cancelTryOut('GETtest-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETtest-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>test-categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETtest-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETtest-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser-account">GET user-account</h2>

<p>
</p>



<span id="example-requests-GETuser-account">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/user-account" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/user-account"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser-account">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImFTcUhzN0RPQ3RXMHhYWWQwV3liK0E9PSIsInZhbHVlIjoibDZFVkVMTGUyWW9ydXUrTWlNdjdWcnQvb3pFTGgrSEpuT25YQTI1cmppZFBJdHV2QmdPVHQ2eGZmeUFsU2w5ay9nRDdORzZiMHlrakNRditxVVF0UExMejhTSzE3dTd6a0U1anFZR0RnY2Q2WHVUcE1UdDNLdXNVM3AxNExEamQiLCJtYWMiOiI0ZDNhNTVjZjY1ZGZjZjdiZTVkMTI2MDY1Mzc1ODg1OGYwM2IyYmFlYTY0YzUyZTA3ZDI5NGQzOTZkYjk5NmU0IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkErY2hkR1BtT0VnWVE1djZpd1dTMkE9PSIsInZhbHVlIjoiZE1jV3VNeW1ITVhPaEp3U3pLbE9ENUtWK05TSGkweUhIY3QvZlFWZ0QrTFZaY0Q1a21VN0xMakZ2T21uUDBRQ2VyTDY2Y0UxT2VlNVN3dzZkc0laS29HMlZuYUllenZ2UWlhaGFJL0RDOGdHbys5TlE3cUM4ZTd6d0RuL1JkL0kiLCJtYWMiOiIxNzdlYjUzMjNmZTdhZDEwY2E1YWJmN2Q2NDk0N2U2YmM2YjBmOTJhNGM3NDc5NzIxMDIxODZhYzk3MDA1OGM2IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-account" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-account"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-account"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-account" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-account">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-account" data-method="GET"
      data-path="user-account"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-account', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-account"
                    onclick="tryItOut('GETuser-account');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-account"
                    onclick="cancelTryOut('GETuser-account');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-account"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user-account</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-account"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser-account"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETuser-password">GET user-password</h2>

<p>
</p>



<span id="example-requests-GETuser-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/user-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/user-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser-password">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjlOUytBSG9YMFhwODZhRHZQZ01vUlE9PSIsInZhbHVlIjoiUGFKYm9vbXVLczcyUHVXV0I3d2UwMzRENGJ2aUlFSk9pRDhsaHFCSVY3bDIrTVpaOHhuUVArZTVyVzN0dmVobUY0ekFPSGNJRndJM1BjK2RWcXBUNTFKakdEdFhBeHRSajhkblcrTTErTzhadFZlRDY3MlRtYWxtWitWZW84RnkiLCJtYWMiOiIxZWM4MGEwMGQ1ODgxYWE5ZjYwYjljODc2NThjYjMzZWMxZGE4NjJhZTc3YTI1M2IzMWZlNzI5NWMyODBiNGFlIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IkUwSzNYeWZTTyttSkUzWGhqNHY3TlE9PSIsInZhbHVlIjoiS2g4OHRPdnk3dmQyaFhzSmtTbEQvd3JqS0JFOElMbm9EYWJkeWU0a0UyVVp6WGNua2VOZGtCUGNoYlZvRnl2ditxZHgzODUvZGxmQzNaamY1VG52SjdtSE41TDVhTGZJNGxIbytqTlZCREhpNE54WmVjU0J5N0RwcmVNTkcvUVoiLCJtYWMiOiIzYzY0YWVkZTlkMTE1Nzc2MGM3NDc0NDRjM2VjOTY4ZDZkNzNiNTIyY2E1OTVlMDkwNDYzZjczNDlkMTViYWM3IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-password" data-method="GET"
      data-path="user-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-password"
                    onclick="tryItOut('GETuser-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-password"
                    onclick="cancelTryOut('GETuser-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETsettings">Invoke the controller method.</h2>

<p>
</p>



<span id="example-requests-GETsettings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/settings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/settings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETsettings">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlV6V3AyYkFlTmN2U1hIU3A1eDNidHc9PSIsInZhbHVlIjoicSsvTkJsd1RWZ0pJYTBGQjF6aGM1a2hCQzN4RkExZ3hJdEdQZlhsVkNGWVZYQ2dwL3VBQi93VFFEa204ekpkYnNSc25HNk1QcGd0OUk2ZVR2Y2VMUXNRclRFN00rd0dPcjRnU2VVTUQyUHM4WGRZVTJhaG1hOEphcGw1bGNDTWUiLCJtYWMiOiJiZDA0MzQ2NTQyNmI2Yjk2Y2M3NTIyYzlhYmFlMTQyNjRjYWUxMWU3ODdmN2VkMzkzNWJjNWUxYTIxNGU3NzNiIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IldXY1lSbEVTUzNyR2ZaZXdwR01QL0E9PSIsInZhbHVlIjoiZDNmUmIzY2lJeVdpTFBZNVpPWGdLZ2NCWGF6cndmcDU5czJ0dVFrVVdIcEY2b21tYVFIa2tEWE9mak1vR1JqcVIxL2tLUS9aRnZzaVpEQk1xcUZlK2JjVEMwcHE2S3RhOEIwbGJ2ZlhRZ3dmK0xHMFptTjlpQzMyMkZzdTRYL2YiLCJtYWMiOiJhN2M1ZWVlN2U0MWRhNzUxNGQ2OGU1ZGRlNWQwMmY0NWVmZjk1YTIzZGEyZjcxN2ViMmM3N2QwMDQzZGNjMGUxIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETsettings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETsettings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETsettings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETsettings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsettings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETsettings" data-method="GET"
      data-path="settings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETsettings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETsettings"
                    onclick="tryItOut('GETsettings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETsettings"
                    onclick="cancelTryOut('GETsettings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETsettings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>settings</code></b>
        </p>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>settings</code></b>
        </p>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>settings</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>settings</code></b>
        </p>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>settings</code></b>
        </p>
            <p>
            <small class="badge badge-grey">OPTIONS</small>
            <b><code>settings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETsettings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETsettings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETsettings-profile">Show the user&#039;s profile settings page.</h2>

<p>
</p>



<span id="example-requests-GETsettings-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/settings/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/settings/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETsettings-profile">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImdGOUYyVHkyZjhveEUzZ2V5dlo3UFE9PSIsInZhbHVlIjoiNjhnVkE4aDJ5dGROT0xyM0hjZTduUTZpalFLeDlSc0FwV3h6MUpjbWhid3VzQXV3eU02NVB3VW0wUlZVTGdhRzNwNjVJK1NXclg5ZE1OeFVFc3ZOTzRGRFQ3OWZBdjczbU1BSm5DdE5iK2R3VnJYVGFXeTF4TFhia2FQbktMbVMiLCJtYWMiOiIwZDNkZTU3MmIwYjM4YzUwODhkNzkwMTBmZjg4ZWIyZjk5NGVmMGExMmQ2ZTMwNWI0MjdhY2UzMDk4YWFjMDY1IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IlJMTVRLU3BxUFBxV3VRUHVra1ZtZGc9PSIsInZhbHVlIjoiYWR4K1NwTEVoak1iNEhzdGphL0Q2TnFZdDdRR0s2TjR6TDlrNGs2ZUIxbnp6OWVubjNtdTBPMmxtbWJZQ1U4SDlzdW9lWENZZlFLWXlKQ0hWZnl5WVZQMktQMUZjUGl0MGFabkdZK3dDYkM2aWlQdTZ2MmdseDJRRUVRQmMwTmsiLCJtYWMiOiJmZTc1YTMzY2U4MjdjZDAzZjFjYTQyY2VhODVhOTg4OGI0NGMyMWNlMjQ0ZDI3N2FjMjQxMzVkOTBlNWQyODczIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETsettings-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETsettings-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETsettings-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETsettings-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsettings-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETsettings-profile" data-method="GET"
      data-path="settings/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETsettings-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETsettings-profile"
                    onclick="tryItOut('GETsettings-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETsettings-profile"
                    onclick="cancelTryOut('GETsettings-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETsettings-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>settings/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETsettings-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETsettings-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-DELETEsettings-profile">Delete the user&#039;s account.</h2>

<p>
</p>



<span id="example-requests-DELETEsettings-profile">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/settings/profile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/settings/profile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "password": "architecto"
};

fetch(url, {
    method: "DELETE",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEsettings-profile">
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6InhxS01xNWVxbnFEY29LQjVYMVF2YlE9PSIsInZhbHVlIjoiWk1ZSE9jQjNmR2RoMWgyVlBNTGJ5QWVYOHBoMzVORVJJeTFQa0hkZi9iVVJQRzdGZk9IWUkxNExkS0l6TStRbzF1NThGdFgwVlZtelNzcC9WeFZTRUtnTWI4bzdHR0FtQlJjN1Q2Y2NtcnFyUi9YcW82Wi9IT3Nwbm5EemdqNTciLCJtYWMiOiI3MjZlN2M1NDZmNWMxMDY1ODQwNTU4MWFlNmQ4Zjc0MDhkNzNlNjBhODA4ZWMwZmM3NWE0ZWM4YjgxMTNlMjZjIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEsettings-profile" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEsettings-profile"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEsettings-profile"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEsettings-profile" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEsettings-profile">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEsettings-profile" data-method="DELETE"
      data-path="settings/profile"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEsettings-profile', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEsettings-profile"
                    onclick="tryItOut('DELETEsettings-profile');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEsettings-profile"
                    onclick="cancelTryOut('DELETEsettings-profile');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEsettings-profile"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>settings/profile</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEsettings-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEsettings-profile"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="DELETEsettings-profile"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETsettings-password">Show the user&#039;s password settings page.</h2>

<p>
</p>



<span id="example-requests-GETsettings-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/settings/password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/settings/password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETsettings-password">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImxxalgrNEVlWDN5cGF0OTNzMlQ4SVE9PSIsInZhbHVlIjoicmxKZ2hwVG5DUkNMRWlvNzg3R3FnSGZ4cE5aK0h6QTNsOENoUDcwUENkRmxwaHpQc3JKTXhja0tjNzM5R2k3OTJUVmZVRVM2MnM2KzBKMDZia2V6clZRRDcxSUQwZ2RzdFJzbTdaRkF0T0YvR0xhaVVNQjR4c0RBT2ZMa2ZJcmMiLCJtYWMiOiI3MmQ5Njc3MTQ5NDFhYmJhZDI2NjA2NWFiMTFmYTQwYjNkZTYzNzZhODI2OTUzMGZhM2FiNWU3Y2M1MWRlMzg2IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IjJxSTFTTkFXNTc0UVZKNUhRMHQ4d3c9PSIsInZhbHVlIjoiTmkxY0dnODZmZUJzcGs4c0R5VmFuWVJPcld1N0tqMVgvbE82Uks0Y3ZBcHYzNmhqbGZUY0RYQi9aVGhuNTNVcnJRMHhRZ1o2dWoySjJmVUorR0RBLzdYbzZCMTlva2szM2h0RnkvRkdhMkZGaXcxQ1d3QU15VDNua21oVG91S1kiLCJtYWMiOiJhM2ViMzQ1MzI2ZDc0ODQ1ZDFmMzFlNmFiYWI1OWMyODA2ZGEzNTIyMTAwNmM2MDg0OTFjOWU2MzUxYWQyMTcxIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETsettings-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETsettings-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETsettings-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETsettings-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsettings-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETsettings-password" data-method="GET"
      data-path="settings/password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETsettings-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETsettings-password"
                    onclick="tryItOut('GETsettings-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETsettings-password"
                    onclick="cancelTryOut('GETsettings-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETsettings-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>settings/password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETsettings-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETsettings-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTsettings-password">Update the user&#039;s password.</h2>

<p>
</p>



<span id="example-requests-PUTsettings-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/settings/password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"current_password\": \"architecto\",
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/settings/password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "current_password": "architecto",
    "password": "architecto"
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTsettings-password">
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6IkJrbFlIaVg2MzA3UmQrRmcrZFA1b1E9PSIsInZhbHVlIjoiMXlYVkFqVW8vODBCNnFZRUVSSkNjVS9UaXZIMmd0bFovNlJFV0s4Ykw2MHRhMGxVUU5yUTkxbStjcDdZVUZnTm5PRzhKNUpmbmZWUithV25mUHZLNVoxNFBTb1ZOcDN0ekFrbFo4UUxUckdaTkhDK0hvRDI3VWJZam9DNkFDTjQiLCJtYWMiOiIyZjBlYzVlMGFkOWM4NWNlNDgxZjZhN2FhNTE5YzBiYjdlMzMwOGE3NTU0Zjk2MmI4MjZmOWNjNDY5ODcxNzFmIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTsettings-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTsettings-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTsettings-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTsettings-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTsettings-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTsettings-password" data-method="PUT"
      data-path="settings/password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTsettings-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTsettings-password"
                    onclick="tryItOut('PUTsettings-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTsettings-password"
                    onclick="cancelTryOut('PUTsettings-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTsettings-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>settings/password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTsettings-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTsettings-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>current_password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="current_password"                data-endpoint="PUTsettings-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="PUTsettings-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETsettings-appearance">GET settings/appearance</h2>

<p>
</p>



<span id="example-requests-GETsettings-appearance">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/settings/appearance" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/settings/appearance"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETsettings-appearance">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IjVhVDQyOTNTWTZnRWs2d3FnNjFCcXc9PSIsInZhbHVlIjoiK05ZUHBaUFhZSlFteHFZS0U5TFMyYVZUZFhTOWFIL0RXTE4rSmZjcE1XeUxEM1dJUHdhK05HTU05ZmpoVnB6SHowU3RtS05OTW9ML0JtVThzYzAwNndURG02K2syeHRjOGZ3ODN0M0duTHdUN0dSYTRUZlRYbGJCQUNwVW03L2giLCJtYWMiOiJkZTlhN2ViODU5NTBlNDNhNzliNTgzY2Y3NjAxNDgyZjFjYmQyMTc4M2QyZWU3YjFlNjAwYTdiMjU2Y2IwNWU4IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImQyUmdIcmM3WnZQVEFwZ1dkQXFGRUE9PSIsInZhbHVlIjoidjJtMUo0b1RCbFFmS2JXNTJiSGJnV2cvM01kS3FYNnJzaE5LNExKS1d0ZEFyeGtuZkFJWm9LaGpjQjNLL0gzcjQ4Q3A1NTJDWXk2RGwraS94TzN1dHhYZjVBRS95S09laFEya0hvMWFBOG1GVmN1WUhqVmZYZzViK2J1TVQ1bXEiLCJtYWMiOiJmZTFkZGNkMDBlN2JlYzU3NjBhZGQxNWEwMjQxYjI5MmZmMGU5M2YwM2RiZjdhODc0MDM4M2VmYzYyZmY1ODg3IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETsettings-appearance" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETsettings-appearance"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETsettings-appearance"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETsettings-appearance" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETsettings-appearance">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETsettings-appearance" data-method="GET"
      data-path="settings/appearance"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETsettings-appearance', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETsettings-appearance"
                    onclick="tryItOut('GETsettings-appearance');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETsettings-appearance"
                    onclick="cancelTryOut('GETsettings-appearance');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETsettings-appearance"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>settings/appearance</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETsettings-appearance"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETsettings-appearance"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETregister">Show the registration page.</h2>

<p>
</p>



<span id="example-requests-GETregister">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETregister">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6IndLek8xTENoRW52dFJtUFZMb0VDK0E9PSIsInZhbHVlIjoidlJZNUhiclBGZjY2MmVBcVZsckhLZUVYUFpoQkdoU3ZnaG15N1MyeXhkbGhqNFZMNUVYOXBEUS91QXNyVzA0anErS2duTmJnRXlnQzZCQUJaZEJqZ3JBaWxhUWRFbUV3ZDBkOUcvQ1lOT2xwOENoZTJoSU4vdHpMRmpwR1pKcG8iLCJtYWMiOiIyNDlkMDFlZGRkNDU1NmFiZDNiNWU2NTMzMjY1MGE2OGEwZDQxYWEyN2Q1MGQxODRkMTQ4ZmFkZDllMmNmNDYwIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6InFTU09ldUY2Rlk3V0daVlU5czNoQ3c9PSIsInZhbHVlIjoiR01IaGJRTTY1YjUvUHFTWmRCV1p3UHdSZi9WcStKYklwUmdwZFBzaVFPc29rM1lwNFF6K1JtWDdKUGRYbzE5K0o0NjRJMGxPVE5CcHZ0UmNZMG1nWThCd1c0Y1dLay9uZlExb05ERnUzSERDL0hxUDM5bmg5RjgzTnNwaGZZWFoiLCJtYWMiOiI4NTRmYjA5MmQwMTNkNDBhZjdlN2M5OTJhNmRlOGQ1NDU0Yjc4YjBjMTE1MjFiMWYxZGQxZTJiMGZlMDZlOTkyIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETregister" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETregister"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETregister"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETregister">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETregister" data-method="GET"
      data-path="register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETregister', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETregister"
                    onclick="tryItOut('GETregister');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETregister"
                    onclick="cancelTryOut('GETregister');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETregister"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTregister">Handle an incoming registration request.</h2>

<p>
</p>



<span id="example-requests-POSTregister">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"b\",
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "b",
    "password": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTregister">
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6IkFUQzljdy83YXJ3UFNseHIvczl2dnc9PSIsInZhbHVlIjoiZDNEejF5ZUdoNW1lZy9iRndEc2VMaGs5RXVzdStzOXE4bk5uclltTFpjY09waXdlY2dXWU1RTlBHK2JNTythTCtBRFc3K3RnUzZJOGM5N2JtdFRoMm9QMG1XaDVuZXZPMVFIZC9WejZoNXg3R2p6TlhVV3cyUmVqT1VBWW1uZ0wiLCJtYWMiOiJiNWI2NmYxMzRiZTMwMDgwOTI0Nzg5M2M4OTE4ZjhmZTg0M2VmOTdkNmVlZDY4MGY0NmM3M2Q4YzAzZjMxNWM2IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTregister" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTregister"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTregister"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTregister" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTregister">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTregister" data-method="POST"
      data-path="register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTregister', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTregister"
                    onclick="tryItOut('POSTregister');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTregister"
                    onclick="cancelTryOut('POSTregister');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTregister"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>register</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTregister"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTregister"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 255 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTregister"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTregister"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETlogin">Show the login page.</h2>

<p>
</p>



<span id="example-requests-GETlogin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETlogin">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6ImJBekhSNm1ERWlXYTR6Rk1NKzJZenc9PSIsInZhbHVlIjoiT0ViRkkxeDdCTDRRV1owTGVKcUg2aEtIU1BnanBHb0hEZlJvQk12SnZQNUNibEVBcXh5ZlM1SXRXb3daMWc4aEV1c1dRbGJ1SnVJWkRvcXFVOENiQmZ2VGUxUDZkd1NmRnplUGhPUTY0b05XN1NQRHhObGNLN3k0dTc3RmE2c2EiLCJtYWMiOiJiNWJkMGIzZWVlYzdlNDhjMTE5MzRmZmVjYzJjYWFiM2Y1MDU2NDQ3YjYyNTU3ZGM4MmE5Mjc2YzUzOTg1YWQ2IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Iml5OGhGVTRWM29xbVpwa0dYUE10VHc9PSIsInZhbHVlIjoiQld6L3ZTWk9KckNxdHc3bW5GclV0SDhjeTlpU2dGZGFhcTZaQTdNRUh3TTR0OFR3S3hQMUNwNTZIbHhLSzl5UVFON3hqZ3dCL2dJTC9iQ0FZL1Bma0c3YkprZTYyTHRhZDhraG56RTBlb0t6am1YSyt6d0ltT0VPOGdUOVV3dWUiLCJtYWMiOiIyNTE4NzQ3MmVhYmQ1YzJkNWRkNjcyZjY5MTkzN2Y5OTZhNDJkN2ZlMjEwZDhkNmY4ODI3ZjAwOTNhMGQ0MTYyIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETlogin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETlogin" data-method="GET"
      data-path="login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETlogin"
                    onclick="tryItOut('GETlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETlogin"
                    onclick="cancelTryOut('GETlogin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETlogin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTlogin">Handle an incoming authentication request.</h2>

<p>
</p>



<span id="example-requests-POSTlogin">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "|]|{+-"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTlogin">
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6InFqaWVuenVYZmlZdGNNRXpTUE9DNWc9PSIsInZhbHVlIjoiVjRxNFZrZlF0VnVERFNCaXhMaXV5OFR0ZFdURkFiemQ3RlpyRHV3NlNyNWJsTlFPYUNxdHRTT1RuanRCUWdlQjRZL2lNbFZwRDhUNDJGQlNFU1BNMmJzN0pTeTBJSGMwYUkzVit2aHVvZWNEcjVyRU5Pc051SjBNYlZpZEdDQ3oiLCJtYWMiOiJlMzhkYjMxZWYzNTgzNWRjYTE0MGIwZGNkMjAwODgzZmVlYTZmNDgwZjU4NDVmNmUwMzNlOTU1ZTFhZTk2NjEzIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTlogin" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlogin"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogin"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogin">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlogin" data-method="POST"
      data-path="login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlogin', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlogin"
                    onclick="tryItOut('POSTlogin');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlogin"
                    onclick="cancelTryOut('POSTlogin');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlogin"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTlogin"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTlogin"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTlogin"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETforgot-password">Show the password reset link request page.</h2>

<p>
</p>



<span id="example-requests-GETforgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETforgot-password">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6ImpZVmhBcUh4NVBxYXJNV3NOc3U0MEE9PSIsInZhbHVlIjoiUmRlNkZ3MWN3dmVLeE1nN3gvcGg3dzBHemlROVhmZEMrV0VJMWJ0cG1SV2JVZlI3dThYR3lDbW5rRllwN3d1QTRFYkVlSHpSaUlLa2o3ekdDeDFZamtOajcrWFZzbnhGeWVJcjg5SzZCdFZ4R2lpL05XOEo1NFQ3akxUOWduSUoiLCJtYWMiOiI3YWMyNzY4ZmQyZWNkMWQwYmMzZDBkN2M4Nzk4MzAxZDA2OGEwN2ViZmQ4NjhjMTYxNmRiZDQ1YzZlMTZlOWQwIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImlyNS81U2tkMjZXWjdQMUlMVTdZdnc9PSIsInZhbHVlIjoiWHF0QnR0aDNtTjZMNkMrM0pJN1BWYW9wWWdYY0g2ampIbkZ3WDVScVRvZ1JFWlpyc01YMmVMK3BNOC9vQXNKTkZERGhnUzJ4SVZxNm9lWEUwcCtubkJtZTZzbDB1cjRseUVCVk5TT3BxTnZqSHRlSFUxcEYyU2JWNFBVTVFSMjYiLCJtYWMiOiJkNzViMGU0NTExZWRjYTAzODIxYmJmYTQ1ZjBlODQ4Y2UyNzQxOWQ3NjllYzRkOWZmMDJjNTBmYjkxNzc1YTVlIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETforgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETforgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETforgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETforgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETforgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETforgot-password" data-method="GET"
      data-path="forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETforgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETforgot-password"
                    onclick="tryItOut('GETforgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETforgot-password"
                    onclick="cancelTryOut('GETforgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETforgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTforgot-password">Handle an incoming password reset link request.</h2>

<p>
</p>



<span id="example-requests-POSTforgot-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/forgot-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/forgot-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTforgot-password">
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6ImZnQkRoaDBteG1kTDJhM0JuejhMamc9PSIsInZhbHVlIjoiNDE4K3VwNEE2L2pOSUIrb3cyeXZmSFVLZE10NWRDNXBTd29pQ0l3QWpSRFNNQnZXVWJXZkxDaElwTnhsWDBwU0RxblFnRURpR2V2Qmx3aTZtSHNFMVV2TXBldGdXckkwRGM0VEk4MGhlVmlXSk8rZENmQzVrUFprRWozcHFBVjkiLCJtYWMiOiJkMjgzOGM3ODhkM2M5YWYyNjNhMjFmYjQyMDk0ZTRjYjk3ZTgxZjgzODcyZGVlODI3MGY2NWQwYmI1NDE2MzhmIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTforgot-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTforgot-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTforgot-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTforgot-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTforgot-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTforgot-password" data-method="POST"
      data-path="forgot-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTforgot-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTforgot-password"
                    onclick="tryItOut('POSTforgot-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTforgot-password"
                    onclick="cancelTryOut('POSTforgot-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTforgot-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>forgot-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTforgot-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTforgot-password"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETreset-password--token-">Show the password reset page.</h2>

<p>
</p>



<span id="example-requests-GETreset-password--token-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/reset-password/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/reset-password/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETreset-password--token-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
vary: X-Inertia
set-cookie: XSRF-TOKEN=eyJpdiI6InZmTHNEQUNsQmVYTkZYejd3dllMOEE9PSIsInZhbHVlIjoiZ2VUbTdpYlB6RlFWd3NKb2d5aE1uWGcrbHAzK0Q3R1U5eWkyUW9pczlQK1g5RjNSQ2xzVDZpWHhGOHBnajZBYks1MnBVZHlhQUo1aUc2Wk1LMUlaY0pJMEY5RWpQc1l5VExQaWV1dWc0MVllaHhlMnQ5MFNvRytidkJWMFdZT1IiLCJtYWMiOiI4OTVlZmVjY2U3ZWM1M2JjMjI0ZDg2MTJiNTM5ZmFiY2VkZjZiMzc2NGE0NzhiMjJlODE4NGExZGY1YjJhZjQzIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IjVoMHdlOVljeU5OVitVWURKMkFMN2c9PSIsInZhbHVlIjoiaWxaVmhqckNNeGN1Yks2bjY2MzdsQTBXRExPTS9hOE9uKzBKd01oRE1IZXJJQjJzZUd4TW41WWJ6bGFvcnM3L1llV1VhNWtUN1dMK3hjV00xZkc0NllOblh6WVFPN2pZWXAxZXdhaUFjbmFhZkxkN1FOemp6VS85SDhXT0NNRy8iLCJtYWMiOiI5NGU0NTQ2MmI0MWU5NDI0M2ZkNGM4MGQ0ZTEwNWY0YjFlZmQyZWRjNWQxYjlmZWFlNTBjOWM1NGY0N2I4YWMzIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETreset-password--token-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETreset-password--token-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETreset-password--token-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETreset-password--token-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETreset-password--token-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETreset-password--token-" data-method="GET"
      data-path="reset-password/{token}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETreset-password--token-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETreset-password--token-"
                    onclick="tryItOut('GETreset-password--token-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETreset-password--token-"
                    onclick="cancelTryOut('GETreset-password--token-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETreset-password--token-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>reset-password/{token}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETreset-password--token-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETreset-password--token-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="GETreset-password--token-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTreset-password">Handle an incoming new password request.</h2>

<p>
</p>



<span id="example-requests-POSTreset-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/reset-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"architecto\",
    \"email\": \"zbailey@example.net\",
    \"password\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/reset-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "architecto",
    "email": "zbailey@example.net",
    "password": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTreset-password">
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6ImFBVnM1Mzl6T2Y5RlpjaUNrWE1wa2c9PSIsInZhbHVlIjoiSU12VDFXVy9MWWd2RlVpN1FYaENjbmVtdDR3dG1xdUEvdDlzLzV1ZXF0eENGUFB2aU8zcnQxMzNtQVBZWDhueGNpWUVPNXZaeUxGMXpidnVGdG44ZG01ZVJTY0kzd1Vab3JLdnJMMnMvMUxKQmpzdk0rdExUNW0xZ0VYbExhQkoiLCJtYWMiOiI4YmFhYzQ3YjYyZTdkMWEyZmY1NGI1YTQ3MGRmYTA0NDIxZTNjOTA5MGQ0YzUwZDg0YTM0YTViNDYxZmFlMjAyIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTreset-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTreset-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTreset-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTreset-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTreset-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTreset-password" data-method="POST"
      data-path="reset-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTreset-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTreset-password"
                    onclick="tryItOut('POSTreset-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTreset-password"
                    onclick="cancelTryOut('POSTreset-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTreset-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>reset-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTreset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTreset-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>token</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="token"                data-endpoint="POSTreset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTreset-password"
               value="zbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>zbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTreset-password"
               value="architecto"
               data-component="body">
    <br>
<p>Example: <code>architecto</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETverify-email">Show the email verification prompt page.</h2>

<p>
</p>



<span id="example-requests-GETverify-email">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/verify-email" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/verify-email"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETverify-email">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImNaMXB6U0xuQ3BNQWZ3VUlocUw2R1E9PSIsInZhbHVlIjoib0ZQQ2pwT01NUnRCOTJxcUlObmhNZzZyRmpWWUoxdWFoRFFvZEF1SFVHTVRiaVMzakt3eUp4OWpkNjVPMDVWTFZtUFFPUFNDdDUrbmsvZ0xuVm5EcFdVRmVRYkIxRmw1RUhlSHZyQ2dsUE5iL1Jobk5TcGhJaHN2UGprNloyS3kiLCJtYWMiOiI0MTIyZTU4MzAzYTc4YTkwYjJhYWJkMTA1NDcwMWZhY2JiOGNlNmY3N2U4Zjk4YTM1MWM3MTk3OTAxODhmZmZmIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6IjZjbnBuTjV0T29YSDJpeXJwampvTFE9PSIsInZhbHVlIjoiZ214YVlOS2pWQVArTk5NQWVURllmdjZPV09qY1M1dnpXcWxaazQrOHBab2JWOGoxTXRKM0JPc2QrajdGOUJnTnNxMjVHa29WYTJldTVaN2t2Y3ZBR2ljRTVYcng2UjBNSWlVaGNxYWpnUXNEU3dMUnBjMHJKelRjSU5LamhUZnAiLCJtYWMiOiJmMjIxMjMzNDRlMjBjYTY1OWZkNWNkYmRlOGQ5ZjNhZmJmODk5YjMxYTQ5N2I3MjMyMGQ0OGU4Mzc1MDdjMzYyIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETverify-email" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETverify-email"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETverify-email"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETverify-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETverify-email">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETverify-email" data-method="GET"
      data-path="verify-email"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETverify-email', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETverify-email"
                    onclick="tryItOut('GETverify-email');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETverify-email"
                    onclick="cancelTryOut('GETverify-email');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETverify-email"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>verify-email</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETverify-email"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETverify-email"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETverify-email--id---hash-">Mark the authenticated user&#039;s email address as verified.</h2>

<p>
</p>



<span id="example-requests-GETverify-email--id---hash-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/verify-email/architecto/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/verify-email/architecto/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETverify-email--id---hash-">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6ImlnSVBWQzk2dkNzS1MyaHBlU2cyL0E9PSIsInZhbHVlIjoidk5GamsyZVp6aGdzTXRiOUl4Wm9ZZFplNC9qQVMrUkQrRUs4SnlDNitYRUw0NEVXcjhJbFJDLzR1QVkySUFIK2ZUVVZxZ2pRcisxU08rRWwxUUNBTjE0dWY1Q0F6RWpITzBvM1hZb1pDelZ2eFJXbDVLUmxScXlJcFRnb2xGRmIiLCJtYWMiOiI5M2NkNjg4NGM2MGQ5NWY5ODY3NTI4ZTYwMDc2ZWYwNTNmODE2ZDk2ZmMxMzgwNWZkMGYwZDQ4YjA4ODczOGVkIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6ImZocTJWQktadElLZEwrWTBXYVBmTlE9PSIsInZhbHVlIjoiNTAwS3J2TnkwV1JuTXFIOFZyUDJlWkdTQ0VraGJxdDZySzhTMXJnNHlOSXZLYWRkeEFpNElMKy9pbjZUcUxPVy8wMzcrZzVrQ0NOMDlacFNGbGNPYkJTQy95NnMwSkM0REpoSW9lZDNqdk5DQ3J6aTJjajVaVmkvaFVVMXRyMEsiLCJtYWMiOiJkMWYxZDE5NzI1YjgyNzdkZjBiMzE5Njc1YWJlMTM1YjEzYjhhMDMyNGY5NjY4YzAyNzBiZjZmYzUwNzQzNjVkIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETverify-email--id---hash-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETverify-email--id---hash-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETverify-email--id---hash-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETverify-email--id---hash-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETverify-email--id---hash-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETverify-email--id---hash-" data-method="GET"
      data-path="verify-email/{id}/{hash}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETverify-email--id---hash-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETverify-email--id---hash-"
                    onclick="tryItOut('GETverify-email--id---hash-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETverify-email--id---hash-"
                    onclick="cancelTryOut('GETverify-email--id---hash-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETverify-email--id---hash-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>verify-email/{id}/{hash}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETverify-email--id---hash-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETverify-email--id---hash-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETverify-email--id---hash-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the verify email. Example: <code>architecto</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>hash</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="hash"                data-endpoint="GETverify-email--id---hash-"
               value="architecto"
               data-component="url">
    <br>
<p>Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTemail-verification-notification">Send a new email verification notification.</h2>

<p>
</p>



<span id="example-requests-POSTemail-verification-notification">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/email/verification-notification" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/email/verification-notification"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTemail-verification-notification">
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6Ilh0aTA2Z1VUQmNVYUFJKzRtYTM3OUE9PSIsInZhbHVlIjoiMVRjaXRhK2R2S0czMkpWb3R1VlVWWGd0N2xZOURRc2JZOUFkejhaWk9ETFNSTEZTNDJhYUVvemFBUnBlQ1dlOEJiMkIya3o4OS96OUU1WHIrRmIySis0TmRueDRpdENiN3ZncytuWGMyVUZSTWdER1RqMFR4NkhYU1FRMnBPbTYiLCJtYWMiOiJiZmM2OTg3MWQwZDMyZTI4NDczMjU3YWZjZDUyNmNiZjQzMTFhNzYxODBjZWFkOTU4YTEzOTExNTdmMmJlZTIwIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTemail-verification-notification" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTemail-verification-notification"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTemail-verification-notification"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTemail-verification-notification" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTemail-verification-notification">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTemail-verification-notification" data-method="POST"
      data-path="email/verification-notification"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTemail-verification-notification', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTemail-verification-notification"
                    onclick="tryItOut('POSTemail-verification-notification');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTemail-verification-notification"
                    onclick="cancelTryOut('POSTemail-verification-notification');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTemail-verification-notification"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>email/verification-notification</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTemail-verification-notification"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTemail-verification-notification"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETconfirm-password">Show the confirm password page.</h2>

<p>
</p>



<span id="example-requests-GETconfirm-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/confirm-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/confirm-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETconfirm-password">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: XSRF-TOKEN=eyJpdiI6IlN5UFpscC9JdUxIWmFGcjAwNzRqU0E9PSIsInZhbHVlIjoiaTE1MmwzUlFUS2tkb3VsRDVBU2F4bGlBb1VsZ0s2ZUV2OVk4TytDdC9keWVLQVAyNDZsdVlTd1pPT2kxaTFQVjVRMFZIQlhCazJSTmo4KzhFRHJNRWg0QU5yS29GV0V6UjdCVThSL2E3R200K2pvbWNhak15R0toWTY3eGNLMUMiLCJtYWMiOiJiYzQ5NGZlOTA0Y2U1YzNkODE3NDgwNTVjZmEwZmRjYjE3ZTViYjA2NmNhYzhjNDBkZDU0YTBhNjBkZWRkYmQ1IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; samesite=lax; laravel_session=eyJpdiI6Ikc4M0FOZUV4YmlPdWFnY0JaUDkrMVE9PSIsInZhbHVlIjoiMVZNOHdnbU8zQnpxcUU0dURhYmJEWDlHa0dkY2x5ZW0yald4NFVscUlFaHJZTWk4ZVlQSHl4UVJPeDZ2dnRsRjVMc3YzTzFQMkRneDFnZHVxOC9vOVpJUHpkblNzKzQ2c1g1Q0NzVk02cDZwVnVOWEpBQlFYc285dXhpV1lVdEgiLCJtYWMiOiI1Y2M4ZjcxMzk4MTAyNGRiYjFhYjkzODQ3YThmYTU2MjExZTBkZjZhODI3MTg4ZjVkYjUwMTdjY2ZlMDlkMjhmIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETconfirm-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETconfirm-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETconfirm-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETconfirm-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETconfirm-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETconfirm-password" data-method="GET"
      data-path="confirm-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETconfirm-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETconfirm-password"
                    onclick="tryItOut('GETconfirm-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETconfirm-password"
                    onclick="cancelTryOut('GETconfirm-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETconfirm-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>confirm-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETconfirm-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETconfirm-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTconfirm-password">Confirm the user&#039;s password.</h2>

<p>
</p>



<span id="example-requests-POSTconfirm-password">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/confirm-password" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/confirm-password"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTconfirm-password">
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6InZMMTBoRW5QT2dCUHhCUm9YVDdHWVE9PSIsInZhbHVlIjoiYjJ6K0NoZGsxVzJITjM3WHBRanFQSEIzRUdKNHJtWGF6dFhmeVViVzgyRHcxR0hJTzBBaFd3eUpxdXRxVmppbjVuY05VSVI2VmdLSFMzdHlDcnJ6OWFvWDAvdjNNb2FZV1VIbXorNjlkZWJOR3BEd2tnNkt3N1ljUFRvUjVHZUsiLCJtYWMiOiI3NTY1MmNiNjQxNmFlMTk2OTg0YzFmNTg4ZjQ5YWE1YzRjNTJmOGE3OTFhYWJlYTgxNDZmYzY5YjI3MzEzYzMzIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTconfirm-password" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTconfirm-password"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTconfirm-password"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTconfirm-password" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTconfirm-password">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTconfirm-password" data-method="POST"
      data-path="confirm-password"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTconfirm-password', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTconfirm-password"
                    onclick="tryItOut('POSTconfirm-password');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTconfirm-password"
                    onclick="cancelTryOut('POSTconfirm-password');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTconfirm-password"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>confirm-password</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTconfirm-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTconfirm-password"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTlogout">Destroy an authenticated session.</h2>

<p>
</p>



<span id="example-requests-POSTlogout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTlogout">
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6IjdiL1QvcVFOYUFyUHBhN24zbE15cXc9PSIsInZhbHVlIjoiMitDNGJKMXRWMUpuN25HcXJBKzJPL3dJZUpGY0pobkJ5Y2NnbWxCWFRvUkdLS0poNXVpTjhRVkVTUEl2T0NGTnhONTcvT29IMHp0RlpobkFCd3VJOC91SXg0STI0V2dPbEJieG9oOGJZcVpSSWlWeERPQlVYNzJWRG9pKy9EZzMiLCJtYWMiOiJiODExOTYyMWIwYjhlMTMxZGUzZWY0YWJiZDY1YzllM2M3MDgyNmYxODIxZTA4ZTQ5YzkzNGZiZGM0NDdiZmM5IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTlogout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTlogout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogout"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTlogout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogout">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTlogout" data-method="POST"
      data-path="logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTlogout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTlogout"
                    onclick="tryItOut('POSTlogout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTlogout"
                    onclick="cancelTryOut('POSTlogout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTlogout"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>logout</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTlogout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTlogout"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETstorage--path-">GET storage/{path}</h2>

<p>
</p>



<span id="example-requests-GETstorage--path-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/storage/|{+-0p" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/storage/|{+-0p"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETstorage--path-">
            <blockquote>
            <p>Example response (403):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETstorage--path-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETstorage--path-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETstorage--path-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETstorage--path-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETstorage--path-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETstorage--path-" data-method="GET"
      data-path="storage/{path}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETstorage--path-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETstorage--path-"
                    onclick="tryItOut('GETstorage--path-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETstorage--path-"
                    onclick="cancelTryOut('GETstorage--path-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETstorage--path-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>storage/{path}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETstorage--path-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETstorage--path-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>path</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="path"                data-endpoint="GETstorage--path-"
               value="|{+-0p"
               data-component="url">
    <br>
<p>Example: <code>|{+-0p</code></p>
            </div>
                    </form>

                <h1 id="orders">Orders</h1>

    

                                <h2 id="orders-POSTorders-store">Créer une commande (admin ou client connecté)

Crée une commande et attache les produits (id + quantity).</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTorders-store">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/orders-store" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"customer_name\": \"Alice Martin\",
    \"customer_email\": \"alice@example.com\",
    \"total_price\": 149.99,
    \"status\": \"pending\",
    \"shipping_address\": \"10 rue de Paris, 75000 Paris\",
    \"products\": [
        \"architecto\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/orders-store"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "customer_name": "Alice Martin",
    "customer_email": "alice@example.com",
    "total_price": 149.99,
    "status": "pending",
    "shipping_address": "10 rue de Paris, 75000 Paris",
    "products": [
        "architecto"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTorders-store">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Redirection vers la page suivante (clientOrders ou thank-you) avec message de succ&egrave;s.</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6ImtRUC9TRVdXMVVpa0kwUUZoQkNUN2c9PSIsInZhbHVlIjoiYlZROG1YOU1IeWhYZlBwaW8xclBIYjdoZHdDQUpRVEsvOS8xU25XZGRpdndDTkpqL0pVZGYrYWxyNWh0WENhUkIzZjlyOEpNWDBIam1tNE1Yb2U0aFhQUzNEUHVpY3kvUUphVExRWXFWR0w5SDNEYitpRmZWOXAwRVpCZ2hxcTQiLCJtYWMiOiJhMGVkMmFiZTFlODk2MmIyYmVkNjE5MDE4MjNhNWZhYWRiYzc4OTkxMzM2NDc0NGFmYzI5MTA3ZTA0OTdhZWJhIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTorders-store" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTorders-store"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTorders-store"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTorders-store" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTorders-store">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTorders-store" data-method="POST"
      data-path="orders-store"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTorders-store', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTorders-store"
                    onclick="tryItOut('POSTorders-store');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTorders-store"
                    onclick="cancelTryOut('POSTorders-store');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTorders-store"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>orders-store</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTorders-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTorders-store"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>customer_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="customer_name"                data-endpoint="POSTorders-store"
               value="Alice Martin"
               data-component="body">
    <br>
<p>Nom du client. Example: <code>Alice Martin</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>customer_email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="customer_email"                data-endpoint="POSTorders-store"
               value="alice@example.com"
               data-component="body">
    <br>
<p>Email du client. Example: <code>alice@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>total_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="total_price"                data-endpoint="POSTorders-store"
               value="149.99"
               data-component="body">
    <br>
<p>Total de la commande. Example: <code>149.99</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>status</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="status"                data-endpoint="POSTorders-store"
               value="pending"
               data-component="body">
    <br>
<p>Statut initial. Example: <code>pending</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>shipping_address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address"                data-endpoint="POSTorders-store"
               value="10 rue de Paris, 75000 Paris"
               data-component="body">
    <br>
<p>Adresse de livraison. Example: <code>10 rue de Paris, 75000 Paris</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
        <details>
            <summary style="padding-bottom: 10px;">
                <b style="line-height: 2;"><code>products</code></b>&nbsp;&nbsp;
<small>string[]</small>&nbsp;
 &nbsp;
<br>
<p>Tableau des produits.</p>
            </summary>
                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="products.0.id"                data-endpoint="POSTorders-store"
               value="3"
               data-component="body">
    <br>
<p>ID du produit. Example: <code>3</code></p>
                    </div>
                                                                <div style="margin-left: 14px; clear: unset;">
                        <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="products.0.quantity"                data-endpoint="POSTorders-store"
               value="2"
               data-component="body">
    <br>
<p>Quantité. Example: <code>2</code></p>
                    </div>
                                    </details>
        </div>
        </form>

                    <h2 id="orders-GETclient-orders">Factures de l’utilisateur (client)

Liste des commandes de l’utilisateur connecté (par client_id).</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETclient-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/client-orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/client-orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETclient-orders">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;component&quot;: &quot;client/user-billing&quot;,
    &quot;props&quot;: {
        &quot;orders&quot;: [
            {
                &quot;id&quot;: 4
            }
        ],
        &quot;auth&quot;: {
            &quot;user&quot;: {
                &quot;id&quot;: 1
            }
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETclient-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETclient-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETclient-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETclient-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETclient-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETclient-orders" data-method="GET"
      data-path="client-orders"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETclient-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETclient-orders"
                    onclick="tryItOut('GETclient-orders');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETclient-orders"
                    onclick="cancelTryOut('GETclient-orders');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETclient-orders"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>client-orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETclient-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETclient-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="orders-GETadmin-dashboard">Tableau de bord des ventes (admin)

Statistiques (totaux, pending, paid, etc.) + ventes mensuelles 2025.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETadmin-dashboard">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/dashboard" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/dashboard"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-dashboard">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{&quot;component&quot;:&quot;admin/dashboard&quot;,&quot;props&quot;:{&quot;stats&quot;:{&quot;totalOrders&quot;:12,&quot;paidOrders&quot;:5},&quot;sales2025&quot;:[0,1200,0,...]}}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-dashboard" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-dashboard"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-dashboard"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-dashboard" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-dashboard">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-dashboard" data-method="GET"
      data-path="admin/dashboard"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-dashboard', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-dashboard"
                    onclick="tryItOut('GETadmin-dashboard');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-dashboard"
                    onclick="cancelTryOut('GETadmin-dashboard');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-dashboard"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/dashboard</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-dashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-dashboard"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="orders-GETadmin-order-list">Lister toutes les commandes (admin)

Retourne la page Inertia avec la liste des commandes (clients + produits).</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETadmin-order-list">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/order-list" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/order-list"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-order-list">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;component&quot;: &quot;admin/order-list&quot;,
    &quot;props&quot;: {
        &quot;orders&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;status&quot;: &quot;pending&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-order-list" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-order-list"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-order-list"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-order-list" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-order-list">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-order-list" data-method="GET"
      data-path="admin/order-list"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-order-list', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-order-list"
                    onclick="tryItOut('GETadmin-order-list');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-order-list"
                    onclick="cancelTryOut('GETadmin-order-list');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-order-list"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/order-list</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-order-list"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-order-list"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="orders-GETadmin-orders--id-">Détails d’une commande (admin)

Affiche le résumé d’une commande avec client + produits + montant calculé.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETadmin-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/orders/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/orders/3"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-orders--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;component&quot;: &quot;admin/order-summary&quot;,
    &quot;props&quot;: {
        &quot;order&quot;: {
            &quot;id&quot;: 12
        },
        &quot;amount&quot;: 199.9
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-orders--id-" data-method="GET"
      data-path="admin/orders/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-orders--id-"
                    onclick="tryItOut('GETadmin-orders--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-orders--id-"
                    onclick="cancelTryOut('GETadmin-orders--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-orders--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETadmin-orders--id-"
               value="3"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>3</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order"                data-endpoint="GETadmin-orders--id-"
               value="12"
               data-component="url">
    <br>
<p>ID de la commande. Example: <code>12</code></p>
            </div>
                    </form>

                    <h2 id="orders-DELETEadmin-orders--orders_id-">Supprimer une commande (admin)

Supprime la commande et redirige avec un message de succès.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEadmin-orders--orders_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/admin/orders/3" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/orders/3"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-orders--orders_id-">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Redirection avec message &quot;Order deleted successfully.&quot;</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6ImZCb21HalJWTnVLdzh3eWhGcENVTnc9PSIsInZhbHVlIjoiVG8vZkR2V01YbjU5SXVYays2dk5tNVZoeUpzRUlVQlk4SnVxbndwU0dyNWxMdTRtY2J2ZWlPcE1OeURGZ0lXNG1ranM4QXJiemdPNWZYVFpHYWxHMVMxbVZxNmJRSkJMb2Nub1JUS1Q1eGJyRGhzYXRTTVV4SG05blVsY2o3MXkiLCJtYWMiOiIyNDhkZTBiNjQwMDYzYjg2ZWM4N2M5MGE3ZTQ5MTM1OGVjMzhkNmRlYmQ3MTk0OWIzZDQzNTcxNTM1N2VhYmQ4IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEadmin-orders--orders_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-orders--orders_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-orders--orders_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-orders--orders_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-orders--orders_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-orders--orders_id-" data-method="DELETE"
      data-path="admin/orders/{orders_id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-orders--orders_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-orders--orders_id-"
                    onclick="tryItOut('DELETEadmin-orders--orders_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-orders--orders_id-"
                    onclick="cancelTryOut('DELETEadmin-orders--orders_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-orders--orders_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/orders/{orders_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-orders--orders_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-orders--orders_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>orders_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="orders_id"                data-endpoint="DELETEadmin-orders--orders_id-"
               value="3"
               data-component="url">
    <br>
<p>The ID of the orders. Example: <code>3</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>orders</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="orders"                data-endpoint="DELETEadmin-orders--orders_id-"
               value="5"
               data-component="url">
    <br>
<p>ID de la commande. Example: <code>5</code></p>
            </div>
                    </form>

                    <h2 id="orders-GETuser-billing">Factures de l’utilisateur (client)

Liste des commandes de l’utilisateur connecté (par client_id).</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETuser-billing">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/user-billing" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/user-billing"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETuser-billing">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;component&quot;: &quot;client/user-billing&quot;,
    &quot;props&quot;: {
        &quot;orders&quot;: [
            {
                &quot;id&quot;: 4
            }
        ],
        &quot;auth&quot;: {
            &quot;user&quot;: {
                &quot;id&quot;: 1
            }
        }
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETuser-billing" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETuser-billing"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-billing"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETuser-billing" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-billing">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETuser-billing" data-method="GET"
      data-path="user-billing"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETuser-billing', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETuser-billing"
                    onclick="tryItOut('GETuser-billing');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETuser-billing"
                    onclick="cancelTryOut('GETuser-billing');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETuser-billing"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>user-billing</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETuser-billing"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETuser-billing"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="orders-GETclient-view-order--id-">Voir une commande (client)

Affiche une commande précise appartenant au user connecté (sécurisée).</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETclient-view-order--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/client/view-order/9" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/client/view-order/9"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETclient-view-order--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;component&quot;: &quot;client/view-order&quot;,
    &quot;props&quot;: {
        &quot;order&quot;: {
            &quot;id&quot;: 9
        }
    }
}</code>
 </pre>
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Commande non trouv&eacute;e ou acc&egrave;s non autoris&eacute;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETclient-view-order--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETclient-view-order--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETclient-view-order--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETclient-view-order--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETclient-view-order--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETclient-view-order--id-" data-method="GET"
      data-path="client/view-order/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETclient-view-order--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETclient-view-order--id-"
                    onclick="tryItOut('GETclient-view-order--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETclient-view-order--id-"
                    onclick="cancelTryOut('GETclient-view-order--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETclient-view-order--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>client/view-order/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETclient-view-order--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETclient-view-order--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETclient-view-order--id-"
               value="9"
               data-component="url">
    <br>
<p>ID de la commande. Example: <code>9</code></p>
            </div>
                    </form>

                <h1 id="panier">Panier</h1>

    

                                <h2 id="panier-POSTcart-add">Ajouter un produit au panier</h2>

<p>
</p>



<span id="example-requests-POSTcart-add">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/cart/add" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id\": 12,
    \"name\": \"\\\"T-shirt Skinn\\\"\",
    \"price\": 29.99,
    \"image\": \"\\\"\\/images\\/tshirt.jpg\\\"\",
    \"qty\": 2
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/cart/add"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 12,
    "name": "\"T-shirt Skinn\"",
    "price": 29.99,
    "image": "\"\/images\/tshirt.jpg\"",
    "qty": 2
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTcart-add">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Produit ajout&eacute; au panier&quot;,
    &quot;redirect&quot;: &quot;back&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6IldSMWV3ODRVQ0M4TFlQdmNVemMyNXc9PSIsInZhbHVlIjoidzVFOFdtemxuTGFsK3NpSEZhUWVxU2lOS3psVTBGR2FJeEJqTklRbFo3c3EwVE92M1JhRHBEZVlkNDFYTXRjTUtReTlJaUsvZ3cwd0pQSndQcHNlUGNKTVRteGJ0TzZxYVdRcm00YkpYUzRERFFxS2dIQXVZZzZUZHNab25DQXkiLCJtYWMiOiJhNDQyYTUyMzc0ODY5NjYxNzZjMzJmYjkyNmNlMTFhYzE4OTg3YThiODlhZTk5NGQ2YTZhNDRjNDE3ZTM3NDk3IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTcart-add" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTcart-add"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTcart-add"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTcart-add" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcart-add">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTcart-add" data-method="POST"
      data-path="cart/add"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTcart-add', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTcart-add"
                    onclick="tryItOut('POSTcart-add');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTcart-add"
                    onclick="cancelTryOut('POSTcart-add');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTcart-add"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>cart/add</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTcart-add"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTcart-add"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTcart-add"
               value="12"
               data-component="body">
    <br>
<p>ID du produit. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTcart-add"
               value=""T-shirt Skinn""
               data-component="body">
    <br>
<p>Nom du produit. Example: <code>"T-shirt Skinn"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="price"                data-endpoint="POSTcart-add"
               value="29.99"
               data-component="body">
    <br>
<p>Prix du produit (euros). Example: <code>29.99</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image"                data-endpoint="POSTcart-add"
               value=""/images/tshirt.jpg""
               data-component="body">
    <br>
<p>URL image du produit. Example: <code>"/images/tshirt.jpg"</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>qty</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="qty"                data-endpoint="POSTcart-add"
               value="2"
               data-component="body">
    <br>
<p>Quantité. Example: <code>2</code></p>
        </div>
        </form>

                    <h2 id="panier-POSTcart-remove">Retirer un produit du panier</h2>

<p>
</p>



<span id="example-requests-POSTcart-remove">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/cart/remove" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id\": 12
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/cart/remove"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 12
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTcart-remove">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Produit retir&eacute; du panier&quot;,
    &quot;redirect&quot;: &quot;back&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6ImorOEpTYVp6UTFJQ2JFWmx2VWpZd0E9PSIsInZhbHVlIjoiT3BYcE80VnBjM1RnOUhheG9wOUV6QkxKaXBNaTgveHc3NHJHeGpJc2pyRGtDM0Z0UjVFMUI2VGZzNVlXVVlvWWlhbkJvWWJMd3ZoOTVSaDRJTWhpR3VZU0ZBLys2OEJuellVdXd5SFJNbUoxTHp1eVBxNlRhOVlxWUJHcllsL2wiLCJtYWMiOiIxYTQ0NWFiODk3MDgxYzA2OTIxMGViMjE2ZWIyMDE2Nzg3N2FmMWFkY2Q3MWE2MDY5MzE3YmZkZmU1NGU1MWMwIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTcart-remove" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTcart-remove"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTcart-remove"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTcart-remove" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcart-remove">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTcart-remove" data-method="POST"
      data-path="cart/remove"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTcart-remove', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTcart-remove"
                    onclick="tryItOut('POSTcart-remove');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTcart-remove"
                    onclick="cancelTryOut('POSTcart-remove');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTcart-remove"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>cart/remove</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTcart-remove"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTcart-remove"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTcart-remove"
               value="12"
               data-component="body">
    <br>
<p>ID du produit à retirer. Example: <code>12</code></p>
        </div>
        </form>

                    <h2 id="panier-POSTcart-clear">Vider le panier</h2>

<p>
</p>



<span id="example-requests-POSTcart-clear">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/cart/clear" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/cart/clear"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTcart-clear">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Panier vid&eacute;&quot;,
    &quot;redirect&quot;: &quot;back&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6IkRPMTRUSmRQdkZrY1AxMzFQMEZySEE9PSIsInZhbHVlIjoiNi85amtYWkZYdUR1TWowT3U1RmluYVhkNmpQa2E3NnVmekJIVEVlN2IzZlNGUkhrWGc0dUx3NjhJS0xHREVNcUpaeUtWUTRWOW5rNk0wVlBuNUpJaFQ0V1JLOGdta2JhTi9lc3BJdmsrQUhLcmlxVllGVEtYNTJFWGZBSmhDY3UiLCJtYWMiOiI3MGNjODcyNWQ4NmU3MmU3MGZkNjc1NDVkMThlZmUxM2U4YWVmZjhjYzY4MDEwNDQ0MTkwODc3NGYxOGU5ZjlkIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:16 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTcart-clear" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTcart-clear"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTcart-clear"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTcart-clear" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTcart-clear">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTcart-clear" data-method="POST"
      data-path="cart/clear"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTcart-clear', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTcart-clear"
                    onclick="tryItOut('POSTcart-clear');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTcart-clear"
                    onclick="cancelTryOut('POSTcart-clear');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTcart-clear"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>cart/clear</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTcart-clear"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTcart-clear"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="produits-admin">Produits (Admin)</h1>

    

                                <h2 id="produits-admin-GETadmin-products">Lister tous les produits (admin)


lalalla</h2>

<p>
</p>



<span id="example-requests-GETadmin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-products">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;props&quot;: {
        &quot;products&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Shampoo&quot;,
                &quot;category&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Hair&quot;
                }
            }
        ],
        &quot;categories&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Hair&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-products" data-method="GET"
      data-path="admin/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-products"
                    onclick="tryItOut('GETadmin-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-products"
                    onclick="cancelTryOut('GETadmin-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="produits-admin-POSTadmin-products">Créer un produit</h2>

<p>
</p>



<span id="example-requests-POSTadmin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/admin/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Shampoo\",
    \"description\": \"A natural shampoo\",
    \"sku\": \"TS-OVR-001\",
    \"sales_quantity\": 10,
    \"sales_remaining_products\": 50,
    \"sales_price\": 29.99,
    \"image_src\": \"\\/images\\/ts-ovr.jpg\",
    \"image_alt\": \"Shampoo natural\",
    \"category_id\": 2
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Shampoo",
    "description": "A natural shampoo",
    "sku": "TS-OVR-001",
    "sales_quantity": 10,
    "sales_remaining_products": 50,
    "sales_price": 29.99,
    "image_src": "\/images\/ts-ovr.jpg",
    "image_alt": "Shampoo natural",
    "category_id": 2
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-products">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Redirection vers la liste des produits&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6ImdkaGNtNFJFdnJtZmtGYjhFZTh6VkE9PSIsInZhbHVlIjoiZ24rVFFrTVpBUnhVVEtpWEQvYUtYamtXZnIxcHVOT0lZRmg2cGFGbmFrZjRHOGZYMWhYeUNpdlJXekJDNmo2QWhtUGR6YXd2Mk5PQ1VRV2E0MThHTmYzbWRGNG5GdHNOMU5TRlROMVFSSFE3N1BUYVRGQnFQMW1sUDZKTWo5ODMiLCJtYWMiOiIzNjhlMDhiZTkxZGQzZTkyYzY0YTM0N2NhY2JiMTVjMTU0MjJmMDYzZDNmMGEwNWIyYjkyZDNjZDgyNzU2MmQyIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTadmin-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-products" data-method="POST"
      data-path="admin/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-products"
                    onclick="tryItOut('POSTadmin-products');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-products"
                    onclick="cancelTryOut('POSTadmin-products');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-products"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTadmin-products"
               value="Shampoo"
               data-component="body">
    <br>
<p>Nom du produit. Example: <code>Shampoo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="POSTadmin-products"
               value="A natural shampoo"
               data-component="body">
    <br>
<p>Description du produit. Example: <code>A natural shampoo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sku"                data-endpoint="POSTadmin-products"
               value="TS-OVR-001"
               data-component="body">
    <br>
<p>Référence interne. Example: <code>TS-OVR-001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sales_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sales_quantity"                data-endpoint="POSTadmin-products"
               value="10"
               data-component="body">
    <br>
<p>Quantité vendue. Example: <code>10</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sales_remaining_products</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sales_remaining_products"                data-endpoint="POSTadmin-products"
               value="50"
               data-component="body">
    <br>
<p>Stock restant. Example: <code>50</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sales_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sales_price"                data-endpoint="POSTadmin-products"
               value="29.99"
               data-component="body">
    <br>
<p>Prix de vente (EUR). Example: <code>29.99</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_src</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image_src"                data-endpoint="POSTadmin-products"
               value="/images/ts-ovr.jpg"
               data-component="body">
    <br>
<p>URL ou chemin d'image. Example: <code>/images/ts-ovr.jpg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_alt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image_alt"                data-endpoint="POSTadmin-products"
               value="Shampoo natural"
               data-component="body">
    <br>
<p>Texte alternatif. Example: <code>Shampoo natural</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="POSTadmin-products"
               value="2"
               data-component="body">
    <br>
<p>ID de catégorie existante. Example: <code>2</code></p>
        </div>
        </form>

                    <h2 id="produits-admin-PUTadmin-products--allProduct_id-">Mettre à jour un produit</h2>

<p>
</p>



<span id="example-requests-PUTadmin-products--allProduct_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://localhost/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Shampoo\",
    \"description\": \"A natural shampoo\",
    \"sku\": \"TS-OVR-001\",
    \"sales_quantity\": 12,
    \"sales_remaining_products\": 38,
    \"sales_price\": 31.99,
    \"image_src\": \"\\/images\\/ts-ovr.jpg\",
    \"image_alt\": \"Shampoo natural\",
    \"product_gallery\": \"\\/g\\/ts-ovr\",
    \"category_id\": 2
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Shampoo",
    "description": "A natural shampoo",
    "sku": "TS-OVR-001",
    "sales_quantity": 12,
    "sales_remaining_products": 38,
    "sales_price": 31.99,
    "image_src": "\/images\/ts-ovr.jpg",
    "image_alt": "Shampoo natural",
    "product_gallery": "\/g\/ts-ovr",
    "category_id": 2
};

fetch(url, {
    method: "PUT",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTadmin-products--allProduct_id-">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Redirection vers la page d&eacute;tail&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6InBtOEJFSFNtRHhUYWpELzVNL1VabWc9PSIsInZhbHVlIjoiRGNrdkZxUzh2Tm4zMVhvZTdvMHQvWWNobGI0aXcycUVtcTRsWjNGanV3VGtBRDUwZEkzbDBXNElXdjBKNURJRzExaEFITlJUUG5mVzlOdnJaUktsOVFmeE45WnFPakU1c0RlT1h6UVYySDY1aUdsS0pRRUdiWkdKTVkxSTA0dHYiLCJtYWMiOiIwOTQzOTMyYmMxMjcyMDlmNzViOGQyZmU3NGIxZDRjN2Y3M2E5NDUyZmZhZGZkZjlmZmQ3ZTYyY2JhMGI3YWIxIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-PUTadmin-products--allProduct_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTadmin-products--allProduct_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTadmin-products--allProduct_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTadmin-products--allProduct_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTadmin-products--allProduct_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTadmin-products--allProduct_id-" data-method="PUT"
      data-path="admin/products/{allProduct_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTadmin-products--allProduct_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTadmin-products--allProduct_id-"
                    onclick="tryItOut('PUTadmin-products--allProduct_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTadmin-products--allProduct_id-"
                    onclick="cancelTryOut('PUTadmin-products--allProduct_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTadmin-products--allProduct_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>admin/products/{allProduct_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>allProduct_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="allProduct_id"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the allProduct. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="1"
               data-component="url">
    <br>
<p>ID du produit. Example: <code>1</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="Shampoo"
               data-component="body">
    <br>
<p>Nom du produit. Example: <code>Shampoo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>description</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="description"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="A natural shampoo"
               data-component="body">
    <br>
<p>Description du produit. Example: <code>A natural shampoo</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sku</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sku"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="TS-OVR-001"
               data-component="body">
    <br>
<p>Référence interne. Example: <code>TS-OVR-001</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sales_quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sales_quantity"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="12"
               data-component="body">
    <br>
<p>Quantité vendue. Example: <code>12</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sales_remaining_products</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sales_remaining_products"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="38"
               data-component="body">
    <br>
<p>Stock restant. Example: <code>38</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>sales_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="sales_price"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="31.99"
               data-component="body">
    <br>
<p>Prix de vente (EUR). Example: <code>31.99</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_src</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image_src"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="/images/ts-ovr.jpg"
               data-component="body">
    <br>
<p>URL/chemin image. Example: <code>/images/ts-ovr.jpg</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>image_alt</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="image_alt"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="Shampoo natural"
               data-component="body">
    <br>
<p>Alt image. Example: <code>Shampoo natural</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_gallery</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="product_gallery"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="/g/ts-ovr"
               data-component="body">
    <br>
<p>Galerie images (format libre). Example: <code>/g/ts-ovr</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="PUTadmin-products--allProduct_id-"
               value="2"
               data-component="body">
    <br>
<p>ID de catégorie. Example: <code>2</code></p>
        </div>
        </form>

                    <h2 id="produits-admin-GETadmin-products--allProduct_id-">Voir le détail d’un produit</h2>

<p>
</p>



<span id="example-requests-GETadmin-products--allProduct_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-products--allProduct_id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;props&quot;: {
        &quot;product&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Shampoo&quot;,
            &quot;category&quot;: {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;hair&quot;
            }
        },
        &quot;categories&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Hair&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-products--allProduct_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-products--allProduct_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-products--allProduct_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-products--allProduct_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-products--allProduct_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-products--allProduct_id-" data-method="GET"
      data-path="admin/products/{allProduct_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-products--allProduct_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-products--allProduct_id-"
                    onclick="tryItOut('GETadmin-products--allProduct_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-products--allProduct_id-"
                    onclick="cancelTryOut('GETadmin-products--allProduct_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-products--allProduct_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/products/{allProduct_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-products--allProduct_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-products--allProduct_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>allProduct_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="allProduct_id"                data-endpoint="GETadmin-products--allProduct_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the allProduct. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product"                data-endpoint="GETadmin-products--allProduct_id-"
               value="1"
               data-component="url">
    <br>
<p>ID du produit. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="produits-admin-DELETEadmin-products--allProduct_id-">Supprimer un produit</h2>

<p>
</p>



<span id="example-requests-DELETEadmin-products--allProduct_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-products--allProduct_id-">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Redirection vers la page pr&eacute;c&eacute;dente&quot;
}</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6IjZSZzUvWHB5dXpsWEI1SVYyempvVnc9PSIsInZhbHVlIjoiTklOK3l2NTV2anIxZUtCSHFQaXNFRDVyOEtaZEFWbDJBTDlESEczbG5SY2phbFIzaUQwdlh2TlpTMzY4RTFWOHFoRFNQRCtmLzBHZjQ2SjI5ZnhObTAyYTdMeUhzMHVmSW9XZDBZcnZTaGkyNmttUFJCZ25MWGt5REhVWU1CbWYiLCJtYWMiOiI4NDBjYWQzNGEwMWQ0NmI4OTEzYWQxNzgwNzY1MDhhYTMyZjQ3ODNiODJmNmY1OGIwZmFiNjA3YTE0MjJhMzUzIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEadmin-products--allProduct_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-products--allProduct_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-products--allProduct_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-products--allProduct_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-products--allProduct_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-products--allProduct_id-" data-method="DELETE"
      data-path="admin/products/{allProduct_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-products--allProduct_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-products--allProduct_id-"
                    onclick="tryItOut('DELETEadmin-products--allProduct_id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-products--allProduct_id-"
                    onclick="cancelTryOut('DELETEadmin-products--allProduct_id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-products--allProduct_id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/products/{allProduct_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-products--allProduct_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-products--allProduct_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>allProduct_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="allProduct_id"                data-endpoint="DELETEadmin-products--allProduct_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the allProduct. Example: <code>1</code></p>
            </div>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product"                data-endpoint="DELETEadmin-products--allProduct_id-"
               value="1"
               data-component="url">
    <br>
<p>ID du produit. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="produits-client">Produits (Client)</h1>

    

                                <h2 id="produits-client-GETproducts">Lister les produits côté client</h2>

<p>
</p>



<span id="example-requests-GETproducts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/products?category=mode" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/products"
);

const params = {
    "category": "mode",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETproducts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;props&quot;: {
        &quot;products&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Shampoo&quot;
            }
        ],
        &quot;categories&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Hair&quot;
            }
        ],
        &quot;category&quot;: &quot;hair&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETproducts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETproducts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETproducts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETproducts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETproducts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETproducts" data-method="GET"
      data-path="products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETproducts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETproducts"
                    onclick="tryItOut('GETproducts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETproducts"
                    onclick="cancelTryOut('GETproducts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETproducts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETproducts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETproducts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="category"                data-endpoint="GETproducts"
               value="mode"
               data-component="query">
    <br>
<p>Filtrer par slug ou nom de catégorie. Example: <code>mode</code></p>
            </div>
                </form>

                <h1 id="users">Users</h1>

    

                                <h2 id="users-GETadmin-client">Lister les clients

Retourne la liste des utilisateurs avec le rôle &quot;client&quot;.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-GETadmin-client">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/admin/client" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/client"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETadmin-client">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;component&quot;: &quot;admin/client&quot;,
    &quot;props&quot;: {
        &quot;clients&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Alice&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETadmin-client" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETadmin-client"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-client"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETadmin-client" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-client">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETadmin-client" data-method="GET"
      data-path="admin/client"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETadmin-client', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETadmin-client"
                    onclick="tryItOut('GETadmin-client');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETadmin-client"
                    onclick="cancelTryOut('GETadmin-client');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETadmin-client"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>admin/client</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETadmin-client"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETadmin-client"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="users-POSTadmin-client-create">Créer un nouvel utilisateur

Crée un nouvel utilisateur avec nom, email et mot de passe.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-POSTadmin-client-create">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/admin/client-create" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"Alice Martin\",
    \"email\": \"alice@example.com\",
    \"password\": \"secret123\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/client-create"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "Alice Martin",
    "email": "alice@example.com",
    "password": "secret123"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTadmin-client-create">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Redirection vers la liste des clients avec message de succ&egrave;s.</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6Ilh3c3BFYlBTQ0grZ2xiQTZiLzJJSVE9PSIsInZhbHVlIjoiallHYVp1NWxMVjdOZU5BR2RoRWNnWlcxSzFpSWUwbWFoRkxjb0Vra0RXRHIwLzZiNUJmT3hBV1FCRWh3TnltZmZ2MDFmMzdKVVBxZlJxejZNeUlQS3ZYUEI3WDc1S0ZDaUdsTTJ1Vml6VEtJY0doWnZRNnhrUVhvOWR4QTd4UG4iLCJtYWMiOiI5ZjJiNDAxZTg0OTcxNjMwOWJmZmI4OWYwYmQ4M2RlNGViYmM4MmQ5MmY1ZGVkMDg5OGY4YmRmNzFjZjM2NjdjIiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-POSTadmin-client-create" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTadmin-client-create"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-client-create"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTadmin-client-create" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-client-create">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTadmin-client-create" data-method="POST"
      data-path="admin/client-create"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTadmin-client-create', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTadmin-client-create"
                    onclick="tryItOut('POSTadmin-client-create');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTadmin-client-create"
                    onclick="cancelTryOut('POSTadmin-client-create');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTadmin-client-create"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>admin/client-create</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTadmin-client-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTadmin-client-create"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTadmin-client-create"
               value="Alice Martin"
               data-component="body">
    <br>
<p>Nom complet de l’utilisateur. Example: <code>Alice Martin</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTadmin-client-create"
               value="alice@example.com"
               data-component="body">
    <br>
<p>Email unique. Example: <code>alice@example.com</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTadmin-client-create"
               value="secret123"
               data-component="body">
    <br>
<p>Mot de passe. Example: <code>secret123</code></p>
        </div>
        </form>

                    <h2 id="users-DELETEadmin-client-delete--id-">Supprimer un utilisateur

Supprime un utilisateur par son ID.</h2>

<p>
<small class="badge badge-darkred">requires authentication</small>
</p>



<span id="example-requests-DELETEadmin-client-delete--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://localhost/admin/client-delete/7" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/admin/client-delete/7"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEadmin-client-delete--id-">
            <blockquote>
            <p>Example response (302):</p>
        </blockquote>
                <pre>

<code class="language-json" style="max-height: 300px;">Redirection avec message &quot;Utilisateur supprim&eacute; avec succ&egrave;s.&quot;</code>
 </pre>
            <blockquote>
            <p>Example response (419):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
set-cookie: laravel_session=eyJpdiI6IlovRkdZQnNSZDlvV0RQNXZtMEljeVE9PSIsInZhbHVlIjoiZ1JkdytGZlN4elQxUHpveStCY3lZNjhwNnZOdmM1V0JiNnVGWm5LZGRJVFN4Tll6RTlxTGQ3N0JMZ1RTSkp2UTg1UGhEOWM4S1ZQMkxqNjNLdGI2SzBncEZ2MnJYWmNRekxnNWR1d3F3NnpHVmZJOEN5V0xIUVhzMXJ4UU1RS2ciLCJtYWMiOiI0YzkyMDc3ZTZjMjI2YzM1MzI3NjRkN2NjY2M3ZmIxMjk1MWQ5NzdjMWVjMzJkMzA0YjFhM2FkYmFhMzhlMzg5IiwidGFnIjoiIn0%3D; expires=Thu, 11 Sep 2025 10:37:21 GMT; Max-Age=7200; path=/; httponly; samesite=lax
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;CSRF token mismatch.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-DELETEadmin-client-delete--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEadmin-client-delete--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEadmin-client-delete--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEadmin-client-delete--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEadmin-client-delete--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEadmin-client-delete--id-" data-method="DELETE"
      data-path="admin/client-delete/{id}"
      data-authed="1"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEadmin-client-delete--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEadmin-client-delete--id-"
                    onclick="tryItOut('DELETEadmin-client-delete--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEadmin-client-delete--id-"
                    onclick="cancelTryOut('DELETEadmin-client-delete--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEadmin-client-delete--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>admin/client-delete/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEadmin-client-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEadmin-client-delete--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEadmin-client-delete--id-"
               value="7"
               data-component="url">
    <br>
<p>ID de l’utilisateur à supprimer. Example: <code>7</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
