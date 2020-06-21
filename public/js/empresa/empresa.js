
const URLD = "http://localhost/ProyectoAPI_Egresados/";
let templateTesis = '';
listarOfertas();




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
    setTimeout(function () {
      recargaTesis();
    }, 100)
 
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
    setTimeout(function () {
      recargaTesisAlumno();
    }, 100)
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
  setTimeout(function () {
    recargaTesisAlumno();
  }, 100)
  
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


  //SEGUNDA ITERACION 

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


  function capturarDinero(event){
    $("#inputSalario").on({
      "focus": function (event) {
          $(event.target).select();
      },
      "keyup": function (event) {
          $(event.target).val(function (index, value ) {
              return value.replace(/\D/g, "")
                          .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                          .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
          });
      }
  });
}



  function insertarOferta(e){
  
    e.preventDefault();

    var inputEmpleo = $('#inputEmpleo').val();
    var inputJornada = $('#inputJornada').val();
    var inputSalario = $('#inputSalario').val();
    var inputTelefono= $('#inputTelefono').val();
    var descripcion = $('#exampleFormControlDescripcion').val();
    var requermiento =$('#exampleFormControlRequerimientos').val();

  
    if(inputEmpleo=="" || inputJornada=="" || inputSalario=="" || inputTelefono=="" || descripcion=="" || requermiento==""){
  
      $('#alertCorreo').show();
      $('#alertCorreo2').hide();
      $('#respuestaCorreo').text("Por favor llene todos los campos");
      return;
  
    }
    $('#alertCorreo').hide();

    httpRequest(URLD + "empresaControl/crearOferta/" + inputEmpleo + "/" + inputJornada + "/" + inputSalario + "/" +
    inputTelefono + "/" + descripcion + "/" + requermiento, function () {
      const resp = this.responseText;
      $('#alertCorreo2').show();
      $('#alertCorreo').hide();
      $('#respuestaCorreo2').text("Creado Correctamente");
      $('#inputEmpleo').val("");
      $('#inputJornada').val("");
      $('#inputSalario').val("");
      $('#inputTelefono').val("");
      $('#exampleFormControlDescripcion').val("");
      $('#exampleFormControlRequerimientos').val("");
      setTimeout(function () {
        $("#alertCorreo2").fadeOut(1500);
      }, 3000)
    });


  }



  function listarOfertas(){
    httpRequest(URLD + "empresaControl/listarOferta", function () {
      var response = this.responseText;
      var resp = response.split("\n").join("");
      let tasks = JSON.parse(resp);
      var templateTesisOferta ="";
      var i = 0;
      for (var m = 0; m < tasks.length / 3; m++) {
        templateTesisOferta += `  <div class="card-group" style="margin-top:10px;">`
        for (var j = i; j < tasks.length; j++) {
          i++;
          templateTesisOferta += `
          <div class="card" style=" margin: 10px 10px 10px 10px;">
          <div class="card-header"><button onclick="eliminarOferta(${tasks[j].id})"  type="button" class="btn btn-light" style="background-color: #dd4b39; border-color: #dd4b39;">Remover Oferta</button></div>
          <div class="card-header">${tasks[j].empleo}</div>
            <div class="card-body">
              <h5 class="card-title">Jornada: ${tasks[j].jornada}</h5>
              <p class="card-text">Descripcion: ${tasks[j].descripcion}</p>
              <h5 class="card-title">Requerimientos: ${tasks[j].requerimientos}</h5>
              <p class="card-text">Salario: ${tasks[j].salario}</p>
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


  function eliminarOferta(codigo){

    swal({
      title: "¿Realmente desea eliminar la oferta?",
      text: "Esta opcion es irreversible",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        swal("Oferta eliminado de la lista!", {
          icon: "success",
        });
        httpRequest(URLD + "empresaControl/eliminarOferta/" + codigo,function () {
          listarOfertas();
         });
      } 
    });
    
  }


 
  $(function () {
      $('#datetimepicker3').datetimepicker({
          format: 'LT'
      });
  });


 
  