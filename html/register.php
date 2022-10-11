  <?php
  include "../php/funciones.php";
  $cadena=captcha();
  include "../html/barra.php";
  ?>
  <section class="form-register">
    <form action="../php/registrarse.php" method="POST">
      <h4>Formulario Registro</h4>
    <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre" required/>
    <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido" required/>
    <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo" required/>
    <input class="controls" type="text" name="capchat" id="capchat" placeholder="<?=$cadena;?>" required/>
    <input type="hidden" name="accion" value = "Register"/>
    <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
    <input class="botons" type="submit" value="Registrar">
    </form>
    <p><a href="../html/login.php">¿Ya tengo Cuenta?</a></p>
  </section>
</body>
</html>