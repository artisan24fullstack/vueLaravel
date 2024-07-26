
# Blog

## Tailwind.css / Inertia / Vue.js / Laravel 
Build a blog from scratch using Laravel, filament & Vue.js

## Tech Stack

**Client:** 

Tailwind.css - Framework Vue.js 

> Framework for tailwind.css

- https://daisyui.com/docs/install/
daisyUI adds component class names to Tailwind CSS so you can make beautiful websites faster than ever.

```
npm i -D daisyui@latest

  plugins: [
    require('daisyui'),
  ],

  plugins: [require("@tailwindcss/typography"), require("daisyui")],

<article class="prose"></article>

```

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


### Installation Media Curator 

> Curator / A media manager / picker plugin for Filament Panels.

- https://filamentphp.com/plugins/awcodes-curator 

#### step 1 Implementation via composer

```
composer require awcodes/filament-curator
php artisan curator:install

yes run migrate

Running migrations...

   INFO  Running migrations.

  2024_07_24_083307_create_media_table .................................................................................................... 9ms DONE
  2024_07_24_083308_add_tenant_aware_column_to_media_table ................................................................................ 8ms DONE

curator has been installed!

```

#### step 2 configuration via NPM / create a theme / ...

- https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme

```
npm install -D cropperjs

php artisan make:filament-theme

Using Node.js v8.18.0

   INFO  Successfully created resources/css/filament/admin/theme.css and resources/css/filament/admin/tailwind.config.js!

   WARN  Action is required to complete the theme setup:

  ⇂ First, add a new item to the `input` array of `vite.config.js`: `resources/css/filament/admin/theme.css`
  ⇂ Next, register the theme in the admin panel provider using `->viteTheme('resources/css/filament/admin/theme.css')`
  ⇂ Finally, run `npm run build` to compile the theme

```

#### step 3 FOLDER ressources/css/filament/admin/ 

- with create 2 files (theme.css and tailwind.config.js)

- add code next in (theme.cs) 

```

@import '../../../../vendor/cropperjs/dist/cropper.css';
@import '../../../../vendor/awcodes/filament-curator/resources/css/plugin.css';   

```
- add code tailwind.config.js (racine) VS not in admin tailwind.config.js

```
content: [
    './vendor/awcodes/filament-curator/resources/**/*.blade.php',
]


php artisan vendor:publish --tag="curator-config"

   INFO  Publishing [curator-config] assets.

  Copying file [C:\vueFilament\vendor\awcodes\filament-curator\config\curator.php] to [C:\vueFilament\config\curator.php]  DONE     

```

> AdminPanelProvider (Providers/Filament)

#### step 4 add plugins in AdminPanelProvider
```
->plugins([
            \Awcodes\Curator\CuratorPlugin::make()
                ->label('Media')
                ->pluralLabel('Media')
                ->navigationIcon('heroicon-o-photo')
                ->navigationGroup('Content')
                ->navigationSort(3)
                ->navigationCountBadge()
                    //->registerNavigation(false)
                    //->defaultListView('grid' || 'list')
                    //->resource(\App\Filament\Resources\CustomMediaResource::class)
        ]);
```
> BUG IMG 6.35 TO 8 45

If ERROR NEXT
```
Class "App\Models\Media" not found

use Awcodes\Curator\Models\Media;

change in PostCard.vue  <img class="rounded-t-lg" :src="thumbnail" alt="random" />

```

>
```

```
> BEFORE (17.00) and return (9.00)

> post_images

```
php artisan make:model PostImage -m

$table->foreignId('post_id')->constrained()->onDelete('cascade');
$table->foreignId('media_id')->constrained('media')->onDelete('cascade');

php artisan migrate
```

> change 19.23 
```
In Post.php

    //public function postImages(): BelongsTo
    //{
    //    return $this->belongsTo(PostImage::class, 'post_id', 'id');
    //}

    public function getImage()
    {
        return Media::where('id', $this->thumbnail)->first();
    }

In PostResource

            'thumbnail' => $this->getImage()->path,

In PostResource (FORM)

    CuratorPicker::make('thumbnail')->required()    
    ->relationship('postImages', 'id'),


```
> TODO (24.30 correct)

```
php artisan make:controller PostShowController --invokable
```

##### correction bug image

```
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            // 'thumbnail' => $this->thumbnail

            'thumbnail' => '/' . $this->thumbnail
        ];
    }
}
```


> TODO AFTER (35.44 NO READ)

```
php artisan make:model Category -m
```
