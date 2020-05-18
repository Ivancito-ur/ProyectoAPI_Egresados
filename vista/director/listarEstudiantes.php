
<div class="container" id="contenedor">
      <div style="height:50px"></div>
     
      <p class="lead">
      <h3>Buscador con javascript</h3>
      <p>Aqui esta el ejemplo de buscador campos en la tabla sin necesidad la libreria como datatable.</p>

      <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" id="buscador" placeholder="Bucar por codigo.." 
      onkeyup="capturar(event)">
      <hr>
    <!-- -->
  
      <table class="table table-bordered order-table ">
        <thead>
          <tr>
            <th>Codigo Estudiante</th>
            <th>Documento</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>Correo Institucional</th>
            <th>Fecha Ingreso</th>
            <th>Fecha Egreso</th>
            
          </tr>
        </thead>
        <tbody id="estudiantesCarga">
        
        </tbody>
      </table>

    </div> 