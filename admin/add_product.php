<?php
  require_once('../app/config/config.php');
  require_once('../app/classes/User.php');
  require_once('../app/classes/Product.php');

  $user = new User();

  if ($user->isLoggedIn() && $user->isAdmin()) :
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $product = new Product();

      $name = $_POST['name'];
      $price = $_POST['price'];
      $size = $_POST['size'];
      $image = $_POST['photo_path'];

      $product->createProduct($name, $price, $size, $image);

      header("Location: index.php");
    }
  endif;

?>

<link rel="stylesheet" href="add.css">
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<div class="container">
  <?php
    require_once('admin_header.php');
  ?>

  <div class="add_product" >
    <form action="" method="POST" class="add_product-form">
      <div>
        <label for="name">Product Name</label>
        <input type="text" name="name" id="name">
      </div>
      <div>
        <label for="price">Product Price</label>
        <input type="text" name="price" id="price">
      </div>
      <div>
        <label for="size">Product Size</label>
        <input type="text" name="size" id="size">
      </div>
      <div>
        <label for="photo_path">Product Picture</label>
        <input type="hidden" name="photo_path" id="photoPathInput">
        <div class="dropzone" id="dropzone-upload"></div>
      </div>

      <input type="submit" value="Add Product" class="btn">
    </form>
  </div>
</div>

<!-- Dropzone -->
<?php
  require_once('dropzone.php');
?>