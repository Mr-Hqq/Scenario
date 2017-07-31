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
```php
<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Units extends Model {
	static $rules = [
		'phone'       => ['required|numeric|digits:11'],
		'address'     => ['required'],
		'services'    => ['required'],
		'website'     => ['required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'],
		'email'       => ['required|email',['mostafa']],
		'description' => ['required',['mostafa']],
		'about_us'    => ['required', ['mehrdad']],
		'picture'     => ['required|image|mimes:jpg,png,gif,jpeg|max:1000', ['store','mostafa']]
	];
	protected $table = "units";
	protected $fillable = ['picture', 'phone', 'address', 'services', 'website', 'email', 'description', 'about_us'];
}
```

## Usage Code

#### `Scenarioo::setRules(AllowedUnits::$rules)`
#### `Scenarioo::setScenario(['mehrdad', 'mostafa','store'])`
#### `Scenarioo::Rules()`
```php
Scenarioo::setRules(Units::$rules);
Scenarioo::setScenario(['mehrdad', 'mostafa','store']);
$validation = \Validator::make($request->all(),Scenarioo::Rules());
if($validation->fails()){
	return \Redirect::back()->withErrors($validation->errors())->withInput();
}
```
---

## License ##
-  This package was created and modified by Mostafa Haqiqi && Mehrdad Akbari for Laravel >= 5 and is released under the MIT License.
