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

Rename the .env.example to .env and fill the data or add the vars to enviroment

```
API_SOURCE_USER=https://api.github.com/user
API_SOURCE_USERS=https://api.github.com/users
APP_KEY (generated with command in next step)
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=refuturiza-app
DB_USERNAME=postgres
DB_PASSWORD=123456
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
