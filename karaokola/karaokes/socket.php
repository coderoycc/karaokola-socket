<?php

$caja ="1"; //$_POST['caja'];
$ficha = $_POST['id'];
$tuNombre = $_POST['tuNombre'];

echo $tuNombre;

    $direccion = trim('localhost');
    $puerto = trim('5900');
     
   $texto = trim($caja.'..'.$tuNombre.'Greetings from '.gethostname());
     $texto = trim($ficha.'..'.$tuNombre);
    $string = $texto.PHP_EOL;

    $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    if ($socket === false) {
        echo "socket_create() falló: razón: " . socket_strerror(socket_last_error()) . "\n";
    } else {
        echo "OK.\n";
    }

    echo "Intentandoo conectar a ".$direccion." en el puerto ".$puerto."...";
    $result = socket_connect($socket, $direccion, $puerto);
    if ($result === false) {
        echo "socket_connect() falló.\nRazón: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
    } else {
		
		$message = $texto;
		socket_write($socket, $message, strlen($message));
        echo "OK.\n";
		
    }

    // echo $string.','.$direccion.','.$puerto;
    /* Abrir un socket al puerto 1234 en localhost */
    $socket = stream_socket_client('tcp://'.$direccion.':'.$puerto, $errno, $errorMessage);
    /* Enviar información ordinaria mediante canales oridinarios. */
    if ($socket === false) {
        throw new UnexpectedValueException("Failed to connect: $errorMessage");
    }
    fwrite($socket, $string);

    /* Enviar más información fuera de banda. */
    stream_socket_sendto($socket, "", STREAM_OOB);

    /* Cerrarlo */
    fclose($socket);

?>