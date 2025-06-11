FROM php:8.2-apache

# Enable mod_rewrite
RUN a2enmod rewrite

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel project
COPY . .

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html

# Configure Apache to use Laravel's public folder
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Ensure Apache can serve index.php
RUN echo "<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>" > /etc/apache2/conf-available/laravel.conf && \
    a2enconf laravel

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Cache Laravel config
RUN php artisan config:cache && php artisan route:cache

# Expose HTTP port
EXPOSE 80
