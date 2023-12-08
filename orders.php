<?php

  require_once('./includes/header.php');
  require_once('./app/classes/Cart.php');
  require_once('./app/classes/Order.php');

  if (!$user->isLoggedIn()) {
    header("Location: login.php");
    exit();
  }

  $order = new Order();
  $orders = $order->get_orders();

?>

<link rel="stylesheet" href="orders.css">
<div class="orders">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Order ID</th>
        <th scope="col">Procut Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Size</th>
        <th scope="col">Image</th>
        <th scope="col">Delivery Address</th>
        <th scope="col">Order Date</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $order) : ?>
        <tr>
          <td><?php echo $order['order_id']; ?></td>
          <td><?php echo $order['name']; ?></td>  
          <td><?php echo $order['quantity']; ?></td>
          <td><?php echo $order['price']; ?></td>
          <td><?php echo $order['size']; ?></td>
          <td>
            <img src="./public/product_images/<?php echo $order['image']; ?>"
            height="50">
          </td>
          <td><?php echo $order['delivery_address']; ?></td>
          <td><?php echo $order['created_at']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php require_once('./includes/footer.php'); ?>