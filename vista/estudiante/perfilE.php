<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingenieria Agroindustrial</title>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/estudiante/estiloPefil.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Director Agroindustrial</title>
  <!-- Favicon -->
  <!--<link rel="icon" href="<?php echo constant('URL') ?>public/assets/img/brand/favicon.png" type="image/png">-->
  <link rel="shortcut icon" href="<?php echo constant('URL') ?>public/img/agro.png" />
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/assets/css/argon.css?v=1.2.0" type="text/css">

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

</head>
<?php $codigo = $_SESSION['usuario']; ?>

<body style="background-color: #ecf0f5;">

  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="<?php echo constant('URL') ?>public/assets/img/ufps/logo-horizontal.jpg" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="">
                <i class="fas fa-id-badge"></i>
                <span class="nav-link-text">Perfil</span>
              </a>
            </li>
            <li class="nav-item">
              <a onclick="loadAc()" class="nav-link" href="#">
                <i class="fas fa-edit"></i>
                <span class="nav-link-text">Actualizar Datos</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Paginas institucionales</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://ww2.ufps.edu.co/" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">UFPS</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://divisist2.ufps.edu.co/" target="_blank">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Divisist 2.0</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://uvirtual.cloud.ufps.edu.co/" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">U virtual UFPS</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center    ml-md-auto ">

            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?php echo constant('URL') ?>public/assets/img/ufps/logo_agroindustrial.png">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold">Egresado Agroindustrial</span>
                  </div>
                </div>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center ml-auto ml-md-0 ">

            <li class="nav-item dropdown">
              <a class="nav-link" href="<?php echo constant('URL') ?>loginControl/cerrarSesionEstudiante" role="button">
                <i class="ni ni-button-power"></i>
              </a>
            </li>

          </ul>

        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Bienvenido</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Fecha</h5>
                      <span class="h2 font-weight-bold mb-0"><?= date('d/m/y'); ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container" id="contenedor">

      
      <div class="row">
        <div class="col-7">
          <div class="card">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="text-uppercase text-muted ls-1 mb-1">Visualizar</h6>
                  <h5 class="h3 mb-0">Visualizacion de datos</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <h1>Perfil del Estudiante</h1>
              <div class="box box-primary" style="border-top: 3px solid #3c8dbc; background-color: white;">
                <form>
                  <div class="form-group">
                    <label for="nombre">Nombres</label>
                    <input type="text" class="form-control" id="nombre" value="<?php echo $this->datos['nombres'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="apellido">Apellidos</label>
                    <input type="text" class="form-control" id="apellido" value="<?php echo $this->datos['apellidos'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="number" class="form-control" id="telefono" value="<?php echo $this->datos['telefono'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" id="direccion" value="<?php echo $this->datos['direccion'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="fechai">Fecha de Ingreso</label>
                    <input type="text" class="form-control" id="fechai" value="<?php echo $this->datos['fechaIngreso'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="fechae">Fecha de Egreso</label>
                    <input type="text" class="form-control" id="fechae" value="<?php echo $this->datos['fechaEgreso'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="correoi">Correo Institucional</label>
                    <input type="email" class="form-control" id="correoi" value="<?php echo $this->datos['correoInstitucional'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="correop">Correo Personal</label>
                    <input type="email" class="form-control" id="correop" value="<?php echo $this->datos['correo'] ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label for="empresa">Empresa Actual</label>
                    <input type="text" class="form-control" id="empresa" value="" readonly>
                  </div>
                </form>
              </div>
            </div>

          </div>


        </div>

        
        
        
        <div class="col-5">
          <div class="card">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">
                <h6 class="text-uppercase text-muted ls-1 mb-1">Visualizar</h6>
                <h5 class="h3 mb-0">Visualizacion de datos</h5>
              </div>
            </div>
          </div>

          <div class="card-body">
            
            <div style="text-align: center;">
              <img src="<?php echo constant('URL') ?>public/img/user.png" alt="..." class="rounded-circle" style="background-color: grey;">
            </div>
            <br>
            <div style="border-top: 3px solid #3c8dbc; background-color: white;">
              <h4 style="padding-left: 10px;">Seleccionar Hoja de Vida</h4>
              <form action="" class="formularioEstudiante" method="" enctype="multipart/form-data">
                <div class="form-group" style="display: none">
                  <label for="nombre">Codigo</label>
                  <input type="text" class="form-control" name="codigo" value="<?php echo $codigo ?>" readonly>
                </div>
                <div class="input-group mb-3" style="padding-left: 10px; padding-right: 10px; padding-bottom: 10px;">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Cargar</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" style="display:none" name="hojaVida" id="hojaVida" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="hojaVida">
                      <p class="nameArchivo">...</p>
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: #dd4b39; border-color: #dd4b39;">Cargar</button>
                <div style="text-align:center; padding:10px ; margin-top:15px" id="alert" class="alert alert-danger" role="alert">
                  <p class="respuesta" id="respuesta"></p>
                </div>
                <div style="text-align:center; padding:10px ; margin-top:15px" id="alert2" class="alert alert-success" role="alert">
                  Cargado Correctamente
                </div>
              </form>
  
            </div>
            <br>
            <div id="hojav" style="border-top: 3px solid #3c8dbc; background-color: white;">
              <div class="form-group">
                <h4 class="control-label" style="padding-left: 10px;">Visualizar Hoja de Vida</h4>
                <?php if ($this->direccion != null) : ?>
                  <div class="embed-responsive embed-responsive-16by9" id="pdf">
                    <iframe class="embed-responsive-item" src="<?php echo constant('URL') .  $this->direccion['archivo'] ?> " allowfullscreen></iframe>
                  </div>
                <?php else : ?>
                  <div class="embed-responsive embed-responsive-16by9" id="pdf">
                    <iframe class="embed-responsive-item" src="" allowfullscreen></iframe>
                  </div>
                <?php endif ?>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
    <br>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="<?php echo constant('URL') ?>public/js/estudiante/perfilE.js"></script>
  <script src="<?php echo constant('URL') ?>public/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo constant('URL') ?>public/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo constant('URL') ?>public/assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="<?php echo constant('URL') ?>public/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="<?php echo constant('URL') ?>public/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="<?php echo constant('URL') ?>public/assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="<?php echo constant('URL') ?>public/assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="<?php echo constant('URL') ?>public/assets/js/argon.js?v=1.2.0"></script>

  <script src="<?php echo constant('URL') ?>public/js/director/main.js"></script>

</body>

</html>