<?php

    class ProductoMdl
    {
    protected $db;

      function __construct($conn){
       
      $this->db = $conn;
    }

        function obtenerProductos()
        {

          $st = $this->db->prepare('SELECT * FROM productos');

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

          $st = $this->db->prepare('UPDATE productos SET  nombre = :nombre, categoria = :categoria,
                             descripcion = :descripcion, ruta_imagen = :ruta_imagen
                             WHERE  idproductos = :id');

          $st->execute(array(':nombre' => $nombre, ':categoria' => $categoria,
                             ':descripcion' => $descripcion, ':ruta_imagen' => $ruta_imagen,
                             ':id' => $id));

        }

        function borrarProducto($id)
        {

          $st = $this->db->prepare('DELETE FROM productos
                              WHERE idproductos = :id');

          $st->execute(array(':id' => $id));

        }
        function obtenerProductos_($id)
        {

          $st = $this->db->prepare('SELECT * FROM productos WHERE id = :id');

          $st->execute(array(':id' => $id));

          $result = $st->fetchAll(PDO::FETCH_OBJ);

          return $result;

        }
        
        function obtenerids()
        {
          $st = $this->db->prepare('SELECT idproductos FROM productos');
         

          $st->execute();

          $aux = $st->fetchAll(PDO::FETCH_ASSOC);
          
          foreach($aux as $row){
          $result[] = $row;
          }
          
          return $result;

        }


    }




 ?>
