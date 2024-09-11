<?php 
    include("ConexionBD.php");
    
    $conexion = mysqli_connect("localhost","root","","ecounlz");
    if(!empty($_POST["crear"])){
       if(!empty($_POST["DNI"])){
            $DNI = $_POST["DNI"];
            $consulta=$conexion->query("INSERT INTO Usuarios(DNI) VALUES ('$DNI')");

       }
    }
   
?>