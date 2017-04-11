# PositionColector 2
Remade of [PositionColector](https://github.com/deeplibras/PositionColector)
with [Draggable](https://www.npmjs.com/package/draggable), [Vuejs](https://vuejs.org) and [Laravel](https://laravel.com/)

# Requirements
 - [Composer](https://getcomposer.org/)
 - [NPM](https://www.npmjs.com/) or [Yarn](https://yarnpkg.com/)

# Instalation
After clone, will be necessary to install vendors (Laravel and Vue) and set the `app_key`:
````bash
composer install
npm install
# yarn install # For yarn users
php artisan key:generate
# Maybe it's necessary to relink the storage folder: 
php artisan storage:link
````



Set the number of images and folders on file `app/config/app.php`:
````php
'nFrames' => x,  // change the 'x' to the number you need, default is 30
'nFolders' => x, // change the 'x' to the number you need, default is 10
````

Put the image files (.jpg) inside it's folder inside `app/storage/public` following the pattern:
- images
  - collection1
    - frame1.jpg
    - frame[...].jpg
    - frame30.jpg
  - collection[...]
  - collection[10]

Type `php artisan serve` to start the application and go to `localhost:8000` to use.

No database is needed.