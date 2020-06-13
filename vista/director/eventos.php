<div class="container" id="contenedor">
    <h1>Seguimiento y Control</h1>
    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Eventos</h6>
                    <h5 class="h3 mb-0">Creacion de Eventos</h5>
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
                            <input type="text" class="form-control" id="titulo" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="correo">Direccion</label>
                                    <input type="text" class="form-control" id="direccion" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="correo">Ciudad</label>
                                    <input type="text" class="form-control" id="ciudad" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="date">Fecha</label>
                                    <input type="date" required min=" <?php $hoy=date("Y-m-d"); echo $hoy;?>" class="form-control" id="fecha" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="correo">Hora</label>
                                    <input type="time" class="form-control" id="hora" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="correo">Ponente/Responsable</label>
                            <input type="text" class="form-control" id="responsable" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Resumen</label>
                            <textarea id="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize: none; height: 300px;" required></textarea>
                        </div>
                        <div style="width:80%;margin:auto; display:none; text-align:center; padding:10px " id="alertCorreo" class="alert alert-danger" role="alert">
                            <p class="respuesta" id="respuestaCorreo"></p>
                        </div>
                        <div style="width:80%; margin:auto;display:none;  text-align:center; padding:10px ; " id="alertCorreo2" class="alert alert-success" role="alert">
                            <p class="respuesta" id="respuestaCorreo2"></p>
                        </div>
                        <div style="padding-top: 25px;">
                            <button type="submit" onclick="return insertarEvento(event)" id="enviarCo" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Crear Evento</button>
                        </div>
                    </form>

                </div>
                <div class="col-lg-4" style="border-radius:5%;border-color: red;">
                    <div class="card border-danger mb-3" style="max-width: 18rem;">
                        <br>
                        <div class="card-header" style=" border-style: solid;">Envío</div>
                        <div class="card-body text-danger" style=" border-style: solid;">
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