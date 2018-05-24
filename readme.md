# Laravel TDD with External Database example

An example laravel project using TDD with an external database.

The article on this can be found [here](https://medium.com/@alanholmes19/tdd-with-an-external-database-using-laravel-f35e306e6727).

## Installation

**Clone this repo**

```bash
git clone git@github.com:AlanHolmes/tdd-with-external-db-example.git
```

**Boot up the docker container** 

_(skip this step if you aren't using docker)_

```bash
docker-compose up -d
```
**Env file**

* Copy `.env.example` to `.env`
* Change the `DB_*` and `DB_EXTERNAL_*` settings as required

**Composer**

Run `composer install` or if don't have the correct version of php (`^7.1.3`), run it inside the docker container.

```bash
docker-compose exec php composer install
```

**Final Step**

Run `php artisan key:generate` to set `APP_KEY`

Or again, inside the docker container.

```bash
docker-compose exec php artisan key:generate
```
## Running Unit Tests

Now that you are all setup, you can run the unit tests within the docker container.

```bash
docker-compose exec php php ./vendor/bin/phpunit
```

## License

This example is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
