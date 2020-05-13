
const URLD = "http://localhost/ProyectoAPI_Egresados/";

function loadAc() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/estudiante/actualizar.php", true);
    xhttp.send();
    return false;
  }

  function loadPe() {
    $("#contenedor").load("vista/estudiante/perfilE.php");
  }


function actualizarDatos(e){
  e.preventDefault();
  var telefono =$('#telefono').val();
  var direccion=$('#direccion').val();
  var correo=$('#correo').val();
  var empresa=$('#empresa').val();
  if(!verificarVacio([telefono, direccion, correo,empresa ])){
    console.log("llena todos los valores");
    return;
  }
  httpRequest(URLD + "estudianteControl/actualizarDatos/" + telefono + "/" + direccion + "/" + correo + "/" + empresa ,function(){
          
  var resp = this.responseText;
  console.log(resp);
  window.location.href = URLD + "estudianteControl" ;
  return false;

  });     
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