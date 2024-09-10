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
            <!-- DNI -->
            <label for="DNI">Ingrese su DNI:</label>
            <input type="number" name="DNI" id="DNI">

            <!-- Nombre -->
            <label for="Nombre">Ingrese su Nombre:</label>
            <input type="text" name="Nombre" id="Nombre">

            <!-- Apellido -->
            <label for="Apellido">Ingrese su Apellido:</label>
            <input type="text" name="Apellido" id="Apellido">

            <!-- Carrera -->
            <label for="carrera">Selecciona tu carrera:</label>
            <select name="carrera[]" id="carrera" multiple size="2">
                <option value="contador_publico">Contador Público</option>
                <option value="licenciado_administracion">Licenciado en Administración</option>
            </select>
            <!-- Correo -->
            <label for="Email">Ingrese su Email:</label>
            <input type="email" name="Email" id="Email">

            <!-- Clave -->
            <label for="Clave">Ingrese su Contraseña:</label>
            <input type="password" name="Clave" id="Clave">

            <!-- Botón -->
            <input type="submit" value="Crear Cuenta" name="crear">

            <!-- Link por si ya tiene cuenta -->
            <a href="loginusuario.php">¡Si tienes cuenta, Haz click aquí!</a>

        </div>
    </main>
    <footer>
        <div>
           <p>&copy; 2024 Grupo de estudiantes de la Técnica N*1 de Esteban Echeverría. Todos los derechos reservados.</p>
        </div>
    </footer> 
</body>
</html>