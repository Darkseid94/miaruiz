<?php
    
    require("bd.php");
    $id_cliente=$_GET["id_cliente"];
    $nombreC=$_GET["nombreC"];
    //echo $eliminar;

            //eliminamos
            $consulta="SELECT * FROM ventas WHERE fk_cliente='$id_cliente'";
            $resultado=mysqli_query($conexion, $consulta);
            if(mysqli_num_rows($resultado)==0){
                $consulta="DELETE FROM clientes WHERE id_cliente='$id_cliente'";
                //ejecusion de la consulta
                if(mysqli_query($conexion, $consulta)){
                    $mensaje="Cliente ".$nombreC." eliminado correctamente ";
                    Header("Location: ../../body-admin/clientes.php?mensaje2=".$mensaje."");
                }

            }else {
                $mensaje="No puedes eliminar el cliente ".$nombreC." por que tiene uno o mas historiales de venta";
                Header("Location: ../../body-admin/clientes.php?mensaje2=".$mensaje."");
            }

    

          
        $conexion->close();  //serramos mysql
       

    
?>