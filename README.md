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
    - [4.1 Get list of states](#41-get-list-of-states)
    - [4.2. Get a single state](#42-get-a-single-state)
    - [4.3. List cities in a state](#43-list-cities-in-a-state)
    - [4.4. List Local Governament Areas in a state](#44-list-local-governament-areas-in-a-state)
    - [4.4. Get list of Local Governament Areas](#44-get-list-of-local-governament-areas)
- [5. License](#5-license)

## 3. Installation

### 3.1. Run locally
To run app locally, make sure you have `PHP >= 7.1.3` and `composer` installed.
```bash
git clone https://github.com/devdbrandy/nglocations.git # or clone your own fork
cd nglocations
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

### 4.1 Get list of states

API endpoint that represents a list of states
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

### 4.2. Get a single state

API endpoint that represents a single state
- **URL Endpoint:** `/api/states/:state_alias`
- **Method:** `GET`
- **URL Params:** 

    Attribute | Type | Description
    ----------|------|------------
    `alias` | `string` | **Required.** The state alias

- **Data Param:** `None`
- **Success Response**
  - **Code:** `200`
  - **Content:**
  ```http
    {
        "code": "LA",
        "name": "Lagos",
        "capital": "Ikeja",
        "alias": "lagos",
        "zone": "South-Western",
        "latitude": "6.4530556",
        "longitude": "3.3958333"
    }
  ```
- **Error Response**
  - **Code:** `404 Not Found`
  - **Content:**
  
  ```http
    {"error": "Resource does not exist"}
  ```
- **Usage Sample:**

    ```http
    GET https://nglocations.me/api/states/lagos
    HTTP/1.1
    Accept: application/json

    HTTP/1.1 200 OK
    Content-Type: application/json

    {
        "code": "LA",
        "name": "Lagos",
        "capital": "Ikeja",
        "alias": "lagos",
        "zone": "South-Western",
        "latitude": "6.4530556",
        "longitude": "3.3958333"
    }
    ```

### 4.3. List cities in a state

API endpoint that represents a list of cities in a state
- **URL Endpoint:** `/api/states/:state_alias/cities`
- **Method:** `GET`
- **URL Params:** 

    Attribute | Type | Description
    ----------|------|------------
    `alias` | `string` | **Required.** The state alias

- **Data Param:** `None`
- **Success Response**
  - **Code:** `200`
  - **Content:**
  ```http
    [
        {
            "name": "Ikeja",
            "alias": "ikeja"
        },
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
    GET https://nglocations.me/api/states/enugu/cities
    HTTP/1.1
    Accept: application/json

    HTTP/1.1 200 OK
    Content-Type: application/json

    [
        {
            "name": "Enugu",
            "alias": "enugu"
        },
        {
            "name": "Nsukka",
            "alias": "nsukka"
        },
        ...
    ]
    ```
### 4.4. List Local Governament Areas in a state

API endpoint that represents a list of cities in a state
- **URL Endpoint:** `/api/states/:state_alias/lgas`
- **Method:** `GET`
- **URL Params:** 

    Attribute | Type | Description
    ----------|------|------------
    `alias` | `string` | **Required.** The state alias

- **Data Param:** `None`
- **Success Response**
  - **Code:** `200`
  - **Content:**
  ```http
    [
        {
            "name": "Agege",
            "alias": "agege",
            "latitude": "6.4530556",
            "longitude": "3.3958333"
        },
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
    GET https://nglocations.me/api/states/enugu/cities
    HTTP/1.1
    Accept: application/json

    HTTP/1.1 200 OK
    Content-Type: application/json

    [
        {
            "name": "Agege",
            "alias": "agege",
            "latitude": "6.4530556",
            "longitude": "3.3958333"
        },
        {
            "name": "Ajeromi\/ifelodun",
            "alias": "ajeromiifelodun",
            "latitude": "6.4530556",
            "longitude": "3.3958333"
        },
        ...
    ]
    ```
### 4.4. Get list of Local Governament Areas

API endpoint that represents a list of cities in a state
- **URL Endpoint:** `/api/lgas`
- **Method:** `GET`
- **URL Params:** `None`
- **Data Param:** `None`
- **Success Response**
  - **Code:** `200`
  - **Content:**
  ```http
    [
        {
            "state": "Abia",
            "alias": "abia",
            "lga": {
                "name": "Aba North",
                "alias": "aba-north",
                "href": "http://nglocations.me/api/lgas/aba-north"
            }
        },
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
    GET https://nglocations.me/api/lgas
    HTTP/1.1
    Accept: application/json

    HTTP/1.1 200 OK
    Content-Type: application/json

    [
        {
            "state": "Abia",
            "alias": "abia",
            "lga": {
                "name": "Aba North",
                "alias": "aba-north",
                "href": "http://nglocations.me/api/lgas/aba-north"
            }
        },
        {
            "state": "Abia",
            "alias": "abia",
            "lga": {
                "name": "Aba South",
                "alias": "aba-south",
                "href": "http://nglocations.me/api/lgas/aba-south"
            }
        },
        ...
    ]
    ```

## 5. License

The NgLocations REST API is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

