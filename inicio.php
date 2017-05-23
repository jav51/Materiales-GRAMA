<?php


  include('Database_connect.php');

  $conn = new Connection();

  $db = $conn->getConnection();


  if(!isset($_GET['ctrl'])){

    $_GET['ctrl'] ='index';

  }

  switch ($_GET['ctrl']) {
    case 'index':
      echo 'no hagas nada';
      break;

    case 'productos':
        require_once ('Controladores/ProductoCtrl.php');

        $prod_ctrl = new ProductoCtrl($db);
        $prod_ctrl->ejecutar();

      break;

    case 'promociones':
        require_once 'Controladores/PromocionCtrl.php';

        $prod_ctrl = new PromocionCtrl($db);
        $prod_ctrl->ejecutar();

      break;



    default:
      echo 'El controlador seleccionado no es valido';
      break;
  }

 ?>
