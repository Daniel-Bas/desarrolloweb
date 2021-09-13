<?php
    session_start(); //trabajar con sesiones
    session_destroy(); // elimina las sesiones
    header("Location: index.php"); // redirecciona
?>