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


        function getHojaVidaE(){
          $resultado = $this->model->getHojaVidaE();
          $json = array();
          foreach ($resultado as $est) {
              $json[] = array(
                  'archivo' => $est['archivo'],
                  'nombres' => $est['nombres'],
                  'apellidos' => $est['apellidos'],
                  'correo' => $est['correo'],
                  'telefono' => $est['telefono'],
                  'promedio' => $est['promedio']
              );
          }
          $JString = json_encode($json);
          echo $JString;
        }

        function getHojaVidaA(){
          $resultado = $this->model->getHojaVidaA();
          $json = array();
          foreach ($resultado as $est) {
              $json[] = array(
                  'archivo' => $est['archivo'],
                  'nombres' => $est['nombres'],
                  'apellidos' => $est['apellidos'],
                  'correo' => $est['correo'],
                  'telefono' => $est['telefono'],
                  'promedio' => $est['promedio']
              );
          }
          $JString = json_encode($json);
          echo $JString;
        }


        function crearOferta($param){
          echo $this->model->crearOferta($param[0], $param[1],$param[2],$param[3], $param[4],$param[5],  $_SESSION["empresa"] );
        }


        function listarOferta(){
          $resultado = $this->model->listarOferta( $_SESSION["empresa"]);
          $json = array();
          foreach ($resultado as $est) {
              $json[] = array(
                  'id' => $est['id'],
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


        function eliminarOferta($param){
          $codigo = $param[0];
          $this->model->eliminarOferta($codigo);
          echo "Evento eliminado";

        }

    }
?>