<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];  

    
    if (isset($_POST['product_id'], $_POST['product_name'], $_POST['product_price'], $_POST['image_url'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $image_url = $_POST['image_url'];

        $servername = "localhost";
        $db_username = "root"; 
        $db_password = ""; 
        $database = "shopping"; 

        
        $conn = new mysqli($servername, $db_username, $db_password, $database);

        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
        $createTableSQL = "CREATE TABLE IF NOT EXISTS addtocart (
            product_id VARCHAR(100),
            product_name VARCHAR(100),
            product_price VARCHAR(255),
            image_url VARCHAR(280),
            quantity INT,
            username VARCHAR(100)  
        )";

        if ($conn->query($createTableSQL) === TRUE) {
            
            $checkCartSQL = "SELECT * FROM addtocart WHERE product_id = ? AND username = ?";
            $stmt = $conn->prepare($checkCartSQL);
            $stmt->bind_param("ss", $product_id, $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                
                $updateQuantitySQL = "UPDATE addtocart SET quantity = quantity + 1 WHERE product_id = ? AND username = ?";
                $updateStmt = $conn->prepare($updateQuantitySQL);
                $updateStmt->bind_param("ss", $product_id, $username);
                $updateStmt->execute();
            } else {
                
                $insertProductSQL = "INSERT INTO addtocart (product_id, product_name, product_price, image_url, quantity, username) 
                                     VALUES (?, ?, ?, ?, 1, ?)";
                $insertStmt = $conn->prepare($insertProductSQL);
                $insertStmt->bind_param("sssss", $product_id, $product_name, $product_price, $image_url, $username);
                $insertStmt->execute();
            }
        }

        
        $conn->close();
    }

    
    header("Location: http://localhost/webd/shopping/website.php");
    exit();
}
?>
