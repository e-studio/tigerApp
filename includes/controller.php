<?php
require 'crud.php';

class Controller{

	public function buscaMateria(){

		$respuesta = Datos::mdlmaterias("materias");

		foreach ($respuesta as $row => $item){

				echo  '<option>'.$item["nombre"].'</option>';
		}
	}



	public function buscaProfesor(){

		$respuesta = Datos::mdlBuscaDocentes("docentes");

		foreach ($respuesta as $row => $item){

				echo  '<option value="'.$item["nombre"].'">'.$item["nombre"].'</option>';
		}
	}


  public function buscaextra(){

		$respuesta = Datos::mdlExtras("oferta");

		foreach ($respuesta as $row => $item){

				echo  '<option >'.$item["materia"]."-".$item["docente"].'</option>';
		}
  }

  public function buscarecurso(){

		$respuesta = Datos::mdlRecurso("oferta");

		foreach ($respuesta as $row => $item){

				echo  '<option value = "'.$item["id"].'">'.$item["materia"]." - ".$item["docente"].'</option>';
		}
	}


//  #REGISTRO DE EXTRAORDINARIO
    # id  noControl  nombre  grupo   docente   materia
//  #------------------------------------
  public function registroExtra(){

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $noControl = $_POST["noControl"];
        $nombreAlumno = $_POST["nombreAlumno"];
        $grupoAlumno = $_POST["grupoAlumno"];

      if ($_POST["extra1"] != "" ){
          $datosController = array( "noControl"=>$noControl,
                      "nombreAlumno"=>$nombreAlumno,
                      "grupoAlumno"=>$grupoAlumno,
                      "extra"=>$_POST["extra1"]);
          $respuesta1 = Datos::registroExtra($datosController);
        }

        if ($_POST["extra2"] != "" ){
          $datosController = array( "noControl"=>$noControl,
                      "nombreAlumno"=>$nombreAlumno,
                      "grupoAlumno"=>$grupoAlumno,
                      "extra"=>$_POST["extra2"]);
          $respuesta2 = Datos::registroExtra($datosController);
        }


        if ($_POST["extra3"] != "" ){
          $datosController = array( "noControl"=>$noControl,
                      "nombreAlumno"=>$nombreAlumno,
                      "grupoAlumno"=>$grupoAlumno,
                      "extra"=>$_POST["extra3"]);
          $respuesta3 = Datos::registroExtra($datosController);
        }

      if($respuesta1 == "success" || $respuesta2 == "success" || $respuesta3 == "success"){
        echo '<script type="text/javascript">window.open("imprimeCitas.php?noControl='.$noControl.'&nombre='.$nombreAlumno.'&grupo='.$grupoAlumno.'", "", "width=800, height=600") </script> ';

      }
      else{
        echo '<script type="text/javascript">Swal.fire({
                      title: "Error al guardar!",
                      type: "error",
                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "socios.php";
                      }
                    });</script> ';

      }
    }
  }

// #IMPRESION DE MATERIAS A LAS QUE SE INSCRIBIO UN ALUMNO
//     #------------------------------------
    public function imprimirExtras($noControl){

        $respuesta = Datos::imprimirExtras($noControl);
        $cont =1;

        foreach ($respuesta as $row => $item){
        echo '<tr>
                  <td style="text-align: center">'.$cont.'</td>
                  <td style="text-align: left">'.$item["materia"].'</td>
            </tr>';
            $cont++;
        }
        //echo '<tr style="text-align: right">
        //        <td colspan="4">'. ($cont-1) .' citas en total para esta sesion </td>
        //      </tr>';

    }

// 	#REGISTRO DE SOCIOS
// 	#------------------------------------
	// public function registroSocio(){

	// 	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// 		$datosController = array( "nombre"=>$_POST["nombre"],
	// 							      "aPaterno"=>$_POST["aPaterno"],
	// 							      "aMaterno"=>$_POST["aMaterno"],
	// 							      "email"=>$_POST["email"],
	// 							      "telefono"=>$_POST["telefono"],
	// 							      "activo"=>$_POST["activo"],
	// 							  	  "fechaIngreso" => date("Y-m-d"));

	// 		$respuesta = Datos::registroSocio($datosController, "socios");

	// 		if($respuesta == "success"){
	// 			echo '<script type="text/javascript">Swal.fire({
 //                      title: "Datos Guardados!",
 //                      type: "success",
 //                      showCancelButton: false
 //                    })
 //                    .then((value) => {
 //                      if (value) {
 //                        window.location.href = "socios.php";
 //                      }
 //                    });</script> ';

	// 		}
	// 		else{
	// 			echo '<script type="text/javascript">Swal.fire({
 //                      title: "Error al guardar!",
 //                      type: "error",
 //                      showCancelButton: false
 //                    })
 //                    .then((value) => {
 //                      if (value) {
 //                        window.location.href = "socios.php";
 //                      }
 //                    });</script> ';

	// 		}
	// 	}
	// }

	# ACTUALIZA SOCIOS
    #------------------------------------

   //  public function actualizaSocio(){

   //      if(isset($_POST["actualizar"])){

   //          $datosController = array("id"=>$_POST["id"],
   //                                "nombre"=>$_POST["nombre"],
   //                                "aPaterno"=>$_POST["aPaterno"],
   //                                "aMaterno"=>$_POST["aMaterno"],
   //                                "telefono"=>$_POST["telefono"],
   //                                "email"=>$_POST["email"],
   //                                "activo"=>$_POST["activo"],
   //                                "fechaIngreso"=>$_POST["fechaIngreso"],
   //                                "clases"=>$_POST["clases"],
   //                                "caducidad"=>$_POST["caducidad"]);

   //          $respuesta = Datos::actualizaSocio($datosController, "socios");

   //          if ($respuesta=="ok"){

   //          	echo '<script type="text/javascript">Swal.fire({
   //                    title: "Datos Actualizados!",
   //                    type: "success",
   //                    showCancelButton: false
   //                  })
   //                  .then((value) => {
   //                    if (value) {
   //                      window.location.href = "socios.php";
   //                    }
   //                  });</script> ';

			// }
			// else{
			// 	echo '<script type="text/javascript">Swal.fire({
   //                    title: "Error al guardar!",
   //                    type: "error",
   //                    showCancelButton: false
   //                  })
   //                  .then((value) => {
   //                    if (value) {
   //                      window.location.href = "socios.php";
   //                    }
   //                  });</script> ';

			// }

   //      }
   //  }


    #BORRA SOCIOS
    #------------------------------------
   //  public function borraSocio(){
   //      if (isset($_GET['idBorrar'])){
   //          $datosController = $_GET['idBorrar'];

   //          $respuesta = Datos::borrarRegistro($datosController,"socios");
   //          if ($respuesta == "success"){
   //          echo '<script type="text/javascript">Swal.fire({
   //                    title: "Registro Borrado!",
   //                    type: "success",
   //                    showCancelButton: false
   //                  })
   //                  .then((value) => {
   //                    if (value) {
   //                      window.location.href = "socios.php";
   //                    }
   //                  });</script> ';

			// }
			// else{
			// 	echo '<script type="text/javascript">Swal.fire({
   //                    title: "Error al borrar!",
   //                    type: "error",
   //                    showCancelButton: false
   //                  })
   //                  .then((value) => {
   //                    if (value) {
   //                      window.location.href = "socios.php";
   //                    }
   //                  });</script> ';

			// }

   //      }
   //  }


    // 	#LISTADO DE TODOS LOS SOCIOS
	//     #------------------------------------
    public function listaSocios(){

        $respuesta = Datos::lista("socios");
        $cont =0;

        foreach ($respuesta as $row => $item){
        	$cont ++;
        	$originalDate = $item["caducidad"];
          $fechaIngreso = $item["fechaIngreso"];
			$newDate = date("d-m-Y", strtotime($originalDate));
      $newIngreso = date("d-m-Y", strtotime($fechaIngreso));

        echo '<tr>
                  <td>'.$item["nombre"].'</td>
                  <td>'.$item["telefono"].'</td>
                  <td>'.$newIngreso.'</td>
                  <td>'.$item["clases"].'</td>
                  <td>'.$newDate.'</td>
                  <td><a href="editSocio.php?idEditar='.$item["id"].'"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                      <button class="btn btn-danger btnBorrar" data-toggle="modal" data-target="#deleteModal" data-borrar="'.$item["id"].'"><i class="fas fa-trash-alt"></i></button>
                      <a href="socios.php?idBorrar='.$item["id"].'"><button id="'.$item["id"].'" name="'.$item["id"].'" hidden>X</button></a>
                  </td>
                </tr>';
        }

    }

	#REGISTRO DE COACHES
// 	#------------------------------------
	// public function registroCoach(){

	// 	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// 		$datosController = array( "nombre"=>$_POST["nombre"],
	// 								  "nick"=>$_POST["nick"],
	// 							      "aPaterno"=>$_POST["aPaterno"],
	// 							      "aMaterno"=>$_POST["aMaterno"],
	// 							      "email"=>$_POST["email"],
	// 							      "telefono"=>$_POST["telefono"],
	// 							      "activo"=>$_POST["activo"],
	// 							  	  "fechaIngreso" => $_POST["fechaIngreso"]);

	// 		//"fechaIngreso" => date("Y-m-d"));

	// 		$respuesta = Datos::registroCoach($datosController, "coachs");

	// 		if($respuesta == "success"){
	// 			echo '<script type="text/javascript">Swal.fire({
 //                      title: "Datos Guardados!",
 //                      type: "success",
 //                      showCancelButton: false
 //                    })
 //                    .then((value) => {
 //                      if (value) {
 //                        window.location.href = "coaches.php";
 //                      }
 //                    });</script> ';

	// 		}
	// 		else{
	// 			echo '<script type="text/javascript">Swal.fire({
 //                      title: "Error al guardar!",
 //                      type: "error",
 //                      showCancelButton: false
 //                    })
 //                    .then((value) => {
 //                      if (value) {
 //                        window.location.href = "coaches.php";
 //                      }
 //                    });</script> ';

	// 		}
	// 	}
	// }


	# ACTUALIZA COACH
    #------------------------------------

   //  public function actualizaCoach(){

   //      if(isset($_POST["actualizar"])){

   //          $datosController = array("id"=>$_POST["id"],
   //                                "nombre"=>$_POST["nombre"],
   //                                "aPaterno"=>$_POST["aPaterno"],
   //                                "aMaterno"=>$_POST["aMaterno"],
   //                                "telefono"=>$_POST["telefono"],
   //                                "email"=>$_POST["email"],
   //                                "activo"=>$_POST["activo"],
   //                                "fechaIngreso"=>$_POST["fechaIngreso"],
   //                                "nickName"=>$_POST["nickName"]);

   //          $respuesta = Datos::actualizaCoach($datosController, "coachs");

   //          if ($respuesta=="ok"){
			// 	echo '<script type="text/javascript">Swal.fire({
	  //                     title: "Datos Guardados!",
	  //                     type: "success",
	  //                     showCancelButton: false
	  //                   })
	  //                   .then((value) => {
	  //                     if (value) {
	  //                       window.location.href = "coaches.php";
	  //                     }
	  //                   });</script> ';
			// }
			// else{
			// 		echo '<script type="text/javascript">Swal.fire({
	  //                     title: "Error al guardar!",
	  //                     type: "error",
	  //                     showCancelButton: false
	  //                   })
	  //                   .then((value) => {
	  //                     if (value) {
	  //                       window.location.href = "coaches.php";
	  //                     }
	  //                   });</script> ';
			// }

   //      }
   //  }


    #BORRA COACHES
    #------------------------------------
   //  public function borraCoach(){
   //      if (isset($_GET['idBorrar'])){
   //          $datosController = $_GET['idBorrar'];

   //          $respuesta = Datos::borrarRegistro($datosController,"coachs");
   //          if ($respuesta == "success"){
   //          echo '<script type="text/javascript">Swal.fire({
   //                    title: "Registro Borrado!",
   //                    type: "success",
   //                    showCancelButton: false
   //                  })
   //                  .then((value) => {
   //                    if (value) {
   //                      window.location.href = "coaches.php";
   //                    }
   //                  });</script> ';

			// }
			// else{
			// 	echo '<script type="text/javascript">Swal.fire({
   //                    title: "Error al borrar!",
   //                    type: "error",
   //                    showCancelButton: false
   //                  })
   //                  .then((value) => {
   //                    if (value) {
   //                      window.location.href = "coaches.php";
   //                    }
   //                  });</script> ';

			// }

   //      }
   //  }


    #LISTADO DE TODOS LOS COACHES
    #------------------------------------
    // public function listaCoaches(){

    //     $respuesta = Datos::lista("coachs");
    //     $cont =0;

    //     foreach ($respuesta as $row => $item){
    //     	$cont ++;
    //     	echo '<tr>
    //     		  <td>'.$item["nickName"].'</td>
    //               <td>'.$item["Nombre"].' '.$item["aPaterno"].'</td>
    //               <td>'.$item["telefono"].'</td>
    //               <td>'.$item["email"].'</td>
    //               <td>'.$item["fechaIngreso"].'</td>
    //               <td><a href="editCoach.php?idEditar='.$item["id"].'"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
    //                   <button class="btn btn-danger btnBorrar" data-toggle="modal" data-target="#deleteModal" data-borrar="'.$item["id"].'"><i class="fas fa-trash-alt"></i></button>
    //                   <a href="coaches.php?idBorrar='.$item["id"].'"><button id="'.$item["id"].'" name="'.$item["id"].'" hidden>X</button></a>
    //               </td>
    //             </tr>';
    //     }

    // }


	#REGISTRO DE PAQUETES
// 	#------------------------------------
	public function registroOferta(){

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$datosController = array( "profe"=>$_POST["profe"],
								      "materia"=>$_POST["materia"]);

			//"fechaIngreso" => date("Y-m-d"));

			$respuesta = Datos::registroOferta($datosController, "oferta");

			if($respuesta == "success"){
				echo '<script type="text/javascript">Swal.fire({
                      title: "Datos Guardados!",
                      type: "success",
                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "listaoferta.php";
                      }
                    });</script> ';

			}
			else{
				echo '<script type="text/javascript">Swal.fire({
                      title: "Error al guardar!",
                      type: "error",
                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "paquetes.php";
                      }
                    });</script> ';
			}
		}
  }
  public function actualizaOferta(){

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $datosController = array( "id"=>$_POST["id"],
                      "profe"=>$_POST["profe"],
								      "materia"=>$_POST["materia"]);

			//"fechaIngreso" => date("Y-m-d"));

			$respuesta = Datos:: MdlactOferta($datosController, "oferta");

			if($respuesta == "success"){
				echo '<script type="text/javascript">Swal.fire({
                      title: "Datos Guardados!",
                      type: "success",
                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "listaoferta.php";
                      }
                    });</script> ';

			}
			else{
				echo '<script type="text/javascript">Swal.fire({
                      title: "Error al guardar!",
                      type: "error",
                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "paquetes.php";
                      }
                    });</script> ';
			}
		}
  }

	# ACTUALIZA PAQUETES
    #------------------------------------

    public function actualizaPaquete(){

        if(isset($_POST["actualizar"])){

            $datosController = array("id"=>$_POST["id"],
                                  "nombre"=>$_POST["nombre"],
                                  "costo"=>$_POST["costo"],
                                  "clases"=>$_POST["clases"],
                                  "vigencia"=>$_POST["vigencia"]);

            $respuesta = Datos::actualizaPaquete($datosController, "paquetes");

            if ($respuesta=="ok"){
            	echo '<script type="text/javascript">Swal.fire({
                      title: "Datos Guardados!",
                      type: "success",
                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "paquetes.php";
                      }
                    });</script> ';
			}
			else{
				echo '<script type="text/javascript">Swal.fire({
                      title: "Error al guardar!",
                      type: "error",
                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "paquetes.php";
                      }
                    });</script> ';
			}

        }
    }

    #BORRA PAQUETE
    #------------------------------------
    public function borraoferta(){
        if (isset($_GET['idBorrar'])){
            $datosController = $_GET['idBorrar'];

            $respuesta = Datos::borrarRegistro($datosController,"oferta");
            if ($respuesta == "success"){
            echo '<script type="text/javascript">Swal.fire({
                      title: "Registro Borrado!",
                      type: "success",
                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "listaoferta.php";
                      }
                    });</script> ';

			}
			else{
				echo '<script type="text/javascript">Swal.fire({
                      title: "Error al borrar!",
                      type: "error",
                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "paquetes.php";
                      }
                    });</script> ';

			}

        }
    }


    #LISTADO DE TODOS LOS PAQUETES
    #------------------------------------
    public function listaoferta(){

        $respuesta = Datos::listaoferta("oferta");
        $cont =0;

        foreach ($respuesta as $row => $item){
        	$cont ++;

        echo '<tr>
                  <td>'.$item["docente"].'</td>
                  <td>'.$item["materia"].'</td>
                  <td>'.$item["tipo"].'</td>
                  <td><a href="editoferta.php?idEditar='.$item["id"].'"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a>
                      <button class="btn btn-danger btnBorrar" data-toggle="modal" data-target="#deleteModal" data-borrar="'.$item["id"].'"><i class="fas fa-trash-alt"></i></button>
                      <a href="listaoferta.php?idBorrar='.$item["id"].'"><button id="'.$item["id"].'" name="'.$item["id"].'" hidden>X</button></a>
                  </td>
                </tr>';
        }

    }

    #COMPRA DE PAQUETES
// 	#------------------------------------
	public function compraPaquete(){

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $clasesRecib = $_POST["clases"] + $_POST["clasesDisp"];
      $caducidad =0;

      if ($clasesRecib <= 25 ) $caducidad = 30;
      if ($clasesRecib >= 26 && $clasesRecib <= 35  ) $caducidad = 50;
      if ($clasesRecib >= 36 && $clasesRecib <= 45  ) $caducidad = 60;
      if ($clasesRecib >= 46 ) $caducidad = 70;

			$datosController = array( "socio"=>$_POST["socio"],
								      "paquete"=>$_POST["paquete"],
                      //"clasesDisp" => $_POST["clasesDisp"],
								      "costo"=>$_POST["costo"],
								      "clases"=>$_POST["clases"],
								      "caducidad"=>$caducidad
								    );

			$respuesta = Datos::compraPaquete($datosController, "ventas");

			if($respuesta == "success"){
				echo '<script type="text/javascript">Swal.fire({
                      title: "Venta Exitosa!",
                      type: "success",
                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "socios.php";
                      }
                    });</script> ';

			}
			else{
				echo '<script type="text/javascript">Swal.fire({
                      title: "Error al guardar!",
                      type: "error",
                      showCancelButton: false
                    })
                    .then((value) => {
                      if (value) {
                        window.location.href = "socios.php";
                      }
                    });</script> ';
			}
		}
	}


    #LISTADO DE TODOS LOS PAQUETES EN UN COMBOBOX
    #------------------------------------
    public function listaCombo($tabla){

        $respuesta = Datos::lista($tabla);

        echo '<option> - seleccione - </option>';

        foreach ($respuesta as $row => $item){
        	echo '<option value="'.$item["id"].'">'.$item["nombre"].'</option>';

        }

        echo '</select>';

    }


    #RETORNA LOS DATOS DEL ALUMNO CON EL NUMERO DE CONTROL TAL

    public function ctlBuscaControlAjax ($Tabla, $Control) {

      $inscrito = Datos::mdlCuentaExtras($Control);
      $insc = $inscrito[0];

      $Resultado = Datos::mdlBuscaControlAjax($Tabla, $Control);

          echo $Resultado[0];
            echo "||";
          echo $Resultado[1];
            echo "||";
          echo $Resultado[2];
            echo "||";
          echo $Resultado[3];
            echo "||";
          echo $Resultado[4];
            echo "||";
          echo $Resultado[5];
          echo "||";
          echo $insc;

    }


	    // BUSCA TODAS LAS COMPRAS QUE SE HAYAN HECHO DE UN PRODUCTO EN ESPECIFICO
    public function buscaPaqueteAjax($tabla, $codigo){

        $res = Datos::buscaPaqueteAjax($tabla, $codigo);

        echo $res[0];
        echo " || ";
        echo $res[1];
        echo " || ";
        echo $res[2];

    }

     // BUSCA TODAS LAS CLASES QUE DISPONE UN CLIENTESE HAYAN HECHO DE UN PRODUCTO EN ESPECIFICO
    public function buscaClasesAjax($tabla, $codigo){

        $res = Datos::buscaClasesAjax($tabla, $codigo);

        echo $res[0];
        // echo " || ";
        // echo $res[1];
        // echo " || ";
        // echo $res[2];

    }

}//Clase principal

?>