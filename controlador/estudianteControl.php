<?php
   

class estudianteControl extends Controller{
       
        

        function __construct(){
          parent::__construct();
        }
                    
        function render($ubicacion = null){
          $constr = "login";
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
          echo $resultado->getcodigoEstudiante();
          //echo $url[0];
        }

       

        

      
}
?>