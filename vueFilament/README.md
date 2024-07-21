
# Blog

## Tailwind.css / Inertia / Vue.js / Laravel 
Build a blog from scratch using Laravel, filament & Vue.js

## Tech Stack

**Client:** 

Tailwind.css - Framework Vue.js 

> 
- https://flowbite.com/
  Start developing with an open-source library of over 600+ UI components, sections, and pages built with the utility classes from Tailwind CSS.

- https://preline.co/
Preline UI is an open-source set of prebuilt UI components based on the utility-first Tailwind CSS framework.


**Server:** 

Laravel 

**Packages:** 

 Jetstream - Filament

> Curator : A media manager / picker plugin for Filament Panels.
- https://filamentphp.com/plugins/awcodes-curator

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

> php artisan make:model Post -m
> php artisan make:filament-resource Post

If ERROR NEXT
```
Home.vue:19 [Vue warn]: Failed to resolve component: AppLayout
If this is a native custom element, make sure to exclude it from component resolution via compilerOptions.isCustomElement. 
```
> import AppLayout from '@/Layouts/AppLayout.vue';

> php artisan make:controller HomeController --invokable
> php artisan make:resource PostResource


If ERROR NEXT
```
chunk-LAPRAAXM.js?v=bc9533b6:1528 [Vue warn]: Property "posts" was accessed during render but is not defined on instance. 
  at <AppLayout> 
  at <Home jetstream= Object auth= Object errorBags= Array(0)  ... > 
  at <Inertia initialPage= Object initialComponent= Object resolveComponent=fn<r>  ... > 
  at <App>
```

> defineProps({posts:Array}); in Home.vue

TODO


composer require awcodes/filament-curator
php artisan curator:install

yes run migrate
