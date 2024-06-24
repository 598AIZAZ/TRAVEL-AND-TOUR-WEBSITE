<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pname = $_POST["pname"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $topic = $_POST["topic"];
    $msg = $_POST["msg"];

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO contact (pname, email, mobile, topic, msg) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $pname, $email, $mobile, $topic, $msg);
    if ($stmt->execute()) {
        // User details successfully inserted into the database
        echo "User details saved successfully.";
    } else {
        // Error in saving user details
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
