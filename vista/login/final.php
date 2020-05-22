<div id="contenedor">
    <form class="form-signin">

        <p class="login-box-msg">
        <h6>Cambiar Contraseña</h6>
        </p>

        <label for="inputToken" class="sr-only">Token</label>
        <input type="text" id="inpToken" class="form-control" placeholder="Token" required autofocus>

        <label for="inputPasswordn" class="sr-only">Nueva Contraseña</label>
        <input type="password" id="inputPasswordn" class="form-control" placeholder="Nueva Contraseña" required>

        <label for="inputPasswordc" class="sr-only">Confirmar Contraseña</label>
        <input type="password" id="inputPasswordc" class="form-control" placeholder="Confirmar Contraseña" required>

        <button onclick="return nuevaContraseña(event)" type="submit" class="btn btn-danger btn-block btn-flat">Cambiar</button>
        <div style=" margin-top:10px; display:none; " id="alertToken" class="alert alert-danger" role="alert">
                <p class="respuesta" id="respuestaToken"></p>
        </div>
        <div style="margin-top:10px; display:none; " id="alertToken2" class="alert alert-success" role="alert">
                <p class="respuesta" id="respuestaToken2"></p>
        </div>
    </form>
</div>