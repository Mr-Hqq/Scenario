<?php
namespace hqq\scenario;

use Illuminate\Database\Console\Migrations\InstallCommand;
use Illuminate\Support\ServiceProvider;

class ScenarioServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	protected $defer = true;
	public function boot()
	{
		$this->app->register(
			ScenarioServiceProvider::class
		);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->commands([MakeModel::class]);
	}
	public function provides()
	{
		return array('hqq.scenario');
	}

}
