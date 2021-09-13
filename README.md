# Code Challenge

This challenge requires you to create an API that will import data from a third party API and be able
to display it. This challenge should demonstrate how you structure your code and apply any
appropriate design patterns. Please read through everything before starting.

### Features
- Import customers from a 3rd party data provider and save to database.
- Display a list of customers from the database.
- Select and display details of a single customer from the database.

### Requirements
  - PHP >= 7.2.5
  - BCMath PHP Extension
  - Ctype PHP Extension
  - Fileinfo PHP extension
  - JSON PHP Extension
  - Mbstring PHP Extension
  - OpenSSL PHP Extension
  - PDO PHP Extension
  - Tokenizer PHP Extension
  - XML PHP Extension

### How to Run
  
    $ composer install
    $ php artisan serve
    
### Running Test

    $ php artisan test


## Data Importer
To fetch data from Data Provider: https://randomuser.me. Run this code:

    $ php artisan import:customer {--count=100}

> **--count** Total number of data tobe pulled. _Default: 100_.

## REST API
### List of Customers
---
Retrieve the list of all customers from the database.

**Request**

    GET /api/customers


**Response**

    HTTP/1.1 200 OK
    Date: Sat, 11 Sep 2021 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    [{"id":1,"full_name":"Stacey Johnston","email":"stacey.johnston@example.com","country":"Australia"}]

### Show Customer Details
---
Retrieve more details of a single customer.

**Request**

    GET /api/customers/{customerId}


**Response**

    HTTP/1.1 200 OK
    Date: Sat, 11 Sep 2021 12:36:30 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 36

    {"id":1,"full_name":"Stacey Johnston","email":"stacey.johnston@example.com","username":"sadladybug171","gender":"female","country":"Australia","city":"Pert","phone":"08-5513-0676"}
