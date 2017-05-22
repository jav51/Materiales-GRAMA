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

      $prod_ctrl = new ProdcutosCtrl();
      $prod_ctrl->ejecutar();

      break;
    default:
      echo 'El controlador seleccionado no es valido';
      break;
  }

 ?>
