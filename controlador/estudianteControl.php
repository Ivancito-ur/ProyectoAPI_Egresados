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
          $this->view->permiso = "";

        }
                    
        function render($ubicacion = null){
          if(!isset($ubicacion[1])){
            $constr = "estudiante";
          }else{
            $constr = $ubicacion[1];
          }
          
          $this->getDatos();
          $this->getHoja();
          $this->Permiso();
  
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
          $this->model->updateDatos([ 'documento' => $_SESSION['documento'],'celular' => $param[0], 'telefono' => $param[1], 'direccion' =>$param[2], 'correo'=>$param[3]]);
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

        function getTesis(){
          $codigo = $_SESSION['usuario'];
          $respuesta = $this->model->existTesis($codigo);

          $json[] = array(
            'archivo' => $respuesta['archivo'],
            'titulo' => $respuesta['titulo']
          );

          $JString = json_encode($json);
          echo $JString;
         
        }

        function Permiso(){
          $codigo = $_SESSION['usuario'];
          $this->view->permiso =  $this->model->Permiso($codigo);
        }

        function otorgarPermiso($param){
          $codigo = $_SESSION['usuario'];
          echo $param[0];
          $this->model->otorgarPermiso($codigo, $param[0]);
        }


        function verificarOferta(){
          $codigo = $_SESSION['usuario'];
          $resultado = $this->model->getEstudiante($codigo);

          $json[] = array(
           'egresado' => $resultado['egresado'],
           );
 
          $egresado = json_encode($json);
          echo $egresado;

        }

        function listarOferta(){
          $resultado = $this->model->listarOferta();
          $json = array();
          foreach ($resultado as $est) {
              $json[] = array(
                  'id' => $est['id'],
                  'nombre' => $est['nombre'],
                  'empleo' => $est['empleo'],
                  'jornada' => $est['jornada'],
                  'salario' => $est['salario'],
                  'telefono' => $est['telefono'],
                  'descripcion' => $est['descripcion'],
                  'requerimientos' => $est['requerimientos']
              );
          }
          $JString = json_encode($json);
          echo $JString;
        }

        function getOferta($param){
          $resultado = $this->model->getOferta($param[0]);

            $json[] = array(
                'id' => $resultado['id'],
                'nombre' => $resultado['nombre'],
                'empleo' => $resultado['empleo'],
                'jornada' => $resultado['jornada'],
                'salario' => $resultado['salario'],
                'telefono' => $resultado['telefono'],
                'descripcion' => $resultado['descripcion'],
                'requerimientos' => $resultado['requerimientos']
            );


            $JString = json_encode($json);
            echo $JString;

        }

        
        function listarEvento($param){
          $resultado = $this->model->listarEvento($param[0]);
          $json = array();
          foreach ($resultado as $est) {
              $json[] = array(
                  'id' => $est['id'],
                  'titulo' => $est['titulo'],
                  'direccion' => $est['direccion'],
                  'fecha' => $est['fecha'],
                  'hora' => $est['hora'],
                  'responsable' => $est['responsable'],
                  'ciudad' => $est['ciudad'],
                  'descripcion' => $est['descripcion'],
                  'destinatario' => $est['destinatario']
              );
            }
          $JString = json_encode($json);
          echo $JString;
         
        }

        function getEvento($param){
          $resultado = $this->model->getEvento($param[0]);

            $json[] = array(
                'titulo' => $resultado['titulo'],
                'lugar' => $resultado['direccion'],
                'fecha' => $resultado['fecha'],
                'hora' => $resultado['hora'],
                'resumen' => $resultado['descripcion']
            );

          
            
            $JString = json_encode($json);
            echo $JString;

        }


        function listarNoticias($param){
          $resultado = $this->model->listarNoticias($param[0]);
         $json = array();
         
          foreach ($resultado as $est) {
              $json[] = array(
                  'id' => $est['id'],
                  'fecha_publicacion' => $est['fecha_publicacion'],
                  'titulo' => $est['titulo'],
                  'cuerpo' => $est['cuerpo'],
                  'autor' => $est['autor']
              );
            }
          $JString = json_encode($json);
          echo $JString;
        }

        function getNoticia($param){
          $resultado = $this->model->getNoticia($param[0]);

            $json[] = array(
              'id' => $resultado['id'],
              'fecha_publicacion' => $resultado['fecha_publicacion'],
              'titulo' => $resultado['titulo'],
              'cuerpo' => $resultado['cuerpo'],
              'autor' => $resultado['autor'],
              'destinatario' => $resultado['destinatario']
            );

          
            
            $JString = json_encode($json);
            echo $JString;

        }

        function getUltimaNoticia($param){
          if($param==null)return;
          $resultado = $this->model->getUltimaNoticia($param[0]);

          $json[] = array(
            'id' => $resultado['id'],
            'fecha_publicacion' => $resultado['fecha_publicacion'],
            'titulo' => $resultado['titulo'],
            'cuerpo' => $resultado['cuerpo'],
            'autor' => $resultado['autor'],
            'destinatario' => $resultado['destinatario']
          );

        
          
          $JString = json_encode($json);
          echo $JString;
        }


      
}
?>