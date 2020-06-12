
<div class="container" id="contenedor">

    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Reportes</h6>
                    <h5 class="h3 mb-0">Generar Reporte</h5>
                </div>
            </div>
        </div>
            <div class="card-body">
                <div class="box box-primary" style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                  <br>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label  for="exampleFormControlSelect1">Seleccionar Estudiante</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                        <option>Alumno</option>
                        <option>Egresado</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label  for="exampleFormControlSelect2">Seleccionar Tipo de reporte</label>
                        <select class="form-control" id="exampleFormControlSelect2">
                        <option>Promedio</option>
                        <option>Notas pruebas Saber 11 y Pro</option>
                        </select>
                      </div>
                    </div>
                    <div style="margin-top:20px; margin-bottom:30px">
                      <a target="_blank"style="background-color: #dd4b39; border-color: #dd4b39; color: white" onclick=" generarReporte(event)" id="repor" type="button" class="btn btn-primary">Generar</a>
                    </div>
            </div>
        </div>
    </div>
</div>