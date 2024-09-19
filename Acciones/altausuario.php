<?php 
    $conexion = mysqli_connect("localhost","root","","ecounlz");
    if (mysqli_connect_error()) {
        echo "Error de conexión: " . mysqli_connect_error();
        exit();
    } else {
        echo "Conectado a la base de datos con éxito!";
    }
    

    if(!empty($_POST["crear"])){
       if(!empty($_POST["DNI"]) && !empty($_POST["Nombre"]) && !empty($_POST["Apellido"]) && !empty($_POST["Email"]) && !empty($_POST["Clave"]) && !empty($_POST["Clave2"])){
            $DNI = $_POST["DNI"];
            $Nombre = $_POST["Nombre"];
            $Apellido = $_POST["Apellido"];
            $Correo = $_POST["Email"];
            $Clave = $_POST["Clave"];
            $Clave2= $_POST["Clave2"];

            if ($Clave==$Clave2)
            { 
                // Preparar la consulta SQL para verificar si el email ya existe
                $stmt = $conexion->prepare("SELECT COUNT(*) AS cantidad FROM Usuarios WHERE Correo = ?");
                $stmt->bind_param("s", $Email); // Asociar la variable $Email al parámetro de la consulta
                $stmt->execute();
                $resultado = $stmt->get_result();
                $row = $resultado->fetch_assoc();

                // Verificar si el email ya existe en la base de datos
                if ($row['cantidad'] > 0) 
                {
                    echo ("<script>alert('El email ya está registrado');</script>");

                }
                else {
                    // Encriptar la contraseña
                    $ClaveHash = password_hash($Clave,PASSWORD_DEFAULT);

                    // Preparar la consulta SQL usando sentencias preparadas
                    // La función prepare() se usa para preparar una consulta SQL con parámetros marcados por signos de interrogación (?).
                    // Esto permite que la consulta sea ejecutada de manera más segura, ya que los parámetros se envían a la base de datos
                    // en un formato separado de la consulta SQL, evitando ataques de inyección SQL.
                    $consulta = $conexion->prepare("INSERT INTO Usuarios (DNI,Correo, Nombre, Apellido,Clave) VALUES (?, ?, ?, ?, ?)");

                    // Asociar variables a los parámetros de la consulta preparada
                    // La función bind_param() vincula las variables a los parámetros marcados en la consulta SQL.  
                    // La cadena de tipo "sssss" indica que cada parámetro es de tipo string (cadena de caracteres).
                    // Los parámetros se pasan por referencia (notado por el símbolo &) y se sustituyen en la consulta SQL 
                    // en el orden en que aparecen. Esto asegura que los datos sean del tipo esperado y protege contra inyecciones SQL.
                    $consulta->bind_param("sssss", $DNI,$Email, $Nombre, $Apellido, $ClaveHash);
                    //Comprobar consulta    
                    if (!$consulta->execute()) {
                        echo "Error al ejecutar la consulta: " . $consulta->error;
                        exit();
                    }
                    // Ejecutar la consulta
                    if($consulta->execute()){
                        echo "Usuario registrado exitosamente.";
                    }else {
                        echo "Error al registrar el usuario: " . $consulta->error;
                    }

                    // Cerrar la consulta y la conexión
                    $consulta->close();
                    mysqli_close($conexion);
                }
            
            }
            else{
                echo ("<script>alert('sus contraseñas no coinciden');</script>");
            }
        }
    }
?>
