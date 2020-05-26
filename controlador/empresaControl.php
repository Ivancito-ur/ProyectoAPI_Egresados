<?php
  class empresaControl extends Controller{
       
        

        function __construct(){
          parent::__construct();
          if(!isset($_SESSION['empresa'])){
            header('Location: ' . constant('URL'). 'empresaControl');   
            return;
          } 


       
        }
                    
        function render($ubicacion = null){
          if(!isset($ubicacion[1])){
            $constr = "empresa";
          }else{
            $constr = $ubicacion[1];
          }
         
          if(isset($ubicacion[0])){
          $this->view->render($constr , $ubicacion[0]);
          }else{
          $this->view->render($constr, 'index');}
        }

    }
?>