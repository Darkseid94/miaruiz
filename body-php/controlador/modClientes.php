<?php

			include('bd.php');

			$nombreC=$_POST['nombreC'];
            $direccionC=$_POST['direccionC'];
            $telefonoC=$_POST['telefonoC'];
            $id_cliente=$_POST['id_cliente'];
            $fecha=$_POST['fecha'];

//echo $nombreC." ".$direccionC." ".$telefonoC." ".$id_cliente." ".$fecha;

            $consulta="UPDATE clientes set nombreC='$nombreC',direccionC='$direccionC',telefonoC='$telefonoC',
	        fechaModC='$fecha' where id_cliente='$id_cliente'";//insercion a la base de datos
    //ejecusion de la consulta
            if(mysqli_query($conexion, $consulta)){
                $mensaje="Cliente ".$nombreC." modificado correctamente ";
                Header("Location: ../../body-admin/clientes.php?mensaje2=".$mensaje."");
            }


    $conexion->close();  //serramos mysql
?>