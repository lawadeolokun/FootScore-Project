<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
<h2>Payment Details</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="card_number">Card Number:</label><br>
    <input type="text" id="card_number" name="card_number" placeholder="Enter your card number" required><br><br>

    <label for="expiry_date">Expiry Date:</label><br>
    <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required><br><br>

    <label for="cvv">CVV:</label><br>
    <input type="text" id="cvv" name="cvv" placeholder="Enter CVV" required><br><br>

    <label for="delivery_address">Delivery Address:</label><br>
    <textarea id="delivery_address" name="delivery_address" placeholder="Enter your delivery address" required></textarea><br><br>

    <label for="full_name">Full Name:</label><br>
    <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required><br><br>

    <label for="phone_number">Phone Number:</label><br>
    <input type="text" id="phone_number" name="phone_number" placeholder="Enter your phone number" required><br><br>

    <input type="submit" value="Pay Now">
</form>

<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'FootScore';
$username = 'root';
$password = 'root';

// Connect to the database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: Could not connect. " . $e->getMessage());
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $cardNumber = $_POST['card_number'];
    $expiryDate = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];
    $deliveryAddress = $_POST['delivery_address'];
    $fullName = $_POST['full_name'];
    $phoneNumber = $_POST['phone_number'];

    // Insert data into the payment table
    $stmt = $pdo->prepare("INSERT INTO payment (card_number, expiry_date, cvv, delivery_address, full_name, phone_number) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$cardNumber, $expiryDate, $cvv, $deliveryAddress, $fullName, $phoneNumber]);

    // Redirect or display a success message
    echo "Payment details saved successfully.";
}
?>
</body>
</html>
