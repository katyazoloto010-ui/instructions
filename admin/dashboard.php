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
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="../image/logo.png" alt="Логотип Роскадастр" class="logo">
            <h1 class="app-title">Журнал инструктажей и обучений</h1>
        </div>

        <h1 class="page-title">Админ панель</h1>

        <section class="content-section">
            <h2 class="section-title">Сотрудники</h2>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Логин</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $u): ?>
                        <tr>
                            <td><?= $u['id'] ?></td>
                            <td><?= $u['login'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <hr class="divider">

        <section class="content-section">
            <h2 class="section-title">Добавить сотрудника</h2>

            <form action="../php/add_user.php" method="POST" class="auth-form">
                <div class="form-group">
                    <input type="text" name="login" placeholder="Логин" class="form-input" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Пароль" class="form-input" required>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </section>


        <a href="../logout.php" class="btn btn-secondary">Выйти</a>
    </div>

</body>
</html>