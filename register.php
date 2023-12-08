<?php

  require_once('./includes/header.php');
  require_once('./app/classes/User.php');

  if ($user->isLoggedIn()) {
    header("location: index.php");
    exit();
  }

  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $created = $user->createUser($name, $username, $email, $password);

    if ($created) {
      $_SESSION['message']['type'] = "success"; // danger ili success
      $_SESSION['message']['text'] = "Uspesno registrovan nalog!"; // danger ili success
      header("location: index.php");
      exit();
    } else {
      $_SESSION['message']['type'] = "danger"; // danger ili success
      $_SESSION['message']['text'] = "Greska!"; // danger ili success
      header("location: register.php");
      exit();
    }
  }

?>

<link rel="stylesheet" href="register.css">
<div class="register">
  <h1 class="register-title">Registration</h1>

  <form action="" method="POST" class="register-form">
    <div class="form-group mb-3">
      <label for="name">Full Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group mb-3">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" required>
    </div>

    <div class="form-group mb-3">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" required>
    </div>

    <div class="form-group mb-3">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
    </div>

    <button type="submit" class="register-btn">Register</button>
  </form>
</div>

<?php require_once('./includes/footer.php'); ?>