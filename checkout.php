<?php
// Connect to the database
$pdo = new PDO("mysql:host=localhost;dbname=FootScore", "root", "root");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Retrieve orders from the checkout table
$stmt = $pdo->query("SELECT * FROM checkout");
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css" />

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .payment-link {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Navigation bar -->
<div class="navbar">
    <a href="tickets.php">Tickets</a>
    <a href="Product.php">Store</a>
    <a href="fixtures.php">Fixtures</a>
    <a href="checkout.php">Checkout</a>

</div>

<h2>Checkout</h2>

<table>
    <tr>
        <th>Product Name</th>
        <th>Jersey Name</th>
        <th>Size</th>
        <th>Quantity</th>
    </tr>
    <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $order['productName'] ?></td>
            <td><?= $order['jerseyName'] ?></td>
            <td><?= $order['size'] ?></td>
            <td><?= $order['quantity'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="payment-link">
    <a href="payment.php">Go to Payment</a>
</div>

</body>
</html>
