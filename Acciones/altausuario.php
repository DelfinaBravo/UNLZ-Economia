<?php 
    $conexion = mysqli_connect("localhost", "root", "", "ecounlz");
    if (mysqli_connect_error()) {
        echo "Error de conexión: " . mysqli_connect_error();
        exit();
    } 

    if (!empty($_POST["crear"])) {
        if (!empty($_POST["DNI"]) && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) 
            && !empty($_POST["email"]) && !empty($_POST["clave"]) && !empty($_POST["clave2"])) {

            $DNI = $_POST["DNI"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
            $clave = $_POST["clave"];
            $clave2 = $_POST["clave2"];

            // Validaciones
            if (preg_match("/^\d+$/", $DNI) && // que solo se ingrese digito
                preg_match("/^[a-zA-Z]+$/", $nombre) && // que solo se ingrese letras
                preg_match("/^[a-zA-Z]+$/", $apellido) && //que solo se ingrese letras
                strlen($clave) >= 8 && // que la contraseña sea minimo de 8 caracteres
                $clave === $clave2) {

                if ($clave == $clave2) { 
                    // Preparar la consulta SQL para verificar si el email ya existe
                    $stmt = $conexion->prepare("SELECT COUNT(*) AS cantidad FROM usuarios WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $resultado = $stmt->get_result();
                    $row = $resultado->fetch_assoc();

                    if ($row['cantidad'] > 0) {
                        echo ("<script>alert('El email ya está registrado');</script>");
                    } else {
                        $clavehash = password_hash($clave, PASSWORD_DEFAULT);

                        $consulta = $conexion->prepare(
                            "INSERT INTO usuarios (DNI, email, nombre, apellido, clave) VALUES (?, ?, ?, ?, ?)"
                        );
                        $consulta->bind_param("sssss", $DNI, $email, $nombre, $apellido, $clavehash);

                        if (!$consulta->execute()) {
                            echo "Error al ejecutar la consulta: " . $consulta->error;
                            exit();
                        }

                        if ($consulta->execute()) {
                            echo "Usuario registrado exitosamente.";
                        }

                        $consulta->close();
                        mysqli_close($conexion);
                    }
                } else {
                    echo ("<script>alert('Las contraseñas no coinciden');</script>");
                }
            } 
            // Else If para los mensajes de error en las validaciones
            else if (!preg_match("/^\d+$/", $DNI)) {
                echo ("<script>alert('El DNI debe contener solo números');</script>");
            } else if (!preg_match("/^[a-zA-Z]+$/", $nombre)) {
                echo ("<script>alert('El nombre debe contener solo letras');</script>");
            } else if (!preg_match("/^[a-zA-Z]+$/", $apellido)) {
                echo ("<script>alert('El apellido debe contener solo letras');</script>");
            } else if (strlen($clave) < 8) {
                echo ("<script>alert('La contraseña debe tener al menos 8 caracteres');</script>");
            } else if ($clave !== $clave2) {
                echo ("<script>alert('Las contraseñas no coinciden');</script>");
            }
        } else {
            echo ("<script>alert('Por favor, complete todos los campos');</script>");
        }
    }
?>
