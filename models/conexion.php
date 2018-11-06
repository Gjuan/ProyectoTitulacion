<?php

/**
* 
*/
class Conexion
{
	
	public function conectar()
	{
		try{

//		$link = new PDO("mysql:host=190.95.140.229; dbname=db_encuesta", "leo","ASDasd123.-",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
//		$link = new PDO("mysql:host=190.95.140.229; dbname=db_encuesta", "leo","ASDasd123*.*",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$link = new PDO("mysql:host=localhost; dbname=proyecto", "root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		return $link;
		}catch(PDOException $e){
//			echo "Error" . $e->getMessage();
		}
	}


}