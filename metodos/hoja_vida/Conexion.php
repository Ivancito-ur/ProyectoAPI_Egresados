<?php 

class Conexion {   
    private $driver = 'mysql';
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbName = 'ff';
    private $charset = 'utf8';

    protected function conexionBd()
    {
        try {
         //  $pdo = new PDO("{$this->driver}:host={$this->host};dbName={$this->dbName};charset={$this->charset}", $this->user, $this->pass);
           $pdo = new PDO('mysql:host=localhost;dbname=f;charset=utf8', 'root', '');
           $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         //  echo "{$this->driver}:host={$this->host};dbName={$this->dbName};charset={$this->charset}", "{$this->user}", $this->pass;
            return $pdo;
        } catch (PDOException $e) {
            echo $e->getMessage();

        }
    }

}
?>