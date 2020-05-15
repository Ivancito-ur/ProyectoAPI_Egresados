<div class="container" id="contenedor">

    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Carga</h6>
                    <h5 class="h3 mb-0">Cargar estudiantes</h5>
                </div>
            </div>
        </div>


        <div class="card-body">


            <div class="row">
                <div class="col">
                    <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                        <br>
                        <h4 style="padding-left: 10px;">Actualizar Estudiante</h4>
                        <form>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" readonly>
                            </div>
                            <div class="form-group">
                                <label for="codigo">Codigo</label>
                                <input type="text" class="form-control" id="codigo" readonly>
                            </div>
                            <div class="form-group">
                                <label for="fechai">Fecha Ingreso</label>
                                <input type="text" class="form-control" id="fechai" readonly>
                            </div>
                            <div class="form-group">
                                <label for="fechae">Fecha Egreso</label>
                                <input type="text" class="form-control" id="fechae">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Acepto</label>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Actualizar</button>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                        <br>
                        <h4 style="padding-left: 10px;">Seleccionar Archivo</h4>
                        <form>
                            <div class="input-group mb-3" style="padding-left: 10px; padding-right: 10px;">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Cargar</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="inputGroupFile01">...</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Cargar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>