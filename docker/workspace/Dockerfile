FROM node:18

# Install PHP, Composer, and necessary tools
RUN apt-get update && apt-get install -y \
    php8.2-cli php8.2-mbstring php8.2-xml php8.2-bcmath php8.2-pdo php8.2-mysql unzip curl libmariadb-dev-compat libmariadb-dev \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Create the necessary Laravel directories (storage and cache) to avoid chmod errors
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache

# Set permissions for the directories
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Grant access to the current user (for development) and www-data
RUN usermod -aG www-data $(whoami) \
    && chown -R $(whoami):www-data /var/www/html

USER www-data
