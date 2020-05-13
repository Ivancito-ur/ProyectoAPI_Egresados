<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/estudiante/estiloPefil.css">
         
        
  

</head>

<body style="background-color: #ecf0f5;">
    <nav class="navbar navbar-light" style="background-color: #dd4b39; z-index: 1001;">
        <div class="nav-link">
            <span style="color: white;" class="navbar-brand mb-0 h1">ESTUDIANTE</span>
            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                aria-controls="collapseExample">
                <img src="<?php echo constant('URL')?>public/img/toggle.png" alt="">
            </a>
        </div>
        <div><a href="<?php echo constant('URL')?>loginControl/cerrarSesionEstudiante"><img src="<?php echo constant('URL')?>public/img/out.png" alt=""></a></div>
    </nav>
    <div>
        <div class="collapse" id="collapseExample" style="width: 250px; position: fixed; z-index: 1000;">
            <div id="menu" class="card card-body">
                <ul class="list-group list-group-flush" style="min-height: 600px;">
                    <a onclick="return loadPe()" href="" class="list-group-item list-group-item-action">Perfil</a>
                    <a onclick="return loadAc()" href="" class="list-group-item list-group-item-action">Actualizar Datos</a>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <div class="container" id="contenedor">
        <h1>Perfil del Estudiante</h1>
        <div class="row">
            <div class="col-7">
                <div class="box box-primary" style="border-top: 3px solid #3c8dbc; background-color: white;">
                    <form>
                        <div class="form-group">
                            <label for="nombre">Nombres</label>
                            <input type="text" class="form-control" id="nombre" value="<?php echo $this->datos['nombres']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellidos</label>
                            <input type="text" class="form-control" id="apellido" value="<?php echo $this->datos['apellidos']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" id="telefono"  value="<?php echo $this->datos['telefono']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" value="<?php echo $this->datos['direccion']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="fechai">Fecha de Ingreso</label>
                            <input type="text" class="form-control" id="fechai" value="<?php echo $this->datos['fechaIngreso']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="fechae">Fecha de Egreso</label>
                            <input type="text" class="form-control" id="fechae" value="<?php echo $this->datos['fechaEgreso']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="correoi">Correo Institucional</label>
                            <input type="email" class="form-control" id="correoi" value="<?php echo $this->datos['correoInstitucional']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="correop">Correo Personal</label>
                            <input type="email" class="form-control" id="correop" value="<?php echo $this->datos['correo']?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="empresa">Empresa Actual</label>
                            <input type="text" class="form-control" id="empresa" value="" readonly>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-5">
                <div style="text-align: center;">
                    <img src="<?php echo constant('URL')?>public/img/user.png" alt="..." class="rounded-circle" style="background-color: grey;">
                </div>
                <br>
                <div style="border-top: 3px solid #3c8dbc; background-color: white;">
                    <h4 style="padding-left: 10px;">Seleccionar Hoja de Vida</h4>
                    <form>
                        <div class="input-group mb-3"
                            style="padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Cargar</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01">
                                <label class="custom-file-label" for="inputGroupFile01">...</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #dd4b39; border-color: #dd4b39;">Cargar</button>
                    </form>
                </div>
                <br>
                <div id="hojav" style="border-top: 3px solid #3c8dbc; background-color: white;">
                    <div class="form-group">
                        <h4 class="control-label" style="padding-left: 10px;">Visualizar Hoja de Vida</h4>
                        <div class="embed-responsive embed-responsive-16by9" id="pdf">
                            <iframe class="embed-responsive-item" src="<?php echo constant('URL')?>public/img/elementary os.pdf"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer class="card-footer footer-separacion" style="background-color: #dd4b39; z-index: 1002;">

    </footer>
</body>
<script type="text/javascript" src="<?php echo constant('URL')?>public/js/estudiante/perfilE.js"></script>
</html>