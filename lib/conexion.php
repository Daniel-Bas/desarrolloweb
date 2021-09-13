<?php
    session_start(); //inicializa las variables de sesión
    // variables de conexión
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "cinema";

    // crear la cadena de conexión
    $conexion = new mysqli($servername, $username, $password, $database)
    or die("Conexión falló:". $conexion->connect_error);
?>