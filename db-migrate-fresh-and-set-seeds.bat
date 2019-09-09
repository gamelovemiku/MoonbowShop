@echo off

echo -----[ Patching .env  ]-----
mv ./.env.example .env

echo -----[ Generating Key ]-----
php artisan key:generate

echo -----[ Migrate: Data  ]-----
php artisan migrate:fresh

echo -----[ Migrate: Seed  ]-----
php artisan db:seed

echo ###---[ INSTALLATION COMPLETED ]--###

echo > Starting Website at port 8000....
php artisan serve

PAUSE