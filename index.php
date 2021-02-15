<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome to you WebApp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/index.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
      <br>You are Successfully Logged In

      <H1>Analisis de Datos Barras Grupo Caribenos</H1>

      
        <a class="botton1" href="caribenos.php">Caribenos</a>
        <a class="botton2"href="deldu.php">Deldu</a>
        <a class="botton3"href="guapiles.php">Guapileños</a>
        <a class="botton4"href="linaco.php">Linaco</a>
        <a class="botton5"href="matina.php">Matina</a>
        <a class="botton5"href="pv.php">Puerto Viejo</a> 
    
      <a class="botton6"href="logout.php">
        Logout
      </a>
      <br>
    <?php else: ?>
      <h2>Please Login or SignUp</h2>

      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>
    <?php endif; ?>
  </body>
</html>