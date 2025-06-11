FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip curl libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy app source code
COPY . .

# Set correct DocumentRoot to public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Configure directory permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Laravel setup commands
RUN composer install --no-dev --optimize-autoloader \
    && php artisan key:generate \
    && php artisan config:cache \
    && php artisan route:cache

# Expose port 80
EXPOSE 80

CMD ["apache2-foreground"]
