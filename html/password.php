<?php
include "../php/funciones.php";
$cadena=captcha();
if(isset($_GET['e'])){
  if($_GET['e'] == '12')
  echo "SU NUEVA CONTRASEÑA SE HA ENVIADO A SU CORREO EXITOSAMENTE";
}
if(isset($_GET['e'])){
  if($_GET['e'] == '72')
  echo "NO SE INTRODUJO EMAIL";
}
if(isset($_GET['e'])){
  switch($_GET['e']){
    case '70':
      echo "EL CAPTCHA INTRODUCIDO ES INCORRECTO. INTENTE NUEVAMENTE";
      break;
    case '71':
      echo "NO SE INTRODUJO EL CAPTCHA";
      break;
  }
}
include "../html/barra.php";
?>
  <form action="../php/registrarse.php" method="POST">
  <section class="form-recuperar">
    <h4>Recuperar contraseña</h4>
    <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo">
    <input class="controls" type="text" id="capt" placeholder="<?=$cadena;?>" name="captcha">
    <input type="hidden" name="accion" value = "Recuperar"/>
    <input class="botons" type="submit" value="Recuperar">
  </section>
</form>
</body>
</html>
