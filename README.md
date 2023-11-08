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

-   account default login

##### Administrator

```
Email       : admin@gmail.com
Password    : hadeh123
```

##### Mahasiswa

```
Email       : mahasiswa@gmail.com
Password    : hadeh123
```