<div class="container" id="contenedor">
    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Pruebas</h6>
                    <h5 class="h3 mb-0">Pruebas de estado</h5>
                </div>
            </div>
        </div>
 
        <div class="card-body">

            <div class="row">
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="number" size="7" maxlength="7" name="" id="buscarPrueba"class="form-control" placeholder="Codigo Estudiante" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button onclick="getPrueba()" class="btn btn-outline-secondary" type="button" id="button-addon2" style="background-color: #dd4b39; border-color: #dd4b39; color: white;">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div style="margin-bottom:15px;font-size:15px"class="input-group">
            <div style="" class="input-group-prepend">
                <span  class="input-group-text">Nombre(s) y Apellido(s)</span>
            </div>
            <input type="text" id="name" aria-label="First name" class="form-control" disabled>
            <input type="text" id="apellido" aria-label="Last name" class="form-control" disabled>
            </div>

            <div style=" display:none" id="alert"class="alert alert-danger" role="alert">
                        <p class="respuesta" id="cargaPrueba" ></p></div>
                        <div style=" display:none"id="alert2" class="alert alert-success" role="alert">
                        <p class="cargaPrueba2"></p>
                        </div>
            <div class="row">
                <div class="col">
                    <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                        <br>
                        <h4 style="padding-left: 10px;">ICFES</h4>
                        <div id="C1" style="margin: auto; width: 400px !important; height: 400px !important; display: none;">
                            <canvas id="myChart"  ></canvas>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                        <br>
                        <h4 style="padding-left: 10px;">Saber PRO</h4>
                        <div id="C2" style="margin: auto; width: 400px !important; height: 400px !important; display: none;">
                            <canvas id="myChart11"  ></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col">
                    <div style="border-top: 3px solid #3c8dbc; background-color: white; padding-bottom: 10px;">
                        <br>
                        <h4 style="padding-left: 10px;">Comparacion</h4>
                        <div id="C3" style="margin: auto; width: 800px !important; height: 400px !important; display: none;">
                            <canvas id="myChart12"  ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
