<?php
include "../html/barraUser.php";
include "../php/classContratos.php";

?>
<div class="container">
<div class="row">
<div class="col-4">
  <?echo $oContratos->ejecuta("userList")?>
</div>
<div class="col-8">
  <?echo $oContratos->ejecuta("newForm")?>
</div>
</div>
</div>