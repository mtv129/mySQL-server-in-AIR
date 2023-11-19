<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Login successful";
} else {
    echo "Error: Invalid email or password";
}

$conn->close();
?>

