CKEditor 4 Full For Laravel-admin
======

## Installation

```bash
composer require cljamal/la-ckeditor4
```

Then
```bash
php artisan vendor:publish --tag=cljamal-ckeditor
```

## Configuration

In the `extensions` section of the `config/admin.php` file, add some configuration that belongs to this extension.
```php

    'ckeditor' => [ 
        //Set to false if you want to disable this extension
        'enable' => true,
    
        // Editor configuration
        'config' => [    
            'language'=>'en', 
        ]
    ]

```

## Usage

```php
Form::extend('editor', CLJAMAL\CKEditor4\Editor::class);
```

