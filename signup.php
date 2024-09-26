<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the signup form submission
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // Database connection details
    $servername = "localhost";
    $db_username = "root"; // Your MySQL username
    $db_password = ""; // Your MySQL password
    $database = "shopping"; // Use a single database for all users

    // Create a connection to the MySQL server and the shopping database
    $conn = new mysqli($servername, $db_username, $db_password, $database);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the username already exists
    $checkUserSQL = "SELECT * FROM login_detail WHERE username = '$username'";
    $result = $conn->query($checkUserSQL);

    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Create the 'login_detail' table if it doesn't exist
        $createTableSQL = "CREATE TABLE IF NOT EXISTS login_detail (
            username VARCHAR(100) PRIMARY KEY,
            email VARCHAR(100),
            password VARCHAR(255)
        )";

        if ($conn->query($createTableSQL) === TRUE) {
            // Hash the password for security
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the 'login_detail' table
            $insertUserSQL = "INSERT INTO login_detail (username, email, password) VALUES ('$username', '$email', '$hash')";
            
            if ($conn->query($insertUserSQL) === TRUE) {
                header("Location: http://localhost/webd/shopping/s.php");
                exit();
            } else {
                echo "Error registering user: " . $conn->error;
            }
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }

    // Close the connection
    $conn->close();
}
?>
