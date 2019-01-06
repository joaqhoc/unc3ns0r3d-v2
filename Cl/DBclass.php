<?php
class Cl_DBclass
{
	/**
	 * @var $con llevará a cabo la conexión de base de datos
	 */
	public $con;
	
	/**
	 * Esto creará la conexión de base de datos
	 */
	public function __construct()
	{
		$this->con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
		if( mysqli_connect_error()) echo "Falló conexión a MySQL: " . mysqli_connect_error();
	}
}