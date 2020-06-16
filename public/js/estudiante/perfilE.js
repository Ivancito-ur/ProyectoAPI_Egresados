

const URLD = "http://localhost/ProyectoAPI_Egresados/";
var codigoNoticia="";
var codigoN="";

getUltimaNoticia();


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

  function loadOl() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/estudiante/listadoOfertas.php", true);
    xhttp.send();
    recargarOferta();
  }

  function loadDt(id) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/estudiante/detalleO.php", true);
    xhttp.send();
    httpRequest(URLD + "estudianteControl/getOferta/"+ id, function () {

      var response = this.responseText;
      var resp = response.split("\n").join("");
      let tasks = JSON.parse(resp);

      $("#inputEmpleo").val(tasks[0].empleo);
      $("#inputJornada").val(tasks[0].jornada);
      $("#inputSalario").val(tasks[0].salario);
      $("#inputTelefono").val(tasks[0].telefono);
      $("#exampleFormControlDescripcion").val(tasks[0].descripcion);
      $("#exampleFormControlRequerimientos").val(tasks[0].requerimientos);


    });
    
   
  }

  function loadEvpu() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/estudiante/eventosP.php", true);
    xhttp.send();
    recargarEvento();
  }

  function loadDtev(id) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/estudiante/eventoDt.php", true);
    xhttp.send();

    httpRequest(URLD + "estudianteControl/getEvento/"+ id, function () {

      var response = this.responseText;
      var resp = response.split("\n").join("");
    
      let tasks = JSON.parse(resp);

      $("#Titulo").val(tasks[0].titulo);
      $("#Lugar").val(tasks[0].lugar);
      $("#Fecha").val(tasks[0].fecha);
      $("#Hora").val(tasks[0].hora);
      $("#Resumen").val(tasks[0].resumen);


    });
   
  }

  function loadVn() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/estudiante/noticiasP.php", true);
    xhttp.send();
    recargarNoticias();
  }

  function loadDtnot(id) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/estudiante/noticiaDt.php", true);
    xhttp.send();

    httpRequest(URLD + "estudianteControl/getNoticia/"+ id, function () {

      var response = this.responseText;
      var resp = response.split("\n").join("");
    
      let tasks = JSON.parse(resp);

      $("#fecha").text(tasks[0].fecha_publicacion);
      $("#titulo").text(tasks[0].titulo);
      $("#cuerpo").val(tasks[0].cuerpo);
      $("#autor").text(tasks[0].autor);
    


    });
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
    var templateTesis="No ha realizado tesis de grado.";
    httpRequest(URLD + "estudianteControl/getTesis" ,function(){
      var resp = this.responseText;
      var aux = resp.split("\n").join("");
      const task = JSON.parse(aux);
      console.log(task[0].archivo);
      if(task[0].archivo!=null){
        templateTesis = `<div class="form-group">
        <div class="embed-responsive embed-responsive-16by9" id="pdf">
            <iframe class="embed-responsive-item" src="${task[0].archivo}" allowfullscreen></iframe>
        </div>
    </div>
    <div class="card-body">
        <h5 class="card-title">${task[0].titulo}</h5>
      
    </div>`;
      }
      $('#tesisEstudiante').html(templateTesis);
    });   
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
  var celular =$('#celular').val();
  var telefono =$('#telefono').val();
  var direccion=$('#direccion').val();
  var correo=$('#correo').val();
  var empresa=$('#empresa').val();
  if(celular=="" || telefono=="" || direccion=="" || correo==""){
    $('#respuestaACTU').text("Por favor, Introduce todos los valores");
    $('#alertACTU2').hide();  
    $('#alertACTU').show();
    return;
  }
  if (!$('#exampleCheck1').is(':checked')) {
    $('#respuestaACTU').text("Marca el boton check");
    $('#alertACTU2').hide();  
    $('#alertACTU').show();
    return;
    
  }
  $('#alertACTU').hide();
  httpRequest(URLD + "estudianteControl/actualizarDatos/" + celular + "/" + telefono + "/" + direccion + "/" + correo + "/" + empresa ,function(){
          
  var resp = this.responseText;
  console.log(resp);
  $('#alertACTU').hide();  
  $('#alertACTU2').show();
  window.location.href = URLD + "estudianteControl" ;
  
  });   
  return false;
  
}

function verificarVacio(param){
  for (let i = 0; i < param.length; i++) {
      if(param[i]==""){
          return false;
      }
  }
  return true;
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


//SEGUNDA ITERACION 


function permiso(e){
  e.preventDefault();
  var aux=0;
 if($('#exampleCheckPermiso').is(':checked')){
   aux=1;
 }
 if(aux==1){
  swal({
    title: "Permiso otorgado",
    text: "Las empresas podran visualizar tu hoja de Vida",
    icon: "success",
    button: "Ok",
  });
          
    httpRequest(URLD + "estudianteControl/otorgarPermiso/" + aux  ,function(){
                    
    var resp = this.responseText;
    console.log(resp);
                        
    }); 
           
 }else{
  swal({
    title: "Permiso denegado",
    text: "Las empresas no podran visualizar tu hoja de Vida",
    icon: "success",
    button: "Ok",
  });


  httpRequest(URLD + "estudianteControl/otorgarPermiso/" + aux  ,function(){
              
      var resp = this.responseText;
      console.log(resp);
        
          
    }); 
   
 }
 
 
}


function recargarOferta(){
  httpRequest(URLD + "estudianteControl/verificarOferta", function () {

    var response = this.responseText;
    var resp = response.split("\n").join("");
    let tasks = JSON.parse(resp);
    if(tasks[0].egresado==0){

      httpRequest(URLD + "estudianteControl/listarOferta", function () {
        var response = this.responseText;
        var resp = response.split("\n").join("");
        let tasks = JSON.parse(resp);
        var templateTesisOferta ="";
        var i = 0;
        for (var m = 0; m < tasks.length / 3; m++) {
          templateTesisOferta += `<div class="card-group">`
          for (var j = i; j < tasks.length; j++) {
            i++;
            templateTesisOferta += `
            <div class="card" style=" margin: 10px 10px 10px 10px;"> 
            <div class="card-header"><a onclick="loadDt(${tasks[j].id})"  href="#">${tasks[j].nombre}</a></div>
              <div class="card-body">
                <h5 class="card-title">nombre: ${tasks[j].empleo}e</h5>
                <p class="card-text">salario : $${tasks[j].salario}</p>
                <p class="card-text">telefono: ${tasks[j].telefono}</p>
                <span class="card-text">jornada: ${tasks[j].jornada}</span>
              </div>
            </div>      
            `;
            if ((i % 3) == 0) {
              templateTesisOferta += `</div>`;
              break;
            }
          }
        }
    
        templateTesisOferta += `</div>`
    
        $('.cajaO').html(templateTesisOferta);
    
      });
    }
  });

}

function recargarEvento(){
  httpRequest(URLD + "estudianteControl/verificarOferta", function () {

    var response = this.responseText;
    var resp = response.split("\n").join("");
    let tasks = JSON.parse(resp);

    var destinatario = "";
        if (tasks[0].egresado===0) {
          destinatario = "EGRESADOS";
        }
        else if (tasks[0].egresado===1) {
          destinatario = "ESTUDIANTES";
        }
        else {
          destinatario = "TODOS";
        }

        httpRequest(URLD + "estudianteControl/listarEvento/" + destinatario, function () {
          var response = this.responseText;
          var resp = response.split("\n").join("");
          let tasks = JSON.parse(resp);
          var templateEvento ="";
          var i = 0;
         for (var m = 0; m < tasks.length / 3; m++) {
          templateEvento += `<div class="card-group">`
            for (var j = i; j < tasks.length; j++) {
              i++;
              templateEvento += `
              <div class="card" style=" margin: 10px 10px 10px 10px;"> 
              <div class="card-header"><a onclick="loadDtev(${tasks[j].id})"  href="#">${tasks[j].titulo}</a></div>
                <div class="card-body">
                  <h5 class="card-title">${tasks[j].responsable}e</h5>
                  <p class="card-text">${tasks[j].fecha},${tasks[j].hora} </p>
                </div>
              </div>      
              `;
              if ((i % 3) == 0) {
                templateEvento += `</div>`;
                break;
              }
            }
          }
          templateEvento += `</div>`
          $('.cajaE').html(templateEvento);
        });
      
    });
  
}

function recargarNoticias(){

  httpRequest(URLD + "estudianteControl/verificarOferta", function () {

    var response = this.responseText;
    var resp = response.split("\n").join("");
    let tasks = JSON.parse(resp);
    var aux=0;
    var destinatario = "";

   if(aux==0){
    if (tasks[0].egresado===0) {
      destinatario = "EGRESADOS";
    }
    else if (tasks[0].egresado===1) {
      destinatario = "ESTUDIANTES";
    }}

          httpRequest(URLD + "estudianteControl/listarNoticias/" + destinatario, function () {

            var response = this.responseText;
            var resp = response.split("\n").join("");
            let tasks = JSON.parse(resp);
            let templateNoticias= '';
            for (var m = 0; m < tasks.length ; m++) {
              templateNoticias += 
              `
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Fecha de publicacion</th>
                            <th scope="col">Titulo de la noticia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>${tasks[m].fecha_publicacion}</td>
                            <td><a>${tasks[m].titulo}</a></td>
                            <td><a href="#" onclick="loadDtnot(${tasks[m].id})" style="font-size:14px">Leer mas...</a></td>
                        </tr>
                    </tbody>
                </table>
              
              `;
            }
            $('.cajaN').html(templateNoticias);
          });
  });

}


function getUltimaNoticia(){


  httpRequest(URLD + "estudianteControl/verificarOferta", function () {

    var response = this.responseText;
    var resp = response.split("\n").join("");
    let tasks = JSON.parse(resp);
    var aux=0;
    var destinatario = "";

    if (tasks[0].egresado===0) {
      destinatario = "EGRESADOS";
    }
    else if (tasks[0].egresado===1) {
      destinatario = "ESTUDIANTES";
    }


    httpRequest(URLD + "estudianteControl/getUltimaNoticia/" + destinatario, function () {
      var response = this.responseText;
      var resp = response.split("\n").join("");
      let task = JSON.parse(resp);
  

      Swal.fire({
        title: '<strong><u>Ultima noticia</u></strong>',
        icon: 'info',
        html:   `<p>${task[0].titulo}</p> `,
        showCloseButton: true,
        showCancelButton: true,
        focusConfirm: false,
        confirmButtonText:
          '<i class="fa fa-thumbs-up"></i> Bien!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
        cancelButtonText:
        `<i onclick="loadDtnot(${task[0].id})"class="fas fa-question-circle"> Quiero saber..</i>`,
        cancelButtonAriaLabel: 'Thumbs down'
      })
      
    });
  });
}

