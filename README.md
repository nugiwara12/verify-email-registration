## Laravel Livewire Chat Course Demo App

![./cover.jpeg](/cover.jpeg)

## Quick Start

-   Clone or download this repo and place it into your server.
-   `composer install `
-   `cp .env.example .env `
-   Create database and modify .env with your DB name and Pusher credentials.
-   `php artisan migrate --seed`
-   `php artisan key:generate`
-   `npm install && npm run dev`
-   `php artisan serve`

then choose a user from the database and login.

1. create env file and insert the env.text
2. after you create .env file you need to create an app password of the google account
3. after you create the account in google insert your gmail into the MAIL_USERNAME
4. and after the email is insert, the password generated you will inserted to for the MAIL_PASSWORD

add Pusher acoount

1. create pusher account on your active gmail
2. you need to replace the element if to .env like this:
   PUSHER_APP_ID=1707900
   PUSHER_APP_KEY=2956ba44713a26ebd2a5
   PUSHER_APP_SECRET=95e8038349e1a06fdf68
   PUSHER_HOST=
   PUSHER_PORT=443
   PUSHER_SCHEME=https
   PUSHER_APP_CLUSTER=ap1

for the modules or package that i used

1. install laravel breeze
2. install nodejs
3. npm isntall
4. npm run dev
