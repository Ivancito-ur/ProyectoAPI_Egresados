<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  

  <title>Ingenieria Agroindustrial</title>

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
	
	<link rel="shortcut icon" href="<?php echo constant('URL')?>public/img/agro.png" />

    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/login/estiloLogin.css">
</head>

<body class="text-center">

  <div class="slider-wrap">
    <div class="single-slide" id="slide-1"></div>
    <div class="single-slide" id="slide-2"></div>
    <div class="single-slide" id="slide-3"></div>
    <div class="single-slide" id="slide-4"></div>
    <div class="single-slide" id="slide-5"></div>

  </div>

  <div style="background: white; width: 400px; position: fixed; border-top: 5px solid #dd4b39;" class="login-box-body">
  
	<p class="login-box-msg">PORTAL DE EGRESADOS</p>
	
    <img src="<?php echo constant('URL')?>public/img/agro.png" class="rounded">

    <div id="contenedor">
      <form class="form-signin">

        <p class="login-box-msg">ESTUDIANTE</p>
        <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>

        <label for="inputEmail" class="sr-only">Codigo</label>
        <input type="text" id="inpCodigo" class="form-control" placeholder="Codigo" required autofocus>

        <label for="inputPassword" class="sr-only">Documento</label>
        <input type="password" id="inputDocumento" class="form-control" placeholder="Documento" required>

        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>

        <button type="submit" class="btn btn-danger btn-block btn-flat" id="ingresar">Iniciar Sesión</button>

      </form>
    </div>
    <div class="col-xs-12 center-block" style="margin-bottom: 10px;">
      <a href="#" class="text-danger" data-toggle="modal">¿Olvidaste tu clave?</a>
    </div>
    <div class="row login-link" style="border-top: 3px solid #dd4b39;">
      <div class="col-md-4 col-sm-4 col-xs-4" style="margin-top: 10px;">
        <a onclick="loadE()" href="#"><img src="<?php echo constant('URL')?>public/img/student.png" /></a>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4" style="margin-top: 10px;">
        <a onclick="loadA()" href="#"><img src="<?php echo constant('URL')?>public//img/admin.png" /></a>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4" style="margin-top: 10px;">
        <a onclick="loadEm()" href="#"><img src="<?php echo constant('URL')?>public//img/empire.png" /></a>
      </div>
    </div>

  </div>

</body>
  <script src="<?php echo constant('URL')?>public/js/login/login.js"></script> 
</html>