<?php session_start();?>
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
    <link rel="stylesheet" href="../Estilos/style.css">
    <!-- Título -->
    <title>Univerdad de Economía</title>
    <!-- Estilos Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <!-- Metodología BEM -->
    <header>
        <div class="menu">
            <nav>
                <a class="logo" href="index.html"><img src="../Media/logoUNLZ.jpeg" alt="logoUNLZ" width="75px"></a>
                    <ul class="links">
                        <a href="">Salir</a>
                    </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="bienvenida">
            <div class="bienvenidoAdmin"> <i class="fa-solid fa-user-tie custom-icon"></i>
            <h1>Bienvenido Administrador <?php echo $_SESSION['nombre_completo'];?> </h1></div>
            <div class="gestion">
                <div class="horarios">
                    <a href="">HORARIOS</a>
                </div>

                <div class="alumnos">
                    <a href="">ALUMNOS</a>
                </div>
            </div>
        </div>
       
    </main>
    <footer>
    <footer>
        <div class="grid">
            <div class="item"><p>Contacto</p>
                <div class="info">
                    <p>Camino de Cintura y Juan XXIII</p>
                    <p>Lomas de Zamora</p>
                    <p>Buenos Aires - Argentina</p>
                    <p>economicas@unlz.edu.ar</p>
                    <p> 2152-8430</p>
                </div>
            </div>
            <div class="item"><p>Redes Sociales</p>
                    <div class="redes">
                        <a href=""> <img class="imgredes" src="../Media/youtube.png" alt="" width="50px"></a>
                        <a href=""><img class="imgredes" src="../Media/instagram.png" alt="" width="50px"></a>
                        <a href=""><img class="imgredes" src="../Media/facebook.png" alt="" width="50px"></a> 
                    </div>
            </div>
            <div class="item"><p>Ubicacion</p>
                <div class="mapa">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3277.1912862628506!2d-58.461163959944194!3d-34.77595947300585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcd21ee8f2942f%3A0x4dc91fe7512a3137!2sFacultad%20de%20Ciencias%20econ%C3%B3micas%20-%20UNLZ!5e0!3m2!1sen!2sar!4v1726123359353!5m2!1sen!2sar" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
       
         <div class="derechos">
            <p>_____________________________________________________________________________________________________________________________________________</p>
            <p>&copy; 2016 | UNLZ - Facultad de Ciencias Económicas |<a href="http://www.economicas.unlz.edu.ar/"> www.economicas.unlz.edu.ar</a> </p>
            <!-- <p>&copy; 2024 Grupo de estudiantes de la Técnica N*1 de Esteban Echeverría. Todos los derechos reservados.</p> -->
         </div>
    </footer>
</body>
</html>