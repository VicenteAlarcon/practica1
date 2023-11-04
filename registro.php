<div class="formulario">
    <?php
$inputs = ["usuario" => "text", "nombre" => "text", 
"apellidos" => "text", "email" => "text", "contraseña" => "password",
"confirmar_contraseña" => "password", "submit" =>"enviar"];
?>
    <h2>Formulario de registro</h2>
    <form action="./pregistro.php" method="post" name="formulario" class="form1">
        <?php foreach($inputs as $clave => $input):?>
        <?php if($clave == "submit"):?>
        <button type="<?php echo $clave;?>" name="<?php echo $input?>"
            id="boton-form"><?php echo ucfirst($input)?></button>
        <?php else:?>
        <div class="caja-form">
            <label><?php echo ucfirst($clave);?></label>
            <input type="<?php echo $input;?>" name="<?php echo $clave?>" />
        </div>
        <?php endif;?>
        <?php endforeach;?>

    </form>

    <?php if(isset($_GET['registro'])&&($_GET['registro']=='error_requeridos') ):?>

    <?php echo '<p class="error">No puede haber campos vacíos!</p>';?>
    <?php else:?>

    <?php if (isset($_GET['registro'])&&($_GET['registro']=='error_datos')):?>

    <?php echo '<p class="error">Datos incorrectos!</p>'; ?>
    <?php endif;?>
    <?php endif;?>

</div>