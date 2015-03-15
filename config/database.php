<?php
    
    if(defined('MOPAAS_MYSQL24013_NAME')){
        $database = MOPAAS_MYSQL24013_NAME;
        $host = MOPAAS_MYSQL24013_HOST . ':' .MOPAAS_MYSQL24013_PORT;
        $user = MOPAAS_MYSQL24013_USERNAME;
        $pass = MOPAAS_MYSQL24013_PASSWORD;
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