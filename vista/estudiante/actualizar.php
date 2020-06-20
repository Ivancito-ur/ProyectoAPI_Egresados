<div class="container">

    <div class="card">
        <div class="card-header bg-transparent">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="text-uppercase text-muted ls-1 mb-1">Actualizar</h6>
                    <h5 class="h3 mb-0">Actualizacion de datos</h5>
                </div>
            </div>
        </div>


        <div class="card-body">

            <h1>Actualizar Datos</h1>

            <div id="hojav" style="border-top: 3px solid #3c8dbc; background-color: white;">
                <form>
                    <div class="form-group">
                        <label for="telefono">Celular</label>
                        <input type="number" class="form-control" id="celular" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input type="number" class="form-control" id="telefono" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Direccion</label>
                        <input type="email" class="form-control" id="direccion" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo Personal</label>
                        <input type="email" class="form-control" id="correo" aria-describedby="emailHelp">
                    </div>
                    <p class="empresaO" style="display:none;color:orange">Aun no cuentas con una empresa</p>
                    <div class="empresaCaja form-group">
                        <label for="empresa">Nit Empresa Actual</label>
                        <input type="text" class="form-control" id="empresa">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                        <label class="form-check-label" for="exampleCheck1">Acepto</label>
                    </div>
                    <div style="display :none;text-align:center; padding:10px ; margin-top:15px" id="alertACTU" class="alert alert-danger" role="alert">
                     <p class="respuesta" id="respuestaACTU"></p>
                    </div>
                     <div style="display :none;text-align:center; padding:10px ; margin-top:15px" id="alertACTU2" class="alert alert-success" role="alert">
                     Cargado Correctamente
                     </div>
                    <button type="submit"  onclick="return actualizarDatos(event)" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>