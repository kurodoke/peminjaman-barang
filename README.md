### instalasi

-   clone repo / download repo

-   install depedency

```bash
$ npm install
```

```bash
$ composer install
```

-   buat DB = laravel
-   copy .env.example terus rename .env,.... atau langsung rename bisa jg, terserah 
-   generate key .env

```bash
$ php artisan key:generate
```

-   ubah appname jadi pbkntol
-   migrate database

```bash
$ php artisan migrate:fresh --seed
```

-   serve

```bash
$ php artisan serve
```

-    ubah settingan console laravel jadi kek digambar (kalau kena error)
-    file path
    ```
\vendor\laravel\framework\src\Illuminate\Foundation\Console\ServeCommand.php
    ```
      ![Screenshot (10)](https://github.com/kurodoke/pbkntol/assets/85819319/787c538a-8f95-40ab-b55e-b93b5bae91b9)


#### Account default login

-    Administrator

```
Email       : admin@gmail.com
Password    : hadeh123
```

-    Mahasiswa

```
Email       : mahasiswa@gmail.com
Password    : hadeh123
```
