<?php

    class Productos
    {
      require_once('Database_connect');

      function __construct($conn){
      $db = $conn;
    }

        function obtenerProductos()
        {

          $st = $db->prepare('SELECT * FROM productos');

          $st->execute();

          $result = $st->fetchAll(PDO::FETCH_OBJ);

          return $result;

        }

        function insertarProducto($nombre, $categoria, $descripcion, $ruta_imagen)
        {

          $st = $db->prepare('INSERT INTO productos (nombre,categoria,descripcion,ruta_imagen)
                              VALUES (:nombre,:categoria,:descripcion,:ruta_imagen)');

          $st->execute(array(':nombre' => $nombre, ':categoria' => $categoria,
                             ':descripcion' => $descripcion, ':ruta_imagen' => $ruta_imagen));


        }

        function modificarProducto($id,$nombre, $categoria, $descripcion, $ruta_imagen)
        {

          $st = $db->prepare('UPDATE productos SET  nombre = :nombre, categoria = :categoria,
                             descripcion = :descripcion, ruta_imagen = :ruta_imagen
                             WHERE  idproductos = :id');

          $st->execute(array(':nombre' => $nombre, ':categoria' => $categoria,
                             ':descripcion' => $descripcion, ':ruta_imagen' => $ruta_imagen)
                             ':id' => $id);

        }

        function borrarProducto($id)
        {

          $st = $db->prepare('DELETE FROM productos
                              WHERE idproductos = :id');

          $st->execute(array(':id' => $id);

        }
        function obtenerProductos_($id)
        {

          $st = $db->prepare('SELECT * FROM productos WHERE id = :id');

          $st->execute(array(':id' => $id);

          $result = $st->fetchAll(PDO::FETCH_OBJ);

          return $result;

        }


    }




 ?>
