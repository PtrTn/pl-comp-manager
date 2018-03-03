# Requirements
- A webserver
- A database
- Php 7.1 or higher
- Npm
- Composer

# Setting up
1. Clone this repository
2. Install php dependencies by running `composer install`
3. Install frontend dependencies by running `npm install`
4. Compile fontend assets by running `npm run dev`
5. Setup a development environment configuration by running `cp .env.exmple .env`
6. Generate an application key with `php artisan key:generate`
7. Setup the database connection info in the .env file
8. Setup database tables and fill with test data `php artisan migrate:fresh --seed`
9. Setup the `/public` folder as the webserver root
10. Visit the configured website url `/lifters` or `/wedstrijd`
11. ???
12. Profit

# Todo
- Ondersteuning voor meerdere flights
- Nullable lifts
- Beurten corrigeren