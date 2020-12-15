FROM php:7.4-fpm

LABEL author="Nikita Gudkov nikitaster2001@gmail.com"

COPY . /usr/src/app
WORKDIR /usr/src/app