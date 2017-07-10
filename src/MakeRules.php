<?php
namespace  hqq\scenario;

use Illuminate\Support\Facades\File;
class MakeRules {
	public static function MakeRulesFromDatabase( $table ){
		$rules = "[";
		$fillable = '[';
		$con = mysqli_connect(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'),env('DB_DATABASE'));
		if($con->connect_error){
			die('Connection Error');
		}
		$result = $con->query('DESCRIBE `' . $table . '`');
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$fillable .= '"' . $row['Field'] . '",';
				if($row['Extra'] != 'auto_increment'){
					$rules .= '"' . $row['Field'] . '" => ';
					if($row['Null'] == 'NO'){
						$rules .= '["required|';
					}elseif($row['Null'] == 'YES'){
						$rules .= '["';
					}
					if(strpos($row['Type'],'int')){
						$digits = '';
						if(strpos($row['Type'], 'tinyint')){
							$digits = '4';
						}elseif(strpos($row['Type'], 'smallint')){
							$digits = '6';
						}elseif (strpos($row['Type'], 'mediumint')){
							$digits = '9';
						}elseif(strpos($row['Type'], 'bigint')){
							$digits = '20';
						}else{
							$digits = substr($row['Type'],strpos($row['Type'], '(') + 1);
							$digits = substr($digits,0,strpos($digits, ')'));
						}
						$rules .= 'integer|digits:' . $digits . '|';
					}
					if(strpos($row['Type'], 'varchar') !== false){
						$size = substr($row['Type'],strpos($row['Type'], '(') + 1);
						$size = substr($size,0,strpos($size, ')'));
						$rules .= "size:".$size."|";
					}
					if(strpos($row['Field'], 'website') ||
					   strpos($row['Field'], 'site') ||
					   strpos($row['Field'], 'web_site') ||
					   strpos($row['Field'], 'web-site') ||
					   strpos($row['Field'], 'url') ||
					   strpos($row['Field'], 'site_url') ||
					   strpos($row['Field'], 'url_site') ||
					   strpos($row['Field'], 'url-site')){
						$rules .= "url|";
					}
					if(strpos($row['Field'], 'ip-address') ||
					   strpos($row['Field'], 'ip') ||
					   strpos($row['Field'], 'ip_address')){
						$rules .= "ip|";
					}
					if(strpos($row['Field'], 'email') ||
					   strpos($row['Field'], 'e-mail') ||
					   strpos($row['Field'], 'e_mail') ||
					   strpos($row['Field'], 'mail') ||
					   strpos($row['Field'], 'yahoo') ||
					   strpos($row['Field'], 'gmail') ||
					   strpos($row['Field'], 'yahoo_mail') ||
					   strpos($row['Field'], 'gmail_mail')){
						$rules .= "email|";
					}
					if(strpos($row['Type'], 'date')){
						$rules .= "date|";
					}
					if(strpos($row['Type'], 'blob')){
						$rules .= "image|";
					}
					if(strpos(strtolower($row['Type']),'varchar') ||
					   strpos(strtolower($row['Type']),'text')){
						$rules .= "string|";
					}
					$rules = rtrim($rules, "|");
					$rules .= '"],';

				}
			}
		}
		$rules = rtrim($rules, ",") . "]";
		$fillable = rtrim($fillable, ",") . "]";

		$code ='<?php namespace App;
use Illuminate\Database\Eloquent\Model;
class ' . str_replace('_','',ucwords($table)) . ' extends Model {
	public static $rules = ' . $rules . ';
	protected $table = "' . $table . '";
	protected $fillable = ' . $fillable .  ';
}';
		File::put('app/'.str_replace('_','',ucwords($table)).'.php',$code);
		echo "\nModel for " . $table . " has been make successfully\n";
	}
}
