<?php

	/**
	 * Database connection config
	 *
	**/
	if($_SERVER['HTTP_HOST'] == 'localhost:8092'){
		define('_HOST', 'localhost');
		define('_DATABASE', 'financeiro');
		define('_DATABASE_USER', 'root');
		define('_DATABASE_PASSWORD', '');
	}else{
		define('_HOST', 'localhost');
		define('_DATABASE', 'serra601_financeiro');
		define('_DATABASE_USER', 'serra601_finance');
		define('_DATABASE_PASSWORD', 'fkgJ?zc]HQck');
	}
