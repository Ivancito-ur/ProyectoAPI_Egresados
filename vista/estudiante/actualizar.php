<div class="container">
    <h1>Actualizar Datos</h1>
    <div id="hojav" style="border-top: 3px solid #3c8dbc; background-color: white;">
        <form>
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
            <div class="form-group">
                <label for="empresa">Empresa Actual</label>
                <input type="text" class="form-control" id="empresa">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Acepto</label>
            </div>
            <button onclick="return actualizarDatos(event)" type="submit" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Actualizar</button>
        </form>
    </div>
</div>