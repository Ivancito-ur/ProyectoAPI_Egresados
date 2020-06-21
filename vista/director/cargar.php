<div class="container" id="contenedor">
    <h1>Cargar Estudiantes</h1>

            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Carga de datos</h6>
                            <h5 class="h3 mb-0">Cargar datos de estudiantes</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <div class="container">
                        <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                            <br>
                            <h4 style="padding-left: 10px;">Seleccionar Archivo</h4>
                            <form action="" class="formularioCompleto" method="" enctype="multipart/form-data">
                                <div class="input-group mb-3" style="padding-left: 10px; padding-right: 10px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Cargar</span>
                                    </div>
                                    <div class="custom-file">
                                        <input onchange="cargaHojaVida()" type="file" style="display:none" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="archivo">
                                        <label class="custom-file-label" for="inputGroupFile01">
                                            <p class="nameArchivo">...</p>
                                        </label>
                                    </div>
                                </div>
                                <button type="button" id="guardaExcel" class=" btn btn-primary" onclick="cargarExcel(event, '#guardaExcel')" style="display:inline-block; background-color: #dd4b39; border-color: #dd4b39;">Guardar</button>
                                <button  onclick="descargarFormato()" style="display:inline-block" type="button" class="btn btn-success">Descargar Formato</button>
                                <div style="display:none; text-align:center; padding:10px ; margin-top:15px" id="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <p class="respuesta" id="respuesta"></p>
                                </div>
                                <div style="display:none; text-align:center; padding:10px ; margin-top:15px" id="alert2" class="alert alert-success" role="alert">
                                    <p class="respCarga"></p>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>

            </div>
               
</div>