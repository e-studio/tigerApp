<?php
require_once "conexion.php";

class Datos extends Conexion{

	public function mdlmaterias($tabla){

			$stmt = Conexion::conectar()->prepare("SELECT nombre FROM $tabla ORDER BY nombre");
			$stmt->execute();
			return $stmt->fetchAll();
			$stmt->close();

	}


	public function buscaAlumno($noControl){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM alumnos where noControl = :noControl");

			$stmt->bindParam(":noControl", $noControl, PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();

	}

	public function buscaUnExtra($id){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM extras where id = :id");

			$stmt->bindParam(":id", $id, PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetch();
			$stmt->close();

	}


	public function mdlIdOferta ($Materia) {
		$Statement = Conexion::conectar() -> prepare("SELECT id FROM ofertas WHERE materia = :materia");
		$Statement -> bindParam(":materia", $Materia, PDO::PARAM_STR);

		$Statement -> execute();

			return $Statement -> fetch();
		$Statement -> close();
	}

	public function mdlBuscaDocentes($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public function mdlExtras($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tipo = 'Extraordinario'");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}

	public function mdlRecurso($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();

	}

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


	#REGISTRO DE EXTRAORDINARIO
	#-------------------------------------
	public function registroExtra($datosModel){

		$stmt = Conexion::conectar()->prepare("INSERT INTO extras (noControl, nombre, grupo, materia) VALUES (:noControl, :nombre, :grupo, :materia)");


		$stmt->bindParam(":noControl", $datosModel["noControl"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombreAlumno"], PDO::PARAM_STR);
		$stmt->bindParam(":grupo", $datosModel["grupoAlumno"], PDO::PARAM_STR);
		$stmt->bindParam(":materia", $datosModel["extra"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close();
	}

	public function mdlRegistroRecurso ($Datos) {
		$Statement = Conexion::conectar() -> prepare("INSERT INTO registro VALUES (null, :idOferta, :noControl, :fecha, null)");

		$Statement -> bindParam(":idOferta", $Datos["idOferta"], PDO::PARAM_STR);
		$Statement -> bindParam(":noControl", $Datos["noControl"], PDO::PARAM_STR);
		$Statement -> bindParam(":fecha", $Datos["fecha"], PDO::PARAM_STR);

			if ($Statement -> execute()) {
				return "success";
			} else {
				return "error";
			}
	}


	// #IMPRESION DE MATERIAS A LAS QUE SE INSCRIBIO UN ALUMNO PARA RECIBO DE INSCRIPCION
  // #-----------------------------------------------------------------------------------
  public function imprimirExtras($noControl){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM `extras` WHERE `noControl`= :noControl");
    $stmt -> bindParam(":noControl", $noControl, PDO::PARAM_STR);

    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }


  // #IMPRESION LISTA DE ALUMNOS INSCRITOS A UN RECURSO
  // #-----------------------------------------------------------------------------------
  public function imprimirListaExtras($materia, $grupo){
    $stmt = Conexion::conectar()->prepare("SELECT * FROM `extras` WHERE `materia`= :materia AND `grupo`= :grupo ORDER BY nombre");
    $stmt -> bindParam(":materia", $materia, PDO::PARAM_STR);
    $stmt -> bindParam(":grupo", $grupo, PDO::PARAM_STR);

    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
  }



	// #LISTA TODOS LOS REGISTROS DE UNA TABLA
	// #-------------------------------------
	public function listaExtras($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT DISTINCT `grupo`, `materia` FROM $tabla;");
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}


	// #LISTA TODOS LOS REGISTROS DE UNA TABLA
	// #-------------------------------------
	public function inscritoExtras($noControl){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM extras WHERE noControl = :noControl");
		$stmt -> bindParam(":noControl", $noControl, PDO::PARAM_STR);
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


 //    #REGISTRO DE SOCIO
	// #-------------------------------------
	// public function registroSocio($datosModel, $tabla){

	// 	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, aPaterno, aMaterno, telefono, email, fechaIngreso, activo) VALUES (:nombre, :aPaterno, :aMaterno, :telefono, :email,:fechaIngreso, :activo)");

	// 	$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":aPaterno", $datosModel["aPaterno"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":aMaterno", $datosModel["aMaterno"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":telefono", $datosModel["telefono"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":fechaIngreso", $datosModel["fechaIngreso"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":activo", $datosModel["activo"], PDO::PARAM_STR);

	// 	if($stmt->execute()){
	// 		return "success";
	// 	}
	// 	else{
	// 		return "error";
	// 	}
	// 	$stmt->close();
	// }

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
	public function registroOferta($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (materia,docente) VALUES ( :materia, :profe)");

		$stmt->bindParam(":profe", $datosModel["profe"], PDO::PARAM_STR);
		$stmt->bindParam(":materia", $datosModel["materia"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "success";
		}
		else{
			return "error";
		}
		$stmt->close();
	}

	public function MdlactOferta($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET `materia`= :materia,`docente`= :profe WHERE id= :id");

		$stmt->bindParam(":id",$datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":profe", $datosModel["profe"], PDO::PARAM_STR);
		$stmt->bindParam(":materia", $datosModel["materia"], PDO::PARAM_STR);

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

	# Cuenta materias de extraordinario en que esta inscrito un alumno
	public function mdlCuentaExtras($Control){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(id) FROM `extras` WHERE `noControl`= :noControl");

		$stmt -> bindParam(":noControl", $Control, PDO::PARAM_STR);
		$stmt->execute();

		return $stmt->fetch();
		$stmt->close();
	}

	public function mdlCuentaRecursos ($Control) {
		$Statement = Conexion::conectar() -> prepare("SELECT COUNT(id) FROM `registro` WHERE noControl = :noControl;");

		$Statement -> bindParam(":noControl", $Control, PDO::PARAM_STR);
		$Statement -> execute();

		return $Statement -> fetch();
		$Statement -> close();
	}


	#ACTUALIZA PAQUETE
	#-------------------------------------
	public function actualizaExtra($datosModel){


		$stmt = Conexion::conectar()->prepare("UPDATE extras SET materia = :extra WHERE id = :id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":extra", $datosModel["extra"], PDO::PARAM_STR);

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



	#BORRAR EXTRAORDINARIO
	#-------------------------------------
	public function borraExtra($datosModel){
		$stmt = Conexion::conectar()->prepare("DELETE FROM extras WHERE id = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt -> close();
	}



	#
	public function mdlBuscaControlAjax ($Tabla, $Control) {

		$Control = $Control;

		$Statement = Conexion::conectar() -> prepare("SELECT * FROM $Tabla WHERE noControl = :noControl");

		$Statement -> bindParam(":noControl", $Control, PDO::PARAM_STR);

		if($Statement->execute()){
			return $Statement -> fetch();
		}
		else{
			return "error";
		}


		$Statement -> close();

	}

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