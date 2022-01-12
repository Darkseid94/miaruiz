function eliminarV(){
    var respuesta = confirm("estas seguro que deseas eliminiar esta venta? recuerdad que una ves eliminada no podras recuperarla");
    if(respuesta == true){
        return true;
    }else{
        return false;
    }
}