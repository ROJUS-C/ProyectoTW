<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
    <script src="https://kit.fontawesome.com/6b9a49fe53.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/general.css">
    <link rel="stylesheet" href="../public/css/iniciar-sesion.css">
</head>
<body>
    <!-- ENCABEZADO -->
    <header class="header">
        <div class="header__main contenedor-principal">
            <a class="header__logo" href="../index.html">
                <h1 class="header__titulo">INVENTORY</h1>
            </a>
            <nav class="header__menu">
                <ul class="header__opciones">
                    <li class="header__opcion header__opcion--background-purple">
                        <a class="header__link header__link--color-white" href="../index.html">Regresar</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- MAIN -->
    <main class="main-contenido contenedor-principal">
        <section class="iniciar-sesion">
            <div class="iniciar-sesion__encabezado">
                <i class="iniciar-sesion__icon fa-solid fa-user"></i>
                <h2 class="iniciar-sesion__tittle">INICIAR SESION</h2>
            </div>
            <div class="iniciar-sesion__main">
                <form class="iniciar-sesion__form" action="../php/login.php" method="POST">
                    <div class="iniciar-sesion__input-group">
                        <label class="iniciar-sesion__input-name" for="email">Correo electronico</label>
                        <input class="iniciar-sesion__input" name="correo" type="email" placeholder="Correo electronico" name="email" id="email">
                    </div>
                    <div class="iniciar-sesion__input-group">
                        <label class="iniciar-sesion__input-name" for="pass">Contraseña</label>
                        <input class="iniciar-sesion__input" name="password" type="password" placeholder="Contraseña" name="pass" id="pass">
                    </div>
                    <a class="iniciar-sesion__recuperar-contraseña" href="">¿Olvidaste tu contraseña?</a>
                    <div class="iniciar-sesion__btns">
                        <input class="iniciar-sesion__button iniciar-sesion__button--color-blue" type="submit" value="Iniciar Sesion">
                        <a href="registrarse.php" class="iniciar-sesion__button iniciar-sesion__button--link">Registrarse</a>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <!-- PIE DE PAGINA -->
    <footer class="footer">
        <div class="footer__contenedor contenedor-principal">
            <a class="footer__logo" href="../index.html">
                <h1 class="footer__titulo">INVENTORY</h1>
            </a>
        </div>
    </footer>
</body>
</html>