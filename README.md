#Scenario For Laravel

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
## Usage

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
