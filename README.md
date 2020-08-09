# twitter-clone-api

This project is a part of an example of Tweeter Clone Application.
This is a server side part of the application.

## Prerequisite

The client side of the application you can get by [twitter-clone-app](https://github.com/vskrip/twitter-clone-app/).
Before you start to install and run this API server, you should be ensure, that you have istalled and running the MySQL Database Server.

## Description

This application builded with the next technologies:

-   [Laravel PHP Framework](https://laravel.com)
-   [MySQL](https://mysql.com)
-   [RESTful Web Service](<https://en.wikipedia.org/wiki/Representational_state_transfer#:~:text=Representational%20state%20transfer%20(REST)%20is,computer%20systems%20on%20the%20internet.>)

## Installation

Download source code from the [github repository](https://github.com/vskrip/twitter-clone-api) (as an zip archive for example), unpack in a folder on your local computer.

Step into the unpackaged project folder by typing in a terminal/console window:

`cd twitter-clone-api`

... or open the folder in an operation system's file browser.

### Database Configuration

In the project folder open in a text editor file `env.example`

Fine the next place with rows:

```
DB_CONNECTION=mysql
DB_HOST=<your-mysql-database-ip-address>
DB_PORT=<your-mysql-database-port>
DB_DATABASE=<your-mysql-database-name>
DB_USERNAME=<your-mysql-database-username>
DB_PASSWORD=<your-mysql-database-password>
```

and replace `<your-mysq-database-...>` with the real values.

Save applied changes and rename the file from `env.example` to `.env`.

### Database Migration and Seeding

The project contains database migrations for population the database with tables and some test data. For that in a terminal window run the command:

`php artisan migrate:refresh --seed`

After that, you should be able to see tables with data on your local MySQL Server.

## Third Part Libraries Installation

The github repository does not contains third-part libraries. For they isntallation you need to use next command:

`composer update --prefer-dist`

## Running the Project

Start project with the next command:

`php artisan serve`

It will launch your project with embandent artisan script.

As a result you should see the next message:

`Laravel development server started: http://127.0.0.1:8000`

Your API Server is accessible by http://127.0.0.1:8000 address now.

## The API Server Endpoints

### Register User

User registration in the API server

Method `POST`

URL: `http://127.0.0.1:8000/api/auth/register`

### Login User

Login to the API server

Method `POST`

URL: `http://127.0.0.1:8000/api/auth/login`

In the body of the POST-request pass the next parameters:

-   email;
-   password;

### List of Twitts

Getting list of all tweets

Method: `GET`

URL: `http://127.0.0.1:8000/api/twitts`

### Show a Specific Twitt

Getting data of specific twitt by the twitt id

Method: `GET`

URL: `http://127.0.0.1:8000/api/twitts/{id}`

Change parameter `{id}` to the twitt numeric identifier

### Create New Twitt

Method: `POST`

URL: `http://127.0.0.1:8000/api/twitts/`

Parameters:

-   user_id - the user identifier;
-   body - the twitt message;

### Update Twitt

Method: `PUT`

URL: `http://127.0.0.1:8000/api/twitts/{id}`

Parameters:

-   {id} - the twitt numeric identifier;
-   user_id - the user numric identifier;
-   body - the twitt body message;
-   isFollow - the flag, specifies is the user following the twitt or not;

### Delete Twitt

Method: `DELETE`

URL: `http://127.0.0.1:8000/api/twitts/{id}`

Parameters:

-   {id} - the twitt numeric indentifier;
