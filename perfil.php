<?php
require_once ('utils.php');
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Servicio de Formación On-line</h1>
        <div class="idiomas">Idioma
            <img src="./img/AREA_VALENCIA.png" alt="bandera-valencia" width="25" heigth="25" />
            <img src="./img/espana.png" alt="bandera-españa" width="25" heigth="25" id="spain" />
        </div>
    </header>
    <nav>
        <ul>
            <li id="borde"><a href="index.php?nombre">Home</a></li>
            <li><a href=./perfil.php>Perfil</a></li>
        </ul>
    </nav>
    <aside>
        <h3>Recursos de aprendizaje</h3>
        <?php
        pintarEnlacesAside();
        ?>
    </aside>
    <main>
        <?php $usuario =  $_COOKIE["usuario"];?>
        <?php if (!empty($_SESSION['user'])):?>
        <?php echo "<div id='logueado'><h2>Bienvenido $usuario</h2></div>";?>

        <div id='cerrar'><button id="cerrar_sesion"><a href='./index.php?login=cerrar_sesion'>Cerrar sesión</a></button>
        </div>

        <?php else:?>
        <?php header('Location: ./index.php?login');?>
        <?php endif;?>
    </main>
    <footer>
        <h4>&copy; Vicente Alarcón González</h4>
        <div><?php pintarFecha()?></div>
    </footer>
</body>

</html>