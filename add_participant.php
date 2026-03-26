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
    <div class="container">
        <div class="logo-container">
            <img src="image/logo.png" alt="Логотип Роскадастр" class="logo">
            <h1 class="app-title">Журнал инструктажей и обучений</h1>
        </div>

        <h2 class="page-title">Назначить инструктаж</h2>
        
        <a href="dashboard.php" class="btn btn-secondary">Назад</a>

        <form method="POST" action="php/add_participant.php" class="auth-form">
            <div class="form-group">
                <label class="form-label">Сотрудник:</label>
                <select name="employee_id" class="form-input form-select">
                    <?php
                    $stmt = $conn->query("SELECT * FROM employees");
                    while ($e = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$e['id']}'>{$e['full_name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Инструктаж:</label>
                <select name="instruction_id" class="form-input form-select">
                    <?php
                    $stmt = $conn->query("SELECT * FROM instructions");
                    while ($i = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$i['id']}'>Инструктаж {$i['id']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Результат:</label>
                <select name="result" class="form-input form-select">
                    <option>пройден</option>
                    <option>не пройден</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>

</body>

</html>