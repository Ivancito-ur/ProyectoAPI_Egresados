const URLD="http://localhost/ProyectoAPI_Egresados/";
var lista = [];

function cargaHojaVida(){
$(document).on('change','input[type="file"]',function(){

	var fileName = this.files[0].name;
  var fileSize = this.files[0].size;
  var res = fileName.substring(0, 30);
  $('.nameArchivo').text(res);
		// recuperamos la extensión del archivo
    var ext = fileName.split('.').pop();
    console.log(fileName);
		ext = ext.toLowerCase();
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
}

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
     
      if(aux==1){
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
  e.preventDefault();
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
      if(aux==0){
        console.log("entre");
       $('#actu2').show();
       $('#actu1').hide();
       $('#alert2Codigo').hide();
       setTimeout(function() {
        $("#actu2").fadeOut(1500);
        },3000)
       return;
      }
     

     
    });
    
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

    //pruebaICFES("myChart");
  }


  
  function loadLi() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/director/listarEstudiantes.php", true);
    xhttp.send();

    httpRequest(URLD + "directorControl/ListarEstudiante",function(){
      const resp = this.responseText;
      var aux = resp.split("\n").join("");
      const task = JSON.parse(aux);
      let template = '';
      task.forEach(ta => {
        console.log(ta.nombres);
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
      $('#estudiantesCarga').html(template);

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
  
//COMPRACION DE LAS GRAFICAS GRAFICAS 

function getPrueba(){
    var busquedaCodigo = $('#buscarPrueba').val();
    if(busquedaCodigo==""){
     $('#alert').show();
     $('#alert2').hide();
     $('#cargaPrueba').text("Por favor, Introduzca el codigo estudiante que desea buscar.");
     $('#C1').hide();
     $('#C2').hide();
     $('#C3').hide(); 
      return;
    }
    httpRequest(URLD + "directorControl/getPrueba/" + busquedaCodigo ,function(){
      const resp = this.responseText;
      var aux = resp.split("\n").join("");
      if(aux==0){
        $('#alert').show();
        $('#alert2').hide();
        $('#cargaPrueba').text("Codigo de estudiante no encontrado, por favor verifique la informacion."); 
        $('#C1').hide();
        $('#C2').hide();
        $('#C3').hide(); 
       return;
      }
      $('#alert').hide();
      $('#C1').show();
      $('#C2').show();
      $('#C3').show();
      let ta = JSON.parse(resp);
      pruebaPRO(ta[0].lecturaPP, ta[0].razonamientoPP, ta[0].comunicacionPP, ta[0].competenciasPP, ta[0].inglesPP); 
      prueba11(ta[0].lecturaP11, ta[0].razonamientoP11, ta[0].naturalesP11, ta[0].competenciasP11, ta[0].inglesPP); 
      comparacionPruebas(ta[0].lecturaPP, ta[0].lecturaP11, ta[0].razonamientoPP, ta[0].razonamientoP11,ta[0].competenciasPP, ta[0].competenciasP11, ta[0].inglesPP, ta[0].inglesP11 );
      console.log("si");
    });   
  
}

function prueba11(lectura, razon, natu, compet, ingles){
  var ctx = document.getElementById('myChart11').getContext('2d');
  console.log(ctx);
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Lectura', 'Razonamiento', 'Naturales', 'Competencia', 'Ingles'],
        datasets: [{
            label: 'Puntaje ICFES',
            data: [lectura, razon, natu, compet, ingles],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
}

function pruebaPRO(lectura, razon, comuni, compet, ingles){
  var ctx = document.getElementById('myChart').getContext('2d');
  console.log(ctx);
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Lectura', 'Razonamiento', 'Comunicacion', 'Competencia', 'Ingles'],
        datasets: [{
            label: 'Puntaje ICFES',
            data: [lectura, razon, comuni, compet, ingles],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
}

function comparacionPruebas(lectu1, lectu2, razo1, razo2, compe1, compe2, ingles1, ingles2){
  var densityCanvas = document.getElementById("myChart12");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var saberPro = {
  label: 'Resultados Pruebas SaberPro',
  data: [lectu1, razo1, compe1, ingles1],
  backgroundColor: 'rgba(0, 99, 132, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-density"
};

var saber11 = {
  label: 'Resultados Pruebas Saber11',
  data: [lectu2, razo2, compe2, ingles2],
  backgroundColor: 'rgba(99, 132, 0, 0.6)',
  borderWidth: 0,
  yAxisID: "y-axis-gravity"
};

var planetData = {
  labels: ["Lectura", "Razonamiento",  "Competencia", "Ingles"],
  datasets: [saberPro, saber11]
};

var chartOptions = {
  scales: {
    xAxes: [{
      barPercentage: 1,
      categoryPercentage: 0.6
    }],
    yAxes: [{
      id: "y-axis-density"
    }, {
      id: "y-axis-gravity"
    }]
  }
};

var barChart = new Chart(densityCanvas, {
  type: 'bar',
  data: planetData,
  options: chartOptions
});
}



function enviarCorreo(e){
  e.preventDefault();
  var cuerpo = $('#cuerpo').val();
  var asunto = $('#asunto').val();

  opcion = $('input:radio[name=envio]:checked').val(); //Obtiene el valor sobre a quienes se envías
  // 0 para todos ; 1 para egresados ; 2 para estudiantes

  if(cuerpo=="" || asunto ==""){
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("Por favor, Llene todos los campos antes de enviar.");
    return;
  }
  $("body").css('cursor','wait');
  $('#alertCorreo2').show();
  $('#respuestaCorreo2').text("Enviando...");
  httpRequest(URLD + "directorControl/enviarCorreos/" + asunto + "/" + cuerpo + "/" + opcion,function(){
  $("body").css('cursor','default');
  const resp = this.responseText;
  $('#alertCorreo2').show();
  $('#alertCorreo').hide();
  $('#respuestaCorreo2').text("Enviado Correctamente");
  $('#cuerpo').val("");
  $('#asunto').val("");
  setTimeout(function() {
    $("#alertCorreo2").fadeOut(1500);
    },3000)
  });
  return false;
}



function cargaTesis(){
  $(document).on('change','input[type="file"]',function(){
	var fileName = this.files[0].name;
  var res = fileName.substring(0, 30);
  $('.nameArchivoTesis').text(res);
    var ext = fileName.split('.').pop();
    console.log(fileName);
		ext = ext.toLowerCase();
		switch (ext) {
      case 'pdf': 
      $('.respuestaTesis2').text("Cargado Correctamente");
      $('#alertTesis').hide();  
      $('#alertTesis2').show();
      break;
			default:
        $('.respuestaTesis').text("error de extension, " + ext + "  "  + "Por favor seleccione un archivo .pdf");
        $('#alertTesis2').hide();  
        $('#alertTesis').show();
				this.value = ''; 
				this.files[0].name = '';
	}
});
}


function guardarTesis(e){
  e.preventDefault();
  var codigo = $('#codigo').val();
  var titulo = $('#titulo').val();
  var gropu = $('#inputGroupFile01').val();
  if(codigo=="" || titulo =="" || gropu ==""){
    $('#alertTesis2').hide();
    $('#alertTesis').show();
    $('#respuestaTesis').text("Por favor, Llene todos los campos antes de cargar.");
    return;
  }
  //httpRequest(URLD + "directorControl/hola/" + lista + "/" + titulo + "/" + gropu,function(){
    //console.log(this.responseText);
    //return;
  //});


  $('#alertTesis').hide();
  $('#alertTesis2').show();
  

  return false;
}


function explodeCodigo(){
  var codigo = $('#codigo').val();
 
}


  
