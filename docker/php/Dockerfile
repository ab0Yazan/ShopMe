FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libjpeg-dev libfreetype6-dev \
    default-libmysqlclient-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql bcmath

RUN groupadd -g "1000" "shopme" || true && \
    useradd -m -u "1000" -g "1000" "shopme" && \
    mkdir -p "/home/shopme/public_html/" && \
    chown -R "1000:1000" "/home/shopme/"

WORKDIR /home/shopme/public_html/
USER shopme
