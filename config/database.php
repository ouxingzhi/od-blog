<?php
    
    if(defined('SAE_MYSQL_DB')){
        $database = SAE_MYSQL_DB;
        $host = SAE_MYSQL_HOST_M . ':' .SAE_MYSQL_PORT;
        $user = SAE_MYSQL_USER;
        $pass = SAE_MYSQL_PASS;
    }else{
        $database = 'od_blog';
        $host = 'localhost';
        $user = 'root';
        $pass = '422302';
    }

	return array(
		'mysql'=>array(
			'host' => $host,
			'user' => $user,
			'password' => $pass,
			'database' => $database
		)
	);