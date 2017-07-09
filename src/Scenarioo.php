<?php
namespace  hqq\scenario;

/**
 * Created by PhpStorm.
 * User: bikooch
 * Date: 7/8/2017
 * Time: 10:57 AM
 */
class Scenarioo {
	protected static $scenario;
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
		foreach(self::getRules() as $rule){
			if(!isset($rule[1]) || $rule[1] == self::getScenario()){
				$rl[array_search($rule,self::getRules())] = $rule[0];
			}elseif(!isset($rule[1])){
				$rl[array_search($rule,self::getRules())] = $rule[0];
			}
		}
	}
}