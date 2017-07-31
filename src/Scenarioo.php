<?php
namespace  hqq\scenario;
class Scenarioo {
	protected static $scenario = [];
	protected static $rules;
	static  function getRules() {
		return self::$rules;
	}
	public static function setScenario( $scenario ) {
		self::$scenario =  $scenario;
	}
	public static function getScenario() {
		return self::$scenario;
	}
	public static function setRules( $rules ) {
		self::$rules = $rules;
	}
	public static function Rules() {
		$rl = [];

		foreach(self::getRules() as $rule => $item){
			if(count($item[0]) > 0){
				if(!isset($item[1]) || count(array_diff ($item[1], self::getScenario())) <= 0){
					$rl[$rule] = $item[0];
				}
			}
		}
		return $rl;
	}
}	
