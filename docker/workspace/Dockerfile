FROM node:18

# Install PHP, Composer, and necessary tools
RUN apt-get update && apt-get install -y \
    php8.2-cli php8.2-mbstring php8.2-xml php8.2-bcmath unzip curl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

USER www-data
