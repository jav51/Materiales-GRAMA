<?php

include('Modelos/EmpleadoMdl.php');


class ProdcutosCtrl
{
  function __construct()
  {
    $this->model = new EmpleadoMdl();
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
      $empleados = $this->model->obtenerEmpleados();

      if(isset($_GET['r']) && $_GET['r']== 'json'){
         return json_encode($empleados);
      }
      return $this->procesarVista($empleados);
  }

  function procesarVista($data)
  {

  }

  function insertar()
  {

    if(empty($_POST)){
					require_once("Vista/Registro_Empleado.html");
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
