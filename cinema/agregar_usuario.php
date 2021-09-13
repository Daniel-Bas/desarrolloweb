<?php
    include("lib/conexion.php"); 
    if(isset($_POST['agregar'])){ // valida si alguien pulsó el boton de agregar

        $email = $_POST['email']; // recibimos la variable del formulario
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $contrasena = md5($_POST['contrasena']);

        $sql="INSERT INTO usuario(email,nombres,apellidos,contrasena) 
        VALUES ('$email','$nombres','$apellidos','$contrasena')"; //SQL de inserción de nueva facultad
        $consulta=mysqli_query($conexion, $sql); // ejecuta la consulta
        if(!$consulta){ //pregunta si la consulta falló
            die("no se insertaron datos ".$conexion->error); // manda mensaje de error
        }else{ 
            $_SESSION['usuario']= $nombres; // crea la variable de sesión mensaje
            header("Location: index.php"); // redirecionamiento a la pagina principal
        }
    }
?>