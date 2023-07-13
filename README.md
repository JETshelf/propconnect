## Propconnect
### Project Description
The website will feature a user-friendly interface with advanced search filters and verification processes to ensure the legitimacy of agents. It will also provide a comprehensive database of apartments, allowing users to make informed decisions without physical visits. Additionally, the website will facilitate connections between users and property management entities. With a visually appealing design, responsive layout, and data analytics integration, the platform aims to provide a transparent, convenient, and secure environment for property rental transactions. Overall, the website seeks to empower individuals by offering a centralized and efficient platform for engaging with agents, apartments, and property management entities.



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
### License

The propconnect project is open-sourced software licensed under the [Apache license](http://www.apache.org/licenses/).