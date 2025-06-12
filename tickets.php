<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Tickets</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
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
    <div class="login">
        <form action="login.php" method="post">
            <input type="submit" value="Login">
        </form>
    </div>
</div>

<h2>Tickets</h2>

<table>
    <tr>
        <th>Match</th>
        <th>Price</th>
        <th>Status</th>
        <th>Date</th>
    </tr>
    <?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "FootScore";

    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Execute SQL SELECT statement
    $sql = "SELECT * FROM Tickets";
    $result = $conn->query($sql);

    // Display the retrieved data
    $matchCounter = 0; // Counter for matches displayed
    $weekCounter = 1; // Counter for weeks
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            // Increment the match counter
            $matchCounter++;

            // Start a new row for every 5 matches
            if ($matchCounter % 6 == 1) {
                // Start a new week
                echo "<tr><td colspan='4'>Week $weekCounter</td></tr>";
                $weekCounter++;
            }

            echo "<tr>";
            echo "<td>" . $row["Match"]. "</td>";
            echo "<td id='price_" .  "'>" . $row["Prices"]. "</td>";
            echo "<td>";
            echo "<form method='post' action=''>";
            echo "<select name='status' class='status'>";
            echo "<option value='single'>Single</option>";
            echo "<option value='pairs'>Pairs</option>";
            echo "</select>";
            echo "<input type='hidden' value='" .  "'>";
            echo "<input type='submit'>";
            echo "</form>";
            echo "</td>";
            echo "<td>" . $row["Date"]. "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>0 results</td></tr>";
    }

    // Close connection
    $conn->close();

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the selected status and ticket ID
        $status = $_POST["status"];

        // Update the price based on the selected status
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the price from the database based on the ticket ID
        $sql = "SELECT Prices FROM tickets ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentPrice = $row["Prices"];
        }

        // Update the price based on the selected status
        if ($status === 'single') {
            $newPrice = $currentPrice; // Assuming no change for single ticket
        } else if ($status === 'pairs') {
            // Update the price for pairs ticket
            // You can set your own logic here to update the price
            // Example: $newPrice = $currentPrice * 2;
            // However, for demonstration purposes, I'm assuming a fixed price for pairs
            $newPrice = $currentPrice * 2; // Update the price for pairs
        }

        // Update the price in the database
        $sql = "UPDATE tickets SET Prices='$newPrice'";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Price updated successfully');</script>";
        } else {
            echo "<script>alert('Error updating price: " . $conn->error . "');</script>";
        }

        // Close connection
        $conn->close();
    }
    ?>
</table>

</body>
</html>