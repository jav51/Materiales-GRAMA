<!DOCTYPE html>
<html>
  <head><meta http-equiv="Content-Type" content="text/html; charset=big5">
    
    <link rel="stylesheet" type="text/css" href="stylesv2.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <title>Carrito</title>
  </head>
  <body>
    <!-- Header -->
    <header class="flexdad navbar">
      <div class="dentro logo navbar_logo">
          <a class="navbar-brand" href="index.html" alt="logo"></a>
    </div>

      <div class="topmenu">
      <ul class="navmenu listanavmenu">
        <li>
          <a href="AcercaDe.html">
            <span>Acerca de Nosotros</span>
          </a>
        </li>
        <li >
          <a href="Productos.html">
            <span>Productos</span>
          </a>
      </li>
        <li >
          <a href="Servicios.html">
            <span>Servicios</span>
          </a>
      </li>
      </ul>
    </div>
    <div class="sesionmenu">
      <a href="#">
        <span>Iniciar Sesion</span>
      </a>
    </div>
    </header>
    <!--Termina header -->

    <div class="table-responsive">
      <table class=" table">
        <thead>
          <tr class="cart_menu">
            <td class="image">Ilustraci車n</td>
            <td class="description">Servicio</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="cart_product">
              <a href=""><img class="imgTabla" src="img/Armex.jpg" alt=""></a>
            </td>
            <td class="cart_description">
              <h4><a href="">Armex</a></h4>
              <p>ID: 1089772</p>
            </td>
            <td class="cart_delete">
              <a class="" href="#">Eliminar<i class="fa fa-times"></i></a>
            </td>
          </tr>

          <tr>
            <td class="cart_product">
              <a href=""><img class="imgTabla" src="img/Varilla.jpg" alt=""></a>
            </td>
            <td class="cart_description">
              <h4><a href="">Varilla</a></h4>
              <p>ID: 1089772</p>
            </td>
            <td class="cart_delete">
              <a class="" href="#">Eliminar<i class="fa fa-times"></i></a>
            </td>
          </tr>
          <tr>
            <td class="cart_product">
              <a href=""><img class="imgTabla" src="img/Cemento.jpg" alt=""></a>
            </td>
            <td class="cart_description">
              <h4><a href="">Cemento</a></h4>
              <p>ID: 1089772</p>
            </td>
            <td class="cart_delete">
              <a class="" href="#">Eliminar<i class="fa fa-times"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="dentro">
       <form class="horicenter" method="post" >
        <input type="submit" value="Cotizar" />
        <input type="hidden" name="button_pressed" value="1" />
        
        </form>
        <?php
        	
        	if(isset($_POST['button_pressed']))
        	{
        		$to = 'nobody@example.com';
        		$subject = 'Cotizacion GRAMA';
        		$message = 'detalles cotizacion';
        		$headers = 'From: webmaster@example.com'."\r\n".'Reply-To: webmaster@example.com'."\r\n".'X-Mailer: PHP/'.phpversion();
        		
        		mail($to, $subject, $message, $headers);
        		echo 'Email enviado.';
        		
        	}
        	
        ?>

      </div>
    </div>
  </div>

    <!-- Footer -->
    <footer class="flexdad linkbar ">
      <div class="bottom-menu">

      <ul class="link-menu">
        <li><a href="#">
          <span>Link a politica y privacidad</span>
        </a></li>
        <li> <a href="#">
          <span>Link a terminos y condiciones</span>
        </a></li>
        <li> <a href="Bolsa de trabajo.html">
          <span>Link a bolsa de trabajo</span>
        </a> </li>


      </ul>
    </div>

    </footer>
    <!-- Fin de footer-->

  </body>
</html>