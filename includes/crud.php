<?php

require_once "conexion.php";

class Datos extends Conexion{

	#VERIFICA SI EL USUARIO EXISTE PARA INGRESAR AL SISTEMA
	#--------------------------------------------------------
	public function ingresoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE email = :usuario AND password = :password");

		$stmt -> bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt -> bindParam(":password", $datosModel["password"], PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

	}

	// #LISTA TODOS LOS REGISTROS DE UNA TABLA
	// #-------------------------------------
	public function lista($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}


	#BUSQUEDA GENERAL
	#-------------------------------------

	public function busca($que, $donde){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $donde WHERE id = :que");

		$stmt->bindParam(":que", $que, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();
	}


    #REGISTRO DE SOCIO
	#-------------------------------------
	public function registroSocio($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, aPaterno, aMaterno, telefono, email, fechaIngreso, activo) VALUES (:nombre, :aPaterno, :aMaterno, :telefono, :email,:fechaIngreso, :activo)");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":aPaterno", $datosModel["aPaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":aMaterno", $datosModel["aMaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaIngreso", $datosModel["fechaIngreso"], PDO::PARAM_STR);
		$stmt->bindParam(":activo", $datosModel["activo"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close();
	}

	#ACTUALIZA SOCIO
	#-------------------------------------
	public function actualizaSocio($datosModel, $tabla){


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre = :nombre, aPaterno = :aPaterno, aMaterno = :aMaterno, activo = :activo, telefono = :telefono, email = :email, fechaIngreso = :fechaIngreso, clases = :clases, caducidad = :caducidad WHERE id = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":aPaterno", $datosModel["aPaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":aMaterno", $datosModel["aMaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":activo", $datosModel["activo"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaIngreso", $datosModel["fechaIngreso"], PDO::PARAM_STR);
		$stmt->bindParam(":clases", $datosModel["clases"], PDO::PARAM_STR);
		$stmt->bindParam(":caducidad", $datosModel["caducidad"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "ok";
		}

		else{
			return "error";
		}
		$stmt->close();
	}

	#REGISTRO DE COACH
	#-------------------------------------
	public function registroCoach($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nickName, Nombre, aPaterno, aMaterno, telefono, email, fechaIngreso, activo) VALUES (:nick, :nombre, :aPaterno, :aMaterno, :telefono, :email,:fechaIngreso, :activo)");

		$stmt->bindParam(":nick", $datosModel["nick"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":aPaterno", $datosModel["aPaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":aMaterno", $datosModel["aMaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaIngreso", $datosModel["fechaIngreso"], PDO::PARAM_STR);
		$stmt->bindParam(":activo", $datosModel["activo"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close();
	}

	#ACTUALIZA COACH
	#-------------------------------------
	public function actualizaCoach($datosModel, $tabla){


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET Nombre = :nombre, aPaterno = :aPaterno, activo = :activo, aMaterno = :aMaterno, telefono = :telefono, email = :email, fechaIngreso = :fechaIngreso, nickName = :nickName WHERE id = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":aPaterno", $datosModel["aPaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":aMaterno", $datosModel["aMaterno"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaIngreso", $datosModel["fechaIngreso"], PDO::PARAM_STR);
		$stmt->bindParam(":nickName", $datosModel["nickName"], PDO::PARAM_STR);
		$stmt->bindParam(":activo", $datosModel["activo"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}

		else{
			return "error";
		}
		$stmt->close();
	}

	#REGISTRO DE PAQUETE
	#-------------------------------------
	public function registroPaquete($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, costo, clases, caducaDias) VALUES (:nombre, :costo, :clases, :vigencia)");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":costo", $datosModel["costo"], PDO::PARAM_INT);
		$stmt->bindParam(":clases", $datosModel["clases"], PDO::PARAM_INT);
		$stmt->bindParam(":vigencia", $datosModel["vigencia"], PDO::PARAM_INT);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close();
	}

	#COMPRA DE PAQUETE
	#-------------------------------------
	public function compraPaquete($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (socio, paquete, costo) VALUES (:socio, :paquete, :costo)");
		$stmt2 = Conexion::conectar()->prepare("update socios set clases = clases+:clases, caducidad = date_add(NOW(), interval :caducidad day) WHERE id= :socio");

		$stmt->bindParam(":socio", $datosModel["socio"], PDO::PARAM_INT);
		$stmt->bindParam(":paquete", $datosModel["paquete"], PDO::PARAM_INT);
		$stmt->bindParam(":costo", $datosModel["costo"], PDO::PARAM_INT);

		$stmt2->bindParam(":socio", $datosModel["socio"], PDO::PARAM_INT);
		$stmt2->bindParam(":clases", $datosModel["clases"], PDO::PARAM_INT);
		$stmt2->bindParam(":caducidad", $datosModel["caducidad"], PDO::PARAM_INT);

		if($stmt->execute()){

			if ($stmt2->execute()){
				return "success";
			}
		}
		else{
			return "error";
		}
		$stmt->close();
	}


	#ACTUALIZA PAQUETE
	#-------------------------------------
	public function actualizaPaquete($datosModel, $tabla){


		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, costo = :costo, clases = :clases, caducaDias = :vigencia WHERE id = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":costo", $datosModel["costo"], PDO::PARAM_STR);
		$stmt->bindParam(":clases", $datosModel["clases"], PDO::PARAM_STR);
		$stmt->bindParam(":vigencia", $datosModel["vigencia"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}

		else{
			return "error";
		}
		$stmt->close();
	}


	#BORRAR REGISTRO
	#-------------------------------------
	public function borrarRegistro($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt -> close();
	}

	#
	#-------------------------------------

	public function buscaPaqueteAjax($tabla, $codigo){

		$stmt = Conexion::conectar()->prepare("SELECT costo, clases, caducaDias FROM $tabla WHERE id=:codigo");
		$stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);

		if ($stmt->execute()){
			return $stmt->fetch();
		}
		else{
			return "error";
		}

		$stmt->close();

	}

	# Funcion para buscar las clases que le quedan a un socio mediante codigo ajax en formulario de compra paquetes
	public function buscaClasesAjax($tabla, $codigo){

		$stmt = Conexion::conectar()->prepare("SELECT clases FROM $tabla WHERE id=:codigo");
		$stmt->bindParam(":codigo", $codigo, PDO::PARAM_STR);

		if ($stmt->execute()){
			return $stmt->fetch();
		}
		else{
			return "error";
		}

		$stmt->close();

	}

} // conexion