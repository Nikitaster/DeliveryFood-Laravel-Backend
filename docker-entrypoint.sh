#!/bin/bash

echo "======Waiting for the database image======"
while ! curl http://database:5432/ 2>&1 | grep '52'
do
  echo "Waiting for the database image"
  sleep 0.1
done
echo "Database is ready"

cd app
php artisan config:clear
php artisan key:generate
php artisan env
echo "======Make migrations======"
php artisan migrate

echo "======Start server======"
php artisan serve --host=0.0.0.0 --port=80