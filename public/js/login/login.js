
const URLD = "http://localhost/ProyectoAPI_Egresados/";
var templateToken = "";
$('.alert').hide();
$(document).ready(function () {
  $('.alert').hide();

  //METODO PARA LA VERIFICACION DE DATOS DE ESTUDIANTE
  $("#ingresar").click(function (e) {
    var codigo = $('#inpCodigo').val();
    var documento = $('#inputDocumento').val();
    var contraseña = $('#inputPassword').val();
    if (!verificarVacio([codigo, documento, contraseña])) {
      $('.respuesta').text("Por favor llene todos los campos!");
      $('.alert').show();
      return;
    }
    httpRequest(URLD + "loginControl/validarEstudiante/" + codigo + "/" + documento + "/" + contraseña, function () {

      var resp = this.responseText;
      if (resp == "0") {
        $('.respuesta').text("Usuario y/o contraseña incorrecto");
        $('.alert').show();
        return;
      } else if (resp == "1") {
        window.location.href = URLD + "estudianteControl";
      }

    });
    e.preventDefault();
  });

});


//VERIFICAR DATOS ADMINISTRADOR

function verificarDatosAdmin(e) {
  e.preventDefault();
  var codigo = $('#inputCodigoA').val();
  var documento = $('#inputDocumentoA').val();
  var contraseña = $('#inputPasswordA').val();
  if (!verificarVacio([codigo, documento, contraseña])) {
    $('.respuesta').text("Por favor llene todos los campos!");
    $('.alert').show();
    return;
  }
  httpRequest(URLD + "loginControl/validarDirector/" + codigo + "/" + documento + "/" + contraseña, function () {

    var resp = this.responseText;

    console.log(resp);
    if (resp == "0") {
      $('.respuesta').text("Usuario y/o contraseña incorrecto");
      $('.alert').show();
      return;
    } else if (resp == "1") {
      window.location.href = URLD + "directorControl";
    }

  });
  return false;
}



//VERIFICAR DATOS EMPRESA

function verificarDatosEmpresa(e) {
  e.preventDefault();
  var inputNit = $('#inputNit').val();
  var inputPassword = $('#inputPassword').val();
  if (!verificarVacio([inputNit, inputPassword])) {
    $('.respuestaEmpre').text("Por favor llene todos los campos!");
    $('#respuestaEmpresa').show();
    return;
  }
  httpRequest(URLD + "loginControl/validarEmpresa/" + inputNit + "/" + inputPassword, function () {

    var resp = this.responseText;

    console.log(resp);/*
    if (resp == "0") {
      $('.respuestaEmpre').text("Usuario y/o contraseña incorrecto");
      $('#respuestaEmpresa').show();
      return;*/
    if (resp == "1") {
      window.location.href = URLD + "empresaControl";
    }

  });
  return false;
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
  $("#recuContra").css({
    "display": "block"
  });
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
  $("#recuContra").css({
    "display": "block"
  });
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
  $("#recuContra").css({
    "display": "block"
  });
  return false;
}



function llamadaEntrada(control, guia, guia2) {
  //console.log(URLD + "personaControl/render/" + guia);
  window.location.href = URLD + control + "/render/" + guia + "/" + guia2;
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

function verificarVacio(param) {
  for (let i = 0; i < param.length; i++) {
    if (param[i] == "") {
      return false;
    }
  }
  return true;
}



function loadCo() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/login/contraseña.php", true);
  xhttp.send();
  templateToken="";
  token();
  $("#recuContra").css({
    "display": "none"
  });

  return false;
}

function loadF() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/login/final.php", true);
  xhttp.send();

  return false;

}



//cambiar contraseña perdida

function recuperarContraseña() {

  var inpCodigoRECU = $('#inpCodigoRECU').val();
  var inpEmailRECU = $('#inpEmailRECU').val();
  var Cresp = generarCodigo();
  if (inpCodigoRECU == "" || inpEmailRECU == "") {
    console.log("datos vacios");
    return;
  }
  $("body").css('cursor', 'wait')
  httpRequest(URLD + "loginControl/recuperarContraseña/" + inpCodigoRECU + "/" + inpEmailRECU + "/" + Cresp, function () {

    var resp = this.responseText;
    var aux = resp.split("\n").join("");
    if (aux == 0) {
      $('#respuestaContraseña').text("Codigo y/o correo incorrectos");
      $('#alertContraseña').show();
      $('#alertContraseña2').hide();
      console.log("")
      return;

    }
    $("body").css('cursor', 'default')
    $('#alertContraseña2').show();
    $('#alertContraseña').hide();
    $('#respuestaContraseña2').text("Enviando correo...");

    loadF();
    return;

  });

  return false;
}

function nuevaContraseña(e) {
  e.preventDefault();
  var inpToken = $('#inpToken').val();
  var inputPasswordn = $('#inputPasswordn').val();
  var inputPasswordc = $('#inputPasswordc').val();
  if (inpToken == "" || inputPasswordn == "" || inputPasswordc == "") {
    console.log("campos vacios");
    return;
  }

  if (inputPasswordn != inputPasswordc) {
    console.log("Contraseñas no coinciden");
    return;
  }

  httpRequest(URLD + "loginControl/verficarCodigo/" + inpToken + "/" + inputPasswordn, function () {

    var resp = this.responseText;
    var aux = resp.split("\n").join("");
    if (aux == 0) {
      $('#respuestaToken').text("Se acabo el tiempo.");
      $('#alertToken').show();
      $('#alertToken2').hide();
      setTimeout(function () {
        window.location.href = URLD + "loginControl";
      }, 3000);
    } else if (aux == 1) {
      window.location.href = URLD + "loginControl";
      return;
    } else if (aux == 2) {
      $('#respuestaToken').text("token incorrecto");
      $('#alertToken').show();
      $('#alertToken2').hide();
    }

  });

  return false;
}


function token() {
  httpRequest(URLD + "loginControl/validarToken", function () {

    var resp = this.responseText;
    var aux = resp.split("\n").join("");

    if (aux == 0) {


      templateToken += " <button style='margin-right:2px;display:inline-block; width:80%' onclick='return recuperarContraseña()' type='submit' class='btn btn-danger btn-block btn-flat'>Continuar</button><button onclick='return   loadF()' style='display:inline-block; width:20%; text-align: center; padding:4px' type='button' class='btn btn-info'>Token</button>";

    } else {

      templateToken += "<button onclick='return recuperarContraseña()' type='submit' class='btn btn-danger btn-block btn-flat'>Continuar</button>";



    }
    $('#token').html(templateToken);

  });

}



//creamos la función  //generar codigo
function generarCodigo() {
  var caracteres = "abcdefghijkmnpqrtuvwxyzABCDEFGHJKMNPQRTUVWXYZ2346789";
  var contraseña = "";
  for (i = 0; i < 10; i++) contraseña += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
  return contraseña;
}
