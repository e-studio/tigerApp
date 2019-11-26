function buscarControl (Control) {
  console.log("aaaaaaaa");
    $.ajax({
  type: 'GET',
  url: 'includes/buscaControl.php?control=' + Control,
  success: function (data) {
      //var Respuesta = data.split("||");
      console.log("aaaaaaaaaaaa");
    //document.getElementById("nombre").value = Respuesta[1]; 
  }
});
}


/*
function buscaPaquete(codigo) {
      //alert(codigo);
        if (window.XMLHttpRequest) {
            var xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

              //var responseArray = xmlhttp.responseText;
              //alert(responseArray);
              var responseArray = xmlhttp.responseText.split("||");
              var costo = responseArray[0];
              var clases = responseArray[1];
              var caducidad = responseArray[2];

              document.getElementById("costo").value = costo;
              document.getElementById("clases").value = clases;
              document.getElementById("caducidad").value = caducidad;

              document.querySelector("#ventaTitulo").innerHTML = '$ ' + numeral(costo).format('0,0.00');
              document.querySelector('#btnComprar').disabled = false;
            }
        }
        xmlhttp.open("GET","includes/buscaPaquete.php?codigo="+codigo,true);
        xmlhttp.send();

    }

*/