<?php include "db.php";
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
    <title>Назначить инструктаж</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2>Назначить инструктаж</h2>
    <a href="dashboard.php">Назад</a>

    <form method="POST" action="php/add_participant.php">

        Сотрудник:
        <select name="employee_id">
            <?php
            $stmt = $conn->query("SELECT * FROM employees");
            while ($e = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$e['id']}'>{$e['full_name']}</option>";
            }
            ?>
        </select>

        Инструктаж:
        <select name="instruction_id">
            <?php
            $stmt = $conn->query("SELECT * FROM instructions");
            while ($i = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='{$i['id']}'>Инструктаж {$i['id']}</option>";
            }
            ?>
        </select>

        Результат:
        <select name="result">
            <option>пройден</option>
            <option>не пройден</option>
        </select>

        <input type="submit">Добавить</button>

    </form>

</body>

</html>