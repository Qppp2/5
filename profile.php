<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <title>Профиль</title>
</head>
<body>

<div class="card">
  <h2>Профиль</h2>

  <div class="avatar">
    <?= strtoupper($user['name'][0]) ?>
  </div>

  <p>Имя: <?= $user['name'] ?></p>
  <p>Email: <?= $user['email'] ?></p>

  <a href="logout.php">
    <button class="logout">Выйти</button>
  </a>
</div>

</body>
</html>