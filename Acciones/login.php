    <?php 
    session_start();

    include_once("ConexionBD.php");
    $conexion = mysqli_connect("localhost","root","","ecounlz");


  
 
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
            $consulta->bind_result($clavehasheada);
            $consulta->fetch();

            if (password_verify($Clave, $clavehasheada)) {
                 // Si la contraseña es correcta, almacenar Email y Clave en la sesión
                $_SESSION['Email'] = $Email; // Guardar el email en la sesión
                $_SESSION['Clave'] = $Clave;  // Guardar la clave en la sesión (esto no es recomendable por motivos de seguridad)
            
            // Redirigir al usuario a otra página
                header("Location: VistasUsuario/inicioU.php");
                exit();
            }
        }

       
      
        exit();
        
    }
   
   // mysqli_close($conexion);
?>

