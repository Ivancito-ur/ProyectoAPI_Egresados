<div class="container" id="contenedor">
  <div style="height:50px"></div>

  <div class="card">
    <div class="card-header bg-transparent">
      <div class="row align-items-center">
        <div class="col">
          <h6 class="text-uppercase text-muted ls-1 mb-1">Listas</h6>
          <h5 class="h3 mb-0">Lista de Todas las Empresas</h5>
        </div>
      </div>
    </div>
    <div class="card-body">
        <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
            <p class="lead">

            <h3>Empresa</h3>
            <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="number" id="buscador" placeholder="Bucar por Nit..." onkeyup="capturar(event)">
            <hr>
            <!-- -->
        </div>
    <div>

          <table class="table table-responsive order-table">
            <thead>
              <tr>
                <th>Nit</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Telefono</th>
                <th>Celular</th>
                <th>Direccion</th>
                <th></th>

              </tr>
            </thead>
            <tbody id="">

            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>