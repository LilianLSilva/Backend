<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
# Ejercicio en PHP Laravel para Extendeal

En una arquitectura de microservicios se crea un modulo que administra los cuadro de un museo.
## Requisitos del servicio
Esta aplicación esta basada laravel ^8.75. Consulte las instrucciones de instalación de Laravel para obtener más información.

Laravel 9.19, PHP 8.1, MySQL 8, Composer 2.4.4

## Virtualhost
Para este ejemplo el virtualhost creado es http://localhost:8000

## Setup and Config

### Requirements
1. PHP
2. MySQL database
3. Composer
4. Auth0 para el proceso de autenticación.

## Installation steps:
1. Clonar el repositorio:
```bash
git clone git@github.com:LilianLSilva/Backend.git
```
2. Una vez clonado el repositorio, necesitamos crear una base de datos Mysql (i.e. `backend`).

3. copiar el archivo .env.example en el archivo .env y edita el archivo de configuración, especialmente la configuración de Mysql.
```bash
cp .env.example .env
```
4. Ejecute con siguientes comandos.
```bash
composer install
```
### Database migration:
5. necesitamos correr las migraciones de las nuevas tablas de `users`, `vehicles`, `planets` y `people`.
```bash
php artisan migrate
```

### Database seeding:

6.  Para popular las tablas de `vehicles`, `planets` y `people` debemos correr el seguiente comando:
```bash
php artisan module:seed 
```

### Obtener Token:

7. Para obtener el token es necesario primero crear un user valido en la tabla `users` a traves del siguiente endpoint:
```code
POST http://localhost:8000/api/user
```
El Body del request debera contener los datos del usuario como se muestra a continuación:
```javascript
{
    "name": "Usuario Ejemplo",
    "password":"password_ejemplo",
    "email":"usuario.ejemplo@gmail.com"
}
```
Con el usuario creado podemos usar el endpoint que nos va a permitir obtener un token válido para hacer los request
```code
POST http://localhost:8000/api/token
```
El Body del request a validar se muestra a continuación:
```javascript
{
    "password":"password_ejemplo",
    "email":"usuario.ejemplo@gmail.com"
}
```
Listo. Ya podemos probar la API con Postman.
```code
GET http://localhost:8000/api/vehicles
```
Debe retornar algo como:
```javascript
{
    "data": [
        {
            "id": 1,
            "vehicle_id": 4,
            "name": "Sand Crawler",
            "model": "Digger Crawler",
            "vehicle_class": "wheeled",
            "manufacturer": "Corellia Mining Corporation",
            "length": "36.8 ",
            "cost_in_credits": "150000",
            "crew": "46",
            "passengers": "30",
            "max_atmosphering_speed": "30",
            "cargo_capacity": "50000",
            "consumables": "2 months",
            "films": "[\"https://swapi.dev/api/films/1/\", \"https://swapi.dev/api/films/5/\"]",
            "pilots": "[]",
            "url": "https://swapi.dev/api/vehicles/4/",
            "created": "2014-12-10T15:36:25.724000Z",
            "edited": "2014-12-20T21:30:21.661000Z"
        },
        {
            "id": 2,
            "vehicle_id": 6,
            "name": "T-16 skyhopper",
            "model": "T-16 skyhopper",
            "vehicle_class": "repulsorcraft",
            "manufacturer": "Incom Corporation",
            "length": "10.4 ",
            "cost_in_credits": "14500",
            "crew": "1",
            "passengers": "1",
            "max_atmosphering_speed": "1200",
            "cargo_capacity": "50",
            "consumables": "0",
            "films": "[\"https://swapi.dev/api/films/1/\"]",
            "pilots": "[]",
            "url": "https://swapi.dev/api/vehicles/6/",
            "created": "2014-12-10T16:01:52.434000Z",
            "edited": "2014-12-20T21:30:21.665000Z"
        }
    ]
}
```

## Q&A

### Doubts?
Puedes enviar un mail a silvalilian662@gmail.com
