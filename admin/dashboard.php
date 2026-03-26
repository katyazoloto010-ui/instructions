<?php
session_start();
include "../db.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die('Доступ запрещен');
}

$stmt = $conn->query("SELECT * FROM users WHERE role='user'");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Админ панель</h1>

<h2>Сотрудники</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Логин</th>
    </tr>

    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['login'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<hr>

<h2>Добавить сотрудника</h2>

<form action="../php/add_user.php" method="POST">
    <input type="text" name="login" placeholder="Логин" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit">Добавить</button>
</form>


<a href="../logout.php">Выйти</a>

</body>
</html>