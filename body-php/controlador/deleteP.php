<?php
    
    require("bd.php");
    $fotoP=$_GET["fotoP"];
    $eliminar=$_GET["id_producto"];
    $nombreP=$_GET["nombreP"];
    //echo $eliminar;

            //eliminamos

            $consulta="SELECT * FROM ventas WHERE fk_producto='$eliminar'";
            $resultado=mysqli_query($conexion, $consulta);
            if(mysqli_num_rows($resultado)==0){
                $consulta="DELETE FROM productos WHERE id_producto='$eliminar'";
           //ejecusion de la consulta
                if(mysqli_query($conexion, $consulta)){
                    unlink('../../body-admin/assets/img/'.$fotoP);//SIRVE PARA ELIMINAR UN ARCHIVO DESDE UNA DIRECCION
                    $mensaje="Producto ".$nombreP." eliminado correctamente ";
                    Header("Location: ../../body-admin/productos.php?mensaje2=".$mensaje."");
                }

            }else {
                $mensaje="No puedes eliminar el producto ".$nombreP." por que tiene uno o mas historiales de venta";
                Header("Location: ../../body-admin/productos.php?mensaje2=".$mensaje."");
            }

            
        $conexion->close();  //serramos mysql
       

    
?>