
const URLD = "http://localhost/faseBeta/";


  function loadE() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/login/loginE.php", true);
    xhttp.send();
  }

  function loadA() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/login/loginA.php", true);
    xhttp.send();
  }

  function loadEm() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/login/loginEm.php", true);
    xhttp.send();
  }


  $(document).ready(function(){
    $('.alert').hide();
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
          
          var resp = this.responseText;

          if(resp=="0"){
            $('.respuesta').text("Datos incorrectos!");
            $('.alert').show();
            return;
          }else{
            $('.alert').hide();
          }

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