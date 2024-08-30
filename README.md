# ![Mark The Market ]

# Getting started

## Installation

Clone the repository in xampp folder (make sure that php and composer installed on system) 

    https://github.com/Yash-devloper/markthemarket_laravel.git

Switch to the repo folder

    cd markthemarket_laravel

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env or paste the env file in project folder

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeder (**Set the database connection in .env before migrating**)

    php artisan db:seed

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
You can open admin panel at http://localhost:8000/admin/login

**TL;DR command list**

    git clone git@github.com:gothinkster/laravel-realworld-example-app.git
    cd laravel-realworld-example-app
    composer install
    cp .env.example .env
    php artisan key:generate
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan db:seed
    php artisan serve

----------

# Code overview

## Environment variables

- `.env` - Environment variables can be set in this file

DB_DATABASE=your-database-name
DB_USERNAME=your-database-username
DB_PASSWORD=your-database-password

MAIL_MAILER=mail-mailer
MAIL_HOST=mail-host
MAIL_PORT=mail-port
MAIL_USERNAME=mail-username (mostly your email)
MAIL_PASSWORD=mail-password
MAIL_ENCRYPTION=mail-encryption
MAIL_FROM_ADDRESS=mail-from-address
MAIL_FROM_NAME="${APP_NAME}"


***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

 
# Authentication
 
 Admin Credentials

 Email => admin@gmail.com
 Password => Admin@123

----------