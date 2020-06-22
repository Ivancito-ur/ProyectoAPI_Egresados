

const URLD = "http://localhost/ProyectoAPI_Egresados/";
let templateCodigos = '';
var lista = [];
var extTesis = "";
var extConvenio = "";
var consta = "";
let templateTesis = '';
var validacionT = "Promedio";
var globalIdEvento="";
var globalIdNoticia="";
var gropu="";




function recargaTesis() {
  httpRequest(URLD + "directorControl/getTesis", function () {
    var response = this.responseText;
    var resp = response.split("\n").join("");
    let tasks = JSON.parse(resp);
    var i = 0;
    for (var m = 0; m < tasks.length / 3; m++) {
      templateTesis += ` <div style="margin-bottom:10px"class="card-group">`
      for (var j = i; j < tasks.length; j++) {
        i++;
        templateTesis += `
                <div class="card">
                    <div class="form-group">
                        <div class="embed-responsive embed-responsive-16by9" id="pdf">
                            <iframe class="embed-responsive-item" src="${tasks[j].archivo}" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${tasks[j].titulo}</h5>
                        
                    </div>
                </div>`;
        if ((i % 3) == 0) {
          templateTesis += `</div>`;
          break;
        }
      }
    }

    templateTesis += `</div>`

    $('.caja').html(templateTesis);

  });
}

function cargaHojaVida() {
  $(document).on('change', 'input[type="file"]', function () {

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
        $('.respuesta').text("error de extension, " + ext + "  " + "Por favor seleccione un archivo .xls/xlsx");
        $('#alert2').hide();
        $('#alert').show();
        this.value = ''; // reset del valor
        this.files[0].name = '';
    }

  });
}

function cargaDatos(e) {
  $('#actu2').hide();
  $('#actu1').hide();
  var busquedaCodigo = $('#busquedaCodigoF').val();

  if (parseInt(busquedaCodigo, 10) < 1) {
    $('#alertCodigo').show();
    $('#alert2Codigo').hide();
    $('.respuesta').text("Introduzca un valor numerico positivo");
    return;
  }
  if (busquedaCodigo == "") {
    $('#alertCodigo').show();
    $('#alert2Codigo').hide();
    $('.respuesta').text("Introduzca Codigo a buscar");
    return;
  }
  httpRequest(URLD + "directorControl/buscarCodigo/" + busquedaCodigo, function () {
    const resp = this.responseText;
    var aux = resp.split("\n").join("");
    console.log(aux);

    if (aux == 1) {
      $('#alert2Codigo').hide();
      $('#alertCodigo').show();
      $('.respuesta').text("¡Codigo no registrado!");
      return;
    }


    const task = JSON.parse(resp);

    $("#nombreF").val(task[0].nombres);
    $("#codigoF").val(task[0].codigoEstudiante);
    $("#fechaiF").val(task[0].fechaIngreso);
    if (task[0].fechaEgreso != '0000-00-00') {
      $('#alert2Codigo').hide();
      $('#alertCodigo').show();
      $('.respuesta').text("¡Usuario con fecha ya actualizada!");
      $("#fechaeF").val(task[0].fechaEgreso);
      $("#fechaeF").prop("disabled", true);
      return;
    }
    $("#fechaeF").val(task[0].fechaEgreso);
    $("#fechaeF").prop("disabled", false);

    $('#busquedaCodigoF').val("");
    $("#nombreF").val("");
    $("#codigoF").val("");
    $("#fechaiF").val("");

    $('#alertCodigo').hide();
    $('#alert2Codigo').show();
  });

}

function cargarDatosActualizar(e) {
  var codigo = $('#busquedaCodigo').val();
  if (codigo == "") {
    $('.respuestaACtu').text("Por favor ingrese el codigo.");
    $('#actualizarE2').hide();
    $('#actualizarE').show();
    return;
  }

  httpRequest(URLD + "directorControl/ListarEstudianteActualizar/" + codigo, function () {

    const resp = this.responseText;
    var aux = resp.split("\n").join("");
    console.log(aux);
    $('#actualizarE').hide();
    const task = JSON.parse(aux);
    $("#codigo").val(task[0].codigoEstudiante);
    $("#nombre").val(task[0].nombres);
    $("#apellido").val(task[0].apellidos);
    $("#fechai").val(task[0].fechaIngreso);
    $("#promedio").val(task[0].promedio);
    $("#codigoPro").val(task[0].idPro);
    $("#codigo11").val(task[0].id11);
    $("#semestre").val(task[0].semestreCursado);
    $("#materias").val(task[0].materiasAprobadas);


  });

}

function actualizarDatosEstudiante(e) {
  e.preventDefault();
  var codigoP = $('#busquedaCodigo').val();
  var codigo = $("#codigo").val();
  var nombre = $("#nombre").val();
  var apellido = $("#apellido").val();
  var fechaI = $("#fechai").val();
  var promedio = $("#promedio").val();
  var codigoPro = $("#codigoPro").val();
  var codigo11 = $("#codigo11").val();
  var semestre = $("#semestre").val();
  var materias = $("#materias").val();

  if (codigo == "" || nombre == "" || apellido == "" || fechaI == "" || promedio == "" || codigoPro == "" || codigo11 == "" || semestre == "" || materias == "") {
    $('#garRespuesta').text("Por favor llene todos los valores");
    $('#gar2').hide();
    $('#gar').show();
    return;
  }

  httpRequest(URLD + "directorControl/validarCodigoPrueba/" + codigoPro + "/" + codigo11, function () {

    const resp = this.responseText;
    var aux = resp.split("\n").join("");
    if (aux == 1) {
      $('#garRespuesta').text("Codigo de prueba saberPro no registrado");
      $('#gar2').hide();
      $('#gar').show();
      return;
    }
    if (aux == 2) {
      $('#garRespuesta').text("Codigo de prueba saber11 no registrado");
      $('#gar2').hide();
      $('#gar').show();
      return;
    }
    httpRequest(URLD + "directorControl/EstudianteActualizar/" + codigoP + "/" + codigo + "/" + nombre + "/" + apellido + "/" + fechaI + "/" + promedio + "/" + codigoPro + "/" + codigo11 + "/" + semestre + "/" + materias, function () {

      const resp = this.responseText;
      var aux = resp.split("\n").join("");
      console.log(aux);
      $('#gar').hide();
      $('#gar2').show();
      setTimeout(function () {
        $("#gar2").fadeOut(1500);
      }, 3000)

      $("#codigo").val("");
      $("#nombre").val("");
      $("#apellido").val("");
      $("#fechai").val("");
      $("#promedio").val("");
      $("#codigoPro").val("");
      $("#codigo11").val("");
      $("#semestre").val("");
      $("#materias").val("");
      return;
    });

  });

  return false;



}

function actualizarFecha(e) {
  e.preventDefault();
  var fechae = $('#fechaeF').val();
  var codigo = $("#codigoF").val();
  if (codigo == "") {
    $('#respuestaActualizar').text("Busca primero un estudiante.");
    $('#actu2').hide();
    $('#actu1').show();
    return;
  }
  if (fechae == "" || !$('#exampleCheck1F').is(':checked')) {
    $('#respuestaActualizar').text("Marca el boton check y/o asigna una fecha.");
    $('#actu2').hide();
    $('#actu1').show();
    return;

  }

  httpRequest(URLD + "directorControl/actualizarFecha/" + fechae + "/" + codigo, function () {

    const resp = this.responseText;
    var aux = resp.split("\n").join("");
    console.log(aux);
    if (aux == 0) {
      console.log("entre");
      $('#actu2').show();
      $('#actu1').hide();
      $('#alert2Codigo').hide();
      setTimeout(function () {
        $("#actu2").fadeOut(1500);
      }, 3000)
      return;
    }



  });

  return false;

}

function cargarExcel(e, p) {
  e.preventDefault();
  var parametros = new FormData($(".formularioCompleto")[0]);
  $("body").css('cursor', 'wait')
  $.ajax({
    type: "POST",
    url: URLD + "directorControl/cargarExcel",
    data: parametros,
    contentType: false,
    processData: false,
    success: function (data) {
      var sin_salto = data.split("\n").join("");
      console.log(sin_salto);
      if (sin_salto == "si") {

        $('.respCarga').text("Guardado Correctamente !");
        $('.nameArchivo').text("...");
        $('#alert').hide();
        $('#alert2').show();
        $("body").css('cursor', 'default');
        window.location.href = URLD + "directorControl";
        return;

      }
      $('.respuesta').text(data);
      $('#alert2').hide();
      $('#alert').show();
      $("body").css('cursor', 'default');
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

function loadAc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/actualizacion.php", true);
  xhttp.send();
}

function loadR() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/reportes.php", true);
  xhttp.send();


}

function loadAe() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/agregarE.php", true);
  xhttp.send();


}

function loadLe() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/listarEmpresa.php", true);
  xhttp.send();
  setTimeout(function () {
    recargarEmpresa();
  }, 100)
 
}

function loadEn() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/encuesta.php", true);
  xhttp.send();


}

function loadEv() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/eventos.php", true);
  xhttp.send();


}

function loadNo() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/agregarN.php", true);
  xhttp.send();
  
  
}

function loadLno() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/listarNoticia.php", true);
  xhttp.send();
  recargarNoticias();
 
  
}

function loadAnot(id,fecha,titulo,cuerpo,autor, destinatario) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/actualizarN.php", true);
  xhttp.send();
  setTimeout(function () {
    cargaDatosNoticia(id,fecha,titulo,cuerpo,autor, destinatario);
  }, 100)
  
  
  
}

function loadLev() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/listadoEvento.php", true);
  xhttp.send();
  recargarEventos();
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
  templateCodigos = '';
  lista = [];
  consta = '';
  templateTesis = '';
  recargaTesis();


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

function loadAev(id, titulo,direccion,fecha,hora,ciudad,descripcion,responsable, destinatario) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/actualizarEvento.php", true);
  xhttp.send();
  setTimeout(function () {
    cargaDatosEvento(id, titulo,direccion,fecha,hora,ciudad,descripcion,responsable, destinatario);
  }, 100)
  
 
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
  
}

function cargarEstudiantes(tipo){
  $('#buscador').val("");
  httpRequest(URLD + "directorControl/ListarEstudiante/" + tipo, function () {
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
        <td >${ta.promedio}</td>
        </tr>`
    });
    //console.log(template);
    $('#estudiantesCarga').html(template);
 
  });
}

function capturar(e) {
  let busca = $('#buscador').val();
  if($('#buscador').val()!=""){
  httpRequest(URLD + "directorControl/buscarEstudiante/" + busca, function () {
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
  });}
}

function httpRequest(url, callback) {
  const http = new XMLHttpRequest();
  http.open("GET", url);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      callback.apply(http);
    }
  }
}

//COMPRACION DE LAS GRAFICAS GRAFICAS 
function getPrueba() {
  var busquedaCodigo = $('#buscarPrueba').val();
  if (busquedaCodigo == "" || parseInt(busquedaCodigo, 10) < 1) {
    $('#alert').show();
    $('#alert2').hide();
    $('#cargaPrueba').text("Por favor, Introduzca el codigo estudiante, dato numerico positivo.");
    $('#C1').hide();
    $('#C2').hide();
    $('#C3').hide();
    return;
  }
  httpRequest(URLD + "directorControl/getPrueba/" + busquedaCodigo, function () {
    const resp = this.responseText;
    var aux = resp.split("\n").join("");
    if (aux == 0) {
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
    $("#name").val(ta[0].nombre);
    $("#apellido").val(ta[0].apellido);
    pruebaPRO(ta[0].lecturaPP, ta[0].razonamientoPP, ta[0].comunicacionPP, ta[0].competenciasPP, ta[0].inglesPP);
    prueba11(ta[0].lecturaP11, ta[0].razonamientoP11, ta[0].naturalesP11, ta[0].competenciasP11, ta[0].inglesPP);
    comparacionPruebas(ta[0].lecturaPP, ta[0].lecturaP11, ta[0].razonamientoPP, ta[0].razonamientoP11, ta[0].competenciasPP, ta[0].competenciasP11, ta[0].inglesPP, ta[0].inglesP11);
  });

}

function prueba11(lectura, razon, natu, compet, ingles) {


  var ctx = document.getElementById('myChart11');


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

function pruebaPRO(lectura, razon, comuni, compet, ingles) {
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

function comparacionPruebas(lectu1, lectu2, razo1, razo2, compe1, compe2, ingles1, ingles2) {
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
    labels: ["Lectura", "Razonamiento", "Competencia", "Ingles"],
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

function enviarCorreo(e) {
  e.preventDefault();
  var cuerpo = $('#cuerpo').val();
  var asunto = $('#asunto').val();

  opcion = $('input:radio[name=envio]:checked').val(); //Obtiene el valor sobre a quienes se envías
  // 0 para todos ; 1 para egresados ; 2 para estudiantes

  if (cuerpo == "" || asunto == "") {
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("Por favor, Llene todos los campos antes de enviar.");
    return;
  }
  $("body").css('cursor', 'wait');
  $('#alertCorreo2').show();
  $('#alertCorreo').hide();
  $('#respuestaCorreo2').text("Enviando...");
  httpRequest(URLD + "directorControl/enviarCorreos/" + asunto + "/" + cuerpo + "/" + opcion, function () {
    $("body").css('cursor', 'default');
    const resp = this.responseText;
    $('#alertCorreo2').show();
    $('#alertCorreo').hide();
    $('#respuestaCorreo2').text("Enviado Correctamente");
    $('#cuerpo').val("");
    $('#asunto').val("");
    setTimeout(function () {
      $("#alertCorreo2").fadeOut(1500);
    }, 3000)
  });
  return false;
}

//se carga el archivo(hasta ahora en la vista inicial)
function cargaTesis() {
  $(document).on('change', 'input[type="file"]', function () {
    var fileName = this.files[0].name;
    var res = fileName.substring(0, 30);
    $('.nameArchivoTesis').text(res);
    extTesis = fileName.split('.').pop();
    console.log(fileName);
    extTesis = extTesis.toLowerCase();
    switch (extTesis) {
      case 'pdf':
        $('.respuestaTesis2').text("Cargado Correctamente");
        $('#alertTesis').hide();
        $('#alertTesis2').show();
        break;
      default:
        $('.respuestaTesis').text("error de extension, " + extTesis + "  " + "Por favor seleccione un archivo .pdf");
        $('#alertTesis2').hide();
        $('#alertTesis').show();
        this.value = '';
        this.files[0].name = '';
    }
  });
}

//se verifica los datos antes de guardar la tesis
function guardarTesis(e) {
  e.preventDefault();
  var titulo = $('#titulo').val();
   gropu = $('#inputGroupFile01').val();
  if (lista.length === 0) {
    $('#alertTesis2').hide();
    $('#alertTesis').show();
    $('#respuestaTesis').text("Por favor, Agregue los codigos correspondientes a la tabla.");
    console.log(lista[0]);
    return;
  }

  if (titulo == "") {
    $('#alertTesis2').hide();
    $('#alertTesis').show();
    $('#respuestaTesis').text("Por favor, Llene todos los campos antes de cargar.");
    console.log(lista[0]);
    return;
  }
  if (extTesis != "pdf" || gropu == "") {
    $('#alertTesis2').hide();
    $('#alertTesis').show();
    $('#respuestaTesis').text("error de extension, " + extTesis + "  " + "Por favor seleccione un archivo .pdf");
    return;
  }
  $('#alertTesis').hide();
  $('#alertTesis2').hide();
  enviarTesis(event);
  return false;
}

//En esta seccion del codigo se carga la tesis del estudiante y/o estudiantes asigandos
function enviarTesis(e) {
  e.preventDefault();
  for (let index = 0; index < lista.length; index++) {
    const element = lista[index];
    if (consta == "") {
      consta = element;
    } else {
      consta = consta + "/" + element;
    }
  }
  $("#listCodigos").val(consta);
  var parametros = new FormData($(".formularioTesis")[0]);
  $.ajax({
    type: "POST",
    url: URLD + "directorControl/insertTesis",
    data: parametros,
    contentType: false,
    processData: false,
    success: function (data) {
      var aux = data.split("\n").join("");
      if (aux == 0) {
        templateCodigos = '';
        consta = '';
        for (let index = 0; index < lista.length; index++) {
          $("#" + lista[index]).remove();
        }
        lista = [];
        $(".nameArchivoTesis").text("...");
        $("#titulo").val("");
        $('#alertTesis').hide();
        $('#alertTesis2').show();
        $('#respuestaTesis2').text("Cargado Correctamente");
        $("#inputGroupFile01").val("");
        
        templateTesis = '';
        //extTesis="";
        gropu="";
        $('.caja').html("");
        recargaTesis();
        setTimeout(function () {
          $("#alertTesis2").fadeOut(1500);
        }, 3000);}
      return;
    },
    error: function (r) {
      alert("Error del servidor");
    }
  });
}

//En esta seccion del codigo se verifica la existencia tanto en la tabla estudiante_tesis , como en la tabla estudiante
function explodeCodigo(e) {
  e.preventDefault();
  var codigo = $('#codigo').val();
  if (parseInt(codigo, 10) < 1 || codigo == "") {
    $('.verificarC').text("Introduzca un valor numerico postivo");
    return;
  }

  httpRequest(URLD + "directorControl/verificarEstudiante/" + codigo, function () {
    var validacion = 0;
    const response = this.responseText;
    var aux = response.split("\n").join("");
    let tasks = JSON.parse(response);
    if (aux == 1) {
      $('.verificarC').text("El codigo ya tiene asignada una tesis.");
      return
    }
    if (aux == 0) {
      $('.verificarC').text("codigo inexistente");
      return;
    }
    $('#tblUsuario tr').each(function () {
      var pk = $(this).find("td").eq(0).html();
      if (pk == tasks[0].codigoEstudiante) {
        validacion = 1;
      }
      return;
    });
    if (validacion == 0) {
      $('#codigo').val("");
      $('.verificarC').text("");
      tasks.forEach(ta => {
        lista.push(ta.codigoEstudiante);
        templateCodigos += `<tr id="${ta.codigoEstudiante}">
      <td >${ta.codigoEstudiante}</td>
      <td >${ta.nombres}</td>
      <td >${ta.apellidos}</td>
      <td><a href="#" onclick="return removerCodigo(${ta.codigoEstudiante})" class="btn btn-primary btn-lg active" role="button" aria-pressed="true"
      style="background-color: #dd4b39; border-color: #dd4b39;">Remover</a></td>
      </tr>`
      });
      $('#agregar').html(templateCodigos);
    }
  });

  return false;

}

function removerCodigo(cod) {
  removeItemFromArr(lista, cod);
  $("#" + cod).remove();
  templateCodigos = "";



  return false;

}



//SEGUNDA ITERACION

function graficaReport11(lectura, razon, natu, compet, ingles, lecturaP, razonP, comuniP, competP, inglesP) {

  var densityCanvas = document.getElementById("popChart");


  Chart.defaults.global.defaultFontFamily = "Lato";
  Chart.defaults.global.defaultFontSize = 18;

  var densityDatas = {

    data: [lectura, razon, natu, compet, ingles],
    label: 'Pruebas saber 11',
    backgroundColor: 'rgba(0, 99, 132, 0.6)',
    borderWidth: 0,
    yAxisID: "y-axis-density"
  };

  var gravityDatas = {
    label: 'Pruebas saber Pro',
    data: [lecturaP, razonP, comuniP, competP, inglesP],
    backgroundColor: 'rgba(99, 132, 0, 0.6)',
    borderWidth: 0,
    yAxisID: "y-axis-gravity"
  };

  var planetDatas = {
    labels: ['Lectura', 'Razonamiento', 'Naturales/Comunicacion', 'Competencia', 'Ingles'],
    datasets: [densityDatas, gravityDatas]
  };

  var chartOptionsa = {
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
    data: planetDatas,
    options: chartOptionsa
  });

}

function generarReporteGrafica(e) {

  var estudiante = $('#exampleFormControlSelect1').val();
  var tipoReporte = $('#exampleFormControlSelect2').val();
  var direccion;

  if (estudiante == "Egresado") {

    if (tipoReporte == "Notas pruebas Saber 11 y Pro") {
      direccion = "directorControl/promedioNotasAlumno";
    }


  }


  if (estudiante == "Alumno") {

    if (tipoReporte == "Notas pruebas Saber 11 y Pro") {
      direccion = "directorControl/promedioNotasEgresado";
    }


  }

  httpRequest(URLD + direccion, function () {
    var resp = this.responseText;
    let ta = JSON.parse(resp);

    graficaReport11(ta[0].lectura_critica, ta[0].matematicas, ta[0].naturales, ta[0].sociales_ciudadanas, ta[0].ingles,
      ta[0].lectura_criticaPro, ta[0].razonamiento_cuantitativoPro, ta[0].comunicacion_escritaPro, ta[0].competencias_ciudadanaPro, ta[0].inglesPro);



  });
  $("#informe").show();
  $("#repor").hide();
  setTimeout(function () {
    generarReporte();
    $("#informe").fadeOut(2002);
  }, 3000)


}

function generarReporte() {
  var estudiante = $('#exampleFormControlSelect1').val();
  var tipoReporte = $('#exampleFormControlSelect2').val();
  if (tipoReporte != "Promedio") {
    var canvas = document.getElementById("popChart");
    var image = canvas.toDataURL();

    $.ajax({
      url: URLD + "directorControl/obtenerImagen",
      data: {
        base64: image
      },
      type: "post",
      success: function (data) {
        console.log(data);
      },
      complete: function () {
        console.log("Todo listo");
      }
    });
  }
  $("#repor").show();
  window.open(URLD + "directorControl/generarReporte/" + estudiante + "/" + tipoReporte);




}

function removeItemFromArr(arr, item) {
  var i = arr.indexOf(item);

  if (i !== -1) {
    arr.splice(i, 1);
  }
}

function insertarEvento(e) {
  e.preventDefault();

  var titulo = $('#titulo').val();
  var direccion = $('#direccion').val();
  var ciudad = $('#ciudad').val();
  var fecha= $('#fecha').val();
  var hora = $('#hora').val();
  var responsable =$('#responsable').val();
  var descripcion = $('#descripcion').val();
  var opcion = $('input:radio[name=envio]:checked').val(); 
  var foto = fileValidation(document.getElementById('foto'));    

  if(foto=="" ||  titulo=="" || direccion=="" || ciudad=="" || fecha=="" || hora=="" || responsable=="" || descripcion=="" ){

    $('#alertCorreo').show();
    $('#alertCorreo2').hide();
    $('#respuestaCorreo').text("Por favor llene todos los campos");
    return;

  }
  var parametros = new FormData($(".formularioFoto")[0]);
  $.ajax({
    url: URLD + "directorControl/subirImagen",
    data: parametros,
    type: "post",
    contentType: false,
    processData: false,
    success: function (data) {
      console.log(data);
    },
    complete: function () {
      console.log("Todo listo");
    }
  });

  $("body").css('cursor', 'wait');

  $('#alertCorreo2').show();
  $('#alertCorreo').hide();
  $('#respuestaCorreo2').text("Enviando...");
  httpRequest(URLD + "directorControl/crearEvento/" + titulo + "/" + direccion + "/" + ciudad + "/" +
  fecha + "/" + hora + "/" + responsable + "/" + descripcion + "/" + opcion, function () {
    $("body").css('cursor', 'default');
    const resp = this.responseText;
    $('#alertCorreo2').show();
    $('#alertCorreo').hide();
    $('#respuestaCorreo2').text("Creado y enviado Correctamente");
    $('#cuerpo').val("");
    $('#asunto').val("");
    $('#titulo').val("");
    $('#direccion').val("");
    $('#ciudad').val("");
    $('#fecha').val("");
    $('#hora').val("");
    $('#responsable').val("");
    $('#descripcion').val("");
    $("body").css('cursor', 'default');
    setTimeout(function () {
      $("#alertCorreo2").fadeOut(1500);
    }, 3000)
  });

}

function recargarEventos(){
  httpRequest(URLD + "directorControl/listarEventos", function () {

    var response = this.responseText;
    var resp = response.split("\n").join("");
    let tasks = JSON.parse(resp);
    let templateEventos= '';
    var i = 0;
    for (var m = 0; m < tasks.length / 3; m++) {
      templateEventos += ` <div style="margin-bottom:10px"class="card-group">`
      for (var j = i; j < tasks.length; j++) {
        var idE= tasks[j].id;
        i++;
        templateEventos += `
              <div class="card" style=" margin: 10px 10px 10px 10px;"> 
              <div class="card-header">${tasks[j].titulo}</div>
              <div class="card-body">
                <h5 class="card-title">Ubicacion: ${tasks[j].ciudad}</h5>
                <h5 class="card-title">Horario: Fecha  ${tasks[j].fecha} / Hora ${tasks[j].hora}</h5>
                <p class="card-text">${tasks[j].descripcion}</p>
                <p class="card-text" style="color:blue">Reponsable: ${tasks[j].responsable}</p>
                <p class="card-text" style="color:black">Destinatarios: ${tasks[j].destinatario}</p>
              </div>
              <div style="padding:10px">                  
                  <button type="button" onclick="traerEvento(${idE})"class="btn btn-secondary btn-lg" style="background-color: #dd4b39; border-color: #dd4b39; color: white;">Actualizar</button>
                  <button type="button" onclick="eliminarEvento(${idE})"class="btn btn-secondary btn-lg" style="background-color: #dd4b39; border-color: #dd4b39; color: white;">Eliminar</button>
              </div>
            </div>
               `;
        if ((i % 3) == 0) {
          templateEventos += `</div>`;
          break;
        }
      }
    }

    templateEventos += `</div>`

    $('.cajaE').html(templateEventos);



  });


}

function eliminarEvento(codigo){
  swal({
    title: "¿Realmente desea eliminar el evento?",
    text: "Esta opcion es irreversible",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal("Evento eliminado de la lista!", {
        icon: "success",
      });
      httpRequest(URLD + "directorControl/eliminarEvento/" + codigo,function () {
        recargarEventos();
       });
    } 
  });

}

function traerEvento(codigo){

  httpRequest(URLD + "directorControl/traerEvento/" + codigo,function () {
    var response = this.responseText;
    var resp = response.split("\n").join("");
    let tasks = JSON.parse(resp);
    loadAev(tasks[0].id, tasks[0].titulo,tasks[0].direccion,tasks[0].fecha,tasks[0].hora,tasks[0].ciudad,tasks[0].descripcion,tasks[0].responsable, tasks[0].destinatario );
  });

}

function cargaDatosEvento(id, titulo,direccion,fecha,hora,ciudad,descripcion,responsable, destinatario){
 
  $("#tituloAc").val(titulo);
  $('#direccionAc').val(direccion);
  $('#ciudadaC').val(ciudad);
  $('#fechaAc').val(fecha);
  $('#horaAc').val(hora);
  $('#responsableAc').val(responsable);
  $('#descripcionAc').val(descripcion);
  globalIdEvento=id;
}

function actualizarEvento(e){
e.preventDefault();
  var titulo = $('#tituloAc').val();
  var direccion = $('#direccionAc').val();
  var ciudad = $('#fechaAc').val();
  var fecha= $('#fechaAc').val();
  var hora = $('#horaAc').val();
  var responsable =$('#responsableAc').val();
  var descripcion = $('#descripcionAc').val();
  var opcion = $('input:radio[name=envioAc]:checked').val(); 

  if(titulo=="" || direccion=="" || ciudad=="" || fecha=="" || hora=="" || responsable=="" || descripcion=="" ){

    $('#alertCorreo').show();
    $('#alertCorreo2').hide();
    $('#respuestaCorreo').text("Por favor llene todos los campos");
    return;

  }
  httpRequest(URLD + "directorControl/actualizarEvento/" + globalIdEvento + "/" + titulo + "/" + direccion + "/" + ciudad + "/" +
  fecha + "/" + hora + "/" + responsable + "/" + descripcion + "/" + opcion  ,function () {
  $('#tituloAc').val("");
  $('#direccionAc').val("");
  $('#fechaAc').val("");
  $('#fechaAc').val("");
  $('#horaAc').val("");
  $('#responsableAc').val("");
  $('#descripcionAc').val("");
  swal({
    title: "Actualizacion de evento",
    text: "Accion exitosa",
    icon: "success",
    button: "Ok",
  });
  loadLev();
  });
return false;
}

function generarReporteEmpresa(){
  $("#informe").show();
  $("#reporEmprea").hide();
  setTimeout(function () {
    generarReporte();
    $("#informe").fadeOut(2002);
  }, 3000)
}

function tomarReporteEmpresa(){
  $("#reporEmprea").show();
  var estudiante = $('#exampleFormControlSelect1').val();
  var tipoReporte ="";
  window.open(URLD + "directorControl/generarReporte/" + estudiante + "/" + tipoReporte);
}

function bloquear(){
  var estudiante = $('#exampleFormControlSelect1').val();
  $('#exampleFormControlSelect2').hide();
  $('#id1').hide();
  $('#C2').hide();
  $('#repor').hide();
  $('#reporEmprea').show();
}

function desbloquear(){
  $('#exampleFormControlSelect2').show();
  $('#id1').show();
  $('#C2').show();
  $('#reporEmprea').hide();
  $('#repor').show();
}

function enviarCorreoEncuesta(e) {
  e.preventDefault();
  var cuerpo,asunto,url,expresion;
  expresion=/docs.google.com/;
  url=$("#url").val();
  cuerpo=$("#cuerpo").val();
  asunto=$("#asunto").val();
  var opcion = $('input:radio[name=envio]:checked').val(); //Obtiene el valor sobre a quienes se envías
  // 0 para todos ; 1 para egresados ; 2 para estudiantes
  if (cuerpo === "" || asunto === "" || url==="") {
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("Por favor, Llene todos los campos antes de enviar.");
    return;
  }else if(!expresion.test(url)){
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("Esta no es una direccion valida de formulario");
    return;
  }
  cuerpo=$("#cuerpo").val() +"\n Direccion del Formulario: "+url;
  $("body").css('cursor', 'wait');
  $('#alertCorreo').hide();
  $('#alertCorreo2').show();
  $('#respuestaCorreo2').text("Enviando...");
  $.ajax({
    url: URLD + "directorControl/enviarCorreoEncuesta",
    data: {
       asuntoE:asunto, cuerpoE :cuerpo, opcionE:opcion
    },
    type: "post",
    success: function (data) {
      console.log(data);
      $("body").css('cursor', 'default');
      $('#alertCorreo2').show();
      $('#alertCorreo').hide();
      $('#respuestaCorreo2').text("Enviado Correctamente");
      $('#cuerpo').val("");
      $('#asunto').val("");
      $("#url").val("");
      setTimeout(function () {
        $("#alertCorreo2").fadeOut(1500);
      }, 3000)
    }
  });
}

function insetarNoticia(e){
  e.preventDefault();
  var titulo=$("#titulo").val();
  var autor=$("#autor").val();
  var dt = new Date();
  var fecha = dt.getFullYear() + "-" + dt.getMonth() + "-" + dt.getHours() ;
  var cuerpo=$("#cuerpo").val();
  var opcion = $('input:radio[name=envioN]:checked').val(); 

  if(titulo=="" || autor=="" || fecha=="" || cuerpo=="" ){
    $('#alertCorreo').show();
    $('#alertCorreo2').hide();
    $('#respuestaCorreo').text("Por favor llene todos los campos");
    return;
  }
  $('#alertCorreo').hide();
  httpRequest(URLD + "directorControl/crearNoticia/" + titulo + "/" + autor + "/" + fecha + "/" + cuerpo + "/" + opcion ,function () {
    $('#alertCorreo2').show();
    $('#alertCorreo').hide();
    $('#respuestaCorreo2').text("Noticia Creada Correctamente");
    $('#titulo').val("");
    $('#autor').val("");
    $('#fecha').val("");
    $('#cuerpo').val("");
    setTimeout(function () {
      $("#alertCorreo2").fadeOut(1500);
    }, 2000)

  });

}

function recargarNoticias(){
  httpRequest(URLD + "directorControl/listarNoticias", function () {

    var response = this.responseText;
    var resp = response.split("\n").join("");
    let tasks = JSON.parse(resp);
    let templateNoticias= '';
    for (var m = 0; m < tasks.length ; m++) {
      templateNoticias += 
      `<table class="table">
        <thead>
            <tr>
                <th scope="col">Fecha de publicacion</th>
                <th scope="col">Titulo de la noticia</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>${tasks[m].fecha}</td>
                <td>${tasks[m].titulo}</td>
                <td><a href="#" onclick="traerNoticia(${tasks[m].id})" class="btn btn-primary btn-lg active" role="button" aria-pressed="true" style="background-color: #dd4b39; border-color: #dd4b39;">Actualizar</a></td>
            </tr>
        </tbody> 
      </table>`;
    }

    $('.cajaN').html(templateNoticias);

  });
}

function traerNoticia(codigo){
  httpRequest(URLD + "directorControl/traerNoticia/" + codigo,function () {
    var response = this.responseText;
    var resp = response.split("\n").join("");
    let tasks = JSON.parse(resp);
    loadAnot(tasks[0].id, tasks[0].fecha,tasks[0].titulo,tasks[0].cuerpo,tasks[0].autor, tasks[0].destinatario );
  });
}

function cargaDatosNoticia(id,fecha,titulo,cuerpo,autor, destinatario){
 
  $("#tituloN").val(titulo);
  $('#autorN').val(autor);
  $('#cuerpoN').val(cuerpo);
  globalIdNoticia=id;
}

function actualizarNoticia(e){
  e.preventDefault();
    var titulo = $('#tituloN').val();
    var autor = $('#autorN').val();
    var cuerpo = $('#cuerpoN').val();
    var dt = new Date();
    var fecha = dt.getFullYear() + "-" + dt.getMonth() + "-" + dt.getHours() ;
    var opcion = $('input:radio[name=envioNO]:checked').val(); 
  
    if(titulo=="" || autor=="" || cuerpo=="" ){
  
      $('#alertCorreo').show();
      $('#alertCorreo2').hide();
      $('#respuestaCorreo').text("Por favor llene todos los campos");
      return;
  
    }
    httpRequest(URLD + "directorControl/actualizarNoticia/" + globalIdNoticia + "/" + titulo + "/" + autor + "/" + cuerpo + "/" +
    fecha + "/"+ opcion  ,function () {
    $('#tituloN').val("");
    $('#autorN').val("");
    $('#cuerpoN').val("");
    swal({
      title: "Actualizacion de noticia",
      text: "Accion exitosa",
      icon: "success",
      button: "Ok",
    });
    loadLno();
    });
  return false;
}

function cargaConvenio() {
  $(document).on('change', 'input[type="file"]', function () {
    var fileName = this.files[0].name;
    var res = fileName.substring(0, 30);
    $('.nameArchivo').text(res);
    extConvenio = fileName.split('.').pop();
    console.log(fileName);
    extConvenio = extConvenio.toLowerCase();
    switch (extConvenio) {
      case 'pdf':
        $('#alertCorreo').hide();
        $('#alertCorreo2').show();
        $('#respuestaCorreo2').text("Cargado Correctamente");
        break;
      default:
        $('#respuestaCorreo').text("error de extension, " + extConvenio + "  " + "Por favor seleccione un archivo .pdf");
        $('#alertCorreo2').hide();
        $('#alertCorreo').show();
        this.value = '';
        this.files[0].name = '';
    }
  });
}

function insertaEmpresa(e) {
  e.preventDefault();
  var nit, nombre, correo, telefono, celular, direccion, contra;
  nit = document.getElementById("nitEmpresa").value;
  nombre = document.getElementById("nombreEmpresa").value;
  correo = document.getElementById("correoEmpresa").value;
  telefono = document.getElementById("telefonoEmpresa").value;
  celular = document.getElementById("celularEmpresa").value;
  direccion = document.getElementById("direccionEmpresa").value;
  contra = document.getElementById("contraEmpresa").value;
  var gropu = $('#inputGroupFile012').val();
  var ciudadEmpresa = $('#ciudadEmpresa').val(); 
  var fecha = $('#fecha').val();


  httpRequest(URLD + "directorControl/getCodigoConvenio/" + nit  ,function () {
    
    var response = this.responseText;
    var resp = response.split("\n").join("");
    if(resp==0){
      $('#codigoConvenio').show();
      return;
    }
  });
  $('#codigoConvenio').hide();
  
  var expresion=/\w+@\w+\.+[a-z]/;
 if (ciudadEmpresa =="" || fecha =="" ||  nit === "" || nombre === "" || correo === "" || telefono === "" || celular === "" || direccion === "" || contra === "") {
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("Por favor, Llene todos los campos antes de Continuar.");
    return false;
  } else if(nit.length>100){
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("El Nit de la empresa no puede ser tan largo.");
    return false;
  }else if(nombre.length>25){
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("El Nombre de la empresa no puede superar los 25 caracteres.");
    return false;
  }else if(correo.length>50){
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("El Correo de la empresa no puede superar los 50 caracteres.");
    return false;
  }else if(telefono.length>9){
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("Telefono invalido (Supera los 9 digitos permitidos)");
    return false;
  }else if(celular.length>25){
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("Numero de Celular invalido (Supera los digitos permitidos)");
    return false;
  }else if(contra.length>100){
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("Tu contraseña es muy larga");
    return false;
  }
  else if(isNaN(telefono)){
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("El telefono debe ser un numero");
    return false;
  }else if(isNaN(celular)){
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("El celular debe ser un numero");
    return false;
  }else if(!expresion.test(correo)){
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("El correo ingresado no es valido");
    return false;
  }else if (extConvenio != "pdf" || gropu=="") {
    $('#alertCorreo2').hide();
    $('#alertCorreo').show();
    $('#respuestaCorreo').text("error de extension, " + extTesis + "  " + "Por favor seleccione un archivo .pdf");
    return;
  }
  $('#alertCorreo').hide();
  $('#alertCorreo2').hide();


  var parametros = new FormData($(".formularioConvenio")[0]);
  $.ajax({
    type: "POST",
    url: URLD + "directorControl/registrarEmpresa",
    data: parametros,
    contentType: false,
    processData: false,
    success: function (data) {
      $('#nitEmpresa').val("");
      $('#nombreEmpresa').val("");
      $('#correoEmpresa').val("");
      $('#telefonoEmpresa').val("");
      $('#celularEmpresa').val("");
      $('#direccionEmpresa').val("");
      $('#contraEmpresa').val("");
      $(".nameArchivo").text("...");
      $('#ciudadEmpresa').val(""); 
      $('#fecha').val("");
      swal({
        title: "Empresa Registrada Correctamente",
        text: "Accion exitosa",
        icon: "success",
        button: "Ok",
      });
      
    }
  });
  return false;
}

function recargarEmpresa(){
  httpRequest(URLD + "directorControl/listarEmpresa", function () {

    var response = this.responseText;
    var resp = response.split("\n").join("");
    let tasks = JSON.parse(resp);
    let templateEmpresa= '';
    var i = 0;
    for (var m = 0; m < tasks.length / 3; m++) {
      templateEmpresa += `<div class="card-group">`
      for (var j = i; j < tasks.length; j++) {
        var aux =tasks[j].nitEmpresa;
        i++;
        templateEmpresa += `      
        <div class="card" style="margin: 10px 10px 10px 10px">
        <div class="form-group">
          <h4 class="control-label" style="padding-left: 10px;">Convenio</h4>
          <div class="embed-responsive embed-responsive-16by9" id="pdf">
              <iframe class="embed-responsive-item" src="${tasks[j].documento_convenio}"
                  allowfullscreen></iframe>
          </div>
        </div>
        <div class="card-body">
          <h5 class="card-title">Nombre: ${tasks[j].nombre}</h5>
          <p class="card-text">Correo: ${tasks[j].correo}</p>
          <p class="card-text">Telefono: ${tasks[j].telefono}</p>
          <p class="card-text">Celular: ${tasks[j].celular}</p>
          <p class="card-text">Direccion: ${tasks[j].direccion}</p>
          <p class="card-text">Ciudad: ${tasks[j].ciudad}</p>

          <p class="card-text" style="color:blue">Fecha registro: ${tasks[j].fecha_registro}</p>
        </div>
        <button onclick="eliminarEmpresa(${aux})" type="button" class="btn btn-light" style="background-color: #dd4b39; border-color: #dd4b39; width: 50%;">Eliminar</button>
        </div>
        `;
        if ((i % 3) == 0) {
          templateEmpresa += `</div>`;
          break;
        }
      }
    }

    templateEmpresa += `</div>`

    $('.cajaE').html(templateEmpresa);
  });


}

function eliminarEmpresa(codigo){
  swal({
    title: "¿Realmente desea eliminar la empresa?",
    text: "Esta opcion es irreversible",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal("Empresa eliminada de la lista!", {
        icon: "success",
      });
      httpRequest(URLD + "directorControl/eliminarEmpresa/" + codigo,function () {
        setTimeout(function () {
          recargarEmpresa();
        }, 100)
       });
    } 
  });
    
}

function descargarFormato(){
  window.open(URLD + "directorControl/descargarFormato");
}

function fileValidation(param){
  var fileInput = param;
  var filePath = fileInput.value;
  var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
  if(!allowedExtensions.exec(filePath)){
      document.getElementById('imagePreview').innerHTML = 'Por favor seleccione un archivo con alguna de las siguientes opciones .jpeg/.jpg/.png/.gif only.';
      fileInput.value = '';
      return false;
  }else{
      //Image preview
      if (fileInput.files && fileInput.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              document.getElementById('imagePreview').innerHTML = '<img style="width:100%;height:100% " src="'+e.target.result+'"/>';
          };
          reader.readAsDataURL(fileInput.files[0]);
      }
  }
}

  




