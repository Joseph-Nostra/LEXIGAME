FROM php:8.3-cli

WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions - moved before COPY for better caching
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    opcache

# Copy composer binary
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy composer files first (better cache layer)
COPY composer.json composer.lock ./

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy application code
COPY . .

# Enable opcache configuration
RUN echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "opcache.memory_consumption=256" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "opcache.interned_strings_buffer=16" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "opcache.max_accelerated_files=20000" >> /usr/local/etc/php/conf.d/opcache.ini && \
    echo "opcache.validate_timestamps=0" >> /usr/local/etc/php/conf.d/opcache.ini

EXPOSE 8000

CMD php artisan serve --host=0.0.0.0 --port=8000
