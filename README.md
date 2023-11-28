# Laravel Test Task CRUD

## CRUD

## Installation

1. Clone this repository:
```
git clone git@github.com:d-alejandro/laravel-code-examples.git
```
2. Go to 'terra-force' directory:
```
cd terra-force
```
3. Create a new .env file:
```
cp .env.example .env
```
4. Run following commands:

- `docker-compose build --no-cache`
- `docker-compose up -d`
- `docker-compose exec php-fpm composer install`
- `docker-compose exec php-fpm php artisan key:generate`
- `docker-compose exec php-fpm php artisan migrate`
- `docker-compose exec php-fpm php artisan db:seed`

## Testing

To run the unit tests:
```
docker-compose exec php-fpm php artisan test --testsuite=Unit
```
