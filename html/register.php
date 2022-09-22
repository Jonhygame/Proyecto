<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
  <title>Formulario Registro</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="../html/login.php">Login
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">   </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
  <section class="form-register">
    <form action="../php/registrarse.php" method="POST">
      <h4>Formulario Registro</h4>
    <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre" required>
    <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido" required>
    <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo" required>
    <input class="controls" type="password" name="pwd" id="password" placeholder="Ingrese su Contraseña" required>
    <input class="controls" type="password" name="conformP" id="confirmP" placeholder="Confirme su Contraseña" required>
    <input class="controls" type="text" name="capchat" id="capchat" placeholder="capchat" required>
    <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
    <input class="botons" type="submit" value="Registrar">
    <p><a href="../html/login.php">¿Ya tengo Cuenta?</a></p>
    </form>
  </section>
</body>
</html>