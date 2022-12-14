<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/6b9a49fe53.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/general.css">
    <link rel="stylesheet" href="../public/css/registrarse.css">
    <title>Registrarse</title>
</head>
<body>
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
    <main class="main-contenido contenedor-principal">
        <section class="registro">
            <div class="registro__encabezado">
                <i class="registro__icon fa-solid fa-user"></i>
                <h2 class="registro__tittle">REGISTRATE</h2>
            </div>
            <div class="registro__main">
                <form class="registro__form" action="../php/register.php" method="POST">
                    <div class="registro__input-group">
                        <label class="registro__input-name" for="name">Nombre</label>
                        <input class="registro__input" type="text" placeholder="Nombre" name="nombre" id="nombre">
                    </div>
                    <div class="registro__input-group">
                        <label class="registro__input-name" for="name">Apellido</label>
                        <input class="registro__input" type="text" placeholder="Apellido" name="apellido" id="apellido">
                    </div>
                    <div class="registro__input-group registro__input-group--columns">
                        <label class="registro__input-name" for="email">Correo electronico</label>
                        <input class="registro__input" type="email" placeholder="Correo" name="correo" id="correo">
                    </div>
                    <div class="registro__input-group registro__input-group--columns">
                        <label class="registro__input-name" for="pass">Contrase??a</label>
                        <input class="registro__input" type="password" placeholder="Contrase??a" name="password" id="password">
                    </div>
                    <div class="registro__input-group registro__input-group--columns">
                        <label class="registro__input-name" for="pass">Confirmacion</label>
                        <input class="registro__input" type="password" placeholder="Confirmacion" id="password-repit">
                    </div>
                    <div class="registro__btns registro__input-group--columns">
                        <input class="registro__button" type="submit" value="Registrarse">
                    </div>
                </form>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="footer__contenedor contenedor-principal">
            <a class="footer__logo" href="../index.html">
                <h1 class="footer__titulo">INVENTORY</h1>
            </a>
        </div>
    </footer>
</body>
</html>