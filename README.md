# Animal Clinic Record System

Dockerized. Build with Laravel 8 (PHP 7.4)+ Yajra Datatables + Nginx + MySQL + PHPMyAdmin

- PHP 7.4 : https://hub.docker.com/layers/library/php/7.4.10-fpm-buster/images/sha256-a32526e60e332c5460deb9e3fa7227226615259a1d774e5e6e3b2041f4630b3f?context=explore
- Yajra Datatables : https://yajrabox.com/docs/laravel-datatables/10.0
- Nginx : https://hub.docker.com/_/nginx
- MySQL : https://hub.docker.com/_/mysql
- PHPMyAdmin : https://hub.docker.com/_/phpmyadmin

Run in dev environment : 
- Makesure you have Docker installed
- Build an Image using Dockerfile on Image/PHP
- Docker compose using docker-compose.yml
- Run composer install on docker service console
- Run cp .env.example .env
- Run php artisan key:generate
- Run chown -R www-data:www-data /var/www
- Run chmod -R 755 /var/www/storage
