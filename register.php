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

    <h2>Регистрация</h2>

    <form method="POST" action="php/register.php">

        Логин:
        <input type="text" name="login">

        Пароль:
        <input type="password" name="password">

        Сотрудник:
        <select name="employee_id">
            <?php
            $stmt = $conn->query("SELECT * FROM employees");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$row['id']}'>{$row['full_name']}</option>";
            }
            ?>
        </select>

        <input type="submit">Зарегистрироваться</button>
        <a href="index.php">Авторизация</a>
    </form>


</body>

</html>