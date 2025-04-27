mogitate

環境構築
・Dockerのビルド

・git clone git@github.com:Takahashi-3141/Test.git
cd Test

docker-compose up -d

Laravel環境構築

docker-compose exec php bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
使用技術(実行環境)
Laravel Framework 8.83.8
PHP 8.3.15
git version 2.43.0
URL
開発環境：http://localhost:3000/
phpMyAdmin:http://localhost:8080/
