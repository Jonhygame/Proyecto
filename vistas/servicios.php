<?php
include "../html/barraUser.php";
include "../php/classServicios.php";
if(isset($_REQUEST['accion'])){
    $oServicios->ejecuta($_REQUEST['accion']);
    echo $oServicios->ejecuta($_REQUEST['accion']);
}else{
    echo $oServicios->ejecuta("list");
}
?>