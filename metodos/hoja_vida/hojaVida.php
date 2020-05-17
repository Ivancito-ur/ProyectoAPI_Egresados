<?php
require_once 'Crud.php';
class hojaVida extends Crud
{
    private $archivo;
    private $codigoEstudiante;
    const TABLE = 'hojavida';

    public function __construct()
    {
        parent::__construct(self::TABLE);
        $this->pdo = parent::conexionBd();
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    public function __get($name)
    {
        return $this->$name;
    }

    public function create()
    {
        $stm = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (archivo,codigoEstudiante) VALUES (?,?)");
        $stm->execute(array($this->archivo, $this->codigoEstudiante));
    }
    public function update()
    {}

    public function subir()
    {
        if (isset($_POST['cargar'])) {
            // $codigo= $_FILES['hojaVida']['codigo'];
            $nombre = $_POST['codigo'] . ".pdf"; //Se Toma el cod del campo oculto en el formulario y se agrega la extension
            $ruta = $_FILES['hojaVida']['tmp_name'];
            $destino = "../../hojasDeVida/" . $nombre;
            if ($nombre != "") {
                if (copy($ruta, $destino)) { //Se copia el archivo de la ruta a la carpeta del server
                    //  $db= mysqli_connect("localhost","root","","egresados_agroindustrial");
                    header('location:../../vista/Perfil-Estudiante/PerfilE.php?answer=Ready');
                    //$db = new Conect_MySql();
                    //   $sql = "INSERT INTO hojavida(archivo,codigoEstudiante) VALUES('$nombre','$codigo')";
                    //     $query = $db->execute($sql);
                    //   header('Location:../../vista/Perfil-Estudiante/PerfilE.php'); //Redireccion a pagina de la hoja de vida

                    //  echo '<script language="javascript">alert("juas");</script>';
                } else {
                    echo "noo";
                }
            }
        }
    }

}
