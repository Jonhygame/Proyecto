<?php
include "../html/barraAdmin.php";
include "../php/classPromocion.php";
if(isset($_REQUEST['accion'])){
    echo $oPromocion->ejecuta($_REQUEST['accion']);
}else{
    echo $oPromocion->ejecuta("list");
}
echo '<div Style=text-align:center>';
echo "Hola  desde roles";
echo "<br>";
?>
<img src="../img/gatito.gif" alt="gatito bailando">
</div>