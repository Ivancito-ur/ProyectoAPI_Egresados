<div id="contenedor" >
    <form class="form-signin">

      <p class="login-box-msg"><h6>EMPRESA</h6></p>
      <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>

      <label for="inputEmail" class="sr-only">Nit</label>
      <input type="text" id="inputNit" class="form-control" placeholder="Nit" required autofocus>

      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>

      <div style="display:none" id="respuestaEmpresa" class="alert alert-danger" role="alert">
            <p class="respuestaEmpre" ></p>
      </div>

      <button onclick="return verificarDatosEmpresa(event)" type="submit" class="btn btn-danger btn-block btn-flat">Iniciar Sesión</button>

    </form>
  </div>