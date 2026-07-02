FROM php:8.3-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    unzip git curl libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_HOME=/tmp/composer

# Copier d'abord les fichiers composer pour profiter du cache Docker
COPY composer.json composer.lock ./

# Installer les dépendances avec prefer-source pour éviter les erreurs HTTP GitHub
RUN composer install \
    --prefer-source \
    --no-scripts \
    --no-interaction \
    --no-progress \
    --optimize-autoloader

# Copier le reste du code
COPY . .

# Lancer les scripts post-install (key, etc.)
RUN composer run-script post-autoload-dump 2>/dev/null || true

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
