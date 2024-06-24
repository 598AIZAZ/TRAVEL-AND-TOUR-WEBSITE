<?php
// Database connection details
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "travel"; // Replace with your database name

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["adminname"];
    $password = $_POST["password"];

    // Define the desired admin name and password
    $desiredAdminName = "AIZAZ&FAIZAN";
    $desiredPassword = "admin";

    if ($username === $desiredAdminName && $password === $desiredPassword) {
        // Successful login
        echo "ADMIN SUCCESSFULLY LOGGED IN.";

        // Prepare and execute the SQL query to insert the record
        $stmt = $conn->prepare("INSERT INTO admin (adminname, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Record inserted successfully
            echo "Record inserted successfully.";
        } else {
            // Error in inserting record
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        // Invalid admin name or password
        echo "Invalid admin name or password.";
    }
}

// Close the database connection
$conn->close();
?>
