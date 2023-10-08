FROM php:8.1-fpm

# Install dependencies
RUN apt-get update

RUN apt-get install -y libzip-dev zip unzip libpng-dev libjpeg-dev zlib1g-dev procps vim

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions & required packages
RUN docker-php-ext-install pdo pdo_mysql zip exif gd

RUN curl -sS https://getcomposer.org/installer

# Set new UID for user www-data
RUN usermod -u 1000 www-data

WORKDIR /var/www/
COPY . .

RUN rm -f composer.lock
RUN composer install

CMD ["sh", "artisan_commands.sh"]
