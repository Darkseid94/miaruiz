<?php
    
    require("bd.php");
    $id_user=$_GET["id_user"];
    $nombreU=$_GET["nombreU"];
    //echo $eliminar;
            //eliminamos
            $consulta="SELECT * FROM ventas WHERE fk_vendio='$id_user'";
            $resultado=mysqli_query($conexion, $consulta);
            if(mysqli_num_rows($resultado)==0){
                $consulta="DELETE FROM user WHERE id_user='$id_user'";
           //ejecusion de la consulta
                if(mysqli_query($conexion, $consulta)){
                    $mensaje="usuario ".$nombreU." eliminado correctamente ";
                    Header("Location: ../../body-admin/usuarios.php?mensaje2=".$mensaje."");
                }
            }else {
                $mensaje="No puedes eliminar el usuario ".$nombreU." por que tiene uno o mas historiales de venta";
                Header("Location: ../../body-admin/usuarios.php?mensaje2=".$mensaje."");
            }
        $conexion->close();  //serramos mysql
    
?>