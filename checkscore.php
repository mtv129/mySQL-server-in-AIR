<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];

$sql = "SELECT * FROM border WHERE name = '$name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Имя пользователя уже есть в таблице
    $row = $result->fetch_assoc();
    $score = $row['score'];
    echo $score;
} else {
    // Имя пользователя не найдено, возвращаем 0
    echo "0";
}

$conn->close();
?>
