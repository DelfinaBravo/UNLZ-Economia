<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Etiquetas para el SEO -->

    <!-- Etiquetas de SEO locales y especificaciones de idioma -->
    <meta name="language" content="Spanish">
    <meta name="geo.region" content="AR-B"> <!-- AR-B es el código ISO para Buenos Aires, Argentina -->
    <meta name="geo.placename" content="Buenos Aires, Argentina">
    <meta name="geo.position" content="-34.61315;-58.37723"> <!-- Coordenadas aproximadas de Buenos Aires -->
    <meta name="ICBM" content="-34.61315, -58.37723">

    <!-- Autores de la página -->
    <meta name="author" content="Grupo de estudiantes de la Técnica N*1 de Esteban Echeverría">

    <!-- Meta etiqueta de robots -->
    <meta name="robots" content="index, follow">

    <!-- Meta keywords -->
    <meta name="keywords" content="Facultad de Economía, Buenos Aires, estudiantes, UNLZ, educación, Cruce de Lomas">

    <!-- Meta descripción (máx. 160 caracteres) -->
    <meta name="description" content="Proyecto educativo para mejorar la página de Economía de la UNLZ realizado por estudiantes de la Técnica N*1 de Esteban Echeverría.">

    <!-- Título -->
    <title>Univerdad de Economía</title>
    <link rel="stylesheet" href="Estilos/style.css">
    <!-- Link Iconos Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="body">
    <?php 
        include("Acciones/login.php");
    ?>
    <!-- Metodología BEM -->
    <header>

    </header>
    <main>
            <!-- Formulario de Logueo -->
            <div class="form-login">
                <img src="Media/logoUNLZ.jpeg" alt="" width="200px">
                <form action="" method="post">
                    <div class="casilleros">
                         <!-- Email -->
                         <!-- required pattern es para garantizar que el email tenga un formato valido. -->
                        <input type="email" name="email" id="email" placeholder="Ingrese su Email"
                        required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div class="casilleros">
                            <!-- Contraseña -->
                            <!-- required minlength es para que tenga que ingresar minimo 8 caracteres -->
                        <input type="password" name="clave" id="clave" placeholder="Ingrese su Contraseña"
                        required minlength="8">
                        <i class="fa-solid fa-lock"></i>                   
                    </div>
                    <div class="botonusuario">
                            <!-- Botón -->
                        <input type="submit" value="Iniciar Sesión" name="ingresar">
                    </div>
                    <div class="linkusuario">
                         <!-- Link para crear cuenta -->
                    <p>¿No tienes cuenta? <a href="crearusuario.php"> ¡Haz click aquí para registrarte!</a></p>
                    
                   
                    </div>
                </form>
            </div>
    </main>
    <!-- <footer>
        <div>
           <p>&copy; 2024 Grupo de estudiantes de la Técnica N*1 de Esteban Echeverría. Todos los derechos reservados.</p>
        </div>
    </footer> -->
</body>
</html>
