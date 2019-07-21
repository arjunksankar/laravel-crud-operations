# Laravel Crud Operations

Ice cream store with basic laravel crud operations. 

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

php 7.3

### Installing

git clone https://github.com/arjunksankar/laravel-crud-operations.git
composer install
php artisan migrate

## Running the tests

vendor/bin/phpunit

## Assumptions

Cup is 3 unit price less than cone
Cup should increase 2 unit price each quarter
The size large costs 2.5 unit price more than regular
Multiple ice creams can be added using same brand and type and are assumed to be having the same price as that of before[for example multiple flavours like chocolate,vanilla,etc will be having same prices.].
Ice cream names are assumed to be as unique