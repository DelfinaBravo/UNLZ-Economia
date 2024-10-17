<?php 
    $conexion = mysqli_connect("localhost","root","","ecounlz");
    if (mysqli_connect_error()) {
        echo "Error de conexión: " . mysqli_connect_error();
        exit();
    } 
    

    if(!empty($_POST["crear"])){
       if(!empty($_POST["DNI"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["email"]) && !empty($_POST["clave"]) && !empty($_POST["clave2"])){
            $DNI = $_POST["DNI"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = $_POST["email"];
            $clave = $_POST["clave"];
            $clave2= $_POST["clave2"];

            if ($clave==$clave2)
            { 
                // Preparar la consulta SQL para verificar si el email ya existe
                $stmt = $conexion->prepare("SELECT COUNT(*) AS cantidad FROM Usuarios WHERE email = ?");
                $stmt->bind_param("s", $email); // Asociar la variable $Email al parámetro de la consulta
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
                    $clavehash = password_hash($clave,PASSWORD_DEFAULT);

                    // Preparar la consulta SQL usando sentencias preparadas
                    // La función prepare() se usa para preparar una consulta SQL con parámetros marcados por signos de interrogación (?).
                    // Esto permite que la consulta sea ejecutada de manera más segura, ya que los parámetros se envían a la base de datos
                    // en un formato separado de la consulta SQL, evitando ataques de inyección SQL.
                    $consulta = $conexion->prepare("INSERT INTO Usuarios (DNI,email, nombre, apellido,clave) VALUES (?, ?, ?, ?, ?)");

                    // Asociar variables a los parámetros de la consulta preparada
                    // La función bind_param() vincula las variables a los parámetros marcados en la consulta SQL.  
                    // La cadena de tipo "sssss" indica que cada parámetro es de tipo string (cadena de caracteres).
                    // Los parámetros se pasan por referencia (notado por el símbolo &) y se sustituyen en la consulta SQL 
                    // en el orden en que aparecen. Esto asegura que los datos sean del tipo esperado y protege contra inyecciones SQL.
                    $consulta->bind_param("sssss", $DNI,$email, $nombre, $apellido, $clavehash);
                    //Comprobar consulta    
                    if (!$consulta->execute()) {
                        echo "Error al ejecutar la consulta: " . $consulta->error;
                        exit();
                    }
                    // Ejecutar la consulta
                    if($consulta->execute()){
                        echo "Usuario registrado exitosamente.";
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
