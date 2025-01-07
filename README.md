# Currency Exchange Package for Laravel

## Introduction

The **Currency Exchange** package is an open-source PHP library for Laravel that simplifies managing currency exchange operations and transactions. If your application involves working with currencies or financial transactions between currencies, this package provides an efficient solution.

This package is dedicated to my late father, and I hope it helps improve the software development experience.

## Features

- Manage **currencies**: Add, update, delete, and view currencies.
- Manage **exchange transactions**: Add, update, view exchange transactions.
- Flexible API for currency and transaction data in JSON format.
- Easy to use and works seamlessly with **Laravel 9.0+**.

## Installation

### 1. Install via Composer

Install the package in your Laravel application by running the following command in your project directory:

```bash
composer require khetamhamdy/currency-exchange
```

### 2. Add the Service Provider (if needed)

If you're not using Laravel's package auto-discovery feature, add the service provider manually in the `config/app.php` file under the `providers` array:

```php
'providers' => [
    // Other providers...
    KhetamHamdy\CurrencyExchange\Providers\CurrencyExchangeServiceProvider::class,
],
```

### 3. Run Migrations

To create the necessary database tables, execute the following command:

```bash
php artisan migrate
```

This will run the migrations provided by the package to set up the required database schema.

## Usage

### 1. Currency Management

#### Display All Currencies:

```php
use KhetamHamdy\CurrencyExchange\Services\CurrencyService;

$currencyService = app('currency.service');
$currencies = $currencyService->getAllCurrencies();
```

#### Add a New Currency:

```php
$currencyService->addCurrency([
    'name' => 'US Dollar',
    'code' => 'USD',
]);
```

#### Update a Currency:

```php
$currencyService->updateCurrency($id, [
    'name' => 'Euro',
    'code' => 'EUR',
]);
```

#### Delete a Currency:

```php
$currencyService->deleteCurrency($id);
```

### 2. Transaction Management

#### Display All Transactions:

```php
use KhetamHamdy\CurrencyExchange\Services\ExchangeTransactionService;

$exchangeService = app('exchange.service');
$transactions = $exchangeService->listTransactions();
```

#### Add a New Transaction:

```php
$exchangeService->createTransaction([
    'from' => 1, // Original currency ID
    'to' => 2,   // Target currency ID
    'rate' => 1.2,
    'date' => now(),
]);
```

#### Update a Transaction:

```php
$exchangeService->updateTransaction($id, [
    'from' => 1,
    'to' => 2,
    'rate' => 1.3,
    'date' => now(),
]);
```

## Notes

- Ensure your application meets the package requirements, including Laravel version 9.0 or higher.
- Remember to run `php artisan migrate` after installing the package to set up the database tables.

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).
