<?php

// config for LaravelCMS/LaravelCMS
return [

    'app' => [

        /*
        |--------------------------------------------------------------------------
        | Name of your app
        |--------------------------------------------------------------------------
        |
        | These configuration options determine the name of your app.
        |
        */

        'name' => 'My App',

        /*
        |--------------------------------------------------------------------------
        | Global pagination
        |--------------------------------------------------------------------------
        |
        | These configuration options determine the default pagination
        | that will be used for the LaravelCMS table lists.
        |
        */

        'pagination' => 30,

    ],

    'credentials' => [

        /*
        |--------------------------------------------------------------------------
        | Default admin credentials
        |--------------------------------------------------------------------------
        |
        | These configuration options determine the email and password
        | of the default admin users.
        | After installing the package you can login with the following credentials:
        | - email: email@example.com
        | - password: password
        | And change the email and password in the admin part.
        |
        */

        'email' => env('CMS_ADMIN_EMAIL', 'email@example.com'),

        'password' => env('CMS_ADMIN_PASSWORD', 'password'),
    ],

    'database' => [

        /*
        |--------------------------------------------------------------------------
        | Database table prefix
        |--------------------------------------------------------------------------
        |
        | These configuration options determine the database table
        |  prefix that will be used for the LaravelCMS tables.
        |
        */

        'prefix' => 'cms_',

        /*
        |--------------------------------------------------------------------------
        | Database table langs
        |--------------------------------------------------------------------------
        |
        | These configuration options determine the database table
        | langs that will be used for the LaravelCMS page content.
        | You can change the table name if you want to use a custom one.
        | Make sure you have at least the following columns:
        | - id (string) uuid
        | - locale (string) language code
        |
        */

        'langs' => config('cms.database.prefix') . 'langs',
    ],

    'route' => [

        /*
        |--------------------------------------------------------------------------
        | Route prefix
        |--------------------------------------------------------------------------
        |
        | These configuration options determine the route prefix
        | that will be used for the LaravelCMS routes admin part.
        |
        */

        'prefix' => 'admin',

        /*
        |--------------------------------------------------------------------------
        | Route login path
        |--------------------------------------------------------------------------
        |
        | These configuration options determine the route path for
        | the login page. This is the path where you can login to access
        | the admin part of the LaravelCMS.
        |
        */

        'login' => 'login',
    ],

];
