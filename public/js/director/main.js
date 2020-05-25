const URLD = "http://localhost/ProyectoAPI_Egresados/";
let templateCodigos = '';
var lista = [];
var extTesis = "";
var consta = "";
let templateTesis = '';


function recargaTesis() {
  httpRequest(URLD + "directorControl/getTesis", function () {
    var response = this.responseText;
    var resp = response.split("\n").join("");
    let tasks = JSON.parse(resp);
    var cont = 0;
    var i = 0;
    for (var m = 0; m < tasks.length / 3; m++) {
      templateTesis += ` <div style="margin-bottom:10px"class="card-group">`
      for (var j = i; j < tasks.length; j++) {
        i++;
        templateTesis += `
                <div class="card">
                    <div class="form-group">
                        <div class="embed-responsive embed-responsive-16by9" id="pdf">
                            <iframe class="embed-responsive-item" src="${tasks[cont].archivo}" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">${tasks[cont].titulo}</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>`;
        cont++;
        console.log(cont)
        if ((i % 3) == 0) {
          templateTesis += `</div>`;
          i = 0;
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
  var busquedaCodigo = $('#busquedaCodigo').val();

  if (parseInt(busquedaCodigo, 10) < 1 || busquedaCodigo=="") {
    $('#alertCodigo').show();
    $('#alert2Codigo').hide();
    $('.respuesta').text("Introduzca un valor numerico positivo");
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

    $("#nombre").val(task[0].nombres);
    $("#codigo").val(task[0].codigoEstudiante);
    $("#fechai").val(task[0].fechaIngreso);
    if (task[0].fechaEgreso != '0000-00-00') {
      $('#alert2Codigo').hide();
      $('#alertCodigo').show();
      $('.respuesta').text("¡Usuario con fecha ya actualizada!");
      $("#fechae").val(task[0].fechaEgreso);
      $("#fechae").prop("disabled",true);     
      return;
    }
    $("#fechae").val(task[0].fechaEgreso);
    $("#fechae").prop("disabled",false);   

    $('#busquedaCodigo').val("");

    $('#alertCodigo').hide();
    $('#alert2Codigo').show();
  });

}

function validaTamaño(tamaño) {
  
}

function actualizarFecha(e) {
  e.preventDefault();
  var fechae = $('#fechae').val();
  var codigo = $("#codigo").val();
  if (fechae == "" || !$('#exampleCheck1').is(':checked')) {
    return;
  }
  if (codigo == "") {
    $('#respuestaActualizar').text("Busca primero un estudiante.");
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



function loadLi() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/director/listarEstudiantes.php", true);
  xhttp.send();

  httpRequest(URLD + "directorControl/ListarEstudiante", function () {
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
  });
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
  var gropu = $('#inputGroupFile01').val();
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
      console.log(aux);
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
        templateTesis = '';
        $('.caja').html("");
        recargaTesis();
        setTimeout(function () {
          $("#alertTesis2").fadeOut(1500);
        }, 3000);
        return;
      }


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
  if (parseInt(codigo, 10) < 1 || codigo== "" ) {   
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

function removeItemFromArr(arr, item) {
  var i = arr.indexOf(item);

  if (i !== -1) {
    arr.splice(i, 1);
  }
}




