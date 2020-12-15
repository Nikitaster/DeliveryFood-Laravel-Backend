FROM php:7.4-fpm

LABEL author="Nikita Gudkov nikitaster2001@gmail.com"

COPY . /usr/src/app
WORKDIR /usr/src/app

# Install dependencies (postgresql driver for php pdo_pgsql)
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Install dependencies
RUN apt-get install -y \
    build-essential \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl


# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --working-dir=./app

RUN cp app/.env.example app/.env

RUN php app/artisan key:generate && php app/artisan config:cache

RUN mkdir -p app/storage/framework/{cache, sessions, views} && mkdir -p app/storage/framework/cache/data && mkdir -p app/bootstrap/cache storage storage/framework

RUN php app/artisan cache:clear && php app/artisan config:clear && php app/artisan view:clear