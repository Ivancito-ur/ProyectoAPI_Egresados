
const URLD = "http://localhost/faseBeta/";
  function loadE() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "loginE.html", true);
    xhttp.send();
  }

  function loadA() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "loginA.html", true);
    xhttp.send();
  }

  function loadEm() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "loginEm.html", true);
    xhttp.send();
  }


  $(document).ready(function(){
    //METODO PARA LA VERIFICACION DE DATOS DE PERSONA
    $("#ingresar").click(function(e){
        var codigo =$('#inpCodigo').val();
        var documento=$('#inputDocumento').val();
        var contraseña=$('#inputPassword').val();
        if(!verificarVacio([codigo, documento, contraseña])){
            console.log("llena todos los valores");
            return;
        }   
        httpRequest(URLD + "estudianteControl/validarEstudiante/" + codigo + "/" + documento + "/" + contraseña,function(){
          
          console.log("volvi: " + " " + this.responseText);
        });      
      e.preventDefault();
    });   
});



function httpRequest(url, callback){
    const http = new XMLHttpRequest();
    http.open("GET", url);
    http.send();
    http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            callback.apply(http);
        }
    }
}

function verificarVacio(param){
  for (let i = 0; i < param.length; i++) {
      if(param[i]==""){
          return false;
      }
  }
  return true;
}