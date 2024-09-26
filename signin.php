<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST['password'];

    // Database connection details
    $database = "shopping"; // Use a single database for all users
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";

    // Create a connection
    $conn = mysqli_connect($servername, $db_username, $db_password, $database);

    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape the username to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);

    // Query to check if the username exists
    $sql = "SELECT * FROM login_detail WHERE username = '$username'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        if ($row) {
            // Verify the password with the hashed password in the database
            if (password_verify($password, $row['password'])) {
                // Start a session for the valid user
                $_SESSION['username'] = $username;
                header("Location: http://localhost/webd/shopping/website.php"); // Redirect after successful login
                exit();
            } else {
                echo "<h1> Login failed. Invalid password.</h1>";
            }
        } else {
            echo "<h1> Login failed. User not found.</h1>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
