<?php include "db.php";
session_start();
if ($_SESSION['role'] != 'admin') {
    die('Нет прав');
} ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.">
    <title>Добавить инструктаж</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2>Добавить инструктаж</h2>
    <a href="dashboard.php">Назад</a>

    <form method="POST" action="php/add_instruction.php">

        Тип:
        <select name="type_id">
            <?php
            $stmt = $conn->query("SELECT * FROM instruction_types");
            while ($t = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$t['id']}'>{$t['name']}</option>";
            }
            ?>
        </select>

        Дата: <input type="date" name="date">
        Инструктор: <input type="text" name="instructor">

        <input type="submit">Добавить</button>

    </form>

</body>

</html>