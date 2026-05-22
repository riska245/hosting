@echo off
rem Change directory to the project root (where this script resides)
cd /d "%~dp0"

rem Ensure the MySQL database exists (create if not)
mysql -u root -e "CREATE DATABASE IF NOT EXISTS pitik;"

rem Run Laravel migrations to create tables in the 'pitik' database
php artisan migrate --force

rem Keep the console window open to show any messages
pause
