FROM php:8.1-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
        libzip-dev \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        libonig-dev \
        libcurl4-openssl-dev \
        unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" mysqli pdo_mysql gd zip curl mbstring exif bcmath \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY docker/php.ini /usr/local/etc/php/conf.d/zz-academy.ini
COPY docker/apache-academy.conf /etc/apache2/conf-available/zz-academy.conf
RUN a2enconf zz-academy

WORKDIR /var/www/html
