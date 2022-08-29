<?php 
    include('../conexion.php'); #Siempre debo llamar a la conexión, o importar el archivo donde la tengo.
    if(isset($_POST["registrar"])){
        $nombre=mysqli_real_escape_string($con, $_POST["Nombre"]);
        $correo=mysqli_real_escape_string($con, $_POST["Correo"]);
        $usuario=mysqli_real_escape_string($con, $_POST["Usuario"]);
        $clave=mysqli_real_escape_string($con, $_POST["Clave"]);
        $claveEncriptada=sha1($clave);#Este sha1 es un método de encriptación
        $sqlUsuario="SELECT idUsuario FROM usuarios WHERE usuario='$usuario'";#Lo que tengo entre comillas es código SQL
        $resultado= $con->query($sqlUsuario);#La variable con es la conexión
        $filas= $resultado->num_rows; #Que este comando me lo ejecute fila por fila
        if($filas>0){
            echo
              "<script>
                alert('El usuario ya existe');
                window.location='../views/register.html';
              </script>";  
        }
        else{
            $nuevoUsuario="INSERT INTO usuarios (nombre,correo,usuario,clave) VALUES ('$nombre', '$correo', '$usuario', '$claveEncriptada')";
            $resultadoUsuarioNuevo= $con->query($nuevoUsuario);#Aquí estamos ejecutando el query de arriba
            if($resultadoUsuarioNuevo>0){
                echo
                    "<script>
                        alert('Usuario registrado');
                        window.location='../views/login.html';
                    </script>";
            }
            else{
                echo
                    "<script>
                        alert('Error al registrar usuario');
                        window.location='../views/register.html';
                    </script>";
            }
        }
    }
?>
