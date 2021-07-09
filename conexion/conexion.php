<?php
//Clase usada para la conexion a la base de datos
class Conexion{

    //atributo donde se guardara la conexion a la base de datos
    private $conn = null;

    //constructor de la clase Conexion
    public function __construct(){        

        //Conexion Pruebas        
        //$this->conn = new mysqli("cs2000.webhostbox.net", "estuds6q_mice67", "#Mice671111", "estuds6q_katsa");

        //Conexion Produccion
        $this->conn = new mysqli("localhost", "adminkatsa", "#Katsa05012021", "katsa");


        //Se comprueba la conexion creada y muestra mensaje de error
        if ($this->conn->connect_errno) {
            echo "Error MySQLi: ". $this->conn->connect_error;
            exit();
        }
        $this->conn->set_charset("utf8");
    }

    //Destructor de la clase Conexion
    public function __destruct(){
        $this->CloseDB();
    }

    //Funcion con la que se obtienen los datos de la conexion
    public function getConexion(){
        return $this->conn;
    }

    //funcion que regresa el resultado de un select
    public function query($qry){
        $result = $this->conn->query($qry);
        //$this->CloseDB();
        return $result;
    }

    //Funcion que cierra la base de datos que se esta usando
    public function CloseDB(){
        $this->conn->close();
    }

}
?>
