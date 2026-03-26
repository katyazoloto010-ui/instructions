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
    <div class="container">
        <div class="logo-container">
            <img src="image/logo.png" alt="Логотип Роскадастр" class="logo">
            <h1 class="app-title">Журнал инструктажей и обучений</h1>
        </div>

        <h2 class="page-title">Вход в систему</h2>

        <form method="POST" action="php/login.php" class="auth-form">
            <div class="form-group">
                <input type="text" name="login" placeholder="Логин" class="form-input">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Пароль" class="form-input">
            </div>
            <button name="login_btn" class="btn btn-primary">Войти</button>
            <a href="register.php" class="link">Регистрация</a>
        </form>
    </div>

</body>

</html>