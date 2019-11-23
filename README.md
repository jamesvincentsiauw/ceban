# CEBAN: Cari Event Bandung 
### IF3152 Rekayasa Perangkat Lunak
##### How to configure the code on your devices:
* Clone the Repository
```
$ git clone https://github.com/jamesvincentsiauw/portal-LLH.git
```
* Run Terminal / Command Prompt
* Install Dependencies 
```
$ composer install
```
* Copy `.env.example` file to `.env file`
* Change the `.env` file with your credential
* Create database named `portal_llh` 
* Import the DB_Data.sql to your database
* Generate Key for your Device
```
$ php artisan key:generate
```
* Run the Script
```
$ php artisan serve
```
* Server will active on `http://127.0.0.1:8000/` 
