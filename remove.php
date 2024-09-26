<?php
session_start();
$username = $_SESSION['username'];

// Establish a database connection (replace with your database details)
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "shopping";

// Create a database connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$product_id = $_GET['product_id'];
$quantity=$_GET['quantity'];

// Assuming you have a "products" table in your database
$sql = "SELECT * FROM addtocart WHERE product_id = $product_id";
$result = $conn->query($sql);


if (mysqli_num_rows($result) > 0) {
    // The product exists in the database
    $row = mysqli_fetch_assoc($result); // Retrieve the row

    if ($quantity > 1) {
        // Quantity is greater than 1, decrease the quantity in the database
        $updateSQL = "UPDATE addtocart SET quantity = quantity - 1 WHERE product_id = $product_id";
        if ($conn->query($updateSQL) === TRUE) {
            echo "Quantity decreased.";
        } else {
            echo "Error decreasing quantity: " . $conn->error;
        }
    } elseif ($quantity == 1) {
        // Quantity is 1, remove the product from the database
        $deleteSQL = "DELETE FROM addtocart WHERE product_id = $product_id";
        if ($conn->query($deleteSQL) === TRUE) {
            echo "Product removed from the database.";
        } else {
            echo "Error removing product from the database: " . $conn->error;
        }
    }
} else {
    echo "Product not found in the database.";
}

// Close the database connection
$conn->close();

// Redirect to another page
header("Location: http://localhost/webd/shopping/checkout.php");
exit();


// Close the database connection
$conn->close();

// Redirect to another page
header("Location: http://localhost/webd/shopping/checkout.php");
exit();
?>
