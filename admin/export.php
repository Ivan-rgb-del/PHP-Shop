<?php

  require_once('../app/config/config.php');

  if(isset($_GET['what'])) {
    if ($_GET['what'] == 'products') {
      $sql = "SELECT * FROM product";

      $csv_cols = [
        "product_id",
        "name",
        "price",
        "size",
        "image",
        "created_at",
      ];

    } else {
      echo "Nema!";
      die();
    }

    $run = $conn->query($sql);
    $results = $run->fetch_all(MYSQLI_ASSOC);

    $output = fopen('php://output', 'w');
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename=' . $_GET['what'] . ".csv");

    fputcsv($output, $csv_cols);

    foreach ($results as $result) {
      fputcsv($output, $result);
    }

    fclose($output);
  }

?>