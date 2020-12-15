FROM php:7.4-fpm

LABEL author="Nikita Gudkov nikitaster2001@gmail.com"

COPY . /usr/src/app
WORKDIR /usr/src/app

# Install dependencies (postgresql driver for php pdo_pgsql)
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql