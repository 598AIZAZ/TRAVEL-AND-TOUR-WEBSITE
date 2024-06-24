

<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form field values
  $fullName = $_POST['fullname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  // Perform form validation
  if (empty($fullName) || empty($email) || empty($password) || empty($phone) || empty($address)) {
    echo 'Please fill in all fields.';
    exit;
  }

  // Perform additional validation or data processing logic here
  // ...

  // Connect to your database (replace 'hostname', 'username', 'password', and 'database' with your database credentials)
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'travel';

  $conn = mysqli_connect($host, $username, $password, $database);

  if (!$conn) {
    echo 'Error: Unable to connect to the database.';
    exit;
  }

  // Escape special characters to prevent SQL injection
  $fullName = mysqli_real_escape_string($conn, $fullName);
  $email = mysqli_real_escape_string($conn, $email);
  $password = mysqli_real_escape_string($conn, $password);
  $phone = mysqli_real_escape_string($conn, $phone);
  $address = mysqli_real_escape_string($conn, $address);

  // Hash the password (you can use a stronger hashing algorithm like bcrypt)
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // Insert the form data into the database
  $query = "INSERT INTO registration form (full_name, email, password, phone, address) VALUES ('', '', '', '', '')";

  if (mysqli_query($conn, $query)) {
    // Registration successful
    echo 'Registration successful!';
  } else {
    // Registration failed
    echo 'Error: ' . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}


 //Rest of the code remains the same...

 Register user
 if (isset($_POST['fullname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['address'])) {
     $fullname = $_POST['fullname'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $phone = $_POST['phone'];
    $address = $_POST['address'];

  //  Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

     // Insert user data into the database
     $sql = "INSERT INTO users (fullname, email, password, phone, address) VALUES ('$fullname', '$email', '$password', '$phone', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
     } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
     }

//     // Close the database connection
  $conn->close();
 }



// Login user
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists in the database
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login successful!";
    } else {
        echo "Invalid email or password.";
    }
}

// Close the database connection
$conn->close();
?>
