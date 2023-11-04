<div class="formulario">
    <?php

$inputs = ["usuario" => "text",  "contraseña" => "password", 
"confirmar_contraseña" => "password", "submit" =>"enviar"];
?>
    <h2>Inicie sesión</h2>
    <div class="mensaje_login">
        <?php if(isset($_GET['login'])&&($_GET['login']=='logueado') ):?>
        <?php echo '<h2 class="error">Usuario registrado correctamente</h2>';?>
        <?php endif;?>
    </div>

    <form action="./plogin.php" method="post" name="formulario" class="form1">
        <?php foreach($inputs as $clave => $input):?>
        <?php if($clave == "submit"):?>
        <button type="<?php echo $clave;?>" name="<?php echo $input?>"
            id="boton-form-login"><?php echo ucfirst($input)?></button>
        <?php else:?>
        <div class="caja-form">
            <label><?php echo ucfirst($clave);?></label>
            <input type="<?php echo $input;?>" name="<?php echo $clave?>" />
        </div>
        <?php endif;?>
        <?php endforeach;?>
    </form>

    <!-- Comprobación de existencia de variables e impresión de errores -->
    <?php  if (isset($_GET['login'])&&($_GET['login']=='error_datos')):?>
    <?php echo '<p class="error">Datos incorrectos!</p>'; ?>
    <?php else:?>
    <?php if(isset($_GET['login'])&&($_GET['login']=='error_usuario') ):?>
    <?php echo '<p class="error">Usuario no registrado!</p>';?>
    <?php else:?>
    <?php if (isset($_GET['login'])&&($_GET['login']=='error_requeridos')):?>
    <?php echo '<p class="error">No puede haber campos vacios!</p>'; ?>
    <?php else:?>
    <?php if (isset($_GET['login'])&&($_GET['login']=='error_contraseña')):?>
    <?php echo '<p class="error">Las contraseñas no coinciden!</p>'; ?>
    <?php else:?>
    <?php if (isset($_GET['login'])&&($_GET['login']=='cerrar_sesion')):?>
    <?php if (isset($_GET['var_cerrar'])) {
               session_start();
               $_SESSION = array();
               if (isset($_COOKIE[session_name()])) {
                   unset($_COOKIE[session_name()]);
               }
               session_destroy();
               header('Location: ./index.php?var2=login');
           }?>
    <?php echo '<p class="error">Sesión cerrada!</p>'; ?>

    <?php endif;?>
    <?php endif;?>
    <?php endif;?>
    <?php endif;?>
    <?php endif;?>
</div>