<?php
include "../html/barraAdmin.php";
include "../php/classServicios.php";
if(isset($_REQUEST['accion'])){
    echo $oServicios->ejecuta($_REQUEST['accion']);
}else{
    echo $oServicios->ejecuta("list");
}
?>