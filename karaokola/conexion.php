<?php

function db() {
  $host = "localhost";
  $dbname = "karaokola";
  $username = "root";
  $password = "";

  // Crea la conexión
  try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  } catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
  }

  // Devuelve la conexión
  return $conn;
}
