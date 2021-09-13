<?php
    include("lib/conexion.php"); 
    if (isset($_GET['id'])) {// valida si alguien pulso el boton agregar
        $id =$_GET['id'];//recibimos la variable del formulario

        $sql= "DELETE FROM pelicula WHERE idPelicula =$id";// SQL de insercion de nueva facultad
        $consulta = mysqli_query($conexion, $sql);//ejecuta la consulta
        if (!$consulta) {// pregunta si la consulta fallo
            die("no se borraron los datos ". $conexion->error);// manda msj error
        }else {
            $_SESSION['mensaje']="Datos eliminados satisfactoriamente"; // crea la variable de sesión mensaje
            $_SESSION['color']="success";// crea la variable de sesión color
            header("Location: /cinema/list.php");
        }
}
?>