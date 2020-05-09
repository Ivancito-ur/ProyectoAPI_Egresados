<?php

 require_once 'controlador/errorControl.php';
 class App{
   

    function __construct(){

        $dir = isset($_GET['url']) ? $_GET['url'] : null;
        $url = $dir;
        $url = rtrim( $url, '/');
        //dividimos los parametros
        $url = explode('/',  $url);

        if($dir==null){
            header('Location: http://localhost/redSocial/personaControl');
        }


        if(empty($url[0])){
            $this->defecto();
        }else if(!empty($url[0])){      
            $aux = "perfilControl/render/index";
            if((strcmp($dir, $aux)  === 0) && !isset($_SESSION['user'])){
                header('Location: http://localhost/redSocial/personaControl');
                return;
            }else if(isset($_SESSION['user']) && ($url[0]=="personaControl")){
                header('Location: http://localhost/redSocial/perfilControl/render/index');
                return;
            }
           //unset($_SESSION['user']);
            $this->busqueda($url);
        }
        
        

    }

    function defecto(){
            $url[0]='persona';
            $archivoController = 'controlador/personaControl.php';
            require_once $archivoController;
            $controller = new  personaControl();
            $controller->loadModel($url[0]);
            $controller->render(null);
            header('Location: http://localhost/redSocial/personaControl');
            return;
    }

    function busqueda($url){
        $archivoController = 'controlador/'. $url[0] .'.php';
            
        if(file_exists($archivoController)){
            require_once $archivoController;
    
            //inicializa el controlador y cargamos el modelo
            $controller = new $url[0];
            $url[0] = trim($url[0], 'Control');
            $controller->loadModel($url[0]);
        
    
            //numero de elentos del arreglo
            $nparam = sizeof($url);
    
            if($nparam>1){
                $def = method_exists($controller,$url[1]);
                if(!$def)  $controller = new errorControl("index");
                if($nparam>2){
                    $param=[];
                    for($i = 2; $i<$nparam;$i++){
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }else{
                    $controller->{$url[1]}();
                
                }
            }
            else{
                $controller->render(null);
            }
    
        }else{
           
            $controller = new errorControl("index");
        }    
    }  
}

?>