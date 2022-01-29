# Laravel

## Pre-Requirements

| Module      | Version |
| ----------- | ------- |
| PHP         | 7.3     |
| BCMath      | LTS     |
| Ctype       | LTS     |
| JSON        | LTS     |
| Mbstring    | LTS     |
| OpenSSL     | LTS     |
| PDO         | LTS     |
| Tokenizer   | LTS     |
| XML         | LTS     |
| MySQL       | >= 5.8  |


## Branching Structure

``` bash
develop => dev environment


## Installation & Configuration
- clone repository in your system

- Now, Run all these below commands inside the repository

``` bash

# To run below command, Copy the environment file

> cp .env.example .env

# Open .env file by any editor nano, gedit, vim

> nano .env

# Before you update the .env file please create a database and link here

- Update project name, If you want

    set APP_NAME='simform-test'

- Update DB 

    set DB_HOST
    set DB_DATABASE
    set DB_USERNAME
    set DB_PASSWORD

# For further setup, Execute these below commands in order

> composer install

> composer update

> php artisan key:generate

> php artisan migrate

> php artisan db:seed

> npm install

> npm run dev

> php artisan serve

```

- Ready to open on 

- WEB 

> http://localhost:8000 

> > Need to set APP_URL=http://localhost:8000 in your .env 



```






