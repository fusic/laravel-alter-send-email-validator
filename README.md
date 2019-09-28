# laravel-alter-send-email-validator

## Setup

```
composer require fusic/laravel-alter-send-email-validator
```

## Default validation rules

```php
[
    'regex:/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/ui'
]
```

## Custom validation rules

### put configuration file

```
php artisan vendor:publish
```

or make make configuration file to your laravel app

```
config/alter-email-validation.php
```

### modify validation rules

config/alter-email-validation.php

```php
'rules' => [
    'max:64',
    '***' // any patterns
],
```
