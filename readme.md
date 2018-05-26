### Setup
*  `composer install`
* `composer dump-autoload`
*  `php artisan key:generate`
*  Run testing `vendor/bin/phpunit`
* set HOTELS_API_URL in env file
  for example `HOTELS_API_URL` = https://api.myjson.com/bins/tl0bp
  
  ## Requirements and Output

#### Create a RESTful API to **allow search** in the given inventory by any of the following:

- Hotel Name
- Destination [City]
- Price range [ex: $100:$200]
- Date range [ex: 10-10-2020:15-10-2020]

and allow sorting by:

- Hotel Name
- Price

This is including search by multiple criteria in the same time like search by destination and price together.

  
  ### Valid Request Inputs
  * name as `string` Example: name => Hotel
  * city as `string` Example: city => ciro
  * price as `array` Example: price => [from => 20, to => 200]
  * date as `array` Example:  date =>  [from => 10-10-2020, to => 15-10-2020]
  * order as `array` Example: order=>  [by => price , type => desc]
  
  
  
  

  


