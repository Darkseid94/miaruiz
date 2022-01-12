<?php
if(isset($_POST["enviar"])) {
    require("bd.php");
    //recoleccion de datos y variables
        $nombreU = $_POST["nombreU"];
        $pwd = $_POST["pwd"];
        $tipo = $_POST["tipo"];

       // echo $nombreU." ".$pwd." ".$tipo;

    //fin recoleccion de datoa
        $consulta="INSERT INTO user (usuario,pwd,tipo) VALUES ('$nombreU',md5 ('$pwd'),'$tipo')";//insercion a la base de datos
        //ejecusion de la consulta
       if(mysqli_query($conexion, $consulta)){
            $mensaje="Usuario ".$nombreU." agregado correctamente ";
           Header("Location: ../../body-admin/usuarios.php?mensaje=".$mensaje."");
        }
        $conexion->close();  //serramos mysql

            
} else {
        header("Location: ../../index.php");
}
//fin de verificacion de boton
?>