@echo off
echo -----[ Migrate: FRESH ]-----
php artisan migrate:fresh

echo -----[ Migrate: Seed  ]-----
php artisan db:seed
PAUSE