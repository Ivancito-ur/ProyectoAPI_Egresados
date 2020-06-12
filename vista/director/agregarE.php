<div class="container" id="contenedor">

    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Empresa</h6>
                    <h5 class="h3 mb-0">Agregar Empresa</h5>
                </div>
            </div>
        </div>
            <div class="card-body">
                <div class="box box-primary" style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                        <br>
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmpleo">Nit</label>
                                    <input type="text" class="form-control" id="inputEmpleo">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputJornada">Nombre</label>
                                    <input type="text" class="form-control" id="inputJornada">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputSalario">Correo</label>
                                    <input type="text" class="form-control" id="inputSalario">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputTelefono">Telefono</label>
                                    <input type="text" class="form-control" id="inputTelefono">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputSalario">Celular</label>
                                    <input type="text" class="form-control" id="inputSalario">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputTelefono">Direccion</label>
                                    <input type="text" class="form-control" id="inputTelefono">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputSalario">Contraseña</label>
                                    <input type="text" class="form-control" id="inputSalario">
                                </div>
                            </div>
                            <div class="input-group mb-3" style="padding-left: 10px; padding-right: 10px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Cargar Convenio</span>
                                    </div>
                                    <div class="custom-file">
                                        <input onchange="cargaHojaVida()" type="file" style="display:none" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="archivo">
                                        <label class="custom-file-label" for="inputGroupFile01">
                                            <p class="nameArchivo">...</p>
                                        </label>
                                    </div>
                                </div>
                            <button type="submit" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Agregar</button>
                        </form>
            </div>
        </div>
    </div>
</div>