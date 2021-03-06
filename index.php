<!DOCTYPE html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">


<link rel="stylesheet" type="text/css" href="stylesv2.css" />
<link rel="stylesheet" type="text/css" href="stylescomp.css">
<link rel="stylesheet" type="text/css" href="nav.css">
<title>Materiales GRAMA</title>

</head>
<!-- Barra estatica con opciones de navegacion (apareceria en todas las pags)-->
<body class="no-js">
  <header class="flexdad navbar" >
    <div class="dentro logo navbar_logo">
        <a class="navbar-brand" href="index.php" alt="logo"></a>
   </div>

    <div class="topmenu">
    <ul class="navmenu listanavmenu">
      <li >
        <a href="AcercaDe.html">
          <span>Acerca de Nosotros</span>
        </a>
      </li>
      <li >
        <a href="Vista/Productos.html">
          <span>Productos</span>
        </a>
    </li>
      <li >
        <a href="Vista/Servicios.html">
          <span>Servicios</span>
        </a>
    </li>
    </ul>
  </div>
<?php
session_start();
if(!isset($_SESSION["session_username"])){ ?>
  <div id="Sin_inicio">
    <a href="Inicio_sesion.html" class="sesionmenu" ><span>Iniciar Sesion</span></a>
  </div><?php } else if(isset($_SESSION["session_id"])){ ?>
    <nav id="topNav">
            <ul>
            <li>
                <a href="#" title="Nav Link 1">Menu</a>
                <ul>
                    <li><a href="Vista/Productos.html" title="Sub Nav Link 1">Productos</a></li>
                    <li><a href="inicio.php?ctrl=promociones&act=listar" title="Sub Nav Link 2">Promociones</a></li>
                    <li class="last"><a href="Vista/Servicios.html" title="Sub Nav Link 3">Servicios</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="Iniciado">
      <a href="logout.php" class="sesionmenu" ><span>Cerrar Sesion</span></a>
    </div><?php } else{ ?>
      <div class="dentro logo carrito_logo">
          <a class="carrito_brand" href="Vista/carro.php" alt="logo"></a>
     </div>
      <div id="Iniciado">
        <a href="logout.php" class="sesionmenu" ><span>Cerrar Sesion</span></a>
      <?php } ?>
</header>

<!-- Aqui se presentaran algunas imagenes sobre los trabajos realizados por la empresa -->
<div class="horicenter">
  <h1>Nuestros trabajos </h1>
</div>

  <div class="slideshow-body">

    <div class="autoslide slide_cambio">
      <img class="horicenter slide_imagen"  src="https://microjurisar.files.wordpress.com/2014/11/05.jpg" alt="Trabajo" >
    </div>

    <div class="autoslide slide_cambio">
      <img class="horicenter slide_imagen"  src="http://www.letsprevent.com/wp-content/uploads/riesgos-trabajos-en-cubiert.jpg" alt="Trabajo" >
    </div>

    <div class="autoslide slide_cambio">
      <img class="horicenter slide_imagen"  src="http://www.londres38.cl/1937/articles-82605_recurso_1.jpg" alt="Trabajo" >
    </div>

    <div class="autoslide slide_cambio">
      <img class="horicenter slide_imagen"  src="http://cdn.urgente24.com/sites/default/files/notas/2013/11/29/5799_trabajadores-construccion.jpg" alt="Trabajo" >
    </div>

  </div>


  <!-- Se presentara un slide con algunos de los productos que la empresa ofrece-->
  <div class="conoceProductos">
      <h2> Conoce nuestros productos</h2>
        <div  class="slideshow-body">
          <div class="slide slide_cambio">
          <img class="horicenter slide_imagen" src="http://www.sv.all.biz/img/sv/catalog/1806.jpeg" alt="productos1" >
          <div class="horicenter">Producto 1</div>
          </div>
          <div class="slide slide_cambio">
          <img class="horicenter slide_imagen" src="http://www.maipumateriales.com/wp-content/uploads/2014/09/lad-mar-del-plata.jpg" alt="productos2" >
          <div class="horicenter">Producto 2</div>
          </div>
          <div class="slide slide_cambio">
          <img class="horicenter slide_imagen" src="https://pipigonito.files.wordpress.com/2013/05/arcillas.jpg" alt="productos3" >
          <div class="horicenter">Producto 3</div>
          </div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>

        <div class="horicenter">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
        </div>

  </div>




  <!-- Se presentara un slide con ofertas-->
  <div class="indexOfertas">
      <h2> Ofertas </h2>
      <div class="horicenter">
        <table id="tabofer" class="tablestyle">
          <tr class="redback">
            <th class="headSize"></th>
            <th class="headSize"></th>
            <th class="headSize"></th>
          </tr>
          <tr>
            <td><a href="inicio.php?ctrl=promociones&act=listar"><img class="imgOfer" src="http://www.cemexmexico.com/Content/productos/images/cemento-campana-sacos.jpg" alt="oferta1"></a></td>
            <td><a href="inicio.php?ctrl=promociones&act=listar"><img class="imgOfer" src="http://www.arcelormittalca.com/store/images/D/vigas-ipn.jpg" alt="oferta2"></a></td>
            <td><a href="inicio.php?ctrl=promociones&act=listar"><img class="imgOfer" src="https://www.trateco.net/fotos/grava_cara.jpg" alt="oferta3"></a></td>
          </tr>
        </table>

      </div>
  </div>

  <!-- Aqui se pondran los datos de contacto de la empresa, asi como links sociales-->
  <div class="indexContactanos">
      <h3> Contactanos </h3>
      <div >

      <ul class="indexContactanoslist">

      <li><span> <a class="lcontactos" href="#">       Telefonos      </a></span></li>
      <li><span> <a href="#">       Visitanos       </a></span></li>
      <li><span> <a href="#">       Correo Electronico        </a></span></li>
      <li><span> <a href="#">       Redes Sociales        </a></span></li>
      <li><span>  <a href="#">      Servicios       </a></span></li>

    </ul>
  </div>
  </div>

  <!-- Una seccion con links importantes para la compañia
  (apareceria en todas las pags)-->
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
<script src="js/jquery.js"></script>
<script src="js/modernizr.js"></script>
<script type="text/javascript">
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("slide");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

//Slides automaticos

var slideAutoIn = 0;
showAutoSlides();

function showAutoSlides() {
  var j;
  var slides = document.getElementsByClassName("autoslide");
  for (j = 0; j < slides.length; j++) {
    slides[j].style.display = "none";
  }
  slideAutoIn++;
  if (slideAutoIn> slides.length) {slideAutoIn = 1}
  slides[slideAutoIn-1].style.display = "block";
  setTimeout(showAutoSlides, 5000); // Change image every 2 seconds
}


</script>
</body>


</html>
