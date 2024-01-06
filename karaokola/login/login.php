     
<?php
session_start();
include('../conexion.php');
$username = "";
$password = "";
if (isset($_POST['name'])) {
  $username = trim($_POST['name']);
}
if (isset($_POST['pwd'])) {
  $password = trim($_POST['pwd']);
}
$conn = db();

$stmt = $conn->prepare("SELECT * FROM tblUsuario WHERE usuario=? AND password=?");

// Ejecuta la consulta
$stmt->execute([$username, $password]);

// Comprueba si hay resultados
if ($stmt->rowCount() === 0) {
  echo 'sasdfasd---'.$stmt->rowCount().'---';
  echo 2;
} else {
  // Obtiene el usuario
  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
  // Almacena los datos del usuario en la sesión
  $_SESSION['idUsuario'] = $usuario['idUsuario'];
  $_SESSION['usuario'] = $usuario['usuario'];
  echo 1;
}

// Cierra la sentencia preparada
$stmt = null;
// Cierra la conexión
$conn = null;
?>  
                