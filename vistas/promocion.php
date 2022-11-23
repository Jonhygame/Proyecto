<?php
include "../html/barraAdmin.php";
include "../php/classPromocion.php";
echo $oPromocion->ejecuta("list");
echo '<div Style=text-align:center>';
echo "Hola  desde Promocion";
echo "<br>";
?>
<img src="../img/gatito.gif" alt="gatito bailando">
</div>