<?php
    include("lib/conexion.php"); 
    if(isset($_POST['agregar'])){ // valida si alguien pulsó el boton de agregar

        $email = $_POST['email']; // recibimos la variable del formulario
        $contrasena = md5($_POST['contrasena']);

        $sql="SELECT * FROM usuario WHERE email='$email' AND contrasena='$contrasena'"; //SQL validar la existencia de usuario
        $consulta=mysqli_query($conexion, $sql); // ejecuta la consulta
        $campos=mysqli_fetch_array($consulta);
        if(!$consulta){ //pregunta si la consulta falló
            die("no se insertaron datos ".$conexion->error); // manda mensaje de error
        }else{ 
            $_SESSION['usuario']=$campos['nombres']; // crea la variable de sesión mensaje
            header("Location: index.php"); // redirecionamiento a la pagina principal
        }
    }
?>