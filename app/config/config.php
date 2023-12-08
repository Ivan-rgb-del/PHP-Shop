<?php

  session_start();

  $servername = "localhost";
  $db_username = "root";
  $db_password = "";
  $database_name = "shop";
  $port = 4306;

  $conn = mysqli_connect($servername, $db_username, $db_password, $database_name, $port);

  if (!$conn) {
    echo "Ne uspesna konekcija";
  }

?>