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

composer require khetamhamdy/currency-exchange

## Add the Service Provider

After installation, add the service provider in the config/app.php file under the providers array:
'providers' => [
    // Other providers...
    KhetamHamdy\CurrencyExchange\Providers\CurrencyExchangeServiceProvider::class,
],

## Publish Configuration (Optional)
To customize the package settings, you can publish the configuration file with the following command:

php artisan vendor:publish --provider="KhetamHamdy\CurrencyExchange\Providers\CurrencyExchangeServiceProvider" --tag="config"

This will create the configuration file at config/currency-exchange.php.

### Usage
# 1. Currency Management
Display All Currencies:
نسخ الكود
use KhetamHamdy\CurrencyExchange\Services\CurrencyService;

$currencies = $currencyService->getAllCurrencies();

## Add a New Currency:
نسخ الكود
$currencyService->addCurrency([
    'name' => 'US Dollar',
    'code' => 'USD'
]);
## Update a Currency:
نسخ الكو
$currencyService->updateCurrency($id, [
    'name' => 'Euro',
    'code' => 'EUR'
]);
## Delete a Currency:
نسخ الكود
$currencyService->deleteCurrency($id);



### 2. Transaction Management

## Display All Transactions:
نسخ الكود
use KhetamHamdy\CurrencyExchange\Services\ExchangeTransactionService;
$transactions = $exchangeService->listTransactions();
## Add a New Transaction:
نسخ الكود
$exchangeService->createTransaction([
    'from' => 1, // Original currency ID
    'to' => 2,   // Target currency ID
    'rate' => 1.2,
    'date' => now()
]);
## Update a Transaction:
نسخ الكود
$exchangeService->updateTransaction($id, [
    'from' => 1,
    'to' => 2,
    'rate' => 1.3,
    'date' => now()
]);

