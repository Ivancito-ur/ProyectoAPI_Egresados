const URLD="http://localhost/ProyectoAPI_Egresados/";

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
      case 'xlsx':
      case 'xls': 
      $('.respCarga').text("Cargado Correctamente");
      $('#alert').hide();  
      $('#alert2').show();
      break;
			default:
        $('.respuesta').text("error de extension, " + ext + "  "  + "Por favor seleccione un archivo .xls/xlsx");
        $('#alert2').hide();  
        $('#alert').show();
				this.value = ''; // reset del valor
				this.files[0].name = '';
	}
	
});

function cargaDatos(e){
  $('#actu2').hide();
  $('#actu1').hide();
    var busquedaCodigo = $('#busquedaCodigo').val();
    if(busquedaCodigo==""){
      $('#alertCodigo').show();
      $('#alert2Codigo').hide();
      $('.respuesta').text("Introduzca el codigo estudiante"); 
      return;
    }
    httpRequest(URLD + "directorControl/buscarCodigo/" + busquedaCodigo ,function(){
     
    
      
      const resp = this.responseText;
      var aux = resp.split("\n").join("");
      console.log(aux);
      if(aux==="0"){
       $('.respuesta').text("Codigo no registrado!");
       $('#alert2Codigo').hide();
       $('#alertCodigo').show();
       return;
      }
      
      const task = JSON.parse(resp);
      $("#nombre").val(task[0].nombres);
      $("#codigo").val(task[0].codigoEstudiante);
      $("#fechai").val(task[0].fechaIngreso);
      $("#fechae").val(task[0].fechaEgreso);
      
      $('#busquedaCodigo').val("");

        $('#alertCodigo').hide();
        $('#alert2Codigo').show();
    });   
  
}

function actualizarFecha(e){
 
    var fechae = $('#fechae').val();
    var codigo = $("#codigo").val();
    if(fechae==""  || !$('#exampleCheck1').is(':checked')){
      return;
    }
    if(codigo==""){
      $('#respuestaActualizar').text("Busca primero un estudiante.");
      $('#actu2').hide();
      $('#actu1').show();
      return;
    }
    httpRequest(URLD + "directorControl/actualizarFecha/" + fechae + "/" + codigo ,function(){
     
      const resp = this.responseText;
      var aux = resp.split("\n").join("");
      console.log(aux);
      if(aux=="0"){
       $('#actu2').show();
       $('#actu1').hide();
       return;
      }
      $('#respuestaActualizar').text("Recuerda:(año-mes-dia) Formato de fecha");
      $('#actu2').hide();
      $('#actu1').show();

     
    });
    e.preventDefault();
    return false;
 
}

function cargarExcel(e, p){
  e.preventDefault();
  var parametros=new FormData($(".formularioCompleto")[0]);
  $("body").css('cursor','wait')
  $.ajax({
      type: "POST",
      url: URLD + "directorControl/cargarExcel" ,
      data: parametros,
      contentType: false, 
      processData: false,
      success: function (data) {
      var sin_salto = data.split("\n").join("");
      console.log(sin_salto);
      if(sin_salto=="si"){

          $('.respCarga').text("Guardado Correctamente !");
          $('.nameArchivo').text("...");
          $('#alert').hide();  
          $('#alert2').show();
          $("body").css('cursor','default');
          window.location.href = URLD + "directorControl" ;
          return;
      
      }
          $('.respuesta').text(data);
          $('#alert2').hide();  
          $('#alert').show();
          $("body").css('cursor','default');
      },
      error: function (r) {
          alert("Error del servidor");
      }
});
}




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


  
  function loadLi() {
    console.log("1");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    console.log("2");
    xhttp.open("GET", "vista/director/listarEstudiantes.php", true);
    xhttp.send();

    httpRequest(URLD + "directorControl/ListarEstudiante",function(){
      const resp = this.responseText;
      var aux = resp.split("\n").join("");
      const task = JSON.parse(aux);
      let template = '';
      task.forEach(ta => {
        template += `<tr>
        <td >${ta.codigoEstudiante}</td>
        <td >${ta.documento}</td>
        <td >${ta.nombres}</td>
        <td >${ta.apellidos}</td>
        <td >${ta.celular}</td>
        <td >${ta.correoInstitucional}</td>
        <td >${ta.fechaIngreso}</td>
        <td >${ta.fechaEgreso}</td>
        </tr>`
      });
      //console.log(template);
      $('tbody').html(template);

    });
  }


  function capturar(e){
    let busca = $('#buscador').val();
    httpRequest(URLD + "directorControl/buscarEstudiante/" + busca,function(){
      var response = this.responseText;
      if (!response.error) {
        let tasks = JSON.parse(response);
        let template = '';
        tasks.forEach(ta => {
          template += `<tr>
        <td >${ta.codigoEstudiante}</td>
        <td >${ta.documento}</td>
        <td >${ta.nombres}</td>
        <td >${ta.apellidos}</td>
        <td >${ta.celular}</td>
        <td >${ta.correoInstitucional}</td>
        <td >${ta.fechaIngreso}</td>
        <td >${ta.fechaEgreso}</td>
        </tr>`
      });
      //console.log(template);
      $('tbody').html(template);
      }
    



    });
       
        
      

  }


  

    
    /*if ($('#buscador').val()) {
     
    }*/
  



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
  

  
