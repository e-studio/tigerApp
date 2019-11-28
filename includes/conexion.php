<?php

class Conexion{

	public function conectar(){
		 //conexion local
		$servername = "127.0.0.1";
		$username = "root";
		$password = "";
		$dbname = "tigre";

		//conexion Server
		/*$servername = "localhost";
		$username = "multie5_tiger";
		$password = "ldqs$4@b.n-x";
		$dbname = "multie5_tigerApp";*/

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
		    //echo '<script>alert("Connected successfully");</script>';
		    }
		catch(PDOException $e)
		    {
		     //echo '<script>alert("Connection failed: '.$e->getMessage().'");</script>';

		    }
		return $conn;

	}

}