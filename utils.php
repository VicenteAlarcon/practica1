<?php
//Creación de clase para recoger los datos del formulario.

class Usuario
{

    public function __construct(private string $usuario, private string $nombre, private string $apellido,
    private string $email, private string $password, private string $confirm){}

    public function __get($atributo) {
        if(property_exists($this, $atributo))
             return $this->$atributo;
    }

    public function __set($atributo, $valor) {
        $this->$atributo = $valor;
    }
}


/**
 * Funcion para validar que los textos no estén vacios.
 * @param{string} - Campo para validar.
 * @return {bool}.
 */
function validarRequeridos(string $entrada): bool
{
    return !(trim($entrada)=='');
}



/**
 * Función para validar el email.
 * @param{string} - Correo para validar.
 * @throws InvalidArgumentException cuando el email no es correcto.
 */
function validarEmail(string $email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;  
    } else {
        throw new InvalidArgumentException('Datos incorrectos');
    }
    
}
  
/**
 * Función para validar contraseña.
 * @param{string} - Contraseña.
 * @param{string} - Confirmación de contraseña.
 * @return {bool}
 */
function validarContrasenya(string $contrasenya, string $confirmacion):bool
{
 return $contrasenya == $confirmacion;
          
      
}


/**
 * Función para crear las cookies
 * @param{string} - Nombre de la cookie.
 * @param{string} - Valor de la cookie.
 */

function crearCookie(string $nombre, $valor)
{
    $caducidad = time() + 3600;
    setcookie($nombre, $valor, $caducidad);
}


/**
* Función encriptado contraseña
*/

function encriptarContrasenya(string $parametro)
{
    return password_hash($parametro, PASSWORD_BCRYPT);
}

/**
 * Funcion verificación del encriptado
 */ 

function verificarEncriptado(string $contrasenya, $hash)
{
    return (password_verify($contrasenya, $hash));
}


/**
 * Función para comprobar las cookies con los datos introducidos
 * @param{string} - Parámetro introducido.
 * @param{string} - Parametro de la cookie.
 * @return{bool}
 */
function comprobarCookies(string $parametro, string $cook):bool
{
  return  $_COOKIE[$cook]== $parametro ;
        

 }


//Funciones utilizadas para mostrar enlaces en nav y aside así como la fecha y hora en footer.

function pintarFecha()
{
date_default_timezone_set("Europe/Madrid");
$fecha_hora = date("d-m-Y H:i:s");
echo $fecha_hora;
}


function pintarEnlacesAside(){
        
           
         $enlaces = ["https://www.udemy.com" => "Udemy", "https://www.formacioncarpediem.com/" => "Formación Carpe Diem",
          "https://www.euroinnova.edu.es/" => "Euroinnova", "https://www.cursosfemxa.es/" => "Femxa"];
          echo "<div class=lista-aside><ul>";
   
         foreach($enlaces as $key => $nombre){ 
              echo "<li class=lista_aside><a href=$key>$nombre</a></li>";
            } 
          echo "</ul>";
          echo "</div>";


}

function pintarNav(){
      echo " 
        <ul>
            <li id='borde' ><a href='index.php?home'>Home</a></li>
            <li id='borde' ><a href='index.php?login' >Login</a></li>
            <li id='borde' ><a href='index.php?registro'>Registro</a></li>
            <li><a href='#'>Perfil</a></li>
        </ul>
        ";
 }



      