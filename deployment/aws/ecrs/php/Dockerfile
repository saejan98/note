FROM php:8.1-fpm

# Install dependencies
RUN apt-get update

RUN apt-get install -y libzip-dev zip unzip libpng-dev libjpeg-dev zlib1g-dev procps

# Install nodejs
ENV NODE_VERSION=16.13.0
RUN apt install -y curl
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.0/install.sh | bash
ENV NVM_DIR=/root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"
RUN node --version
RUN npm --version

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions & required packages
RUN docker-php-ext-install pdo pdo_mysql zip exif gd

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

# Set new UID for user www-data
RUN usermod -u 1000 www-data

RUN echo "access.log = /dev/null" >> /usr/local/etc/php-fpm.d/www.conf

WORKDIR /var/www/
COPY . .

RUN rm -f composer.lock
RUN rm -rf ./storage/logs/laravel*
RUN chmod -R 777 storage

RUN composer update
RUN composer install

RUN npm install -g yarn
RUN yarn install
RUN yarn prod

EXPOSE 9000
CMD ["php-fpm"]
