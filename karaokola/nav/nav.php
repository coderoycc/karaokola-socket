        

<?php
session_start();
include("../verify/verify.php");
$text_movil = "";
if ($device) {
  $text_movil = 'data-widget="pushmenu"';
}
$t = time();
$id_personita=$_SESSION['idUsuario'];
if (file_exists("../sistem_images/logo.png")) {
      $url_imagen = "../sistem_images/logo.png?r=" . $t;
  } else {
      $url_imagen = "../images/empty.jpg";
  }
?>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="<?php echo $url_imagen; ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">karaokola</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
         <img src="../images/empty.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['usuario']; ?></a>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <li class="nav-item">
            <a href="#karaokes" onclick="karaokes(1)" <?php echo $text_movil ?> id="nav_karaokes" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
              <p>karaokes</p>
            </a>
          </li> 
        <!-- <li class="nav-item">
          <a href="#usuarios" onclick="usuarios(1)" <?php echo $text_movil ?> id="nav_usuarios" class="nav-link">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>usuarios</p>
          </a>
        </li>  -->
        <li class="nav-item">
          <a href="#musicales" onclick="musicales(1)" <?php echo $text_movil ?> id="nav_musicales" class="nav-link">
          <i class="nav-icon fas fa-list-alt"></i>
            <p>musicales</p>
          </a>
        </li>


        <li class="nav-item">
          <a href="../login/logout.php" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Cerrar sesión
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>


