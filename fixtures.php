<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixtures</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            padding: 15px;
            text-align: center;
        }

        .navbar a {
            color: white;
            padding: 14px 16px;
            text-decoration: none;
            display: inline-block;
        }

        .container {
            max-width: 800px;
            margin: 20px auto; /* Center the container */
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        #fixtures {
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            display: flex;
            justify-content: center; /* Move the content to the center */
            align-items: center;
        }

        .match-info {
            display: flex;
            align-items: center;
        }

        .match-image {
            margin-right: 10px;
            max-width: 30px; /* Adjust the max-width as needed */
            max-height: 30px; /* Adjust the max-height as needed */
        }

        .second-image {
            max-width: 30px; /* Adjust the max-width as needed */
            max-height: 30px; /* Adjust the max-height as needed */
            margin-right: 5px; /* Adjust the right margin for the second image */
        }
    </style>
</head>
<body>
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="tickets.php">Tickets</a>
    <a href="Product.php">Store</a>
    <a href="checkout.php">Checkout</a>
</div>
<div class="container">
    <h1>Football Fixtures</h1>
    <div id="fixtures">

        <?php include "config.php"; ?>
        <?php
        // Fetch and display data
        $sql = "SELECT * FROM Fixtures";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<ul>";
            $count = 0;
            $weekNumber = 0;

            while ($row = $result->fetch_assoc()) {
                
                // Start a new week after every 5 matches
                if ($count % 5 == 0) {
                    echo "<br><br>", "Week " . ++$weekNumber, "<br><br>";
                }

                echo "<li>";
echo "<div class='match-info'>";
echo "<img class='match-image' src='images/{$row['Image']}' alt='Match Image'>";
$type = isset($row['Type']) ? $row['Type'] : '';
echo "{$row['idFixtures']} - {$row['Match']} - {$row['Date']} - {$row['Time']} - {$row['Location']} - $type";
echo "</div>";
echo "<img class='second-image' src='images/{$row['SecondImage']}' alt='Second Image'>";
echo "</li>";


                // Repeat for each column you want to display
                $count++;
            }

            echo "</ul>";
        } else {
            echo "No items found.";
        }

        $conn->close();
        ?>
    </div>
</div>
</body>
</html>
