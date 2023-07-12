## Propconnect


### Installation Instructions - Local Machine

To install, open command prompt and type:

```bash
$ cd C://xampp/htdocs/
$ git clone https://github.com/JETshelf/propconnect.git
$ cd propconnect
$ composer update
$ copy .env.example .env
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
$ php artisan storage:link
$ php artisan serve
```
