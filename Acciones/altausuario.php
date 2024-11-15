<?php 
    $conexion = mysqli_connect("localhost", "root", "", "ecounlz");
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
             $verf= 'no verificado';
 
             if ($clave==$clave2)
             { 
                 // Preparar la consulta SQL para verificar si el email ya existe
                 $stmt = $conexion->prepare("SELECT COUNT(*) AS cantidad FROM usuarios WHERE email = ?");
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
                     if (!$consulta = $conexion->prepare("INSERT INTO usuarios (DNI,email, nombre, apellido,clave,verificado) VALUES (?, ?, ?, ?, ?, ?)")) {
                         echo "Error al preparar la consulta: " . $conexion->error;
                         exit();
                     }
 
                     // Asociar variables a los parámetros de la consulta preparada
                     $consulta->bind_param("ssssss", $DNI,$email, $nombre, $apellido, $clavehash, $verf);
                     
                     //Comprobar consulta    
                     if (!$consulta->execute()) {
                         echo "Error al ejecutar la consulta: " . $consulta->error;
                         exit();
                     }
                     else {
                         echo ("<script>alert('Aguarde su verificacion');</script>");
                     }
 
                     // Cerrar la consulta y la conexión
                     if (!$consulta->close()) {
                         echo "Error al cerrar la consulta: " . $consulta->error;
                         exit();
                     }
                     mysqli_close($conexion);
                 }
             
             }
             else{
                 echo ("<script>alert('sus contraseñas no coinciden');</script>");
             }
         }
     }
 ?>
?>
