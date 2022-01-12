<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script><link rel="stylesheet" href="css/estilos.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center pt-5 mt-5 m-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                <form action="body-php/controlador/validar.php" method="POST">
                    <div class="form-group text-center pt-3">
                        <img src='img/logo.png' class='imgPerfil' />
                        <img src='img/letras.png' class='imgletras' />
                    </div>
                    <div class="form-group text-center">
                        <h5 class="textTitle">TIENDA EN LINEA</h5>
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        <input type="text" maxlength="30" name="usuario" class="form-control" placeholder="Usuario" required>
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <div class="row">
                            <div class="col-md-9">
                                 <input type="password" ID="txtPassword" name="pwd" maxlength="30" class="form-control" placeholder="Contraseña" required >
                            </div>
                           <div class="col-md-2">
                                <button id="show_password" class="btn ingresar" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>  
                            </div>
                        </div>
                    </div>
                    <div class="form-group mx-sm-4 pb-2">
                        <input type="submit" name="enviar" class="btn btn-block ingresar" value="INGRESAR">
                    </div>
                    <?php                 
                     if(isset($_GET["error"])){
                        $error=$_GET["error"];
                         echo "  
                         <div class='alert alert-danger'>
                         <a href='#' class='alert-link'>".$error."</a>
                         </div>";
                     }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <script src="js/ocultarContra.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>