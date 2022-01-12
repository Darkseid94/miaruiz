<?php
date_default_timezone_set('America/Mexico_City');//hora local
if(isset($_POST["enviar"])) {
    require("bd.php");
    //recoleccion de datos y variables
        $nombreC= $_POST["nombreC"];
        $direccionC = $_POST["direccionC"];
        $telefonoC=$_POST["telefonoC"];

        $fecha=date("d/m/Y");

        //echo $nombreC." ".$direccionC." ".$telefonoC;

    //fin recoleccion de datoa
        $consulta="INSERT INTO clientes (nombreC, direccionC, telefonoC,fechaModC) VALUES ('$nombreC','$direccionC','$telefonoC','$fecha')";//insercion a la base de datos
        //ejecusion de la consulta
       if(mysqli_query($conexion, $consulta)){
            $mensaje="Cliente ".$nombreC." agregado correctamente ";
           Header("Location: ../../body-admin/clientes.php?mensaje=".$mensaje."");
        }
        $conexion->close();  //serramos mysql

            
} else {
        header("Location: ../../index.php");
}
//fin de verificacion de boton
?>