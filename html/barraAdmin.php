<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location: ../php/home.php");
}else
    if(!$_SESSION['admin']){
      header('location: ../php/home.PHP?e=666');
    }
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
    <title>Proyecto</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../html/index.php">Inicio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" href="../vistas/roles.php">Roles
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="../vistas/usuarios.php">Usuarios
                  <span class="visually-hidden">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="../vistas/servicios.php">Servicios
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
        <img src="../img/hacker.png" width = "35 px" alt="imagen"/>
        <?=$_SESSION['nombUsuario'];?>
        </div>
    </div>
</nav>