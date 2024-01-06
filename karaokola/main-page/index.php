        

<?php

include("../conexion.php");

?>
<!DOCTYPE html>
<html lang="es">

    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../AdminLTE/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../AdminLTE/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="../css/spinner.css">
    <link rel="stylesheet" href="../css/modal.css">
    <link rel="stylesheet" href="../css/config.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.17/css/uikit.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.17/js/uikit.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.17/js/uikit-icons.min.js"></script>
    <link rel="stylesheet" href="../css/reports-template.css">
    <link rel="stylesheet" href="../dist_pagination/simplePagination.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"></script>
    <script src="../js/socket.io.min.js"></script>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
    <input type="hidden" id="carpeta-activa">
    <input type="hidden" id="pagina-activa">
    <div class="wrapper">

        <!-- Preloader -->
        <div style="position: absolute;" class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="../AdminLTE/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <?php
        include("../nav/nav.php");
        ?>

        <!-- INICIO TODO Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="all-body">
        </div>
        <!-- FINAL -->
        <div id="spinner">
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer" style="text-align:center">
        <strong>Copyright &copy; 2021 <a href="#">Stis - Bolivia</a>.</strong>
        <div class="float-right d-none d-sm-inline-block">
        </div>
        </footer>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>

    

    <?php
         include("../karaokes/modal_eliminar.php");include("../usuarios/modal_eliminar.php");include("../musicales/modal_eliminar.php");
         
    ?>

    <div id="shadow" class="popup"></div>

    <script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="../AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../AdminLTE/plugins/chart.js/Chart.min.js"></script>
    <script src="../AdminLTE/plugins/sparklines/sparkline.js"></script>
    <script src="../AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="../AdminLTE/plugins/moment/moment.min.js"></script>
    <script src="../AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="../AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
    <script src="../AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="../AdminLTE/dist/js/adminlte.js"></script>
    <script src="../AdminLTE/dist/js/demo.js"></script>
    <script src="js/app.js"></script>
    <script src="js/abm.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="../dist_pagination/jquery.simplePagination.js"></script>
    <script src="../karaokes/js/app.js"></script><script src="../usuarios/js/app.js"></script><script src="../musicales/js/app.js"></script>

    </body>

</html>


