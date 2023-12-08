<?php

  require_once('./includes/header.php');
  require_once('./app/classes/User.php');

  if ($user->isLoggedIn()) {
    header("location: index.php");
    exit();
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = $user->loginUser($username, $password);

    if (!$login) {
      $_SESSION['message']['type'] = "danger"; // danger ili success
      $_SESSION['message']['text'] = "Pogresan username ili sifra!"; // danger ili success
      header("location: login.php");
      exit();
    } else {
      $_SESSION['message']['type'] = "success"; // danger ili success
      $_SESSION['message']['text'] = "Uspesno ste se ulogovali!"; // danger ili success
      header("location: index.php");
      exit();
    }
  }

?>

<link rel="stylesheet" href="login.css">
<div class="login">
  <h3 class="login-title">Login</h3>

  <form action="" method="POST" class="login-form">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="username" name="username" class="form-control" id="username">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="password">
    </div>

    <button type="submit" class="login-btn">Login</button>
  </form>

  <div class="registration">
    <p>Don't have an account?</p>
    <a href="register.php">Register User</a>
  </div>
</div>

<?php require_once('./includes/footer.php'); ?>