<?php

  require_once('./app/config/config.php');
  require_once('./app/classes/User.php');

  $user = new User();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="index.css"> -->
  <title>Shop</title>
</head>
<body>
  <div class="container">

  <nav class="nav">
    <div class="flex">
      <div class="title">
        <img src="./public/product_images/cysecor.jpg" alt="title">
        <h3>Cysecor Shop</h3>
      </div>

      <div class="div-link" id="navbarNav">
        <ul>
          <li>
            <a href="index.php">Home</a>
          </li>
          <?php if(!$user->isLoggedIn()) : ?>
            <li>
              <a href="register.php">Register User</a>
            </li>
            <li>
              <a href="login.php">Login User</a>
            </li>
          <?php else : ?>
            <li>
              <a href="cart.php">
                Cart
              </a>
            </li>
            <li>
              <a href="orders.php">My Orders</a>
            </li>
            <li>
              <a href="logout.php">Logout</a>
            </li>
              <?php if($user->isAdmin()) : ?>
                <a href="admin/index.php">Products</a>
              <?php endif; ?>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <?php if (isset($_SESSION['message'])) : ?>
    <div class="alert alert-<?php echo $_SESSION['message']['type']; ?> alert-dismissible fade show" role="alert">
      <?php
        echo $_SESSION['message']['text'];
        unset($_SESSION['message']);
      ?>
    </div>
  <?php endif; ?>