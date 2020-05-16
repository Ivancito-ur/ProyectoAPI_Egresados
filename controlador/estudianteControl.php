<?php
   

class estudianteControl extends Controller{
       
        

        function __construct(){

          
          parent::__construct();
          if(!isset($_SESSION['usuario'])){
            header('Location: ' . constant('URL'). 'loginControl');   
            return;
          }
          $this->view->datos = [];
          $this->view->direccion = "";
         
        }
                    
        function render($ubicacion = null){
          if(!isset($ubicacion[1])){
            $constr = "estudiante";
          }else{
            $constr = $ubicacion[1];
          }
          
          $this->getDatos();
          $this->getHoja();
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

        function cargarPDF($param = null){
          $codigo = $_POST['codigo'];
          $nombre = $_POST['codigo'] . ".pdf"; //Se Toma el cod del campo oculto en el formulario y se agrega la extension
          $ruta = $_FILES['hojaVida']['tmp_name'];
          $destino = "almacen/hojasDeVida/" . $nombre;
         if ($ruta != "") {
              if (copy($ruta, $destino)) { //Se copia el archivo de la ruta a la carpeta del server
                  $this->model->insertHoja($destino,$codigo);
                  echo "2";   
              } else {
                  echo "1";
              }
          }else {
            echo "0";
          }
        }

        function getHoja(){
          $codigo = $_SESSION['usuario'];
          $this->view->direccion =  $this->model->existHoja($codigo);
         
        }

       

        

        

      
}
?>