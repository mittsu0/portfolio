#!/usr/bin/env bash
chmod -R 777 storage/* bootstrap/cache
php artisan config:cache
php artisan view:cache
php artisan route:cache
php artisan migrate --force
php artisan storage:link
composer install --optimize-autoloader --no-dev
npm install
npm run prod