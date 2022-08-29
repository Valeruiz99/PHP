<?php  #Las variables se crean con el signo $
$nombreServidor= 'localhost';#Es obligatorio poner las '' en un string y cerrar con ;
$nombreUsuario= 'root';
$clave= '';
$nombreBaseDatos= 'myProject';
#Siempre son estas 4 variables obligatorias.
#Variable de la conexión:
$con= new mysqli($nombreServidor, $nombreUsuario, $clave, $nombreBaseDatos);
if ($con->connect_error){
    die('Conexión fallida: '.$con->connect_error);
}
#echo 'Conexión establecida' #Con echo se imprime.

?>