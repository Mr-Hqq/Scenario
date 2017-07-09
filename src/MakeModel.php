<?php namespace App\Console\Commands;
namespace  hqq\scenario;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class MakeModel extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'make:cmodel';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'With this command u can make custom model';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		MakeRules::MakeRulesFromDatabase($this->argument('table'));
	}
	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [
			['table', InputArgument::REQUIRED, 'Input one of ur table name'],
		];
	}
	public function getOutput() {
		return "Successfully";
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [
		];
	}

}
