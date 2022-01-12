<?php
  session_start();
  if($_SESSION["logueado"] == TRUE) {
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../img/ico.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>MIA-RUIZ</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<div class="wrapper">
    <?php require("menuVertical.php");?>

    <div class="main-panel">
        <?php require("menuHorizontal.php");?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Hacer Ventas</h4>
                            </div>
                            <div class="content">
                                <form action="../body-php/controlador/addVentas.php" method="post">
                                  

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cliente</label>
                                                <select name="clienteV" class="form-control">
                                                <?php
                                                    require("../body-php/controlador/bd.php");
                                                    $consulta = "SELECT * FROM clientes ORDER BY nombreC ASC";
                                                    $resultado=$conexion->query($consulta);
                                                    while($fila = $resultado->fetch_array()){
                                                            echo "<option value='".$fila['id_cliente']."'>".$fila['nombreC']."</option>";
                                                    }
                                                    $conexion->close();
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Producto</label>
                                                <select name="productoV" class="form-control">
                                                <?php
                                                    require("../body-php/controlador/bd.php");
                                                    $consulta = "SELECT * FROM productos ORDER BY nombreP ASC";
                                                    $resultado=$conexion->query($consulta);
                                                    while($fila = $resultado->fetch_array()){
                                                            echo "<option value='".$fila['id_producto']."'>".$fila['nombreP']." ".$fila['descriP']."</option>";
                                                    }
                                                    $conexion->close();
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Cantidad</label>
                                                <input type="number" name="cantidadV" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Fecha de Venta</label>
                                                <input type="date" name="fechaV" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="enviar" class="btn btn-secondary btn-fill pull-right">Vender</button>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <?php                 
                                                if(isset($_GET["mensaje"])){
                                                    $mensaje=$_GET["mensaje"];
                                                    echo "  
                                                    <div class='alert alert-info'>
                                                        <center><a href='#' class='alert-link' >".$mensaje."</a></center>
                                                    </div>";
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Ventas</h4>
                                <?php                 
                                    if(isset($_GET["mensaje2"])){
                                        $mensaje2=$_GET["mensaje2"];
                                             echo "  
                                                <div class='alert alert-info'>
                                                    <center><a href='#' class='alert-link' >".$mensaje2."</a></center>
                                                </div>";
                                    }
                                ?>
                            </div>
                            <div class="content">
                            <div class="row">
                            <form  method='GET'>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="date" name="buscador" class="form-control" placeholder="Introduce aquí una fecha para buscar">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-secondary btn-fill pull-left">Buscar</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            </div>
                            
                                    
                            <div class="content table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                    <?php
                                    if($_SESSION["tipo1"]==1){
                                        echo "<th>Vendedor</th>";
                                    }
                                    ?>
                                    	<th>Cliente</th>
                                    	<th>Producto</th>
                                    	<th>Precio</th>
                                    	<th>Cantidad</th>
                                        <th>Fecha de venta</th>
                                        <th>Total</th> 
                                        <?php
                                            if($_SESSION["tipo1"]==1){
                                                echo "<th>Acción</th>";
                                            }
                                        
                                        ?>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $id_vendio = $_SESSION["idemail"];
                                    require("../body-php/controlador/bd.php");

                                    $auxBuscador="[0-9]";//el regexp consulta por fechas asi que si la variable biene basia consultamos con datos numerico 
							        if(isset($_GET['buscador'])){
								        $auxBuscador=$_GET['buscador'];
							        }
                                    if($_SESSION["tipo1"]==0){

                                        $consulta = "SELECT v.id_venta,c.nombreC,p.nombreP,p.descriP,v.cantidadV,v.fechaVenta,v.precioV from ventas v 
                                                    INNER JOIN clientes c 
                                                        on v.fk_cliente=c.id_cliente 
                                                    INNER JOIN productos p 
                                                        on v.fk_producto=p.id_producto 
                                                    WHERE v.fk_vendio = $id_vendio AND 
                                                        v.fechaVenta REGEXP '$auxBuscador'
                                                    ORDER BY fechaVenta ASC";

                                    }else if($_SESSION["tipo1"]==1) {

                                        $consulta = "SELECT u.id_user,u.usuario,v.id_venta,c.nombreC,p.nombreP,p.descriP,v.cantidadV,v.fechaVenta,v.precioV from ventas v 
                                        INNER JOIN clientes c 
                                            on v.fk_cliente=c.id_cliente 
                                        INNER JOIN productos p 
                                            on v.fk_producto=p.id_producto 
                                        INNER JOIN user u 
                                            on v.fk_vendio=u.id_user 
                                        WHERE
                                            v.fechaVenta REGEXP '$auxBuscador'
                                        ORDER BY fechaVenta ASC";
                                        
                                    }
                                            
                                    
                                    
                                    $resultado=$conexion->query($consulta);

                                    while($fila = $resultado->fetch_array()){
                                        
                                        echo "<tr>"; 
                                        if($_SESSION["tipo1"]==1){
                                            echo "<td>".$fila['usuario']."</td>";
                                        }
                                        echo "<td>".$fila['nombreC']."</td>";  
                                        echo "<td>".$fila['nombreP']." ".$fila['descriP']."</td>"; 
                                        echo "<td>$ ".$fila['precioV']."</td>";
                                        echo "<td>".$fila['cantidadV']."</td>";
                                        echo "<td>".$fila['fechaVenta']."</td>";
                                        $total=$fila['precioV'] * $fila['cantidadV'];
                                        echo "<td>$ ".$total."</td>";

                                        if($_SESSION["tipo1"]==1){
                                        echo "<td>";
                                        echo"<a href='../body-php/controlador/deleteV.php?id_venta=".$fila['id_venta']."' onclick='return eliminarV()'>
                                                    <i class='pe-7s-trash'></i>
                                                </a>
                                            </td>";
                                        }
                                       echo "</tr>"; 
                                    

                                    }
                                    $conexion->close();
                                    ?>
                                     
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php require("pie.php"); ?>
        

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="../js/alertas.js" type="text/javascript"></script>
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
<?php
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
?>