
const URLD = "http://localhost/ProyectoAPI_Egresados/";
let templateTesis = '';

function loadTe() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/empresa/hojaVidaE.php", true);
    xhttp.send();

    templateTesis = '';
    recargaTesis();
}


function loadTa() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("contenedor").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "vista/empresa/hojaVidaA.php", true);
    xhttp.send();

    templateTesisA = '';
    recargaTesisAlumno();
}

function loadOl() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("contenedor").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "vista/empresa/publicarO.php", true);
  xhttp.send();

  templateTesisA = '';
  recargaTesisAlumno();
}


function recargaTesis() {
    httpRequest(URLD + "empresaControl/getHojaVidaE", function () {
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
                          <h5 class="card-title">Nombre(s): ${tasks[j].nombres}</h5>
                          <h5 class="card-title">Apellido(s): ${tasks[j].apellidos}</h5>
                          <h5 class="card-title">Correo: ${tasks[j].correo}</h5>
                          <h5 class="card-title">Telefono: ${tasks[j].relefono}</h5>
                          <h5 class="card-title">Promedio: ${tasks[j].promedio}</h5>
                          
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

  function recargaTesisAlumno() {
    httpRequest(URLD + "empresaControl/getHojaVidaA", function () {
      var response = this.responseText;
      var resp = response.split("\n").join("");
      let tasks = JSON.parse(resp);
      var i = 0;
      for (var m = 0; m < tasks.length / 3; m++) {
        templateTesisA += ` <div style="margin-bottom:10px"class="card-group">`
        for (var j = i; j < tasks.length; j++) {
          i++;
          templateTesisA += `
                  <div class="card">
                      <div class="form-group">
                          <div class="embed-responsive embed-responsive-16by9" id="pdf">
                              <iframe class="embed-responsive-item" src="${tasks[j].archivo}" allowfullscreen></iframe>
                          </div>
                      </div>
                      <div class="card-body">
                          <h5 class="card-title">Nombre(s): ${tasks[j].nombres}</h5>
                          <h5 class="card-title">Apellido(s): ${tasks[j].apellidos}</h5>
                          <h5 class="card-title">Correo: ${tasks[j].correo}</h5>
                          <h5 class="card-title">Telefono: ${tasks[j].relefono}</h5>
                          <h5 class="card-title">Promedio: ${tasks[j].promedio}</h5>
                          
                      </div>
                  </div>`;
          if ((i % 3) == 0) {
            templateTesisA += `</div>`;
            break;
          }
        }
      }
  
      templateTesisA += `</div>`
  
      $('.cajaE').html(templateTesisA);
  
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