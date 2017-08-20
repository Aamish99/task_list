# Task List
task list is a simpel web application for managing tasks built with Laravel (php framework)

###### A [Laravel](http://laravel.com/) 5.4 with minimal [Bootstrap](http://getbootstrap.com) 3.5.x project.
| Laravel-Tasks Features  |
| :------------ |
|Built on [Laravel](http://laravel.com/) 5.2|
|Uses [MySQL](https://github.com/mysql) Database|
|Uses [Artisan](http://laravel.com/docs/5.2/artisan) to manage database migration, schema creations, and create/publish page controller templates|
|Dependencies are managed with [COMPOSER](https://getcomposer.org/)|
|CRUD (Create, Read, Update, Delete) Tasks Management|

### Quick Project Setup
###### (Not including the dev environment)
1. Create a MySQL database for the project
    * ```create database tasks_list;```
2. Configure your `.env`
3. Run `sudo composer update` from the projects root folder
4. From the projects root folder run `php artisan key:generate`
5. From the projects root folder run `php artisan migrate`
6. From the projects root folder run `composer dump-autoload`

#### View the Project in Browser
1. From the projects root folder run `php artisan serve`
2. Open your web browser and go to `http://localhost`


### Laravel-Tasks URL's (routes)
* ```/```
* ```/tasks```
* ```/task/edit/{id}```
* ```/tasks/update```
* ```/task/delete/{id}```

