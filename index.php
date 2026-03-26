<?php require_once "db.php";
session_start(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Вход в систему</h2>

    <form method="POST" action="php/login.php">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <button name="login_btn">Войти</button>
        <a href="register.php">Регистрация</a>
    </form>

</body>

</html>