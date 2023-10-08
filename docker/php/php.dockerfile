FROM php:8.1-fpm

RUN apt-get update

RUN apt-get install -y libzip-dev zip unzip libpng-dev libjpeg-dev zlib1g-dev procps vim

# Install composer
RUN curl -sS https://getcomposer.org/installer

# Install php ext
RUN docker-php-ext-install pdo pdo_mysql zip exif gd

WORKDIR /var/www/html
