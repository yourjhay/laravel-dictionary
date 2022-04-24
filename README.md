# WORD DEFINITION

**Built with Laravel, VueJS and Tailwind CSS**

**Author / Developer:** [Rey Jhon A. Baquirin](https://github.com/yourjhay)

**Dictionary API:**
[meetDeveloper/freeDictionaryAPI](https://github.com/meetDeveloper/freeDictionaryAPI)

## Installation

-   clone the project using

**HTTP** - `git clone https://github.com/yourjhay/laravel-dictionary.git`

OR

**SSH** - `git clone git@github.com:yourjhay/laravel-dictionary.git`

-   Navigate to project directory
-   run `composer install `

# Setup Environment Variable **(.env)**

Run `cp .env.example .env` to copy env variable

make sure that you update your env according to your local environment.

## Generate Application Key

`php artisan key:generate`

## Setup your Database

-   Create database name **word_definition_db**

Then you can now migrate and seed

`php artisan migrate`

# LARAVEL MIX SETUP

To install javaScript dependencies

`npm install`

After installation of javascript dependencies, Build the project

`npm run dev`

Note: Repeat the above command if encounter any error.

## TO SERVE THE APPLICATION

`php artisan serve`

# Task Scheduler

The application must clear the previous searches history every hour.

To run the scheduler locally run:

`php artisan schedule:work`

Or you may setup a cron jobs for this and use `schedule:run` instead.
