<?php
session_start();

// Product list (same as index.php)
$products = [
  1 => ["name" => "Wireless Mouse", "price" => 499],
  2 => ["name" => "Keyboard", "price" => 899],
  3 => ["name" => "Headphones", "price" => 1299],
  4 => ["name" => "USB Cable", "price" => 199],
];

// Remove item
if (isset($_GET['remove'])) {
  $id = $_GET['remove'];
  unset($_SESSION['cart'][$id]);
  header("Location: cart.php");
  exit;
}

$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <style>
    body { font-family: Arial; margin: 30px; }
    table { border-collapse: collapse; width: 60%; }
    th, td { padding: 10px; border-bottom: 1px solid #ccc; text-align: center; }
    a { text-decoration: none; background: #dc3545; color: white; padding: 5px 10px; border-radius: 5px; }
    a:hover { background: #a71d2a; }
    .back { background: #007bff; color: white; padding: 8px 12px; border-radius: 6px; text-decoration: none; }
    .back:hover { background: #0056b3; }
  </style>
</head>
<body>

<h1>🛒 Your Cart</h1>
<a href="index.php" class="back">⬅ Back to Shop</a> | 
<a href="clear_cart.php" class="back" style="background:#ff9800;">Clear Cart</a>
<br><br>

<?php if (empty($_SESSION['cart'])): ?>
  <p>Your cart is empty!</p>
<?php else: ?>
  <table>
    <tr>
      <th>Product</th>
      <th>Price (₹)</th>
      <th>Qty</th>
      <th>Subtotal (₹)</th>
      <th>Action</th>
    </tr>
    <?php foreach ($_SESSION['cart'] as $id => $qty): 
      $name = $products[$id]['name'];
      $price = $products[$id]['price'];
      $subtotal = $price * $qty;
      $total += $subtotal;
    ?>
    <tr>
      <td><?= $name ?></td>
      <td><?= $price ?></td>
      <td><?= $qty ?></td>
      <td><?= $subtotal ?></td>
      <td><a href="?remove=<?= $id ?>">Remove</a></td>
    </tr>
    <?php endforeach; ?>
    <tr>
      <th colspan="3">Total</th>
      <th colspan="2">₹<?= $total ?></th>
    </tr>
  </table>
<?php endif; ?>

</body>
</html>
