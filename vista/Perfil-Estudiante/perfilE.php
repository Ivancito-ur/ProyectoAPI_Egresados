<!DOCTYPE html>
<?php
//require_once '../../metodos/hoja_vida/hojaVida.php';
$codigoEstudiante =1151612; //Se Cambia por el codigo que este en la sesion
$varArchivo="../../hojasDeVida/$codigoEstudiante".".pdf";
?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <a href=""></a>
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

    <link href="estiloPefil.css" rel="stylesheet">
    <script type="text/javascript" src="perfilE.js"></script>

</head>

<body style="background-color: #ecf0f5;">
    <nav class="navbar navbar-light" style="background-color: #dd4b39; z-index: 1001;">
        <div class="nav-link">
            <span style="color: white;" class="navbar-brand mb-0 h1">ESTUDIANTE</span>
            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                aria-controls="collapseExample">
                <img src="./img/toggle.png" alt="">
            </a>
        </div>
        <div><a href="#"><img src="./img/out.png" alt=""></a></div>
    </nav>
    <div>
        <div class="collapse" id="collapseExample" style="width: 250px; position: fixed; z-index: 1000;">
            <div id="menu" class="card card-body">
                <ul class="list-group list-group-flush" style="min-height: 600px;">
                    <a onclick="loadPe()" href="#" class="list-group-item list-group-item-action">Perfil</a>
                    <a onclick="loadAc()" href="#" class="list-group-item list-group-item-action">Actualizar Datos</a>
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
                            <input type="text" class="form-control" id="nombre" readonly>
                        </div>
                        <div class="form-group">
                            <label for="apellido">Apellidos</label>
                            <input type="text" class="form-control" id="apellido" readonly>
                        </div>
                        <div class="form-group">
                            <label for="telefono">Telefono</label>
                            <input type="number" class="form-control" id="telefono" readonly>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" class="form-control" id="direccion" readonly>
                        </div>
                        <div class="form-group">
                            <label for="fechai">Fecha de Ingreso</label>
                            <input type="text" class="form-control" id="fechai" readonly>
                        </div>
                        <div class="form-group">
                            <label for="fechae">Fecha de Egreso</label>
                            <input type="text" class="form-control" id="fechae" readonly>
                        </div>
                        <div class="form-group">
                            <label for="correoi">Correo Institucional</label>
                            <input type="email" class="form-control" id="correoi" readonly>
                        </div>
                        <div class="form-group">
                            <label for="correop">Correo Personal</label>
                            <input type="email" class="form-control" id="correop" readonly>
                        </div>
                        <div class="form-group">
                            <label for="empresa">Empresa Actual</label>
                            <input type="text" class="form-control" id="empresa" readonly>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-5">
                <div style="text-align: center;">
                    <img src="./img/user.png" alt="..." class="rounded-circle" style="background-color: grey;">
                </div>
                <br>
                <div style="border-top: 3px solid #3c8dbc; background-color: white;">
                    <h4 style="padding-left: 10px;">Seleccionar Hoja de Vida</h4>
                    <form  method="post"  action="../../metodos/hoja_vida/saveHV.php" name="hv" enctype="multipart/form-data">
                        <div class="form-group" style="display: none">
                            <label for="nombre">Codigo</label>
                            <input type="text" class="form-control" name="codigo" value="<?=$codigoEstudiante?>" readonly>
                        </div>
                        <div class="input-group mb-3"
                            style="padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                            <div >
                                <input type="file" name="hojaVida" value="hojaVida"
                                    aria-describedby="inputGroupFileAddon01" accept="application/pdf">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #dd4b39; border-color: #dd4b39;" name="cargar" value="cargar">Cargar</button>
                    </form>
                </div>
                <br>
                <div id="hojav" style="border-top: 3px solid #3c8dbc; background-color: white;">
                    <div class="form-group">
                        <h4 class="control-label" style="padding-left: 10px;">Visualizar Hoja de Vida</h4>
                        <div class="embed-responsive embed-responsive-16by9" id="pdf">
                            <iframe class="embed-responsive-item" src="<?=$varArchivo?>" acce
                                allowfullscreen></iframe>
                        </div>
                        <p>"<?=$varArchivo?>"</p>
                        <p>"<?=$codigoEstudiante?>"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer class="card-footer footer-separacion" style="background-color: #dd4b39; z-index: 1002;">

    </footer>

    
</body>

</html>
