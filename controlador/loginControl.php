<?php
  class loginControl extends Controller{
       
        

        function __construct(){
          parent::__construct();
          if(isset($_SESSION['usuario'])){
            header('Location: ' . constant('URL'). 'estudianteControl');   
            return;
          } else if(isset($_SESSION['administrador'])){
            header('Location: ' . constant('URL'). 'directorControl');   
            return;
          } else if(isset($_SESSION['empresa'])){
            header('Location: ' . constant('URL'). 'directorControl');   
            return;
          } 


       
        }
                    
        function render($ubicacion = null){
          if(!isset($ubicacion[1])){
            $constr = "login";
          }else{
            $constr = $ubicacion[1];
          }
         
          if(isset($ubicacion[0])){
          $this->view->render($constr , $ubicacion[0]);
          }else{
          $this->view->render($constr, 'login');}
        }


        function validarEstudiante($url=null){
          //if($url==null)return;
          $resultado = $this->model->verificarEstudiante($url[0], $url[1], $url[2]);
          if(empty($resultado)){
            echo 0;
            return;
          }
          $_SESSION["usuario"] = $resultado->getcodigoEstudiante();
          $_SESSION["documento"] =  $resultado->getDocumento();
          echo 1;
          //echo $url[0];
        }


        function validarDirector($url=null){
          if($url==null)return;
          $resultado = $this->model->verificarDirector($url[0], $url[1], $url[2]);
          if(empty($resultado)){
            echo 0;
            return;
          }
          $_SESSION["administrador"] = $resultado->getcodigoDirector();
          $_SESSION["documentoAdmin"] =  $resultado->getDocumento();
          echo 1;
          //echo $url[0];
        }

        function validarEmpresa($url=null){
          if($url==null)return;
          $resultado = $this->model->verificarEmpresa($url[0], $url[1]);
          if(empty($resultado)){
            echo 0;
            return;
          }
          $_SESSION["empresa"] = $resultado['nitEmpresa'];
          echo 1;
          //echo $url[0];
        }

        function cerrarSesionEstudiante(){
          unset($_SESSION['usuario']);
          unset($_SESSION['documento']);
          session_destroy();
          header('Location: ' . constant('URL'). 'loginControl');  
      }
      
        function cerrarSesionAdministrativo(){
          unset($_SESSION['administrador']);
          unset($_SESSION['documentoAdmin']);
          session_destroy();
          header('Location: ' . constant('URL'). 'loginControl');  
      }

      function cerrarSesionEmpresa(){
        unset($_SESSION['empresa']);
        session_destroy();
        header('Location: ' . constant('URL'). 'loginControl');  
    }



      

      function recuperarContraseña($param=null){
        require_once "utils/correo/Correo.php";
        $email = new Correo();
        $resultadoD = $this->model->getCodigoDirector($param[0], $param[1]);
        $resultadoE = $this->model->getCodigoEstudiante($param[0], $param[1]);
        
        
        if($resultadoE != null ){
        
          $email->cargaCorreo($resultadoE, "recuperacion de correo", $param[2], 1);
          $_SESSION['codigoRecuperacion'] = $param[2];
          $_SESSION['codigoTemporal'] = $param[0];
          $_SESSION['tiempo'] = time();
          $_SESSION['token'] = "si";
        
          echo 1;
          return;
        }
        if($resultadoD != null ){

          $email->cargaCorreo($resultadoD, "recuperacion de correo", $param[2],1);
          $_SESSION['codigoRecuperacion'] = $param[2];
          $_SESSION['codigoTemporal'] = $param[0];
          $_SESSION['tiempo'] = time();
          $_SESSION['token'] = "si";
          echo 1;
          return;
        }

        if($resultadoD == null || $resultadoE == null){
          echo 0;
          return;
        }


      }

      function validarToken(){
        $respuesta = $this->claveAleatoria();
        if(isset($_SESSION['token']) && $respuesta==1){
          echo 0;
          return;
        }
          echo 1;
          return;
      }


      function verficarCodigo($param=null){
       $respuesta = $this->claveAleatoria();
        $codigoTemp =   $_SESSION['codigoTemporal'];
        if($respuesta==0){
          echo 0;}
        else if($param[0]== $_SESSION['codigoRecuperacion']){
          unset($_SESSION['token']);
          session_destroy();

          $res = $this->model->updateContraseñaEstudiante($codigoTemp, $param[1]);
          if($res==0){
            $res1 = $this->model->updateContraseñaDirector($codigoTemp, $param[1]);
          }
          echo 1;
        }else if($param[0]!= $_SESSION['codigoRecuperacion']){
          echo 2;
          } 

      
      }


      function claveAleatoria(){
       
        //Comprobamos si esta definida la sesión 'tiempo'.
         if(isset($_SESSION['tiempo']) ) {
 
           //Tiempo en segundos para dar vida a la sesión.
           $inactivo = 90;//1min en este caso.
 
           //Calculamos tiempo de vida inactivo.
           $vida_session = time() - $_SESSION['tiempo'];
 
               //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
               if($vida_session > $inactivo)
               {
                unset($_SESSION['tiempo']);
                session_destroy();
                  
                   return 0;
 
                
               } else {  // si no ha caducado la sesion, actualizamos
         
                 return 1;
               }
 
 
        } 
        return 2;
 
      }

       

        

      
}
?>