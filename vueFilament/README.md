
# Blog

## Tailwind.css / Inertia / Vue.js / Laravel 
Build a blog from scratch using Laravel, filament & Vue.js

## Tech Stack

**Client:** 

Tailwind.css - Framework Vue.js 

**Server:** 

Laravel 

**Packages:** 

 Jetstream - Filament

## Functionality


--------------------------------

## StepByStep

### installation Jestream Inertia Vue.js

```
composer require laravel/jetstream
php artisan jetstream:install inertia
```

### installation Filament

```
composer require filament/filament:"^3.0"
php artisan filament:install --panels
```

```
php artisan migrate

   INFO  Preparing database.  

  Creating migration table ............................................................................................................... 11ms DONE

   INFO  Running migrations.

  2014_10_12_000000_create_users_table .................................................................................................... 9ms DONE
  2014_10_12_100000_create_password_reset_tokens_table .................................................................................... 4ms DONE
  2014_10_12_200000_add_two_factor_columns_to_users_table ................................................................................ 11ms DONE
  2019_08_19_000000_create_failed_jobs_table .............................................................................................. 7ms DONE
  2019_12_14_000001_create_personal_access_tokens_table .................................................................................. 13ms DONE
  2024_07_19_034547_create_sessions_table ................................................................................................. 9ms DONE
```
 ### Create a user (admin)

```
 php artisan make:filament-user
   
 Name:
 Email address:
 Password:

   INFO  Success! (email adress) may now log in at http://localhost:8000/admin/login.  
```
