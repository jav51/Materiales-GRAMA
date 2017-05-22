<?php

    class Productos
    {
      require_once('Database_connect');

      function __construct($conn){
      $db = $conn;
    }

        function obtenerProductos()
        {

          $st = $db->prepare('SELECT * FROM Productos');

          $st->execute();

          $result = $st->fetchAll(PDO::FETCH_OBJ);

          return $result;

        }


    }




 ?>
