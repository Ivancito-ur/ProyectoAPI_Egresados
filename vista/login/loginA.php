<div id="contenedor" >
       <form class="form-signin">

      <p class="login-box-msg">ADMINISTRATIVO</p>
      <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>

      <label for="inputEmail" class="sr-only">Codigo</label>
      <input type="text" id="inputCodigoA" class="form-control" placeholder="Codigo" required autofocus>

      <label for="inputPassword" class="sr-only">Documento</label>
      <input type="password" id="inputDocumentoA" class="form-control" placeholder="Documento" required>

      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPasswordA" class="form-control" placeholder="Contraseña" required>

      <button onclick="return verificarDatosAdmin(event)" id="validarAdmin" type="submit" class="btn btn-danger btn-block btn-flat">Iniciar Sesión</button>

    </form>
    <div style="display:none" class="alert alert-danger" role="alert">
                        <p class="respuesta" ></p>
  </div>