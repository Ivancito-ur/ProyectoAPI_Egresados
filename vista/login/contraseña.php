<div id="contenedor">
    <form class="form-signin">

        <p class="login-box-msg">
        <h6>Cambiar Contraseña</h6>
        </p>

        <label for="inputEmail" class="sr-only">Codigo</label>
        <input type="text" id="inpCodigoRECU" class="form-control" placeholder="Codigo" required autofocus>

        <div class="form-group">
            <input type="email" id="inpEmailRECU" class="form-control" placeholder="nombre@ejemplo.com" required>
        </div>

     
        <div style="display:flex"class="cajaB" id="token"></div>

        <div style=" margin-top:10px; display:none; " id="alertContraseña" class="alert alert-danger" role="alert">
                <p class="respuesta" id="respuestaContraseña"></p>
        </div>
        <div style="margin-top:10px; display:none; " id="alertContraseña2" class="alert alert-success" role="alert">
                <p class="respuesta" id="respuestaContraseña2"></p>
        </div>
        
       
    </form>
</div>