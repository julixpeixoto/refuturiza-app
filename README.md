# Refuturiza App

Refuturiza's app of technical challenge to job opening.

## Requeriments

PHP ^8.1 (with curl, openssl, fileinfo, pdo_pgsql enabled)

Postgress

## How to run

 Run the docker compose to create container and start containers

```
$ docker compose up
```
Access PgAdmin with data below and create a database 'refuturiza-app'

```
http://localhost:16543
login: admin@localhost.com
password: 123456
```

Run in the application directory to up the app

```
$ composer install
$ php artisan key:generate
$ php artisan migrate
$ php artisan serve
```

## Access like a CEO :)

```
url: http://127.0.0.1:8000
email: ceo@refuturiza.com.br
password: refuturiza  
```
