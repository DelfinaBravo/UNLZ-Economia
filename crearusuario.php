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
    <link rel="stylesheet" href="Estilos/style.css">
    <title>Univerdad de Economía</title>
</head>
<body>
    <?php 

        include("Acciones/altausuario.php");
        
    ?>
    <!-- Metodología BEM -->
    <header>
    
    </header>
    <main>
        <!-- Formulario para crear usuario -->
        <div class="form-crearusuario">
        <img src="Media/logoUNLZ.jpeg" alt="" width="200px">
            <form action="" method="post">

                <div class="casilleross">
                    <!-- DNI -->
                    <input type="number" name="DNI" id="DNI" placeholder="Ingrese su DNI">
                </div>

                <div class="casilleross">
                    <!-- Nombre -->
                    <input type="text" name="nombre" id="Nombre" placeholder="Ingrese su Nombre">
                </div>

                <div class="casilleross">
                    <!-- Apellido -->
                    <input type="text" name="apellido" id="Apellido" placeholder="Ingrese su Apellido">
                </div>

                <div class="casilleross">
                    <!-- Correo -->
                    <input type="email" name="email" id="Email" placeholder="Ingrese su Email">
                </div>

                <div class="casilleross">
                    <!-- Clave -->
                    <input type="password" name="clave" id="Clave" placeholder="Ingrese su contraseña">
                </div>

                <div class="casilleross">
                    <!-- Confirmar Clave -->
                    <input type="password" name="clave2" id="Clave2" placeholder="Confirme su contraseña">
                </div>

                <div class="botonusuario">
                    <!-- Botón -->
                    <input type="submit" value="Crear Cuenta" name="crear">
                </div>

                <div class="linkusuario">
                    <!-- Link por si ya tiene cuenta -->
                    <p>¡Si tienes una cuenta,<a href="loginusuario.php"> Haz click aquí!</a></p>
                </div>
              
            </form>
        </div>
    </main>
    <footer>
        <div>
           <p>&copy; 2024 Grupo de estudiantes de la Técnica N*1 de Esteban Echeverría. Todos los derechos reservados.</p>
        </div>
    </footer> 
</body>
</html>