<div class="container" id="contenedor">
    <h1>Cargar Estudiantes</h1>
    <div class="row">
        <div class="col">
            <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                <br>
                <h4 style="padding-left: 10px;">Actualizar Estudiante</h4>
                <div class="input-group mb-3" style="padding-left: 10px; padding-right: 10px;">
                        <input type="text" id="busquedaCodigo" class="form-control" placeholder="Codigo Estudiante"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button onclick="cargaDatos(event)" class="btn btn-outline-secondary" type="button" id="button-addon2" style="background-color: #dd4b39; border-color: #dd4b39; color: white;">Buscar</button>
                        </div>
                    </div>
                    <div style="width:80%;margin:auto; display:none; text-align:center; padding:10px ; margin-top:15px" id="alertCodigo" class="alert alert-danger" role="alert">
              <p class="respuesta" id="respuestaCarga"></p>
            </div>
            <div style="width:80%; margin:auto;display:none;  text-align:center; padding:10px ; margin-top:15px" id="alert2Codigo" class="alert alert-success" role="alert">
              Cargado Correctamente
            </div>
                <form id="fcargaDatos">
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
                        <input type="date" class="form-control" id="fechae" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Acepto</label>
                    </div>

                    <div style="width:80%;margin:auto; display:none; text-align:center; padding:10px; margin-bottom:15px" id="actu1" class="alert alert-danger" role="alert">
                    <p class="respuesta" id="respuestaActualizar"></p>
                    </div>
                    <div style="width:80%; margin:auto;display:none;  text-align:center; padding:10px ; margin-top:15px; margin-bottom:15px" id="actu2" class="alert alert-success" role="alert">
                    Actualizado Correctamente
                    </div>
                    
                    <button type="submit" class="btn btn-primary"
                        id="botonActualizar" style="background-color: #dd4b39; border-color: #dd4b39;"  onclick="return actualizarFecha(event)">Actualizar </button>
                </form>
            </div>
        </div>
        <div class="col">
            <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                <br>
                <h4 style="padding-left: 10px;">Seleccionar Archivo</h4>
                <form  action="" class="formularioCompleto" method="" enctype="multipart/form-data">
                    <div class="input-group mb-3" style="padding-left: 10px; padding-right: 10px;">
                        <div class="input-group-prepend">
                            <span class="input-group-text"  id="inputGroupFileAddon01">Cargar</span>
                        </div>
                        <div class="custom-file">
                            <input onchange="cargaHojaVida()" type="file" style="display:none"class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01"  name="archivo">
                            <label  class="custom-file-label" for="inputGroupFile01"><p class="nameArchivo">...</p></label>
                        </div>
                    </div>
                    <button type="button" id="guardaExcel" class=" btn btn-primary" onclick="cargarExcel(event, '#guardaExcel')"
                        style="background-color: #dd4b39; border-color: #dd4b39;">Guardar</button>
                        <div style="display:none; text-align:center; padding:10px ; margin-top:15px" id="alert"class="alert alert-danger" role="alert">
                        <p class="respuesta" id="respuesta" ></p></div>
                        <div style="display:none; text-align:center; padding:10px ; margin-top:15px" id="alert2" class="alert alert-success" role="alert">
                        <p class="respCarga"></p>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
