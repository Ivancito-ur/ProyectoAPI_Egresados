<div class="container" id="contenedor">

    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Evento</h6>
                    <h5 class="h3 mb-0">Detalles del Evento</h5>
                    <a onclick="loadEvpu()" class="nav-link" href="#">
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
                                    <label for="Titulo">Titulo</label>
                                    <input type="text" class="form-control" id="Titulo" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Lugar">Lugar</label>
                                    <input type="text" class="form-control" id="Lugar" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Fecha">Fecha</label>
                                    <input type="text" class="form-control" id="Fecha" readonly>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Hora">Hora</label>
                                    <input type="text" class="form-control" id="Hora" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                    <label for="Resumen">Resumen</label>
                                    <textarea class="form-control" id="Resumen" rows="3" style="height:300px; resize: none;" readonly></textarea>
                                </div>
                        </form>
            </div>
        </div>
    </div>
</div>