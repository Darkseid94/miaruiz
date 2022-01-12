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
                            <?php
                                date_default_timezone_set('America/Mexico_City');//hora local
                                $fecha=date("d/m/Y");
                                $id=$_GET['id_producto'];
			                    $nombreP=$_GET['nombreP'];
			                    $precioP=$_GET['precioP'];
			                    $descriP=$_GET['descriP'];	
                                $fotoP=$_GET['fotoP'];
                            ?>
                                <center><h4 class="title">Modificando Producto <?php echo $nombreP;?></h4></center>
                                <div class="logo">
                                    <div class="form-group text-center pt-3">
                                        <img src='assets/img/<?php echo $fotoP; ?>' class='imghomeletras' />
                                    </div>
                                </div>
                            </div>
                            <div class="content">

                                <form action="../body-php/controlador/modProductos.php" method="post" enctype="multipart/form-data">
                                  

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="nameProdcuto" value="<?php echo $nombreP; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Precio</label>
                                                <input type="number" name="precioProdcuto" value="<?php echo $precioP; ?>" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Foto de Producto</label>
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <input type="text" name="descripcionProdcuto" value="<?php echo $descriP; ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    
                                                <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
                                                <input type="hidden" name="fecha" value="<?php echo $fecha; ?>" class="form-control">
                                                <input type="hidden" name="fotoP" value="<?php echo $fotoP; ?>" class="form-control">
                                           

                                    <button type="submit" name="enviar" class="btn btn-secondary btn-fill pull-right">Modificar</button>
                                    <div class="clearfix"></div>
                                   
                                    
                                </form>
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