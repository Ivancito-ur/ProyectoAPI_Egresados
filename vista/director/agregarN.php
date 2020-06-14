<div class="container" id="contenedor">
    <h1>Seguimiento y Control</h1>
    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Noticias</h6>
                    <h5 class="h3 mb-0">Redactar Noticia</h5>
                </div>
            </div>
        </div>

        <div class="card-body">

            <div class="row" style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">

                <div class="col-lg-8">
                <br>
                    <form>
                        <div class="form-group">
                            <label for="correo">Titulo</label>
                            <input type="text" class="form-control" id="asunto" required>
                        </div>
                        <div class="form-group">
                            <label for="correo">Autor</label>
                            <input type="text" class="form-control" id="asunto" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Noticia</label>
                            <textarea id="cuerpo" class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none; height: 300px;"></textarea>
                        </div>
                        <div style="width:80%;margin:auto; display:none; text-align:center; padding:10px " id="alertCorreo" class="alert alert-danger" role="alert">
                            <p class="respuesta" id="respuestaCorreo"></p>
                        </div>
                        <div style="width:80%; margin:auto;display:none;  text-align:center; padding:10px ; " id="alertCorreo2" class="alert alert-success" role="alert">
                            <p class="respuesta" id="respuestaCorreo2"></p>
                        </div>
                        <button type="submit" onclick="return enviarCorreo(event)" id="enviarCo" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Publicar</button>
                    </form>

                </div>
                <div class="col-lg-4" style="border-radius:5%;border-color: red;">
                    <div class="card border-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header">Envío</div>
                        <div class="card-body text-danger">
                            <h5 class="card-title">A quienes se dirigen ... </h5>
                            <p class="card-text">
                                <b>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="envio" id="gridRadios1" value="0" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Todos
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="envio" id="gridRadios2" value="1">
                                        <label class="form-check-label" for="gridRadios2">
                                            Egresados
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="envio" id="gridRadios3" value="2">
                                        <label class="form-check-label" for="gridRadios3">
                                            Estudiantes activos
                                        </label>
                                    </div>
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>