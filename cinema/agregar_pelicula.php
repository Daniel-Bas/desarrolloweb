<?php
    include("lib/conexion.php"); 
    if(isset($_POST['agregar'])){ // valida si alguien pulsó el boton de agregar

        $portada = $_FILES['portada']['name'];
        $temp = $_FILES['portada']['tmp_name'];
        $banner = $_FILES['banner']['name'];
        $temp2 = $_FILES['banner']['tmp_name'];
        $titulo = $_POST['titulo'];
        $año = $_POST['año'];
        $sinopsis = $_POST['sinopsis'];
        $idGenero = $_POST['idGenero'];
        $idPais = $_POST['idPais'];
        $idPlataforma = $_POST['idPlataforma'];

        move_uploaded_file($temp, 'images/'.$portada);
        move_uploaded_file($temp2, 'images/'.$banner);

        $sql="INSERT INTO pelicula(portada, banner, titulo, año, sinopsis, idGenero, idPais, idPlataforma) 
        VALUES ('$portada', '$banner', '$titulo', '$año', '$sinopsis', '$idGenero', '$idPais', '$idPlataforma')"; //SQL de inserción de nueva facultad
        $consulta=mysqli_query($conexion, $sql); // ejecuta la consulta
        if(!$consulta){ //pregunta si la consulta falló
            die("no se insertaron datos ".$conexion->error); // manda mensaje de error
        }else{ 
            $_SESSION['mensaje']= "Datos insertados satisfactoriamente"; // crea la variable de sesión mensaje
            header("Location: /cinema/list.php"); // redirecionamiento a la pagina principal
        }
    }
?>