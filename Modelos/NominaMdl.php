<?php

    class Nominas
    {
      require_once('Database_connect');
      protected $db;

      function __construct($conn){
      $db = $conn;
    }

        function obtenerNomina()
        {

          $st = $db->prepare('SELECT * FROM nominas');

          $st->execute();

          $result = $st->fetchAll(PDO::FETCH_OBJ);

          return $result;

        }

        function insertarEmpleado($curp,$nombres,$app,$apm,$rfc,$salarioBase,$correoElectronico,$password,$puesto,$imss,$NumEmpleado,$telefono)
        {

          $st = $db->prepare('INSERT INTO empleados (curp,nombres,app,apm,rfc,salarioBase,correoElectronico,password,puesto,imss,NumEmpleado)
                              VALUES (:curp,:nombres,:app,:apm,:rfc,:salarioBase,:correoElectronico,:password,:puesto,:imms,:NumEmpleado)');

          $st->execute(array(':curp' => $curp,
                             ':nombres' => $nombres,
                             ':app' => $app,
                             ':apm' => $apm,
                             ':rfc' => $rfc,
                             ':salarioBase' => $salarioBase,
                             ':correoElectronico' => $correoElectronico,
                             ':password' => $password,
                             ':puesto' => $puesto,
                             ':imss' => $imss,
                             ':NumEmpleado' => $NumEmpleado,
                             ':telefono' => $telefono
                        ));


        }

        function modificarEmpleado($id,$curp,$nombres,$app,$apm,$rfc,$salarioBase,$correoElectronico,$password,$puesto,$imss,$NumEmpleado,$telefono)
        {

          $st = $db->prepare('UPDATE empleados SET  curp = :curp,
                                                    nombres = :nombres,
                                                    app = :app,
                                                    apm = :apm,
                                                    rfc = :rfc,
                                                    salarioBase = :salarioBase,
                                                    correoElectronico = :correoElectronico,
                                                    password = :password,
                                                    puesto = :puesto,
                                                    imss = :imss,
                                                    NumEmpleado = :NumEmpleado
                                                    telefono = :telefono
                             WHERE  curp = :id');

           $st->execute(array(':curp' => $curp,
                              ':nombres' => $nombres,
                              ':app' => $app,
                              ':apm' => $apm,
                              ':rfc' => $rfc,
                              ':salarioBase' => $salarioBase,
                              ':correoElectronico' => $correoElectronico,
                              ':password' => $password,
                              ':puesto' => $puesto,
                              ':imss' => $imss,
                              ':NumEmpleado' => $NumEmpleado,
                              ':telefono' => $telefono,
                              ':id' => $id
                         ));

        }

        function borrarEmpleado($curp)
        {

          $st = $db->prepare('DELETE FROM empleados
                              WHERE curp = :curp');

          $st->execute(array(':curp' => $curp);

        }

        function obtenerEmpleados_($curp)
        {

          $st = $db->prepare('SELECT * FROM empleados WHERE curp = :curp');

          $st->execute(array(':curp' => $curp);

          $result = $st->fetchAll(PDO::FETCH_OBJ);

          return $result;

        }


    }




 ?>
