# Package for mobile money integration in laravel app


This package makes it easy to integrate mobile payments (mtn mobile money, orange money).

## Getting Started

### Prerequisites

What things you need to install the software and how to install them

```
php: ^7.1.3
laravel/framework: 5.*
mtownsend/xml-to-array: ^1.0
```

### Installing

```
composer require arolitec/mobilemoney

composer require mtownsend/xml-to-array
```

publish the Service provider

```
php artisan vendor:publish --tag=Arolitec\Mobilemoney\MobileMoneyServiceProvider
```

in the cofig folder you will see mobilemoney, do your mobile money configuration

### using

Example

```
$mtnMobileMoney = MobileMoneyController::doMtnTransaction($phone_number,$amount);
```
