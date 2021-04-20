<?php require_once 'conexion.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moodle</title>
    
    <link rel="stylesheet" href="./css/home.css" />
</head>
<body>
<div class="main-container">
      <div class="logo">
        <h1>Pau Egea Cortes</h1>
      </div>
      <div class="container">
        <div class="login">
          <h3>Inicia sesión</h3>
          <p>Si estás registrado, pulsa en Login</p>
          <button class="btn"><a href="login.php">login</a></button>
        </div>
        <div class="register">
          <h3>Registrate</h3>
          <p>Si aún no estás registrado, pulsa en Registrarse</p>
          <button class="btn"><a href="registro.php">Registrarse</a></button>
        </div>
      </div>
    </div>
    </body>