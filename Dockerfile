# Use PHP with Apache
FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Laravel cache (optional, if not in buildCommand)
RUN php artisan config:cache && php artisan route:cache

# Apache serves on port 80 by default
EXPOSE 80
