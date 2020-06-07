<?php

	class DB{
		static public function connect(){
			$db = new PDO("mysql:host=localhost;dbname=db_app_vol_aeriens","root","");
			// et names utf8 : bach tban 3andna é matalan
			$db ->exec("set names utf8");
			// setAttribute : tyde de errer | ATTR_ERRMODE,PDO:error mod raykon PBO | ::ERRMODE_WARNING:les reeoes radi ykono 3la chkel WORNING tahdirat
			$db ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
			return $db;
		}
	}
?>