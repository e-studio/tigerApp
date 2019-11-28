function findNoControl(Control, Tipo) {

  if (Tipo == 'extra') {
  document.getElementById('extra1').style.display = 'none';
  document.getElementById('extra2').style.display = 'none';
  document.getElementById('extra3').style.display = 'none';
  document.getElementById("btnGuardar").disabled = true;
  document.getElementById("btnImprimir").disabled = true;

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
                  Swal.fire({
                      title: "Número incorrecto!",
                      type: "error",
                      showCancelButton: false
                    });
                  //document.getElementById("noControl").focus();
                  document.getElementById("noControl").value = '';
                  document.getElementById("nombre").innerHTML = '';
                  document.getElementById("grupo").innerHTML = '';
                  document.getElementById("inscrito").innerHTML = '';
                  document.getElementById("btnGuardar").disabled = true;
              }
              else{
                  document.getElementById("nombre").innerHTML = Respuesta[3]+' '+ Respuesta[1]+ ' ' +Respuesta[2];
                  document.getElementById("nombreAlumno").value = Respuesta[3]+' '+ Respuesta[1]+ ' ' +Respuesta[2];
                  document.getElementById("grupo").innerHTML = Respuesta[4]+Respuesta[5];
                  document.getElementById("grupoAlumno").value = Respuesta[4]+Respuesta[5];
                  document.getElementById("inscrito").innerHTML = 'Materias inscritas : '+Respuesta[6];
                  var recs = 3 - Respuesta[6];

                  if (recs>0) document.getElementById("btnGuardar").disabled = false;

                  document.getElementById("imprimir").setAttribute("href", "javascript:imprime('imprimeCitas.php?noControl="+Control+"')");
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
  else if (Tipo == 'recurso') {
  document.getElementById('recurso1').style.display = 'none';
  document.getElementById('recurso2').style.display = 'none';
  document.getElementById("btnGuardar").disabled = true;
  document.getElementById("btnImprimir").disabled = true;

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
                  Swal.fire({
                      title: "Número incorrecto!",
                      type: "error",
                      showCancelButton: false
                    });
                  //document.getElementById("noControl").focus();
                  document.getElementById("noControl").value = '';
                  document.getElementById("nombre").innerHTML = '';
                  document.getElementById("grupo").innerHTML = '';
                  document.getElementById("inscrito").innerHTML = '';
                  document.getElementById("btnGuardar").disabled = true;
              }
              else{
                  document.getElementById("nombre").innerHTML = Respuesta[3]+' '+ Respuesta[1]+ ' ' +Respuesta[2];
                  document.getElementById("nombreAlumno").value = Respuesta[3]+' '+ Respuesta[1]+ ' ' +Respuesta[2];
                  document.getElementById("grupo").innerHTML = Respuesta[4]+Respuesta[5];
                  document.getElementById("grupoAlumno").value = Respuesta[4]+Respuesta[5];
                  document.getElementById("inscrito").innerHTML = 'Materias inscritas : '+Respuesta[6];
                  var recs = 2 - Respuesta[6];

                  if (recs>0) document.getElementById("btnGuardar").disabled = false;

                  document.getElementById("imprimir").setAttribute("href", "javascript:imprime('imprimeCitas.php?noControl="+Control+"')");
                  if (Respuesta[6]>0) document.getElementById("btnImprimir").disabled = false;

                  for(var i = 1; i <= recs; i++){
                    //console.log('extra'+i);
                    document.getElementById('recurso'+1).style.display = 'block';
                  }
                  //document.getElementById("disponible").innerHTML = 'Disponibles : '+recs;
              }
            }
        }
        xmlhttp.open("GET","includes/buscaControlRecursos.php?control=" + Control,true);
        xmlhttp.send();
  }

  
    }

