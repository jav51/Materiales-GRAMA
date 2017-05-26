<?php
session_start();
include('Modelos/PromocionMdl.php');


class PromocionCtrl
{
  function __construct($db)
  {
    $this->model = new Promociones($db);
  }

  function ejecutar()
  {
    switch ($_GET['act']) {
      case 'listar':
        $this->listar();
        break;
      case 'insertar':
        $this->insertar();
        break;
      case 'modificar':
        $this->modificar();
        break;
      case 'borrar':
        $this->borrar();
        break;
      case 'listar_':
        $this->listar_();
        break;
      default:
        echo 'Accion no reconocida';
        break;
    }
  }

  function listar()
  {
      $promociones = $this->model->obtenerPromociones();

      if(isset($_GET['r']) && $_GET['r']== 'json'){
         return json_encode($promociones);
      }
      return $this->procesarVista($promociones);
  }

  function procesarVista($data)
  {
            global $filas;
            					if($_SESSION['session_id']=='753159'){
						$vista = file_get_contents("Vista/Tabla-promociones.html");}
						else{$vista = file_get_contents("Vista/Tabla-promociones_user.html");}
						//Obtengo la fila de la tabla
						$inicio_fila = strrpos($vista,'<tr>');
						$final_fila = strrpos($vista,'</tr>') + 5;

						$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);
						//Genero las filas
						$promociones = $data;
            //var_dump($promociones);
						foreach ($promociones as $row) {
							$new_fila = $fila;
							$diccionario = array(
								'{ruta_imagen}' => $row->ruta_imagen,
								'{nombre}' => $row->nombre,
                '{precioEsp}' => $row->precioEspecial,
                '{desc}' => $row->porcentajeDescuento);
							$new_fila = strtr($new_fila,$diccionario);

							$filas .= $new_fila;
						}

						$vista = str_replace($fila, $filas, $vista);
						echo $vista;
  }

  function insertar()
  {

    if(empty($_POST)){
					require_once("Registrar_promocion.html");
				}
				else{
          $id       =$_POST["id"];
					$precioEsp 	= $_POST["precioEsp"];
					$desc 	= $_POST["desc"];
        }
      $promociones = $this->model->insertarPromocion($id, $precioEsp, $desc);

      $this->listar();
  }

  function modificar()
  {
    if(empty($_POST)){

					require_once("Vista/Modificar_Promociones.html");
				}
				else{

          $id       =$_POST["id"];
					$nombre 	= $_POST["nombre"];
					$categoria 	= $_POST["categoria"];
					$descripcion 	= $_POST["descripcion"];
					$ruta_imagen 	= $_POST["ruta_imagen"];
        }

      $promociones = $this->model->modificarPromocion($id, $nombre, $categoria, $descripcion, $ruta_imagen);

  }

  function borrar()
  {
    if(empty($_POST)){

          require_once("Vista/Eliminar_Promociones.html");
        }
        else{

          $id       =$_POST["id"];
        }
      $promociones = $this->model->borrarPromocion($id);

  }
  function listar_()
  {
    if(empty($_POST)){

          require_once("Vista/Promocion_Individual.html");
        }
        else{

          $id       =$_POST["id"];
        }
      $promociones = $this->model->obtenerPromocion_($id);

      if(isset($_GET['r']) && $_GET['r']== 'json'){
         return json_encode($promociones);
      }
      return $this->procesarVista($promociones);
  }

}
