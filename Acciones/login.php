    <?php 
    session_start();

    include_once("ConexionBD.php");
    $conexion = mysqli_connect("localhost","root","","ecounlz");

    //Ingreso de Admin
    if(!empty($_POST["ingresar"])){
          // Obtener valores del formulario
          $email = $_POST["email"];
          $clave = $_POST["clave"];

          $consulta = $conexion->prepare("SELECT * FROM Administrador where email = ? AND clave =?");
          $consulta->bind_param("ss",$email,$clave);
          $consulta->execute();
          $resultado = $consulta->get_result();
          if ($resultado->num_rows > 0) {
                 $row = $resultado->fetch_assoc();
                
                 if ($row["validacion"] != 0) {
                    $_SESSION['email'] = $email;
                    //Guardo el nombre completo para el saludo de bienvenida.
                    $_SESSION['nombre_completo'] = $row["nombre_completo"];
                    header("Location: VistasAdmin/inicioA.php");
                    echo '<script> alert("s"); </script>';
                    exit();
                } else {
                    echo "No tienes permisos para acceder.";
                }
            }
            $consulta->close();
        }

    


  
 
    if (!empty($_POST["ingresar"])) {
        // Obtener valores del formulario
        $email = $_POST["email"];
        $clave = $_POST["clave"];

        // Preparar la consulta para obtener la contraseña encriptada del usuario
        $consulta = $conexion->prepare("SELECT clave FROM Usuarios WHERE email = ?");
        $consulta->bind_param("s", $email);
        $consulta->execute();
        $consulta->store_result();

        if ($consulta->num_rows === 1) {
            // El usuario existe, verificar la contraseña
            $consulta->bind_result($clavehasheada);
            $consulta->fetch();

            if (password_verify($clave, $clavehasheada)) {
                 // Si la contraseña es correcta, almacenar Email y Clave en la sesión
                $_SESSION['email'] = $email; // Guardar el email en la sesión
            
                // Redirigir al usuario a otra página
                header("Location: VistasUsuario/inicioU.php");
                exit();
            }
        }

       
      
        exit();
        
    }
   
    mysqli_close($conexion);
?>

