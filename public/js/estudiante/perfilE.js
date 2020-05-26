
const URLD = "http://localhost/ProyectoAPI_Egresados/";
$('#alert').hide();   
$('#alert2').hide();   

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

  function loadTe() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/estudiante/verTesis.php", true);
    xhttp.send();
    return false;
  }


 

  function loadPe() {
    $("#contenedor").load("vista/estudiante/perfilE.php");
  }

//CARGAR EL PDF DEL ESTUDIANTE


$(document).ready(function(){  
 
     $(".formularioEstudiante").submit(function (e) {
           e.preventDefault();
            var parametros=new FormData($(this)[0]);
           $.ajax({
               type: "POST",
               url: URLD + "estudianteControl/cargarPDF" ,
               data: parametros,
               contentType: false, 
               processData: false,
               success: function (data) {
                 console.log(data);
                 if(data=="0"){
                  $('.respuesta').text("seleccione un archivo .pdf");
                  $('#alert2').hide();  
                  $('#alert').show();
                 }else if(data=="2"){
                  $('#alert').hide();  
                  $('#alert2').show();
                  window.location.href = URLD + "estudianteControl" ;
                  return;
                 }
               },
               error: function (r) {
                   alert("Error del servidor");
               }
           });
       });
});

$(document).on('change','input[type="file"]',function(){
	// this.files[0].size recupera el tamaño del archivo
	// alert(this.files[0].size);
	
	var fileName = this.files[0].name;
  var fileSize = this.files[0].size;
  var res = fileName.substring(0, 30);
  $('.nameArchivo').text(res);
		// recuperamos la extensión del archivo
    var ext = fileName.split('.').pop();
    console.log(fileName);
		
		// Convertimos en minúscula porque 
		// la extensión del archivo puede estar en mayúscula
		ext = ext.toLowerCase();
    
		// console.log(ext);
		switch (ext) {
			case 'pdf': break;
			default:
        $('.respuesta').text("error de extension, " + ext + "  "  + "Por favor seleccione un archivo .pdf");
        $('#alert2').hide();  
        $('#alert').show();
				this.value = ''; // reset del valor
				this.files[0].name = '';
	}
	
});

//actualizar los datos de un estudiante

function actualizarDatos(e){
  e.preventDefault();
  var telefono =$('#telefono').val();
  var direccion=$('#direccion').val();
  var correo=$('#correo').val();
  var empresa=$('#empresa').val();
  if(!verificarVacio([telefono, direccion, correo,empresa ])){
    $('#respuestaACTU').text("Por favor, Introduce todos los valores");
    $('#alertACTU2').hide();  
    $('#alertACTU').show();
    console.log("llena todos los valores");
    return;
  }
  httpRequest(URLD + "estudianteControl/actualizarDatos/" + telefono + "/" + direccion + "/" + correo + "/" + empresa ,function(){
          
  var resp = this.responseText;
  console.log(resp);
  $('#alertACTU').hide();  
  $('#alertACTU2').show();
  window.location.href = URLD + "estudianteControl" ;
  
  });   
  return false;
  
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