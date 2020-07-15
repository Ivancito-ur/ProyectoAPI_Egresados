<div class="container" id="contenedor">
  <div style="height:50px"></div>

  <div class="card">
    <div class="card-header bg-transparent">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="text-uppercase text-muted ls-1 mb-1">Listas</h6>
          <h5 class="h3 mb-0">Lista de todos los estudiantes registrados</h5>
          <h3 style="margin-bottom:25px">Desea listar por..</h3>
          <button onclick="return cargarEstudiantes(1) "type="button" class="btn btn-success">Estudiantes</button>
          <button onclick="return cargarEstudiantes(0) "type="button" class="btn btn-danger">Egresados</button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <p class="lead">

          <h3>Estudiantes</h3>
          <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="number" id="buscador" placeholder="Bucar por codigo.." onkeyup="capturar(event)">
          <hr>
          <!-- -->

        <div class="container">

          <table class="table table-responsive order-table">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Celular</th>
                <th>Correo Institucional</th>
                <th>Fecha Ingreso</th>
                <th>Fecha Egreso</th>
                <th>Promedio</th>

              </tr>
            </thead>
            <tbody id="estudiantesCarga">

            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>