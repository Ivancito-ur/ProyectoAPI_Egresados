<?php
   

class estudianteControl extends Controller{
       
        

        function __construct(){
          parent::__construct();
          if(!isset($_SESSION['usuario'])){
            header('Location: ' . constant('URL'). 'loginControl');   
            return;
          }
          $this->view->datos = [];
         
        }
                    
        function render($ubicacion = null){
          if(!isset($ubicacion[1])){
            $constr = "estudiante";
          }else{
            $constr = $ubicacion[1];
          }
          
          $this->getDatos();
          if(isset($ubicacion[0])){
          $this->view->render($constr , $ubicacion[0]);
          }else{
          $this->view->render($constr, 'perfilE');}
        }

        function getDatos(){
             $codigo = $_SESSION['usuario'];
             $this->view->datos = $this->model->getEstudiante($codigo);
        }


        function actualizarDatos($param = null){
         if($param == null)return;
         $this->model->updateDatos([ 'documento' => $_SESSION['documento'], 'telefono' => $param[0], 'direccion' => $param[1], 'correo' =>$param[2] ]);
         echo "holis";
        }

       

        

        

      
}
?>