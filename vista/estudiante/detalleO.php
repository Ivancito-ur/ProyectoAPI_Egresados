<div class="container" id="contenedor">

    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Ofertas</h6>
                    <h5 class="h3 mb-0">Publicar Oferta Laboral</h5>
                    <a onclick="loadOl()" class="nav-link" href="#">
                        <i class="fas fa-long-arrow-alt-left"></i>
                    </a>
                </div>
            </div>
        </div>
            <div class="card-body">
                <div class="box box-primary" style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmpleo">Empleo</label>
                                    <input type="text" class="form-control" id="inputEmpleo" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputJornada">Jornada</label>
                                    <input type="text" class="form-control" id="inputJornada" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputSalario">Salario</label>
                                    <input type="text" class="form-control" id="inputSalario" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputTelefono">Telefono</label>
                                    <input type="text" class="form-control" id="inputTelefono" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlDescripcion">Descripcion</label>
                                    <textarea class="form-control" id="exampleFormControlDescripcion" rows="3" style="height:300px; resize: none;" readonly></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlRequerimientos">Requerimientos</label>
                                    <textarea class="form-control" id="exampleFormControlRequerimientos" rows="3" style="height:300px; resize: none;" readonly></textarea>
                                </div>
                            </div>
                        </form>
            </div>
        </div>
    </div>
</div>