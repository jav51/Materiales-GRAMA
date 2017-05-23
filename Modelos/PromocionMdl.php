<?php

    class Promociones
    {
      protected $db;
      function __construct($conn){

        $this->db = $conn;
      }
        function obtenerPromociones()
        {
          $st = $this->db->prepare('SELECT * FROM promociones');

          $st->execute();

          $result = $st->fetchAll(PDO::FETCH_OBJ);
          $cont = 0;
          foreach ($result as $row) {

            $st = $this->db->prepare('SELECT nombre,ruta_imagen FROM productos WHERE idproductos = '.$row->idProducto.'');

            $st->execute();

            $aux[$cont] = $st->fetch(PDO::FETCH_OBJ);
            $arr1 = (array) $row;
            $arr2 = (array) $aux[$cont];
            $merged = array_merge($arr1, $arr2);
            $promociones[$cont] = (object) $merged;
            $cont = $cont+1;
          }

          return $promociones;

        }

        function insertarPromocion($id, $precioEsp, $desc)
        {

          $st = $this->db->prepare('INSERT INTO promociones (idProducto,precioEspecial,porcentajeDescuento)
                              VALUES (:id,:precioEsp,:descuento)');

          $st->execute(array(':id' => $id, ':precioEsp' => $precioEsp, ':descuento' => $desc));


        }

        function modificarPromocion($id,$nombre, $categoria, $descripcion, $ruta_imagen)
        {

          $st = $db->prepare('UPDATE promociones SET  nombre = :nombre, categoria = :categoria,
                             descripcion = :descripcion, ruta_imagen = :ruta_imagen
                             WHERE  idpromociones = :id');

          $st->execute(array(':nombre' => $nombre, ':categoria' => $categoria,':descripcion' => $descripcion,
                              ':ruta_imagen' => $ruta_imagen,':id' => $id));

        }

        function borrarPromocion($id)
        {

          $st = $db->prepare('DELETE FROM promociones
                              WHERE idpromociones = :id');

          $st->execute(array(':id' => $id));

        }
        function obtenerPromociones_($id)
        {

          $st = $db->prepare('SELECT * FROM promociones WHERE id = :id');

          $st->execute(array(':id' => $id));

          $result = $st->fetchAll(PDO::FETCH_OBJ);

          return $result;

        }


    }




 ?>
