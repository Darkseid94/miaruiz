<?php
session_start();
if($_SESSION["logueado"] == TRUE) {
if(isset($_POST["enviar"])) {
    require("bd.php");
    //recoleccion de datos y variables
        $clienteV= $_POST["clienteV"];
        $productoV = $_POST["productoV"];
        $cantidadV=$_POST["cantidadV"];
        $fechaV=$_POST["fechaV"];
        $id_user=$_SESSION["idemail"];

        //echo $clienteV." ".$productoV." ".$cantidadV." ".$fechaV;
        $consulta = "SELECT * FROM productos where id_producto='$productoV'";
        $resultado=$conexion->query($consulta);
        $fila = $resultado->fetch_array();
        $precio=$fila["precioP"];

        //fin recoleccion de datoa
        $consulta="INSERT INTO ventas (fk_cliente,fk_producto,cantidadV,fechaVenta,precioV,fk_vendio) VALUES 
                    ('$clienteV','$productoV','$cantidadV','$fechaV','$precio','$id_user')";//insercion a la base de datos
        //ejecusion de la consulta
       if(mysqli_query($conexion, $consulta)){
           $mensaje="Producto vendido correctamente ";
           Header("Location: ../../body-admin/ventas.php?mensaje=".$mensaje."");
        }
        $conexion->close();  //serramos mysql

            
} else {
        header("Location: ../../index.php");
}

}
else
{
 echo "
  <html>
  <head>
  <meta http-equiv='REFRESH' content='0;url=../index.php'>
  </head>
  </html>";
}
//fin de verificacion de boton
?>