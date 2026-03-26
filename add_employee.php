<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    die('Нет прав');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить сотрудника</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="image/logo.png" alt="Логотип Роскадастр" class="logo">
            <h1 class="app-title">Журнал инструктажей и обучений</h1>
        </div>

        <h2 class="page-title">Добавить сотрудника</h2>
        
        <a href="dashboard.php" class="btn btn-secondary">Назад</a><br><br>

        <form method="POST" action="php/add_employee.php" class="auth-form">
            <div class="form-group">
                <input type="text" name="full_name" placeholder="ФИО" class="form-input"><br><br>
            </div>
            <div class="form-group">
                <input type="text" name="position" placeholder="Должность" class="form-input"><br><br>
            </div>
            <div class="form-group">
                <input type="text" name="department" placeholder="Отдел" class="form-input"><br><br>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>

</body>

</html>