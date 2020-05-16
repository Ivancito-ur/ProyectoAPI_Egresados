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
          $resultado = $this->model->verificarEstudiante($url[0], $url[1], $url[2]);
          if(empty($resultado)){
            echo "0";
            return;
          }
          $_SESSION["usuario"] = $resultado->getcodigoEstudiante();
          $_SESSION["documento"] =  $resultado->getDocumento();
          echo "1";
          //echo $url[0];
        }


        function validarDirector($url=null){
          $resultado = $this->model->verificarDirector($url[0], $url[1], $url[2]);
          if(empty($resultado)){
            echo "0";
            return;
          }
          $_SESSION["administrador"] = $resultado->getcodigoDirector();
          $_SESSION["documentoAdmin"] =  $resultado->getDocumento();
          echo "1";
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

       

        

      
}
?>