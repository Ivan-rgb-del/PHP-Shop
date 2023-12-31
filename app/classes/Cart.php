<?php

  class Cart {
    protected $conn;

    public function __construct() {
      global $conn;
      $this->conn = $conn;
    }

    public function addToCart($user_id, $product_id, $quantity) {
      if ($quantity > 0) {
        $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iis', $user_id, $product_id, $quantity);
        $stmt->execute();
      } 
    }

    public function get_cart_items() {
      $stmt = $this->conn->prepare("
        SELECT p.product_id, p.name, p.price, p.size, p.image, c.quantity
        FROM cart c
        INNER JOIN product p
        ON c.product_id = p.product_id
        WHERE c.user_id = ?
      ");
      $stmt->bind_param("i", $_SESSION['user_id']);
      $stmt->execute();

      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function destroy_cart() {
      $sql = "DELETE FROM cart WHERE user_id = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param('i', $_SESSION['user_id']);
      $stmt->execute();
    }

    public function deleteItemFromCart($product_id) {
      $sql = "DELETE FROM cart WHERE product_id = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param('i', $product_id);
      $stmt->execute();
    }
  }

?>