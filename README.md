# Marbles

Balls to Bins app developed in Laravel 7 with bootstrap 4

<p><img src="https://www.sabintermedia.ro/wp-content/uploads/2020/08/marbles-preview.png" alt="screenshot_marbles_app" border="0"></p>

## Problem

- Given n<sup>2</sup> balls of n colors, having a random distribution and n boxes, find a method of filling each box with n balls of maximum 2 different colors.

- For solving this problem, the following are required:

1. input for the number of balls (n)
2. output of number of balls of each color in each box
3. storing history of inputs
4. visualizing results from history

## Algorythm

- Set (N)umber
- Choose N unique colors
- Generate N Boxes
- Generate NxN balls so that every color is present
- For each ball in the stack, try to put it into a box
- check if there is room in box, if not, go to next box
- check if ball can be placed in the box depending on colors in the box <=2, if not, go to next box
- do this until all balls are distributed or infinite loop occurs

## Setup

1. Setup (install/create) PHP server, Database and create new database eg. "marbles".
2. Install [Composer](https://getcomposer.org/doc/00-intro.md)
3. Install [npm](https://docs.npmjs.com/getting-started/installing-node).
4. Install git. Get this project from Github (git clone).
5. Copy ".env.example" file and rename to ".env". Edit the .env file (connect to DB).
6. Run "composer update".
7. Run "npm install", then "npm run dev".
8. Run "php artisan key:generate". It will add application key to the .env file.
9. Run "php artisan migrate" [Laravel Migrations](https://laravel.com/docs/7.x/migrations).
10. Important! Generate random colors by seeding: "php artisan db:seed --class=DatabaseSeeder" [Laravel Seeding](https://laravel.com/docs/7.x/seeding).
11. Run "php artisan serve" to start app locally.

For any questions or suggestions
Sebastian Blajevici: sabintermedia@gmail.com
