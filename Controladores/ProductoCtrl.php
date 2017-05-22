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
    if(!isset($_GET['act'])){
      $_GET['act'] = 'listar';
    }

    switch ($_GET['act']) {
      case 'listar':
        $this->listar();
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


}





 ?>
