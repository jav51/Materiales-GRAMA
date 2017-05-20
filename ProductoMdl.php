<?php

  include 'Database_connect.php';

  class AlumnoMdl{

    	private $driver;

      $aux = new Connection();

      $this -> driver = $aux->getConnection();

    	function alta($nombre, $descripcion, $categoria, $rutaimg){

        		$query = "INSERT INTO productos (nombre, descripcion, categoria, rutaimg)
                      VALUES (\"$nombre\",\"$descripcion\",\"$categoria\",\"$rutaimg\")";

        		$r = $this -> driver -> query($query);
        		if($this -> driver -> insert_id){
        			return $this -> driver -> insert_id;
    		}
    		elseif($r === FALSE)
    			return FALSE;
	}

  function baja($id){

        $query = "DELETE FROM productos WHERE idproductos = $id";

        $r = $this -> driver -> query($query);
        if($this -> driver -> DELETe){
          return $this -> driver -> insert_id;
    }
    elseif($r === FALSE)
      return FALSE;
}

	function lista(){

		$query = 'SELECT * FROM productos';
		$r = $this -> driver -> query($query);
		while($row = $r -> fetch_assoc())
			$rows[] = $row;
		return $rows;
	}


 ?>
