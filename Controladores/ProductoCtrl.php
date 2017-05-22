<?php

include('Modelos/ProductoMdl.php');


class ProdcutosCtrl
{
  function __construct()
  {
    $this->model = new ProductoMdl();
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
      $productos = $this->model->obtenerProductos();

      if(isset($_GET['r']) && $_GET['r']== 'json'){
         return json_encode($productos);
      }
      return $this->procesarVista($productos);
  }

  function procesarVista($data)
  {

  }

  function insertar()
  {

    if(empty($_POST)){
					require_once("Vista/AltaProductos.html");
				}
				else{
          $id       =$_POST["id"];
					$nombre 	= $_POST["nombre"];
					$categoria 	= $_POST["categoria"];
					$descripcion 	= $_POST["descripcion"];
					$ruta_imagen 	= $_POST["ruta_imagen"];
        }
      $productos = $this->model->insertarProducto($nombre, $categoria, $descripcion, $ruta_imagen);


  }

  function modificar()
  {
    if(empty($_POST)){

					require_once("Vista/Modificar_Productos.html");
				}
				else{

          $id       =$_POST["id"];
					$nombre 	= $_POST["nombre"];
					$categoria 	= $_POST["categoria"];
					$descripcion 	= $_POST["descripcion"];
					$ruta_imagen 	= $_POST["ruta_imagen"];
        }

      $productos = $this->model->modificarProducto($id, $nombre, $categoria, $descripcion, $ruta_imagen);

  }

  function borrar()
  {
    if(empty($_POST)){

          require_once("Vista/Eliminar_Productos.html");
        }
        else{

          $id       =$_POST["id"];
        }
      $productos = $this->model->borrarProducto($id);

  }
  function listar_()
  {
    if(empty($_POST)){

          require_once("Vista/Eliminar_Productos.html");
        }
        else{

          $id       =$_POST["id"];
        }
      $productos = $this->model->obtenerProducto_($id);

      if(isset($_GET['r']) && $_GET['r']== 'json'){
         return json_encode($productos);
      }
      return $this->procesarVista($productos);
  }

}





 ?>
