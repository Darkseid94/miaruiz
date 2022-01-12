<?php

			include('bd.php');

			$nameProdcuto=$_POST['nameProdcuto'];
            $precioProdcuto=$_POST['precioProdcuto'];
            $descripcionProdcuto=$_POST['descripcionProdcuto'];
            $id=$_POST['id'];
            $fecha=$_POST['fecha'];
            $fotoP=$_POST['fotoP'];
            $foto=$_FILES["foto"]["name"];
            //echo $fotoP;

        if($foto==""){

            $consulta="UPDATE productos set nombreP='$nameProdcuto',precioP='$precioProdcuto',descriP='$descripcionProdcuto',
	        fechaMod='$fecha' where id_producto='$id'";//insercion a la base de datos
    //ejecusion de la consulta
            if(mysqli_query($conexion, $consulta)){
                $mensaje="Producto ".$nameProdcuto." modificado correctamente ";
            Header("Location: ../../body-admin/productos.php?mensaje2=".$mensaje."");
            }

        }else{
            $ruta1=$_FILES["foto"]["tmp_name"];
            $destino="../../body-admin/assets/img/".$nameProdcuto.$foto;
            copy($ruta1,$destino);
            unlink('../../body-admin/assets/img/'.$fotoP);
            $consulta="UPDATE productos set nombreP='$nameProdcuto',precioP='$precioProdcuto',descriP='$descripcionProdcuto',
	        fotoP='$nameProdcuto"."$foto',fechaMod='$fecha' where id_producto='$id'";//insercion a la base de datos
    //ejecusion de la consulta
            if(mysqli_query($conexion, $consulta)){
                $mensaje="Producto ".$nameProdcuto." modificado correctamente ";
            Header("Location: ../../body-admin/productos.php?mensaje2=".$mensaje."");
            }
        }


    $conexion->close();  //serramos mysql
?>