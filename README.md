<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://www.mailerlite.com/assets/SEO/mailerlite.png" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About the project
The project is created with Laravel 8.65 with Vue 3 acting as the front end api manager using the composition API. The front UI I have used Materialize CSS. Testing is performed on sqlite(in memory). 

## Deploying to Local Enviroment

The deployment of this project is pretty standard. In order to deploy the Mailer Lite Api Manager you will need the following

- PHP 7.4
- Node 17 and above

## Laravel Installation
```Laravel installation
   composer install
```
## Vue Installation
I have included a compiled js file but you can rebuild it using the following command.
```
npm install && npm run prod
```
## Database Migration
Database migration is pretty standard
```
php artisan migrate:fresh --seed
```



