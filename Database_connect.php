<?php

class Connection{

    protected $db;

    public function Connection(){

    $conn = NULL;
    $dsn = 'mysql:dbname=alexissg_grama;host=localhost';
    $username = 'materialesgrama';
    $password = 'Materiales-grama';

        try{

            $conn = new PDO($dsn, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";

            } catch(PDOException $e){
                echo 'ERROR: ' . $e->getMessage();
                }
            $this->db = $conn;
    }

    public function getConnection(){
        return $this->db;
    }
}

?>
