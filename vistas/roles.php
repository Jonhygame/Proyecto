<?php
include "../html/barraAdmin.php";
include "../php/classRoles.php";
if(isset($_REQUEST['accion'])){
    $oRoles->ejecuta($_REQUEST['accion']);
    echo $oRoles->ejecuta($_REQUEST['accion']);
}else{
    echo $oRoles->ejecuta("list");
}
echo '<div Style=text-align:center>';
echo "Hola  desde roles";
echo "<br>";
?>
<img src="../img/gatito.gif" alt="gatito bailando">
</div>