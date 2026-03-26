<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="image/logo.png" alt="Логотип Роскадастр" class="logo">
            <h1 class="app-title">Журнал инструктажей и обучений</h1>
        </div>

        <h2 class="page-title">Регистрация</h2>

        <form method="POST" action="php/register.php" class="auth-form">
            <div class="form-group">
                <label class="form-label">Логин:</label>
                <input type="text" name="login" class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label">Пароль:</label>
                <input type="password" name="password" class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label">Сотрудник:</label>
                <select name="employee_id" class="form-input form-select">
                    <?php
                    $stmt = $conn->query("SELECT * FROM employees");
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$row['id']}'>{$row['full_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
            <a href="index.php" class="link">Авторизация</a>
        </form>
    </div>


</body>

</html>