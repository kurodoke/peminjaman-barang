# Installation

-   Clone or download the repository.

-   Install dependencies:

    ```bash
    $ npm install
    ```

    ```bash
    $ composer install
    ```

-   Create a database named `laravel`.

-   Copy `.env.example` and rename it to `.env`, or directly rename it, whichever you prefer.

-   Generate the `.env` key:

    ```bash
    $ php artisan key:generate
    ```

-   Change the `APP_NAME` in `.env` to `Pb`.

-   Run the database migrations:

    ```bash
    $ php artisan migrate:fresh --seed
    ```

-   Serve the application:

    ```bash
    $ php artisan serve
    ```

-   Default login credentials:

    ### Administrator

    ```
    Email : admin@gmail.com
    Password : hadeh123
    ```

    ### Student

    ```
    Email : mahasiswa@gmail.com
    Password : hadeh123
    ```
