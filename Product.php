<?php

class Product {
    public static $products = array(
        "Chelsea Home Jersey" => array("price" => 110, "stock" => 20, "image" => "chelseaHomeJersey.jpg"),
        "Manchester United Away Jersey" => array("price" => 100, "stock" => 15, "image" => "manUnitedAwayJersey.jpg"),
        "Arsenal Home Jersey" => array("price" => 105, "stock" => 10, "image" => "arsenalHomeJersey.jpg")
    );

    private $name;
    private $price;
    private $stock;
    private $size;
    private $image;

    public function __construct($name, $size) {
        $this->name = $name;
        $this->size = $size;

        // Set price, stock, and image based on product name
        if (array_key_exists($name, self::$products)) {
            $this->price = self::$products[$name]["price"];
            $this->stock = self::$products[$name]["stock"];
            $this->image = self::$products[$name]["image"];
        } else {
            // Default price, stock, and image if product not found
            $this->price = 0;
            $this->stock = 0;
            $this->image = "";
        }
    }

    // Getters and setters...
}

// Function to process form submission and create a new Product object
function processForm() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $productName = $_POST["productName"];
        $jerseyName = $_POST["jerseyName"];
        $size = $_POST["size"];
        $quantity = $_POST["quantity"];

        // Create a new Product object
        $product = new Product($productName, $jerseyName);

        // Save the product data to the checkout table
        try {
            // Connect to the database
            $pdo = new PDO("mysql:host=localhost;dbname=FootScore", "root", "root");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare and execute SQL statement to insert data into the checkout table
            $stmt = $pdo->prepare("INSERT INTO checkout (productName, jerseyName, size, quantity, order_date) VALUES (?, ?, ?, ?, NOW())");
            $stmt->execute([$productName, $jerseyName, $size, $quantity]);

            // Redirect the user to a confirmation page
            header("Location: checkout.php");
            exit;
        } catch (PDOException $e) {
            // Handle database connection errors
            echo "Error: " . $e->getMessage();
        }
    }
}

// Process form submission
processForm();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Form</title>
</head>
<body>

<h2>Product Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Product:</label>
    <select id="name" name="productName">
        <option value="Chelsea Home Jersey">Chelsea Home Jersey</option>
        <option value="Manchester United Away Jersey">Manchester United Away Jersey</option>
        <option value="Arsenal Home Jersey">Arsenal Home Jersey</option>
    </select><br><br>

    <label for="jerseyName">Name on Jersey:</label>
    <input type="text" id="jerseyName" name="jerseyName"><br><br>

    <label for="size">Size:</label>
    <select id="size" name="size">
        <option value="S">S</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
    </select><br><br>

    <!-- Display selected jersey image -->
    <img id="jerseyImage" src="" alt="Jersey Image"><br><br>

    <!-- Display fixed price and stock -->
    <label for="price">Price: €</label>
    <span id="price">0</span><br><br>

    <label for="stock">Stock:</label>
    <span id="stock">0</span><br><br>

    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" value="1"><br><br>

    <input type="submit" value="Submit">
</form>

<script>
    // Update price, stock, and image based on selected product
    document.getElementById("name").addEventListener("change", function() {
        var selectedProduct = this.value;
        var productInfo = <?php echo json_encode(Product::$products); ?>;
        if (productInfo[selectedProduct]) {
            document.getElementById("price").textContent = productInfo[selectedProduct].price;
            document.getElementById("stock").textContent = productInfo[selectedProduct].stock;
            document.getElementById("jerseyImage").src = "images/" + productInfo[selectedProduct].image; // Path to images folder
        }
    });
</script>

</body>
</html>
