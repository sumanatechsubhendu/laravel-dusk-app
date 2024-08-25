# Task Details

## End-to-End Testing with Laravel Dusk

End-to-end (E2E) testing with Laravel Dusk allows you to automate browser tests to ensure that your application behaves as expected. Below is a guide on how to set up Laravel Dusk for your Laravel application and write E2E tests for typical CRUD operations on a product.

### Step 1: Set Up Your Laravel Application

#### 1. Create a New Laravel Application:

If you haven't already, create a new Laravel application:

```bash
composer create-project --prefer-dist laravel/laravel laravel-dusk-app
```

Navigate to the new Laravel project directory:

```bash
cd laravel-dusk-app
```
Install Laravel Dusk via Composer:

```bash
composer require --dev laravel/dusk
```

After installing Dusk, run the install command:

```bash
php artisan dusk:install
```
