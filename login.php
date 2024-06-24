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
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare and execute the SQL query to check if the email and password are valid
    $stmt = $conn->prepare("SELECT * FROM accounts WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User found, check password
        $row = $result->fetch_assoc();
        if ($row['password'] === $password) {
            // Password matches, perform login operation

            // Prepare and execute the SQL query to insert the login information into the login column
            $stmt = $conn->prepare("INSERT INTO login (email, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                // Login information inserted successfully
                echo "Login successful. Login information inserted into the login column.";
            } else {
                // Error in inserting login information
                echo "Error: Unable to insert login information.";
            }
        } else {
            // Invalid password
            echo "Invalid password.";
        }
    } else {
        // Invalid email
        echo "Invalid email.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>
