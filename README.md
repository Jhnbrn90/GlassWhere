# Glass, Where?
A tool to help the half yearly glassware inventarisation of the [Synthetic & BioOrganic Chemistry](https://syborch.com) research group at the [Vrije Universiteit Amsterdam](https://vu.nl).

## Overview
The application is built with [Laravel](https://laravel.com/) and [TailwindCSS](https://tailwindcss.com) providing a responsive (mobile friendly) interface aiding in counting all different types of glassware. 

![Homepage](https://raw.githubusercontent.com/jhnbrn90/glasswhere/master/images/Home.png)

The application is very simply set-up. Labs and types of glassware can be specified in the database seeder file (explained in the installation instructions below).

![Overview](https://raw.githubusercontent.com/jhnbrn90/glasswhere/master/images/Overview.png)

Users are asked for their name (which is remembered throughout a session) and can start counting erlenmeyers, round bottom flasks, etc. by increasing or decreasing a number. Whenever someone has initiated the counting of a specific volume of a certain type of glassware (for example, 50 mL erlenmeyers) in a specific lab, he/she will be the only one who can count this type of glassware to prevent that two people are counting the same things at the same time.

![Counting](https://raw.githubusercontent.com/jhnbrn90/glasswhere/master/images/Counting.png)

After finishing the counting, all results can be exported to Excel and the application can be reset to start all over.
Only administrators can reset the application, which can be defined in the application settings, as explained below.

## Installation
Make sure you have PHP >5.4, Composer and NPM installed.

### Clone the repo.

```
git clone git@github.com:Jhnbrn90/glasswhere.git
```

Install the composer dependencies.

```
composer install
```

Copy the example environment file.

```
cp .env.example .env
```

Set the application key.

```
php artisan key:generate
```

Set your database credentials in .env

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_glasswhere_db
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

Migrate the database.

```
php artisan migrate
```

First, define which type of glassware is used in your lab in the `database/seeds/DatabaseSeeder.php` seeder.
Run the database seeder to insert the available glasswhere into the database. 

```
php artisan db:seed
```

Install all npm dependencies and compile the CSS and JS assets.

```
npm install

npm run dev
```

### Configure administrators
You can configure multiple administrators (separated by a "; ")  by reserving specific names in the `.env` environment file.
For example:

```
APP_ADMINS="Daniel; Jane"
```




