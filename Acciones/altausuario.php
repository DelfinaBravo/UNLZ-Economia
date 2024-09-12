<?php 
    include_once("ConexionBD.php");
    
    //$conexion = mysqli_connect("localhost","root","","ecounlz");
    if(!empty($_POST["crear"])){
       if(!empty($_POST["DNI"]) or !empty($_POST["Nombre"]) or !empty($_POST["Apellido"]) or !empty($_POST["Email"]) or !empty($_POST["Clave"])){
            $DNI = $_POST["DNI"];
            $Nombre = $_POST["Nombre"];
            $Apellido = $_POST["Apellido"];
            $Email = $_POST["Email"];
            $Clave = $_POST["Clave"];
            $consulta=$conexion->query("INSERT INTO Usuarios(DNI,Nombre,Apellido,Correo,Clave) VALUES ('$DNI','$Nombre','$Apellido','$Email','$Clave')");
            mysqli_close($conexion);
       }
      
    }
    
?>