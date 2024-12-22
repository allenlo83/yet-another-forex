# Readme
## Stack

- Laravel 11
- Vue.JS 3
- SQLite

## Prerequisite

- PHP - Version 8.2
- Node.JS - Version 20
- Composer - Version 2

## Running Steps

In the project folder
- Command: composer install
- Command: npm install
- Command: php artisan migrate (answer yes to create sqlite database)
- Command: php artisan db:seed

Run the below commands in two separate command line windows:
- Command: npm run dev
- Command: php artisan serve

In the web browser:
- http://localhost:8000

## Note

- .env is commited to repo to allow fast deployment (remove from .gitignore and commited for this challenge only)
- SQLite is used instead of MySQL so that no separate DB installation is needed (for fast deployment)