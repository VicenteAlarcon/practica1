<?php
require_once("utils.php");
    


  //Utilizo $_POST para que no se solapen los datos con los del formulario de registro
 if (validarRequeridos($_POST['usuario'])&&validarRequeridos($_POST['contraseña'])
 &&validarRequeridos($_POST['confirmar_contraseña'])){

   
   //Compruebo que la cookie no esté vacia para continuar con el login
    if(isset($_COOKIE) && !empty($_COOKIE)){
    
        if (validarContrasenya($_POST['contraseña'], $_POST['confirmar_contraseña'])){

    
//$hash para desencriptar la contraseña
   $hash =$_COOKIE["contraseña"];
   
    //validamos usuario con usuario guardado en cookie
       $verificacion_usuario = comprobarCookies($_POST['usuario'], "usuario");
       $verificar_encriptado_cookie = verificarEncriptado($_POST['contraseña'], $hash);
        
       if($verificacion_usuario){

       
 //Si las verificaciones son correctas iniciamos sesión y redireccionamos a perfil.php
      if ($verificacion_usuario&&$verificar_encriptado_cookie){
                 session_start();
                 $_SESSION['user'] = $_REQUEST['usuario'];
                 header('Location: ./perfil.php');
                
      }else{
           header("Location:./index.php?login=error_datos");
     
        
     }
}else{
    header("Location:./index.php?login=error_usuario");
}
 }else{
    header("Location:./index.php?login=error_contraseña");
 }
}
else{
header("Location:./index.php?login=error_usuario");
}
   
 } else{
     header("Location:./index.php?login=error_requeridos");
 }