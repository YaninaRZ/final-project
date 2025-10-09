FROM php:8.3-fpm-alpine

# dépendances système
RUN apk add --no-cache bash git unzip icu-dev libzip-dev oniguruma-dev libpng-dev libjpeg-turbo-dev freetype-dev

# extensions PHP
RUN docker-php-ext-configure intl \
    && docker-php-ext-install -j$(nproc) intl pdo_mysql bcmath pcntl exif \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /var/www/html

# Installe uniquement les deps sans exécuter les scripts (pas d'artisan)
COPY composer.json composer.lock ./
RUN composer install \
    --no-dev --no-interaction --no-ansi --no-progress --prefer-dist \
    --no-scripts --optimize-autoloader

# Copie le reste du code ensuite (meilleur cache)
COPY . .

# Optionnel: droits
RUN chown -R www-data:www-data storage bootstrap/cache

# Entrypoint: on lancera artisan une fois le conteneur démarré
CMD ["php-fpm"]
