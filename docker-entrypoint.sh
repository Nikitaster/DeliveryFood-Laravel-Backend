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

# for s3
composer require aws/aws-sdk-php ^3.20.0
composer require league/flysystem-aws-s3-v3 ^1.0

cp .env.example .env

mkdir -p storage/framework/cache && mkdir -p storage/framework/sessions && mkdir -p storage/framework/views && mkdir -p storage/framework/cache/data && mkdir -p bootstrap/cache storage storage/framework

php artisan cache:clear && php artisan config:clear && php artisan view:clear

php artisan key:generate && php artisan config:cache


echo "======Make migrations======"
php artisan migrate

echo "======Compile static======"
npm install 
npm run dev 
npm run prod 

echo "======Start server======"
php artisan serve --host=0.0.0.0 --port=80