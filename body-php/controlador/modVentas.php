<?php

			include('bd.php');

			$nombreC=$_POST['nombreC'];
            $productoV=$_POST['productoV'];
            $cantidadV=$_POST['cantidadV'];
            $fechaV=$_POST['fechaV'];
            $id_venta=$_POST['id_venta'];

echo $nombreC." ".$productoV." ".$cantidadV." ".$fechaV." ".$id_venta;

            $consulta="UPDATE ventas set fk_cliente='$nombreC',fk_producto='$productoV',cantidadV='$cantidadV',
	        fechaVenta='$fechaV' where id_venta='$id_venta'";//insercion a la base de datos
    //ejecusion de la consulta
            if(mysqli_query($conexion, $consulta)){
                $mensaje="Venta modificado correctamente ";
                Header("Location: ../../body-admin/ventas.php?mensaje2=".$mensaje."");
            }


    $conexion->close();  //serramos mysql
?>