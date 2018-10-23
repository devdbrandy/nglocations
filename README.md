<h1 align="center">NgLocations</h1>

<p align="center">
    <a href="https://github.styleci.io/repos/153914406">
        <img src="https://github.styleci.io/repos/153914406/shield?branch=develop" alt="StyleCI"></a>
    <a href="https://app.codeship.com/projects/07f963d0-b856-0136-e4a9-6ec9e9b18678">
        <img src="https://app.codeship.com/projects/07f963d0-b856-0136-e4a9-6ec9e9b18678/status?branch=develop" alt="Build Status">
    </a>
    <a href='https://coveralls.io/github/devdbrandy/nglocations?branch=develop'>
        <img src='https://coveralls.io/repos/github/devdbrandy/nglocations/badge.svg?branch=develop'
            alt='Coverage Status'>
    </a>
    <a href="https://opensource.org/licenses/MIT">
        <img src="https://img.shields.io/badge/License-MIT-yellow.svg">
    </a>
    <img src="https://img.shields.io/maintenance/yes/2018.svg">
</p>

## 1. Overview
The NgLocations is an Open Source REST API that allows users to retrieve information of all states and geopolitical zones in Nigeria. Informations include [states](#41-get-all-states), [cities](#), [local government areas](#), [geopolical zones](#) etc.

## 2. Table of Contents

- [1. Overview](#1-overview)
- [2. Table of Contents](#2-table-of-contents)
- [3. Installation](#3-installation)
    - [3.1. Run locally](#31-run-locally)
    - [3.2. Deploy to heroku](#32-deploy-to-heroku)
- [4. API Endpoints](#4-api-endpoints)
    - [4.1. Get all states](#41-get-all-states)
- [5. License](#5-license)

## 3. Installation

### 3.1. Run locally
To run app locally, make sure you have `PHP >= 7.1.3` and `composer` installed.
```bash
git clone https://github.com/devdbrandy/nglocal.git # or clone your own fork
cd nglocal
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Pre-fill `DB_HOST`, `DB_PORT`, `DB_USERNAME`, `DB_PASSWORD` with database credentials. Then run:
```bash
php artisan migrate --seed
php artisan serve # spin up server at http://localhost:8000
```

### 3.2. Deploy to heroku

Alternatively, you can deploy your own copy of the app using the web-based flow:

[![Deploy to Heroku](https://www.herokucdn.com/deploy/button.png)](https://heroku.com/deploy)

## 4. API Endpoints

### 4.1. Get all states

Returns a json data of a list of states
- **URL Endpoint:** `/api/states`
- **Method:** `GET`
- **URL Params:** `None`
- **Data Param:** `None`
- **Success Response**
  - **Code:** `200`
  - **Content:**
  ```http
    [
        {
            "code": "AB",
            "name": "Abia",
            "alias": "abia",
            "href": "http://nglocations.me/api/states/abia"
        }
        ...
    ]
  ```
- **Error Response**
  - **Code:** `404 Not Found`
  - **Content:**
  
  ```http
    {"error": "Resource does not exist"}
  ```
- **Usage Sample:**

```http
GET https://nglocations.me/api/states
HTTP/1.1
Accept: application/json

HTTP/1.1 200 OK
Content-Type: application/json

[
    {
        "code": "AB",
        "name": "Abia",
        "alias": "abia",
        "href": "http://nglocations.me/api/states/abia"
    },
    {
        "code": "AD",
        "name": "Adamawa",
        "alias": "adamawa",
        "href": "http://nglocations.me/api/states/adamawa"
    },
    ...
]
```

## 5. License

The NgLocations REST API is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

