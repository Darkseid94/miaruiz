<?php
    
    require("bd.php");
    $eliminar=$_GET["id_venta"];
    echo $eliminar;

            //eliminamos

        $consulta="DELETE FROM ventas WHERE id_venta='$eliminar'";
           //ejecusion de la consulta
        if(mysqli_query($conexion, $consulta)){
            $mensaje="Venta eliminado correctamente ";
            Header("Location: ../../body-admin/ventas.php?mensaje2=".$mensaje."");
        }
        $conexion->close();  //serramos mysql
       

    
?>