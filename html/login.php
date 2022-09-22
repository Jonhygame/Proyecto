<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="">Navbar</a>
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
                <a class="nav-link" href="#"></a>
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
    <section class="form-login">
      <form action="../php/validator.php" method="POST">
      <h5>Formulario Login</h5>
      <input class="controls" type="text" name="email" value="" placeholder="correo" required>
      <input class="controls" type="password" name="pwd" value="" placeholder="Contraseña" required>
      <input class="buttons" type="submit" name="" value="Ingresar">
      </form>
      <p><a href="../html/password.php">¿Olvidastes tu Contraseña?</a><br></br><a href="../html/register.php"> Registrar</a></p>
    </section>
</body>
</html>

<?php
  if(isset($_GET['e'])) {
    echo '<div class="conntainer">
    <div class="alert alert-danger" role="alert">
    <div class="col-4">';
    switch($_GET['e']){
      case 1: echo '<span class="btn btn-warning">Usuario o Contraseña Incorrecta</span>';
      break;
    }
    echo'</div></div></div>';
  } 
?>