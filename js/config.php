<?php
/*
 * Site : http:www.smarttutorials.net
 * Author :muni
 * 
 */
 
define('BASE_PATH','http://demo.smarttutorials.net/autocomplete/');
define('DB_HOST', 'localhost');
define('DB_NAME', 'smarttut_demo');
define('DB_USER','smarttut_muni');
define('DB_PASSWORD','demopass');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

?>