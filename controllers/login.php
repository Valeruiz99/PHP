<?php 
include('../conexion.php');
if(!empty($_POST)){
    $usuario=mysqli_real_escape_string($con, $_POST["nickname"]);
    $clave=mysqli_real_escape_string($con, $_POST["Clave"]);
    $claveEncriptada=sha1($clave);
    #Hacemos la consulta, buscando el usuario y la clave encriptada 
    $consultaSQL="SELECT idUsuario FROM usuarios WHERE usuario='$usuario' AND clave='$claveEncriptada'";
    $resultado= $con->query($consultaSQL);
    $filas= $resultado->num_rows;
    if($filas>0){
        $filas=$resultado->fetch_assoc();#Función como el forEach, consulta fila por fila
        $_SESSION['usuarioSesion']=$filas["idUsuario"];#El primer idUsuario, es una variable nueva de session, y le decimos que es igual a la de base de datos.
        #Con esa variable î capturamos el nombre del usuario en la base de datos y la podemos usar para dar una bienvenida personalizada.
        #También podemos redireccionar en php directamente con header("Location: admin.php")
        echo
              "<script>
                alert('¡Bienvenido!');
                window.location='../views/admin.html';
              </script>"; 
    }else{
        echo
              "<script>
                alert('Usuario o contraseña incorrectos');
                window.location='../views/login.html';
              </script>"; 
    }
}

?>