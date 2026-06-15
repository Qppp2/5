<?php
require "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("SQL ошибка: " . $conn->error);
}

$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
    echo "Успешная регистрация";
} else {
    echo "Ошибка выполнения";
}
?>