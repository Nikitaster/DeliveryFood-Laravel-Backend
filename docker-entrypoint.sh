#!/bin/bash

echo "======Waiting for the database image======"
while ! curl http://database:5432/ 2>&1 | grep '52'
do
  echo "Waiting for the database image"
  sleep 0.1
done
echo "Database is ready"


cd app
composer install

cp .env.example .env
php artisan key:generate && php artisan config:cache

mkdir -p storage/framework/cache && mkdir -p storage/framework/sessions && mkdir -p storage/framework/views && mkdir -p storage/framework/cache/data && mkdir -p bootstrap/cache storage storage/framework

php artisan cache:clear && php artisan config:clear && php artisan view:clear


echo "======Make migrations======"
php artisan migrate

echo "======Start server======"
php artisan serve --host=0.0.0.0 --port=80