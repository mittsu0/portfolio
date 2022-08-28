#!/usr/bin/env bash
composer install --optimize-autoloader --no-dev
chmod -R 777 storage/* bootstrap/cache
php artisan optimize:clear
php artisan optimize
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan migrate --force
php artisan storage:link
npm ci
npm run prod