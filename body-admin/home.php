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
                    <div class="col-md-6">
                    <div class="card card-user">
                            <div class="content">
                                
                                <h4 class="title">Notas de Remisión</h4>
                                <br>

                                <form action="../body-php/controlador/generarNota.php" method="post">

                                <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label>Cliente</label>
                                                <select name="clienteR" class="form-control">
                                                <?php
                                                    require("../body-php/controlador/bd.php");
                                                    $consulta = "SELECT * FROM clientes ORDER BY nombreC ASC ";
                                                    $resultado=$conexion->query($consulta);
                                                    while($fila = $resultado->fetch_array()){
                                                            echo "<option value='".$fila['id_cliente']."'>".$fila['nombreC']."</option>";
                                                    }
                                                    
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fecha de Inicio</label>
                                                <input type="date" name="fechaR1" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fecha Final</label>
                                                <input type="date" name="fechaR2" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <input id="checkbox1" name="check" value="1" type="checkbox">
						  				        <label for="checkbox1">Generar nota con metodo de entrega</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="enviar" class="btn btn-secondary btn-fill pull-right">Generar</button>
                                    <div class="clearfix"></div>
                                    <?php                 
                                    if(isset($_GET["mensaje3"])){
                                        $mensaje3=$_GET["mensaje3"];
                                             echo "  
                                                <div class='alert alert-info'>
                                                    <center><a href='#' class='alert-link' >".$mensaje3."</a></center>
                                                </div>";
                                    }
                                ?>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <?php
                        if($_SESSION["tipo1"]==1){
                           
                                        
                    ?>
                    <div class="col-md-6">
                    <div class="card card-user">
                            <div class="content">
                                
                                <h4 class="title">Historial de ventas de usuario</h4>
                                <br>

                                <form action="../body-php/controlador/generarHisto.php" method="post">

                                <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label>Usuario</label>
                                                <select name="usuario" class="form-control">
                                                <?php
                                                    require("../body-php/controlador/bd.php");
                                                    $consulta = "SELECT * FROM user ORDER BY usuario ASC ";
                                                    $resultado=$conexion->query($consulta);
                                                    while($fila = $resultado->fetch_array()){
                                                            echo "<option value='".$fila['id_user']."'>".$fila['usuario']."</option>";
                                                    }
                                                    
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fecha de Inicio</label>
                                                <input type="date" name="fechaR1" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fecha Final</label>
                                                <input type="date" name="fechaR2" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" name="enviar" class="btn btn-secondary btn-fill pull-right">Generar</button>
                                    <div class="clearfix"></div>
                                    <?php                 
                                    if(isset($_GET["mensaje4"])){
                                        $mensaje4=$_GET["mensaje4"];
                                             echo "  
                                                <div class='alert alert-info'>
                                                    <center><a href='#' class='alert-link' >".$mensaje4."</a></center>
                                                </div>";
                                    }
                                ?>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                    <?php
                           
                        }
                                        
                    ?>



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
