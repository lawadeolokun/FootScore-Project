<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footscore - Soccer Website</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        .login {
            float: right;
            margin-top: 10px;
            margin-right: 20px;
        }
        .login input[type="text"], .login input[type="password"], .login input[type="submit"] {
            padding: 5px;
            margin-right: 5px;
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

<h1>Footscore</h1>

<!-- Soccer image -->
<div style="text-align: center; margin-top: 20px;">
    <img src="images/Soccer.png" alt="Soccer Image" style="width: 80%;">
</div>

</body>
</html>
