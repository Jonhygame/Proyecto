  <?php
  session_start();
  include "../php/funciones.php";
  $cadena=captcha();
  include "../html/barra.php";
  if(isset($_GET['e'])) {
    echo '<div class="conntainer">
    <div class="alert alert-danger" role="alert">
    <div class="col-4">';
    if($_GET['e']==1){
      echo 'captcha incorrecto';
    }
    echo'</div></div></div>';
  }
  ?>
  <section class="form-register">
    <form action="../php/registrarse.php" method="POST">
      <h4>Formulario Registro</h4>
    <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre" required/>
    <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido" required/>
    <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo" required/>
    <input class="controls" type="text" name="capchat" id="capchat" placeholder="<?=$cadena;?>" required/>
    <fieldset class="form-group"> 
      <legend class="mt-4">Genero</legend>
      <div class="row">
     <div class="col-4">
      <div class="form-check form-switch">
        <input class="form-check-input" type="radio" id="Fem" value="F" name="Genero">
        <label class="form-check-label" for="Fem">Femenino</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-check form-switch">
        <input class="form-check-input" type="radio" value="M" id="masc" name="Genero">
        <label class="form-check-label" for="masc">Mascúlino</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-check form-switch">
        <input class="form-check-input" type="radio" value="O" id="otro" name="Genero">
        <label class="form-check-label" for="otro">Otro</label>
      </div>
    </div>
    </div>
    </fieldset>
    <input type="hidden" name="accion" value = "Register"/>
    <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
    <input class="botons" type="submit" value="Registrar">
    </form>
    <p><a href="../html/login.php">¿Ya tengo Cuenta?</a></p>
  </section>
</body>
</html>