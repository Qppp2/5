<?php
session_start();
require "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = [
        "name" => $user['name'],
        "email" => $user['email']
    ];
    header("Location: profile.php");
} else {
    echo "Неверный email или пароль";
}
?>