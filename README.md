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

Download source code from the github repository (as an zip archive for example), unpack in a folder on your local computer.

Step into the unpackaged project folder by typing in a terminal/console window:

`cd twitter-clone-api`

... or open the folder in a operation system's file browser.

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
and replace `<your-mysq-database-...>` with real values.

Save applied changes and rename the file `env.example` to `.env`.



Start project with the next command:

`npm start`

It will launch your project with embandent React script.
