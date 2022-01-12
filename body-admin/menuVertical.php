<div class="sidebar" data-color="miaruiz">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                    <div class="form-group text-center pt-3">
                        <img src='../img/logo.png' class='imgHome' />
                        <img src='../img/letras.png' class='imghomeletras' />
                    </div>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="home.php">
                        <i class="pe-7s-home"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li class="active">
                    <a href="productos.php">
                        <i class="pe-7s-shopbag"></i>
                        <p>Productos</p>
                    </a>
                </li>
                <li class="active">
                    <a href="clientes.php">
                        <i class="pe-7s-users"></i>
                        <p>Clientes</p>
                    </a>
                </li>

                <li class="active">
                    <a href="ventas.php">
                        <i class="pe-7s-cart"></i>
                        <p>Ventas</p>
                    </a>
                </li>
                <?php
                    if($_SESSION["tipo1"]==1){
                        echo "
                        <li class='active-pro'>
                    <a href='usuarios.php'>
                        <i class='pe-7s-user'></i>
                        <p>Usuarios</p>
                    </a>
                </li>";
                    }
                                        
                ?>
				
            </ul>
    	</div>
    </div>