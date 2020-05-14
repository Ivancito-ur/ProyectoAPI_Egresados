<!DOCTYPE html>
<html lang="en">

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

    
        <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/director/estiloAdm.css">
</head>

<body style="background-color: #ecf0f5;">

    <nav class="navbar navbar-light" style="background-color: #dd4b39; z-index: 1001;">
        <div class="nav-link">
            <span style="color: white;" class="navbar-brand mb-0 h1">ADMINISTRATIVO</span>
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
                    <a onclick="loadCa()" href="#" class="list-group-item list-group-item-action">Cargar Estudiantes</a>
                    <a onclick="loadSe()" href="#" class="list-group-item list-group-item-action">Seguimiento y
                        Control</a>
                    <a onclick="loadTe()" href="#" class="list-group-item list-group-item-action">Tesis de Grado</a>
                    <a onclick="loadPr()" href="#" class="list-group-item list-group-item-action">Pruebas de Estado</a>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <div class="container" id="contenedor">
        <h1>Cargar Estudiantes</h1>
        <div class="row">
            <div class="col">
                <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                    <br>
                    <h4 style="padding-left: 10px;">Actualizar Estudiante</h4>
                    <div class="input-group mb-3" style="padding-left: 10px; padding-right: 10px;">
                        <input type="text" class="form-control" placeholder="Codigo Estudiante"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="background-color: #dd4b39; border-color: #dd4b39; color: white;">Buscar</button>
                        </div>
                    </div>
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
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #dd4b39; border-color: #dd4b39;">Actualizar</button>
                    </form>
                </div>
            </div>
            <div class="col">
                <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                    <br>
                    <h4 style="padding-left: 10px;">Seleccionar Archivo</h4>

                    <form action="" class="formularioCompleto" method="" enctype="multipart/form-data">
                        <div class="input-group mb-3" style="padding-left: 10px; padding-right: 10px;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Cargar</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                    aria-describedby="inputGroupFileAddon01" name="archivo">
                                <label class="custom-file-label" for="inputGroupFile01">...</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"
                            style="background-color: #dd4b39; border-color: #dd4b39;" name="enviar">Cargar</button>
                        <div style="display:none; text-align:center; padding:10px ; margin-top:15px" id="alert"class="alert alert-danger" role="alert">
                        <p class="respuesta" id="respuesta" ></p></div>
                        <div style="display:none; text-align:center; padding:10px ; margin-top:15px" id="alert2" class="alert alert-success" role="alert">
                        Cargado Correctamente
                        </div>
                        
                    </form>


                </div>
            </div>
        </div>
    </div>

    <footer class="card-footer footer-separacion" style="background-color: #dd4b39; z-index: 1002;">

    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="<?php echo constant('URL')?>public/js/director/main.js"></script> 
</html>