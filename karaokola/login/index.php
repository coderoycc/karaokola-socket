<?php
    session_start();
    if(isset($_SESSION['idUsuario']) && intval($_SESSION['idUsuario']) > 0){
        header('Location: ../main-page/index.php');
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="../images/huella.ico">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
	<title>Iniciar</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header">
					<div class="imagenLogin" style="text-align: center; margin: 3%;">
						<img src="../images/escudo_felcc.jpg" alt="" width="150" height="150" style="border-radius: 3%;">
					</div>
					<h3>Iniciar sesi&oacute;n</h3>
				</div>
				<div class="card-body">
					<form class="login">
						<div class="input-group form-group input">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" class="form-control" placeholder="Usuario" name="name" id="user_name" required>
						</div>
						<div class="input-group form-group input">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" autocomplete="off" placeholder="Contrase&ntilde;a" name="pwd" id="password" required>
						</div>
						<div class="row align-items-center remember">
							<input type="checkbox">Recordar
						</div>
						<div class="form-group">
							<input type="submit" id="boton-estilo" value="Ingresar" class="btn float-right login_btn">
						</div>
						<div id="mensaje" style="color: beige;">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script defer src="../fontawesome/js/all.js"></script>
<script src="../fontawesome/js/fontawesome.js"></script>
<script type="text/javascript" charset="utf8" src="../js/jquery-3.3.1.js"></script>
<script src="../js/login.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
	function mostrarContrasena() {
		var tipo = document.getElementById("password");
		if (tipo.type == "password") {
			tipo.type = "text";
		} else {
			tipo.type = "password";
		}
	}
</script>

</html>