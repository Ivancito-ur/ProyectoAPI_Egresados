<div class="container" id="contenedor">
    <h1>Seguimiento y Control</h1>
    <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
    <div class="card">
    <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Correo</h6>
                    <h5 class="h3 mb-0">Envío de correos</h5>
                </div>
            </div>
        </div>
        <div class="card-body">

        
            <form>
                <div class="form-group">
                    <label for="correo">Asunto</label>
                    <input type="text" class="form-control" id="asunto" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Mensaje</label>
                    <textarea id="cuerpo" class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none; height: 300px;"></textarea>
                </div>
                <div style="width:80%;margin:auto; display:none; text-align:center; padding:10px " id="alertCorreo" class="alert alert-danger" role="alert">
                     <p class="respuesta" id="respuestaCorreo"></p>
                 </div>
                <div style="width:80%; margin:auto;display:none;  text-align:center; padding:10px ; " id="alertCorreo2" class="alert alert-success" role="alert">
                <p class="respuesta" id="respuestaCorreo2"></p>
                 </div>
                 <button type="submit" onclick="return enviarCorreo(event)" id="enviarCo" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Enviar</button>
            </form>
        </div>
    </div>
    </div>
</div>