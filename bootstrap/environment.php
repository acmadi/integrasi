<?php


// $env = $app->detectEnvironment(function(){
// $environmentPath = __DIR__.'/../.env';
// $setEnv = trim(file_get_contents($environmentPath));
// if (file_exists($environmentPath))
// {
// putenv("APP_ENV=$setEnv");
// if (getenv('APP_ENV') && file_exists(__DIR__.'/../.' .getenv('APP_ENV') .'.env')) {
// Dotenv::load(__DIR__ . '/../', '.' . getenv('APP_ENV') . '.env');
// }
// }
// });


// if ($_SERVER['SERVER_NAME']=='laptop-prima') {
// 	Dotenv::load(__DIR__.'/../',$_SERVER['SERVER_NAME']);
// 	// var_dump($_ENV);
// 	// exit('laptop-prima');
	
// }
// else{
// Dotenv::load(__DIR__.'/../','.local.env');

// }

/**
 * [$listEnvironment description]
 * E:\XAMPP_5.6.11\htdocs\lumen\bootstrap\environment.php
 */
	
// $listEnvironment=[
// 				'[Host]'=>'{nama env file}',

// 				];
$listEnvironment=[
				'laptop-prima'=>'laptop-prima',
				// 'demo.sppd.net'=>'laptop-prima',
				'demo.sppd.net'=>'demo',
				'local.sppd.net'=>'localhost',
				'sppd.net'=>'production'

				];

foreach ($listEnvironment as $server => $environmentfile) {

	if ($server== $_SERVER['SERVER_NAME']) {

		Dotenv::load(__DIR__.'/../.', '.'.$environmentfile.'.env'); 

	}
}

// Dotenv::load(__DIR__.'/../.','.'.$_SERVER['SERVER_NAME'].'.env'); 