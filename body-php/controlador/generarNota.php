<?php
if(isset($_POST["enviar"])) {
    require("bd.php");
    require_once('../../lib/TCPDF/tcpdf_import.php');
    //recoleccion de datos y variables
        $clienteR= $_POST["clienteR"];
        $fechaR1 = $_POST["fechaR1"];
        $fechaR2 = $_POST["fechaR2"];

        if(isset($_POST["check"])){//isset sirve para verificar si una varieble existe
            $check = $_POST["check"];
        }else{
            $check = 0;
        }

if($check==0){
//===========================================================================================================
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'UTF-8', false);
    // remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    // set margins
    $pdf->SetMargins("30", "25", "30");
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
    }
    ////--------------impresiones
    // set font
    $pdf->SetFont('arial', 'I', 12);
    // add a page
    $pdf->AddPage();
    $pdf->Image('../../img/logopdf.jpg', 75, 10, 50, 23,'', '', '', false, 300, '', false, false, 0);
    // set some text to print
    $pdf->SetFont('arial', '', 11);
    $html = '<span style="text-align:center;"><br><br>TIENDA EN LINEA</span>';
    // output the HTML content
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //_-------------------------------------------------------------------------
    //_-------------------------------------------------------------------------
    $pdf->SetFont('arial', 'I', 11);
    $html = '<span style="text-align:left; line-height:150%;"><br>Direccion: Calle Maya Numero 228 Colonia Ideal</span>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //--=======================================
    //_-------------------------------------------------------------------------
    $pdf->SetFont('arial', 'I', 11);
    $html = '<span style="text-align:left; line-height:150%;">Cel: 9613280091</span>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //--=======================================
    //_-------------------------------------------------------------------------
    $pdf->SetFont('arial', 'B', 11);
    //-----------------------------------------consulta de nombre--------------------------------------------------------
        $consulta2 = "SELECT * FROM clientes where id_cliente=$clienteR";
        $resultado2=$conexion->query($consulta2);
        $fila2 = $resultado2->fetch_array();
        $nombreCliente=$fila2['nombreC'];
//-------------------------------------------------------------------------------------------------
    $html = '<span style="text-align:left; line-height:150%;"><br>'.$nombreCliente.'</span>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //--=======================================

    //_-------------------------------------------------------------------------
    $pdf->SetFont('arial', '', 11);
    $html ='<br><br><table>
        <tr>
            <th bgcolor="#F999A5" style="text-align:center;">Producto</th>
            <th bgcolor="#F999A5" style="text-align:center;">Precio Unitario</th>
            <th bgcolor="#F999A5" style="text-align:center;">Cantidad</th>
            <th bgcolor="#F999A5" style="text-align:center;">Total</th>
        </tr>';
        //---------------------------------------------------consulta avansada para extraer datos de ventas --------------------------------------------------
        $consulta = "SELECT c.nombreC,v.fk_cliente,v.fechaVenta,p.descriP,p.nombreP,v.precioV,v.cantidadV from ventas v 
                           INNER JOIN clientes c 
                                on v.fk_cliente=c.id_cliente
                            INNER JOIN productos p 
                                on v.fk_producto=p.id_producto 
                            WHERE v.fk_cliente = $clienteR 
                                AND ('$fechaR1' <= fechaVenta 
                                AND fechaVenta <= '$fechaR2')";//codigo para imprimir un ragon de fechas
        
            $var = 0;//Variable para contar la suma del total de los productos en el arreglo
            $resultado=mysqli_query($conexion, $consulta);
            if(mysqli_num_rows($resultado)==0){

                $mensaje3="El cliente ".$nombreCliente." no ha comprado ningun producto ";
                Header("Location: ../../body-admin/home.php?mensaje3=".$mensaje3."");
                
            }else{
            while($fila = $resultado->fetch_array()){
                $resultadoC= $fila['precioV']*$fila['cantidadV'];
                //$resultado2=$var += $resultadoC;
                 $html .='<tr>
                        <td border="0.1">'.$fila['nombreP']." ".$fila['descriP'].'</td>
                        <td border="0.1" style="text-align:center;">$ '.$fila['precioV'].'</td>
                        <td border="0.1" style="text-align:center;">'.$fila['cantidadV'].'</td>
                        <td border="0.1" style="text-align:center;">$ '.$resultadoC.'</td>
                        </tr>';
                $resultado2=$var += $resultadoC;
            }
            $html .='</table>';
            $html .='<span style="text-align:right;"><br>Total general: <b>$ '.$resultado2.'</br></span>';
            }
    //-------------------------------------------------------------------------------------------------------
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    $pdf->endPage();
    $pdf->Output("Nota de ".$nombreCliente.".pdf",'D');
//===========================================================================================================
}else if ($check == 1){
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, false, 'UTF-8', false);
    // remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    // set margins
    $pdf->SetMargins("30", "25", "30");
    // set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
    }
    ////--------------impresiones
    // set font
    $pdf->SetFont('arial', 'I', 12);
    // add a page
    $pdf->AddPage();
    $pdf->Image('../../img/logopdf.jpg', 75, 10, 50, 23,'', '', '', false, 300, '', false, false, 0);
    // set some text to print
    $pdf->SetFont('arial', '', 11);
    $html = '<span style="text-align:center;"><br><br>TIENDA EN LINEA</span>';
    // output the HTML content
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //_-------------------------------------------------------------------------
    //_-------------------------------------------------------------------------
    $pdf->SetFont('arial', 'I', 11);
    $html = '<span style="text-align:left; line-height:150%;"><br>Direccion: Calle Maya Numero 228 Colonia Ideal</span>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //--=======================================
    //_-------------------------------------------------------------------------
    $pdf->SetFont('arial', 'I', 11);
    $html = '<span style="text-align:left; line-height:150%;">Cel: 9613280091</span>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //--=======================================
    //_-------------------------------------------------------------------------
    $pdf->SetFont('arial', 'B', 11);
    //-----------------------------------------consulta de nombre--------------------------------------------------------
        $consulta2 = "SELECT * FROM clientes where id_cliente=$clienteR";
        $resultado2=$conexion->query($consulta2);
        $fila2 = $resultado2->fetch_array();
        $nombreCliente=$fila2['nombreC'];
//-------------------------------------------------------------------------------------------------
    $html = '<span style="text-align:left; line-height:150%;"><br>'.$nombreCliente.'</span>';
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    //--=======================================

    //_-------------------------------------------------------------------------
    $pdf->SetFont('arial', '', 11);
    $html ='<br><br><table>
        <tr>
            <th bgcolor="#F999A5" style="text-align:center;">Producto</th>
            <th bgcolor="#F999A5" style="text-align:center;">Precio Unitario</th>
            <th bgcolor="#F999A5" style="text-align:center;">Cantidad</th>
            <th bgcolor="#F999A5" style="text-align:center;">Total</th>
        </tr>';
        //---------------------------------------------------consulta avansada para extraer datos de ventas --------------------------------------------------
        $consulta = "SELECT c.nombreC,v.fk_cliente,v.fechaVenta,p.descriP,p.nombreP,v.precioV,v.cantidadV from ventas v 
                           INNER JOIN clientes c 
                                on v.fk_cliente=c.id_cliente
                            INNER JOIN productos p 
                                on v.fk_producto=p.id_producto 
                            WHERE v.fk_cliente = $clienteR 
                                AND ('$fechaR1' <= fechaVenta 
                                AND fechaVenta <= '$fechaR2')";//codigo para imprimir un ragon de fechas
        
            $var = 0;//Variable para contar la suma del total de los productos en el arreglo
            $resultado=mysqli_query($conexion, $consulta);
            if(mysqli_num_rows($resultado)==0){

                $mensaje3="El cliente ".$nombreCliente." no ha comprado ningun producto ";
                Header("Location: ../../body-admin/home.php?mensaje3=".$mensaje3."");
                
            }else{
            while($fila = $resultado->fetch_array()){
                $resultadoC= $fila['precioV']*$fila['cantidadV'];
                 $html .='<tr>
                        <td border="0.1">'.$fila['nombreP']." ".$fila['descriP'].'</td>
                        <td border="0.1" style="text-align:center;">$ '.$fila['precioV'].'</td>
                        <td border="0.1" style="text-align:center;">'.$fila['cantidadV'].'</td>
                        <td border="0.1" style="text-align:center;">$ '.$resultadoC.'</td>
                        </tr>';
                $resultado2=$var += $resultadoC;
            }
            $html .='</table>';
            $html .='<span style="text-align:right;"><br>Total general: <b>$ '.$resultado2.'</br></span>';
            }
    //-------------------------------------------------------------------------------------------------------
    $pdf->writeHTML(utf8_decode($html), true, false, true, false, '');
    $pdf->endPage();

    // Segunda pagina
    $pdf->startPageGroup();
    $pdf->setPrintFooter(false);
    $pdf->addPage();
        $pdf->Image('../../img/met.jpg', 24, 25, 300, 430,'', '', '', false, 300, '', false, false, 0);
    $pdf->endPage();

    $pdf->Output("Nota de ".$nombreCliente.".pdf",'D');
}
    $conexion->close();  //serramos mysql 
} else {
        header("Location: ../../index.php");
}
//fin de verificacion de boton
?>