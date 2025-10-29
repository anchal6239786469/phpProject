<?php
session_start();

$products = [
  1 =>
["name" => "Wireless Mouse", "price" => 499], 2 => ["name" => "Keyboard",
"price" => 899], 3 => ["name" => "Headphones", "price" => 1299], 4 => ["name" =>
"USB Cable", "price" => 199], ]; if (isset($_GET['add'])) { $id = $_GET['add'];
if (!isset($_SESSION['cart'][$id])) { $_SESSION['cart'][$id] = 1; } else {
$_SESSION['cart'][$id]++; } header("Location: index.php"); exit; } $cart_count =
0; if (isset($_SESSION['cart'])) { foreach ($_SESSION['cart'] as $qty) {
$cart_count += $qty; } } ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Simple PHP Cart</title>
    <style>
      body {
        font-family: Arial;
        margin: 30px;
      }
      .product {
        border: 1px solid #ccc;
        padding: 15px;
        width: 200px;
        border-radius: 10px;
        text-align: center;
        margin: 10px;
        float: left;
      }
      button,
      a {
        background: #007bff;
        color: white;
        padding: 8px 12px;
        text-decoration: none;
        border-radius: 6px;
      }
      a:hover,
      button:hover {
        background: #0056b3;
      }
      .cart-link {
        float: right;
        font-weight: bold;
        position: relative;
      }
      .cart-badge {
        background: red;
        color: white;
        border-radius: 50%;
        padding: 3px 8px;
        font-size: 12px;
        position: absolute;
        top: -10px;
        right: -15px;
      }
    </style>
  </head>
  <body>
    <h1>🛍️ Product Store</h1>

    <a href="cart.php" class="cart-link">
      🛒 Cart
      <?php if ($cart_count >
      0): ?>
      <span class="cart-badge"><?= $cart_count ?></span>
      <?php endif; ?>
    </a>

    <div class="products">
      <?php foreach ($products as $id =>
      $p): ?>
      <div class="product">
        <h3><?= $p['name'] ?></h3>
        <p>Price: ₹<?= $p['price'] ?></p>
        <a href="?add=<?= $id ?>">Add to Cart</a>
      </div>
      <?php endforeach; ?>
    </div>
  </body>
</html>
