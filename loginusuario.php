<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Logueo de Usuario</title>
</head>
<body>
    <!-- Metodología BEM -->
    <header>

    </header>
    <main>
            <!-- Formulario de Logueo -->
            <div class="formulario">
                <form action="" method="post">
                    <!-- Email -->
                    <label for="email">Ingrese su Email:</label>
                    <input type="email" name="email" id="email">

                    <!-- Contraseña -->
                    <label for="clave"></label>
                    <input type="password" name="clave" id="clave">

                    <!-- Botón -->
                    <input type="submit" value="Iniciar Sesión" name="ingresar">

                    <!-- Link para crear cuenta -->
                    <a href="crearusuario.php">¿No tienes cuenta?¡Haz click aquí para registrarte!</a>
                </form>
            </div>
    </main>
    <footer>

    </footer>
</body>
</html>