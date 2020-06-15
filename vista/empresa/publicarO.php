<div class="container" id="contenedor">

    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Ofertas</h6>
                    <h5 class="h3 mb-0">Publicar Oferta Laboral</h5>
                </div>
            </div>
        </div>
            <div class="card-body">
                <div class="box box-primary" style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmpleo">Empleo</label>
                                    <input type="text" class="form-control" id="inputEmpleo">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputJornada">Jornada</label>
                                    <input type="text" class="form-control" id="inputJornada">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputSalario">Salario</label>
                                    <input onkeyup="capturarDinero(event)" type="text" class="form-control" id="inputSalario" placeholder="$">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputTelefono">Telefono</label>
                                    <input type="text" class="form-control" id="inputTelefono">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlDescripcion">Descripcion</label>
                                    <textarea class="form-control" id="exampleFormControlDescripcion" rows="3" style="height:300px; resize: none;"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlRequerimientos">Requerimientos</label>
                                    <textarea class="form-control" id="exampleFormControlRequerimientos" rows="3" style="height:300px; resize: none;"></textarea>
                                </div>
                            </div>
                            <button onclick="return insertarOferta(event)" type="submit" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Publicar</button>
                        </form>

                        <div style="width:80%;margin:auto; display:none; text-align:center; padding:10px " id="alertCorreo" class="alert alert-danger" role="alert">
                            <p class="respuesta" id="respuestaCorreo"></p>
                        </div>
                        <div style="width:80%; margin:auto;display:none;  text-align:center; padding:10px ; " id="alertCorreo2" class="alert alert-success" role="alert">
                            <p class="respuesta" id="respuestaCorreo2"></p>
                        </div>
            </div>
        </div>
    </div>
</div>