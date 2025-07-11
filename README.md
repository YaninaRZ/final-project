# final-project
## Prérequis

Avant de commencer, assurez-vous d’avoir installé les outils suivants :

- **PHP** >= 8.2
- **Composer** >= 2.5
- **Node.js** 20.19+ ou 22.12+  
- **NPM** >= 10 ou **Yarn** (optionnel)

---

## Installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/YaninaRZ/final-project.git
    ```
3. **Créer et Modifier le fichier .env depuis .env.example**
➔ Renseigner la clé de connexion à la base de données
4. **Installer les dépendances PHP**
 ```bash
composer install
 ```
5. **Générer une clé d'encryption**
 ```bash
php artisan key:generate
 ```
5. **Installer les dépendances Node.js**
 ```bash
npm install
 ```
5. **Lancer les migrations de la base de données**
 ```bash
php artisan migrate
 ```
7. **Démarrer l’application en mode développement**
 ```bash
 composer run dev
 ```
