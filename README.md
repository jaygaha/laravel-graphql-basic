# How to Build a GraphQL API Using Laravel

Ref link: https://www.freecodecamp.org/news/build-a-graphql-api-using-laravel/

Simple graphQL demo using Laravel 9.

## Packages

- [graphql-laravel](https://github.com/rebing/graphql-laravel)
- [laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)

## Prerequisites

- PHP 7+
- Composer 2.0
- Docker 20.10.6 (Any other version should be fine)
- Docker-Compose 1.29.1 (Any other version should be fine)

## Setup
Make sure to have all the dependencies above installed locally and docker running in the background.

```bash
$ composer install
$ ./vendor/bin/sail up -d 
```

## How to test the queries

GraphQL library provides us with an IDE.

So make sure your Docker containers are running and head into [http://localhost/graphiql](http://localhost/graphiql).


### Disclaimer:

Rights holds to the respective owner. I do not hold any rights. I created this while learning GraphQL.
