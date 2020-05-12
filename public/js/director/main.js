const URLD="http://localhost/ProyectoAPI_Egresados/";

$(document).ready(function(){  
   $('#alert').hide();   
   $('#alert2').hide();   
      $(".formularioCompleto").submit(function (e) {
            e.preventDefault();
            var parametros=new FormData($(this)[0]);
            $.ajax({
                type: "POST",
                url: URLD + "directorControl/cargarExcel" ,
                data: parametros,
                contentType: false, 
                processData: false,
                success: function (data) {
                    if(data==="true"){
                    $('#alert').hide();  
                    $('#alert2').show();
                    return;
                
                }
                    $('.respuesta').text(data);
                    $('#alert2').hide();  
                    $('#alert').show();
                   
                },
                error: function (r) {
                    alert("Error del servidor");
                }
            });
        });
});

function loadSe() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/director/seguimiento.php", true);
    xhttp.send();
  }

  function loadCa() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/director/cargar.php", true);
    xhttp.send();
  }

  function loadTe() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/director/tesis.php", true);
    xhttp.send();
  }

  function loadPr() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/director/pruebas.php", true);
    xhttp.send();
  }
