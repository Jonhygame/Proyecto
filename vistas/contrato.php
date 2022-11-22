<?php
include "../html/barraUser.php";
include "../php/classContratos.php";
?>
<div class="container">
<div class="row">
<div class="col-8">
  <?if (isset($_REQUEST["accion"] )) 
	  echo $oContratos->ejecuta($_REQUEST["accion"]);
	else
	  echo $oContratos->ejecuta("list");?>
</div>
<div class="col-4">
  <?echo $oContratos->ejecuta("newForm");?>
</div>
</div>
</div>