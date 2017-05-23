<?php

include('Modelos/CarritoMdl.php');


class CarritoCtrl
{
  function __construct()
  {
    $this->model = new CarritoMdl();
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
      case 'borrar':
        $this->borrar();
        break;
      case 'borrarT':
        $this->borrarT();
        break;
      default:
        echo 'Accion no reconocida';
        break;
    }
  }

  function listar()
  {
      if(isset($_GET['r']) && $_GET['r']== 'json'){
         return json_encode($carrito);
      }
      $carrito = $this->model->obtenerNomina();

      return $this->procesarVistaListar($carrito);
  }

  function procesarVistaListar($carrito)
  {
    if(empty($_POST)){

					require_once("Vista/carrito.html");
				}
				else{

						$vista = file_get_contents("Vista/Carrito.html");
						$header = file_get_contents("Vista/cabecera.html");
						$footer = file_get_contents("Vista/pie.html");

						$inicio_fila = strrpos($vista,'<tr>');
						$final_fila = strrpos($vista,'</tr>') + 5;
						$fila = substr($vista,$inicio_fila,$final_fila-$inicio_fila);

						foreach ($carrito as $row_) {
              $detCarrito = $this->model->detalleCarrito($row['curpEmpleado']);
                foreach ($empleado as $row)
                {
                  $new_fila = $fila;

    							$diccionario = array(
    								'{nombre}' => $row['nombre'],
    								'{puesto}' => $row['puesto'],
                    '{rfc}' => $row['rfc'],
                    '{fecha}' => $row_['fecha']
                  );

    							$new_fila = strtr($new_fila,$diccionario);
    							$filas .= $new_fila;
              }
            }

            $vista = str_replace($fila, $filas, $vista);

						$header = strtr($header,$diccionario);
						$vista = $header . $vista . $footer;

						echo $vista;
  }
}
  function insertar()
  {

    if(empty($_POST)){
					require_once("Vista/Nueva_Nomina.html");
				}
				else{
          $curp   = $_POST["curp"];
					$nombre 	= $_POST["nombre"];
					$app 	= $_POST["app"];
					$apm 	= $_POST["apm"];
					$rfc 	= $_POST["rfc"];
          $salarioBase 	= $_POST["salarioBase"];
          $correoElectronico 	= $_POST["correoElectronico"];
          $password 	= $_POST["password"];
          $puesto 	= $_POST["puesto"];
          $imss 	= $_POST["imss"];
          $NumEmpleado 	= $_POST["NumEmpleado"];
          $telefono 	= $_POST["telefono"];
        }
      $empleados = $this->model->insertarEmpleado($curp,$nombres,$app,$apm,$rfc,$salarioBase,$correoElectronico,$password,$puesto,$imss,$NumEmpleado,$telefono);


  }

  function modificar()
  {
    if(empty($_POST)){

					require_once("Vista/Modificar_Empleados.html");
				}
				else{

          $id       =$_POST["curp"];
          $curp   = $_POST["curp"];
					$nombre 	= $_POST["nombre"];
					$app 	= $_POST["app"];
					$apm 	= $_POST["apm"];
					$rfc 	= $_POST["rfc"];
          $salarioBase 	= $_POST["salarioBase"];
          $correoElectronico 	= $_POST["correoElectronico"];
          $password 	= $_POST["password"];
          $puesto 	= $_POST["puesto"];
          $imss 	= $_POST["imss"];
          $NumEmpleado 	= $_POST["NumEmpleado"];
          $telefono 	= $_POST["telefono"];
        }

      $empleados = $this->model->modificarEmpleado($id,$curp,$nombres,$app,$apm,$rfc,$salarioBase,$correoElectronico,$password,$puesto,$imss,$NumEmpleado,$telefono);

  }

  function borrar()
  {
    if(empty($_POST)){

          require_once("Vista/Eliminar_Empleados.html");
        }
        else{

          $id       =$_POST["id"];
        }
      $empleados = $this->model->borrarEmpleado($id);

  }
  function listar_()
  {
    if(empty($_POST)){

          require_once("Vista/Consulta_Empleados.html");
        }
        else{

          $id       =$_POST["id"];
        }
      $empleados = $this->model->obtenerEmpleado_($id);

      if(isset($_GET['r']) && $_GET['r']== 'json'){
         return json_encode($empleados);
      }
      return $this->procesarVista($empleados);
  }

}





 ?>
