function noControlEditar(Control) {
  var noControl = document.getElementById("noControl");
  var nombre = document.getElementById("nombre");
  var grupo = document.getElementById("grupo");
  var inscrito = document.getElementById("inscrito");
  var btnGuardar = document.getElementById("btnGuardar");
  var btnImprimir = document.getElementById("btnImprimir");


  btnGuardar.disabled = true;
  btnImprimir.disabled = true;

      //console.log(Control);
        if (window.XMLHttpRequest) {
            var xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

              var Respuesta = xmlhttp.responseText.split("||");
              //alert(Respuesta);

              if (Respuesta[1] == ''){
                console.log("If")
                  Swal.fire({
                      title: "Número incorrecto!",
                      type: "error",
                      showCancelButton: false
                    });
                  //document.getElementById("noControl").focus();
                  noControl.value = '';
                  nombre.innerHTML = '';
                  grupo.innerHTML = '';
                  inscrito.innerHTML = '';
                  btnGuardar.disabled = true;
              }
              else{
                  nombre.innerHTML = Respuesta[3]+' '+ Respuesta[1]+ ' ' +Respuesta[2];
                  nombreAlumno.value = Respuesta[3]+' '+ Respuesta[1]+ ' ' +Respuesta[2];
                  grupo.innerHTML = Respuesta[4]+Respuesta[5];
                  grupoAlumno.value = Respuesta[4]+Respuesta[5];
                  inscrito.innerHTML = 'Materias inscritas : '+Respuesta[6];
                  var recs = 3 - Respuesta[6];

                  if (recs>0) document.getElementById("btnGuardar").disabled = false;

                  document.getElementById("imprimir").setAttribute("href", "javascript:imprime('imprimeCitas.php?noControl="+Control+"&nombre="+Respuesta[3]+' '+ Respuesta[1]+ ' ' +Respuesta[2]+"&grupo="+Respuesta[4]+Respuesta[5]+"')");
                  if (Respuesta[6]>0) document.getElementById("btnImprimir").disabled = false;

                  for(var i = 1; i <= recs; i++){
                    //console.log('extra'+i);
                    document.getElementById('extra'+i).style.display = 'block';
                  }
                  //document.getElementById("disponible").innerHTML = 'Disponibles : '+recs;
              }
            }
        }
        xmlhttp.open("GET","includes/buscaControl.php?control=" + Control,true);
        xmlhttp.send();
}