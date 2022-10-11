<?php
include "../html/barraAdmin.php";
include "../php/classUsers.php";
if(isset($_REQUEST['accion'])){
    $oUsers->ejecuta($_REQUEST['accion']);
    echo $oUsers->ejecuta('list');
}else{
    echo $oUsers->ejecuta("list");
}
echo '<div Style=text-align:center;>';
echo "Hola  desde usuarios";
echo "<br>";
$oUsers=new Users();
?>
<img src="../img/gatito.gif" alt="gatito bailando">
</div>