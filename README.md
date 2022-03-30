# Refuturiza App

Refuturiza's app of technical challenge to job opening.

## Requeriments

PHP ^8.1 (with curl, openssl, fileinfo enabled)
Postgress

## How to run

#### Run the docker compose to create container

```
    $ docker compose up
```

#### Run in the app directory to running app

```
    $ composer install
    $ php artisan key:generate
    $ php artisan serve
```