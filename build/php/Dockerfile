FROM php:8.1-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Install only essential PHP extensions (minimal)
RUN docker-php-ext-install mysqli pdo pdo_mysql

WORKDIR /var/www/html
