<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Zap-Map Technical Challenge

Develop a single restful API endpoint which should return Location points for a region on a map.

- Create a database and migrate the data from that file
- There only needs to be a single endpoint.
- That endpoint should accept three parameters:
  - latitude
  - longitude
  - radius
- It should return a response of all Locations that fall within that radius.

This simple project is running in `php8.2`

## Setup
1. Pull the `main` branch
2. Run `composer install`
3. Make sure you set up your database in `.env` file
4. Run the migration `php artisan migrate` (database/migrations/2023_04_06_101801_create_locations_table.php)
5. Run the seeder: `php artisan db:seed --class=LocationSeeder` which is located in database/seeders/LocationSeeder.php
6. Voilà! you are all set.

## How to use the endpoint?
This contains a single endpoint, below is the detail. Make sure that you will change the domain according to your setup.

GET https://laraboxe.local/api/locations?lat=51.475603934275675&lon=-2.3807167145198114&radius=6

You can also use the postman collection for your reference:
https://api.postman.com/collections/20811097-f78e1f61-9fd2-4f12-8207-ae1e0988fbd7?access_key=PMAT-01GXGTW846JX0XK75XPBWZMWME

Endpoint name: locations

Required Parameters:
- lat (51.475603934275675)
- lon (-2.3807167145198114)
- radius (10)

Successful Response:
```json
{
    "locations": [
        {
            "id": 1,
            "name": "Toyota Taunton",
            "latitude": "51.47560393",
            "longitude": "-2.38071671",
            "distance": 0
        },
        {
            "id": 194,
            "name": "Balnellan Road Car Park",
            "latitude": "51.49157162",
            "longitude": "-2.45921125",
            "distance": 5.718032674693054
        },
        {
            "id": 45,
            "name": "Warwick Avenue (North Bound)",
            "latitude": "51.51463999",
            "longitude": "-2.46010010",
            "distance": 7.002991765705255
        },
        {
            "id": 103,
            "name": "Greenstone Pub & Restaurant",
            "latitude": "51.53201065",
            "longitude": "-2.29918018",
            "distance": 8.437364043107253
        },
        {
            "id": 55,
            "name": "Etchinghill Golf Club",
            "latitude": "51.48544745",
            "longitude": "-2.25066393",
            "distance": 9.072428033163439
        },
        {
            "id": 128,
            "name": "1 Clifton Avenue",
            "latitude": "51.51574403",
            "longitude": "-2.25564252",
            "distance": 9.741231115390512
        }
    ],
    "status": "success",
    "title": "Success",
    "success": true
}
```
Validated Response:

```json
{
    "title": "Error",
    "success": false,
    "message": "Validation errors",
    "data": {
        "lat": [
            "The latitude field is required"
        ],
        "lon": [
            "The longitude field is required"
        ],
        "radius": [
            "The radius field is required."
        ]
    }
}
```

I created a simple test in (tests/Feature/LocationTest.php). Please run `php artisan test` to run it.
