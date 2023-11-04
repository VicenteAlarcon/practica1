<?php

require_once("utils.php");


// validación de los campos del formulario.

if (validarRequeridos($_REQUEST['usuario'])&&validarRequeridos($_REQUEST['contraseña'])
        &&validarRequeridos($_REQUEST['confirmar_contraseña'])) {
 
// Bloque try-catch para capturar excepción lanzada por la función validarContrasenya.    
try {
    if (validarEmail($_REQUEST['email'])&&validarContrasenya(
        $_REQUEST['contraseña'],
        $_REQUEST['confirmar_contraseña']
    )) {
         
        $encriptado_contrasenya = encriptarContrasenya($_REQUEST['contraseña']);
        $encriptado_confirmacion = encriptarContrasenya($_REQUEST['confirmar_contraseña']);
       
       
    } else {
         header("Location:./index.php?registro=error_datos");
    }
} catch(Exception $e){
     header("Location:./index.php?registro=error_datos");
}
    
  
} else {
     header("Location:./index.php?registro=error_requeridos");
}


$validar_email=validarEmail($_REQUEST['email']);
$validar_contrasenya=verificarEncriptado($_REQUEST['contraseña'], $encriptado_contrasenya);
$validar_confirmacion=verificarEncriptado($_REQUEST['confirmar_contraseña'], $encriptado_confirmacion);


//si los campos están correctos se crea un nuevo usuario y sus cookies y se redirecciona a login

if ($validar_email&&$validar_contrasenya&&$validar_confirmacion) {
    
$usuario = new Usuario($_REQUEST['usuario'] ?? '', $_REQUEST['nombre'] ?? '', $_REQUEST['apellido'] ?? '', 
$_REQUEST['email'] ?? '', $_REQUEST['contraseña'] ?? '', $_REQUEST['confirmar_contraseña'] ?? '');

crearCookie("usuario", $usuario->usuario);
    crearCookie("contraseña", $encriptado_contrasenya);
  header("Location:./index.php?login=logueado");

} else {
     header("Location:./index.php?login=error_datos");
}