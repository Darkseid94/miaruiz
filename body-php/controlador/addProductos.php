<?php
date_default_timezone_set('America/Mexico_City');//hora local
if(isset($_POST["enviar"])) {
    require("bd.php");
    //recoleccion de datos y variables
        $nombreP= $_POST["nameProdcuto"];
        $precioP = $_POST["precioProdcuto"];
        $descriP=$_POST["descripcionProdcuto"];

        $foto=$_FILES["foto"]["name"];
        $ruta1=$_FILES["foto"]["tmp_name"];
        $destino="../../body-admin/assets/img/".$nombreP.$foto;
        copy($ruta1,$destino);

        //echo $nombreP." ".$precioP." ".$descriP;
        $fecha=date("d/m/Y");
    //fin recoleccion de datoa
        $consulta="INSERT INTO productos (nombreP, precioP, descriP,fotoP,fechaMod) VALUES ('$nombreP','$precioP','$descriP','$nombreP$foto','$fecha')";//insercion a la base de datos
        //ejecusion de la consulta
        if(mysqli_query($conexion, $consulta)){
            $mensaje="Producto ".$nombreP." agregado correctamente ";
            Header("Location: ../../body-admin/productos.php?mensaje=".$mensaje."");
        }
        $conexion->close();  //serramos mysql

            
} else {
        header("Location: ../../index.php");
}
//fin de verificacion de boton
?>