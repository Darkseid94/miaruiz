<?php

			include('bd.php');

			$nombreU=$_POST['nombreU'];
            $pwd=$_POST['pwd'];
            $tipo=$_POST['tipo'];
            $id_user=$_POST['id_user'];

//echo $nombreC." ".$direccionC." ".$telefonoC." ".$id_cliente." ".$fecha;

            $consulta="UPDATE user set usuario='$nombreU',pwd=md5('$pwd'),tipo='$tipo'
            where id_user='$id_user'";//insercion a la base de datos
    //ejecusion de la consulta
            if(mysqli_query($conexion, $consulta)){
                $mensaje="Usuario ".$nombreU." modificado correctamente ";
                Header("Location: ../../body-admin/usuarios.php?mensaje2=".$mensaje."");
            }


    $conexion->close();  //serramos mysql
?>