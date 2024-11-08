# MoldyCampus

MoldyCampus is a university and professor rating webapp inspired by Rotten Tomatoes. This project is being developed as part of the "Web Technologies" course, with hopes to turn it into a startup.

## Table of Contents

- [Introduction](#introduction)
- [Technologies](#technologies)
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Introduction

MoldyCampus aims to provide students with a platform to rate and review universities and professors. Our goal is to help students make informed decisions about their education by providing transparent and reliable reviews.

## Technologies

- **Framework**: Laravel
- **Database**: PostgreSQL
- **Starter Kit**: Laravel Jetstream

## Installation

To get a local copy up and running, follow these steps:

0. **Edit ```shC:\PHP\php.ini``` file, and remove ; from these lines:**
    ```sh
    ;extension=zip
    ;extension=pdo_pgsql
    ```

1. **Clone the repository:**
    ```sh
    git clone https://github.com/Intellivisionn/MoldyCampus
    cd moldycampus
    ```

2. **Install dependencies:**
    ```sh
    composer install
    ```

3. **Set up environment variables:**
    Copy the `.env.example` file to `.env` and update the necessary environment variables, especially the database configuration.
    For current database configuration, ask @svenons

4. **Generate application key:**
    ```sh
    php artisan key:generate
    ```

5. **Run database migrations:**
    ```sh
    php artisan migrate
    ```

    OR

6. **Edit .env file**

7. **Run asset migrations:**
    ```sh
    npm run build
    ```

8. **Serve the application:**
    ```sh
    php artisan serve
    ```

## Usage

Once the application is up and running, you can access it at `http://localhost:8000`.

## License

This project is licensed under the No Use License. See the [LICENSE](LICENSE) file for details.
