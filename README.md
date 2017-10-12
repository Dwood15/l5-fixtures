# l5-fixtures

This version of l5-fixtures removes the YAML compatibility module- it is listed as incompatible with symfony router 3.3.*

Fixtures package for Laravel 5 with support for JSON, CSV, and PHP files.

If you are seeding your database with fake data that can be easily generated, consider using the [Model Factories](http://laravel.com/docs/5.5/seeding#using-model-factories).

If you need to load data that can't be generated then this is your best choice.

## Installation

In order to install Laravel 5 Fixtures, just add 

```json
Dwood: "dev-master"
```

to your composer.json. Then run `composer install` or `composer update`.

Then in your `config/app.php` add 

```php
'dwood\L5Fixtures\FixturesServiceProvider'
```

in the `providers` array and

```php
'Fixtures' => 'dwood\L5Fixtures\FixturesFacade'
```

to the `aliases` array.

## Configuration

To publish the configuration for this package execute `php artisan vendor:publish` and a `fixtures.php` 
file will be created in your `app/config` directory.

## Usage

By default the fixtures directory is `/fixtures`, inside it you should place the data files that will fill
the database. The name of the file should be exactly the same as the name of the database table (e.g.: 'table_one.json'). Take a look at the two examples
in the [`/tests_data`](https://github.com/dwood/l5-fixtures/tree/master/tests/_data) directory.

To apply all fixtures to the database run

```php
Fixtures::up();
```

If you only want to apply some fixtures, you can pass an array with the name of the fixtures you want to apply

```php
Fixtures::up('table_one', 'table_two');
```

And to destroy the records in the database run

```php
Fixtures::down();
```

The `down` method can also receive an array with the name of fixtures that will be destroyed. Currently all records
in the database tables are destroyed.

If you haven't published the configuration file or you want to load fixtures from another location, you only need to execute the following code before applying the fixtures:

```php
Fixtures::setUp('/path/to/fixtures');
```

## Data Format

The fixtures files are parsed in order to create an array of records that are themselves associative arrays. The resulting array is then inserted in the database using the [insert](http://laravel.com/docs/5.1/queries#inserts) method of the query builder.

Relations are not handled by the library, but you can make reference to other records by their IDs, even if they haven't been inserted yet because the library disables the foreign key checks before inserting the fixtures into the database.

#### JSON

```json
[
  {
    "name": "Owen Sound",
    "region": "ON",
    "country": "Sierra Leone"
  }
]
```

#### CSV

The delimiter is detected automatically.

```csv
name;region;country
Owen Sound;ON;Sierra Leone
```

#### PHP

```php
<?php

return [
    [
        'name' => 'Owen Sound',
        'region' => 'ON',
        'country' => 'Sierra Leone'
    ]
];
```
