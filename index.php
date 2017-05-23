<?php

  if(!isset($_GET['ctrl'])){

    $_GET['ctrl'] ='index';

  }

  switch ($_GET['ctrl']) {
    case 'index':
      echo 'no hagas nada';
      break;

    case 'productos':
        require_once 'Controladores/ProdcutosCtrl.php';

        $prod_ctrl = new ProductosCtrl();
        $prod_ctrl->ejecutar();

      break;

    case 'empleados':
        require_once 'Controladores/EmpleadoCtrl.php';

        $prod_ctrl = new EmpleadoCtrl();
        $prod_ctrl->ejecutar();

      break;



    default:
      echo 'El controlador seleccionado no es valido';
      break;
  }

 ?>
