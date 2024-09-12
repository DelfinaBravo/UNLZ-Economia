    <?php 
    include_once("ConexionBD.php");
    $conexion = mysqli_connect("localhost","root","","ecounlz");


    // Iniciar la sesión al principio del script
    session_start();

    if (!empty($_POST["ingresar"])) {
        // Obtener valores del formulario
        $Email = $_POST["Email"];
        $Clave = $_POST["Clave"];

        // Preparar la consulta para obtener la contraseña encriptada del usuario
        $consulta = $conexion->prepare("SELECT Clave FROM Usuarios WHERE Correo = ?");
        $consulta->bind_param("s", $Email);
        $consulta->execute();
        $consulta->store_result();

        if ($consulta->num_rows === 1) {
            // El usuario existe, verificar la contraseña
            $consulta->bind_result($hashedPassword);
            $consulta->fetch();

            if (password_verify($Clave, $hashedPassword)) {
                
                exit();
            }
        }

        // En caso de error, redirigir a la misma página de inicio de sesión
        header("Location: index.php"); // Redirigir a la misma página de inicio de sesión
        exit();
    }
?>
?>
