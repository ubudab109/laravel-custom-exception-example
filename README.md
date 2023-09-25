## Requirements
- PHP: ^8.1
- Framework: ^10.10
- Composer

## Installation
- Run `composer install`
- Run `php artisan serve` default port will be `8000`

## Exception Directory
- The exception directory will be here `App\Exceptions`. There's 2 exception custom such as Validation Exception and Custom Error Exception

## Testing
- Look at the TestController in `App\Http\Controllers`. The exception will be implemented on this file
- You can manually hit with POST method to this endpoint `/api/validation` to test validation error and `/api/error-exception` to test custom error exception
- Or You can run the test with `./vendor/bin/phpunit` to run unit test

  
