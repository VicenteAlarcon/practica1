<?php
require_once ('utils.php');
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

        <?php 
        if(!isset($_GET['perfil'])){
       pintarNav();
        }else{
                  echo " 
        <ul>
            <li id='borde' ><a href='index.php?home'>Home</a></li>
            <li><a href='index.php?perfil'>Parfil</a></li>
        </ul>
        ";
       
        }
        
        ?>

    </nav>
    <aside>
        <h3>Recursos de aprendizaje</h3>

        <?php
       pintarEnlacesAside();
      ?>

    </aside>
    <main>
        <?php
    
        if(isset($_GET['registro'])){
            require_once 'registro.php';  
        }elseif(isset($_GET['login'])) {
             require_once 'login.php';
        }
        elseif(isset($_GET['perfil'])) {
            require_once 'perfil.php';
        }
        else{
            require_once 'principal.php';
        }
     ?>
    </main>
    <footer>
        <h4>&copy; Vicente Alarcón González</h4>
        <div><?php pintarFecha()?></div>
        <div class="social">

        </div>
    </footer>
</body>

</html>