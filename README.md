# marbles

balls to bins app in laravel 7 with bootstrap 4

## Algorythm

- Set (N)umber
- Choose N unique colors
- Generate N Boxes
- Generate NxN balls so that every color is present
- For each ball in the stack, try to put it into a box
- check if there is room in box, if not, go to next box
- check if ball can be placed in the box depending on colors in the box <=2, if not, go to next box
- do this until all balls are distributed or infinite loop occurs

<p><img src="https://www.sabintermedia.ro/wp-content/uploads/2020/08/marbles-preview.png" alt="sshot_shop" border="0"></p>

1. Setup (install/create) Database and PHP server.
2. Install [Composer](https://getcomposer.org/doc/00-intro.md)
3. Install [npm](https://docs.npmjs.com/getting-started/installing-node).
4. Install git. Get this project from Github (git clone).
5. Copy ".env.example" file and rename to ".env". Edit the .env file (connect to DB).
6. Run "composer update".
7. Run "npm install", then "npm run dev".
8. Run "php artisan key:generate". It will add application key to the .env file.
9. Run "php artisan migrate" [Laravel Migrations](https://laravel.com/docs/5.5/migrations).
10. Important! It's the correct way to seeding: "php artisan db:seed --class=DatabaseSeeder" [Laravel Seeding](https://laravel.com/docs/5.5/seeding).
11. Setup "Document root" for your project on server like ".../my_example_shop/public".

Sebastian Blajevici: sabintermedia@gmail.com
