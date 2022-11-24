<?php
include "../html/barraAdmin.php";
include "../php/classPromocion.php";
echo "<div id='principal' class='container-fluid'>";
echo $oPromocion->ejecuta("list");
echo "</div>";
echo '<div Style=text-align:center>';
echo "Hola  desde Promocion";
echo "<br>";
?>
<img src="../img/gatito.gif" alt="gatito bailando">
</div>