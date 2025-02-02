FROM node:18

# Install PHP, Composer, and necessary tools
RUN apt-get update && apt-get install -y \
    php8.2-cli php8.2-mbstring php8.2-xml php8.2-bcmath php8.2-pdo php8.2-mysql unzip curl libmariadb-dev-compat libmariadb-dev \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer



WORKDIR /home/shopme/public_html/
USER shopme
