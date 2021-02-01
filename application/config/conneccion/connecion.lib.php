
<?php

class connecion_lib {


    var $hots      = "";
    var $Usuario   = "";
    var $Password  = "";
    var $database  = "";

    public function connect()
    {

        $mysqli = new mysqli( $this->hots, $this->Usuario, $this->Password , $this->database );
        if($mysqli->connect_errno)
        {
            return  "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

        }else{
            return $mysqli;
        }

    }

    #Connecion a la base de datos de la empresa selecionada x el usuario logeado
    public function connect_db( $db_name = "" )
    {
        if(empty($db_name)){
            return false;
        }
        $mysqli = new mysqli( $this->hots, $this->Usuario, $this->Password , $db_name );
        if($mysqli->connect_errno)
        {
            return  "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;

        }else{
            return $mysqli;
        }
    }


}


?>