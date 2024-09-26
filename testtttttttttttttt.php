<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the signup form submission
    $username = $_POST["username"];

    // Database connection details
    $servername = "localhost";
    $db_username = "root"; // Your MySQL username
    $db_password = ""; // Your MySQL password
    $dbname = "your_database_name"; // Replace with your database name

    // Create a connection to the MySQL server
    $conn = new mysqli($servername, $db_username, $db_password);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create a new database
    $sql = "CREATE DATABASE $username";

    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully.";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}




    $username = $_POST["username"];  
    $password = $_POST["password"];  
    $email = $_POST["email"];

    $sql = "SELECT * FROM test1 WHERE username='$username'";  // Corrected SQL query
    $sql1 = "SELECT * FROM test1 WHERE email='$email'";
    $result = mysqli_query($conn, $sql); 
    $result1 = mysqli_query($conn, $sql1);	
    $num = mysqli_num_rows($result);
    $num1 = mysqli_num_rows($result1);	
    // This SQL query is used to check if the username is already present or not in our Database 
    if($num == 0 && $num1 == 0) { 
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Password Hashing is used here.  
        $sql = "INSERT INTO test1 (`username`, `email`, `password`) VALUES ('$username', '$email', '$hash')";  // Corrected SQL query

        $result = mysqli_query($conn, $sql); 

        if ($result) { 
            $showAlert = true;  
        } 
    } else {
        echo "<script>alert('username already exist');</script>";
	  
    }
}
?>
