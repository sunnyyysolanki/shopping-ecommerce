<?php
session_start();
$username = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Database connection details
    $servername = "localhost";
    $db_username = "root"; // Your MySQL username
    $db_password = ""; // Your MySQL password
    $dbname = "shopping"; // Replace with your database name

    // Create a connection to the MySQL server
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the 'order_detail' table if it doesn't exist
    $createTableSQL = "CREATE TABLE IF NOT EXISTS order_detail (
        order_id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        address TEXT NOT NULL,
        phone VARCHAR(15) NOT NULL,
        credit_card VARCHAR(16) NOT NULL,
        expiry_date VARCHAR(7) NOT NULL,
        cvv VARCHAR(3) NOT NULL,
        total_price DECIMAL(10, 2) NOT NULL,
        order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTableSQL) === TRUE) {

        // Extract order details from the form
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $credit_card = $_POST["credit_card"];
        $expiry_date = $_POST["expiry_date"];
        $cvv = $_POST["cvv"];
        $total_price = $_POST["total_price"];

        // Insert order details into the 'order_detail' table
        $insertOrderSQL = "INSERT INTO order_detail (name, email, address, phone, credit_card, expiry_date, cvv, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertOrderSQL);
        $stmt->bind_param("sssssssd", $name, $email, $address, $phone, $credit_card, $expiry_date, $cvv, $total_price);

        if ($stmt->execute()) {
            // Order details inserted successfully
            echo "Order placed successfully!";

            // Clear the 'addtocart' table
            $clearCartSQL = "TRUNCATE TABLE addtocart";
            if ($conn->query($clearCartSQL) === TRUE) {
                echo "Shopping cart is cleared!";
            } else {
                echo "Error clearing the cart: " . $conn->error;
            }
        } else {
            echo "Error placing the order: " . $stmt->error;
        }

        // Close the database connection
        $stmt->close();
    } else {
        echo "Error creating the 'order_detail' table: " . $conn->error;
    }

    $conn->close();
}
?>
