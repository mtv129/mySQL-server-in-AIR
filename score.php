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
$score = $_POST['score'];

// Проверяем, есть ли уже запись с именем пользователя
$checkSql = "SELECT * FROM border WHERE name = '$name'";
$checkResult = $conn->query($checkSql);

if ($checkResult->num_rows > 0) {
    // Запись существует, обновляем score
    $updateSql = "UPDATE border SET score = '$score' WHERE name = '$name'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Score updated successfully";
    } else {
        echo "Error updating score: " . $conn->error;
    }
} else {
    // Записи нет, добавляем новую
    $insertSql = "INSERT INTO border (name, score) VALUES ('$name', '$score')";
    if ($conn->query($insertSql) === TRUE) {
        echo "Score added successfully";
    } else {
        echo "Error adding score: " . $conn->error;
    }
}

$conn->close();
?>
