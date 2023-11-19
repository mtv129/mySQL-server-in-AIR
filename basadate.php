<?php
$servername = "";
$username = "";
$password = "";
$dbname = "";

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Выполняем запрос
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Проверяем результат
if ($result->num_rows > 0) {
    // Преобразуем результат в ассоциативный массив и выводим его в формате JSON
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo "0 results";
}

// Закрываем соединение
$conn->close();
?>
