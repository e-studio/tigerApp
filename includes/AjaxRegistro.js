function findNoControl(Control) {
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
              }
              else{
                  document.getElementById("nombre").innerHTML = Respuesta[3]+' '+ Respuesta[1]+ ' ' +Respuesta[2];
                  document.getElementById("grupo").innerHTML = Respuesta[4]+Respuesta[5];
                  document.getElementById("inscrito").innerHTML = 'Materias inscritas : '+Respuesta[6];
              }
            }
        }
        xmlhttp.open("GET","includes/buscaControl.php?control=" + Control,true);
        xmlhttp.send();
    }

