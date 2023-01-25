# System Delivery Service

## Description

webapp for delivery service system management with all the shipment,courier,client features and tracking parcels fro frontend user .

## Prerequisite
- PHP 7
- Laravel 5.6.8
- Mysql for database
- frontend template engine blade

## Installation

### Step 1.
- Begin by cloning this repository to your machine
```
git clone repo url 
```

- Install dependencies
```
composer install
```

- Create enviromental file and variables
```
cp .env.example .env
```

- Generate app key
```
php artisan key:generate
```

### Step 2
- Next, create a new database and reference its name and username/password in the projects .env file. Below the database name is "database_name"
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=root
DB_PASSWORD=your_password
```

- Run migration
```
php artisan migrate or php artisan migrate:fresh
```

### Step 3
- before start you need to run this command in order to access the admin panel
```
php artisan db:seed

```

### Step 4
- To start the server, run the command below
```shell
$ php artisan serve
```

## Testin tools
- phpunit

## How to access the admin panel
- admin panel (saloodo@admin.com, password:-123456).


## Applications Routes
```
http://127.0.0.1:8000
```

## Author
- ibrahim khalaf
