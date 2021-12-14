<!-- -------------------------------- NAVBAR PARA ADMINISTADORES -------------------------------- -->
<?php if (($this->session->userdata('logged_in')) and ($perfil_id == '1')) { ?>
  <!--el color de la en el navbar es de mystyle.css-->
  <nav class="navbar  navbar-expand-lg  navbar-dark shadow " style="background-color: black;">

    <div class="container-fluid">

      <a class="navbar-brand text-white txtShW "> <img class="d-bloc w-100k img-fluid"src="<?= base_url() ?>assets/img/ic/logo1.jpg"></a>
      <!-- Brand -->
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler border border-lihgt" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" ariacontrols="navbarSupportedContent" aria-expanded="false" arialabel="Toggle navigation">
        <span style="font-size: 25px; color: white;">
          <i class="fas fa-bars"></i>
        </span>
      </button>
      <div class="collapse navbar-collapse pr-6" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto ">
          <li class="nav-item">
            <a class="nav-link  text-light pru" href="<?php echo base_url('muestra_consultas'); ?>">

              <i class="fas fa-cart-arrow-down"></i>Consultas
            </a>
          </li>
          <li>
            <a class="nav-link text-light pru" href="<?php echo base_url('ventas_resumen'); ?>">
              <i class="fas fa-cart-arrow-down"></i> Ventas
            </a>
          </li>
          <li>
            <a class="nav-link text-light pru" href="<?php echo base_url('produ'); ?>">
              <i class="fas fa-cubes"></i> Productos
            </a>
          </li>
          <li>
            <a class="nav-link text-light pru" href="<?php echo base_url('us'); ?>">
              <i class="fas fa-users"></i> Usuarios
            </a>
          </li>
          
          <li class="nav-item dropdown">
            <a class="nav-link  text-light text-white pru dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user "></i> Hola, <?= $nombre ?>
            </a>
            <div class="dropdown-menu fondoDeMenu" aria-labelledby="navbarDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo base_url('logout'); ?>">
                <i class="fas fa-sign-out-alt"></i>Cerrar Sesion
              </a>
            </div>
            </div>
          </li>
        </ul>
        <!-- -------------------------------- FIN NAVBAR PARAADMINISTADORES -------------------------------- -->
  </nav>
  <!-- -------------------------------- NAVBAR PARA CLIENTES -------------------------------- -->


<?php } else if (($this->session->userdata('logged_in')) and ($perfil_id == '2')
) { ?>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: black;">
    <div class="container-fluid">
      <a class="navbar-brand text-white txtShW "><img class="d-bloc w-100k img-fluid"src="<?= base_url() ?>assets/img/ic/logo1.jpg"></a>
      <button class="navbar-toggler border border-lihgt" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" ariacontrols="navbarSupportedContent" aria-expanded="false" arialabel="Toggle navigation">
        <span style="font-size: 25px; color: white;">
          <i class="fas fa-bars"></i>
        </span>
      </button>
      
      <div class="collapse navbar-collapse pr-6" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto ">

          <li class="nav-item">
            <a class="nav-link text-light pru" href="<?php echo base_url('carro'); ?>">
            <i class="fas fa-cart-arrow-down"></i>Catalogo</a>
            <div class="dropdown-menu fondoDeMenu" aria-labelledby="navbarDropdown">
             <!-- <a class="dropdown-item text-dark pru" href="<?php echo base_url('micompra'); ?>">
                <i class="fas fa-shopping-bag"></i>Mis Compras
              </a>-->
            </div>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle apartados text-light pru" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cart-arrow-down"></i>Productos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink ">
            <a class="dropdown-item " href="<?php echo base_url('produ_computacion') ?>">
            <i class="fas fa-cart-arrow-down"></i>Computadoras</a>
            <a class="dropdown-item" href="<?php echo base_url('produ_monitores') ?>">Monitores</a>
            <a class="dropdown-item" href="<?php echo base_url('produ_almacenamientos') ?>">Almacenamientos</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle apartados text-light pru" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-cart-arrow-down"></i>Audios-Videos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink ">
            <a class="dropdown-item " href="<?php echo base_url('produ_accesorios') ?>">Accesorios</a>
            <a class="dropdown-item" href="<?php echo base_url('produ_audiosvideos') ?>">Audios-Videos</a>
          
          </div>
        </li>
        <li class="nav-item">
              <a class="nav-link text-light pru" href="<?php echo base_url('servicio'); ?>">
              <i class="fas fa-cart-arrow-down"></i>Servicios</a>
            </li>

         <li class="nav-item">
            <a class="nav-link  text-light pru" href="<?php echo base_url('consultas'); ?>">

              <i class="fas fa-cart-arrow-down"></i>Consultas
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link text-white pru" href="<?php echo base_url('carro'); ?>">
              <img src="assets/img/ic/carrito.jpeg" height="40" width="40" alt="carrito">
              <i class="material-icons"></i>
            </a>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link  text-light pru dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user "></i> Hola,<?= $nombre ?>
            </a>
          <!--  <div class="dropdown-menu fondoDeMenu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url('micompra'); ?>">
                <i class="fas fa-shopping-bag"></i> Mis Compras
              </a>-->

              <div class=" dropdown-divider"></div>
              <a href="<?php echo base_url('logout'); ?>">
                <i class="fas fa-sign-out-alt"></i>Cerrar Sesion
              </a>
            </div>
          </li>
        </ul>


  </nav>
  <!-- -------------------------------- FIN NAVBAR PARA CLIENTES-------------------------------- -->
  <!-- -------------------------------- NAVBAR PARA PUBLICO EN GENERAL -------------------------------- -->
   
  <?php } else { ?>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: black;">
    <div class="container-fluid">
      <a class="navbar-brand text-white txtShW "><img class="d-bloc w-100k img-fluid"src="<?= base_url() ?>assets/img/ic/logo1.jpg"></a>
      <button class="navbar-toggler border border-lihgt" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" ariacontrols="navbarSupportedContent" aria-expanded="false" arialabel="Toggle navigation">
        <span style="font-size: 25px; color: white;">
          <i class="fas fa-bars"></i>
        </span>
      </button>
      <div class="collapse navbar-collapse pr-5" id="navbarSupportedContent">
        <div class="navbar-nav ml-auto pr-5">
          <ul class=" navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link  text-white" href="<?php echo base_url('principal_view'); ?>">
              <i class="fas fa-cart-arrow-down"></i>Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('somos'); ?>">
              <i class="fas fa-cart-arrow-down"></i>Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('servicio'); ?>">
              <i class="fas fa-cart-arrow-down"></i>Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('tecnologia'); ?>">
              <i class="fas fa-cart-arrow-down"></i>Productos</a>
              <div class="dropdown-menu fondoDeMenu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-dark pru" href="<?php echo base_url('micompra'); ?>">
                  <i class="fas fa-shopping-bag"></i>Mis Compras
                </a>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('contacto'); ?>">
              <i class="fas fa-cart-arrow-down"></i>Contactos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('consultas'); ?>">
              <i class="fas fa-cart-arrow-down"></i>Consultas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('registrar'); ?>">
              <i class="fas fa-cart-arrow-down"></i>Registrarse</a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-white" href="<?php echo base_url('login'); ?>">
              <i class="fas fa-cart-arrow-down"></i>Login</a>
            </li>

            <!--cierre de lista-->
          </ul>
        </div>
        <!-- -------------------------------- FIN NAVBAR PARA PUBLICO EN GENERAL -------------------------------- -->

      <?php } ?>

      </div>
  </nav>
  <!--cierre de navbar-->