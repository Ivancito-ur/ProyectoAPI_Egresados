
const URLD = "http://localhost/ProyectoAPI_Egresados/";
$('.alert').hide();
  $(document).ready(function(){
    $('.alert').hide();
    
    //METODO PARA LA VERIFICACION DE DATOS DE ESTUDIANTE
    $("#ingresar").click(function(e){
        var codigo =$('#inpCodigo').val();
        var documento=$('#inputDocumento').val();
        var contraseña=$('#inputPassword').val();
        if(!verificarVacio([codigo, documento, contraseña])){
            console.log("llena todos los valores");
            return;
        }   
        httpRequest(URLD + "loginControl/validarEstudiante/" + codigo + "/" + documento + "/" + contraseña,function(){
          
          var resp = this.responseText;
          if(resp=="0"){
            $('.respuesta').text("Datos incorrectos!");
            $('.alert').show();
            return;
          }else if(resp=="1"){
            window.location.href = URLD + "estudianteControl" ;
          }

        });      
      e.preventDefault();
    });   

});


//VERIFICAR DATOS ADMINISTRADOR

function verificarDatosAdmin(e){
  e.preventDefault();
  var codigo =$('#inputCodigoA').val();
  var documento=$('#inputDocumentoA').val();
  var contraseña=$('#inputPasswordA').val();
  if(!verificarVacio([codigo, documento, contraseña])){
    console.log("llena todos los valores");
    return;
  }  
  httpRequest(URLD + "loginControl/validarDirector/" + codigo + "/" + documento + "/" + contraseña,function(){
          
    var resp = this.responseText;

    console.log(resp);
    if(resp=="0"){
      $('.respuesta').text("Datos incorrectos!");
      $('.alert').show();
      return;
    }else if(resp=="1"){
      window.location.href = URLD + "directorControl" ;
    }
  return false;
  });      
}


function loadE() {
  
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/login/loginE.php", true);
  xhttp.send();
  return false;
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
  return false;
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
  return false;
}



function llamadaEntrada(control, guia, guia2){
  //console.log(URLD + "personaControl/render/" + guia);
   window.location.href = URLD + control +"/render/" + guia  + "/" +  guia2;
}


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