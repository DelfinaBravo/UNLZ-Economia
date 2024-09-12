<?php 
    include_once("ConexionBD.php");

    if(!empty($_POST["crear"])){
       if(!empty($_POST["DNI"]) && !empty($_POST["Nombre"]) && !empty($_POST["Apellido"]) && !empty($_POST["Email"]) && !empty($_POST["Clave"])){
            $DNI = $_POST["DNI"];
            $Nombre = $_POST["Nombre"];
            $Apellido = $_POST["Apellido"];
            $Email = $_POST["Email"];
            $Clave = $_POST["Clave"];

            // Encriptar la contraseña
            $ClaveHash = password_hash($Clave, PASSWORD_DEFAULT);

            // Preparar la consulta SQL usando sentencias preparadas
            // La función prepare() se usa para preparar una consulta SQL con parámetros marcados por signos de interrogación (?).
            // Esto permite que la consulta sea ejecutada de manera más segura, ya que los parámetros se envían a la base de datos
            // en un formato separado de la consulta SQL, evitando ataques de inyección SQL.
            $consulta = $conexion->prepare("INSERT INTO Usuarios (DNI, Nombre, Apellido, Correo, Clave) VALUES (?, ?, ?, ?, ?)");

            // Asociar variables a los parámetros de la consulta preparada
            // La función bind_param() vincula las variables a los parámetros marcados en la consulta SQL.
            // La cadena de tipo "sssss" indica que cada parámetro es de tipo string (cadena de caracteres).
            // Los parámetros se pasan por referencia (notado por el símbolo &) y se sustituyen en la consulta SQL 
            // en el orden en que aparecen. Esto asegura que los datos sean del tipo esperado y protege contra inyecciones SQL.
            $consulta->bind_param("sssss", $DNI, $Nombre, $Apellido, $Email, $ClaveHash);
            

            // Ejecutar la consulta
            if($consulta->execute()){
                echo "Usuario registrado exitosamente.";
            } else {
                echo "Error al registrar el usuario: " . $consulta->error;
            }

            // Cerrar la consulta y la conexión
            $consulta->close();
            mysqli_close($conexion);
       }
    }
?>
