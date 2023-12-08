<?php

  class Product {
    protected $conn;

    public function __construct() {
      global $conn;
      $this->conn = $conn;
    }

    public function fetchAll() {
      $sql = "SELECT * FROM product";
      $result = $this->conn->query($sql);
      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function createProduct($name, $price, $size, $image) {
      $sql = "INSERT INTO product (name, price, size, image) VALUES (?, ?, ?, ?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param('ssss', $name, $price, $size, $image);
      $stmt->execute();
    }

    public function readProduct($product_id) {
      $sql = "SELECT * from product WHERE product_id = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param('i', $product_id);
      $stmt->execute();

      $result = $stmt->get_result();
      return $result->fetch_assoc();
    }

    public function updateProduct($product_id, $name, $price, $size, $image) {
      $sql = "UPDATE product SET name = ?, price = ?, size = ?, image = ? WHERE product_id = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param('ssssi', $name, $price, $size, $image, $product_id);
      $stmt->execute();
    }

    public function deleteProduct($product_id) {
      $sql = "DELETE FROM product WHERE product_id = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param('i', $product_id);
      $stmt->execute();
    }
  }

?>