<?php
session_start();
$rutaImagen = "../img/fotos/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <title>Proyecto</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../html/homeUser.php">Inicio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="../vistas/contrato.php">Contratos
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="../vistas/perfil.php">Usuarios
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../html/login.php">Sesion</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../html/about.php">About</a>
              </li>
            </ul>
        </div>
        <div>
        <img id="miniFoto" src="<?echo $rutaImagen;if($_SESSION['Foto']!==""){echo $_SESSION["Foto"];}else{echo "user.png";} ?>" width = "35 px" alt="imagen"/>
        <span id="miniNombre"><?=$_SESSION['nombUsuario'];?></span>
        </div>
    </div>
</nav>