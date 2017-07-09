# Scenario For Laravel

- This package compatible with Laravel `>=5`

- This package help you out to make model from database and set scenario for it.

Run the Composer update comand

    $ composer require hqq/scenario
	
Or if you using phpStorm , you can use Tools > Composer > Add Dependency

In your `config/app.php` add `hqq\scenario\ScenarioServiceProvider::class,` to the end of the `$providers` array

```php
'providers' => [

    Illuminate\Foundation\Providers\ArtisanServiceProvider::class,
    Illuminate\Auth\AuthServiceProvider::class,
    ...
    hqq\scenario\ScenarioServiceProvider::class,

],
```

<a name="usage"></a>
## Usage cmodel
#### in artisan console write
#### `php artisan make:cmodel table_name`

## Example Model
`<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class Users extends Model {
	public static $rules = [
		"name" => ["required"],
		"email" => ["required|email"],
		"password" => ["required"],
		"remember_token" => [""],
		"created_at" => ["required"],
		"updated_at" => ["required"]
	];
	protected $table = "users";
	protected $fillable = ["name","email","password","remember_token","created_at","updated_at"];
}`

## Usage Code

#### `Scenarioo::setRules(AllowedUnits::$rules)`
#### `Scenarioo::setScenario('image')`
#### `Scenarioo::Rules()`
```php
Scenarioo::setRules(AllowedUnits::$rules);
Scenarioo::setScenario('image');
$validation = \Validator::make($request->all(),Scenarioo::Rules());
if($validation->fails()){
	return \Redirect::back()->withErrors($validation->errors())->withInput();
}
```
---

## License ##
-  This package was created and modified by Mostafa Haqiqi for Laravel >= 5 and is released under the MIT License.
