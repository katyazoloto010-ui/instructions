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
    <div class="container">
        <div class="logo-container">
            <img src="image/logo.png" alt="Логотип Роскадастр" class="logo">
            <h1 class="app-title">Журнал инструктажей и обучений</h1>
        </div>

        <h2 class="page-title">Добавить инструктаж</h2>
        
        <a href="dashboard.php" class="btn btn-secondary">Назад</a>

        <form method="POST" action="php/add_instruction.php" class="auth-form">
            <div class="form-group">
                <label class="form-label">Тип:</label>
                <select name="type_id" class="form-input form-select">
                    <?php
                    $stmt = $conn->query("SELECT * FROM instruction_types");
                    while ($t = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='{$t['id']}'>{$t['name']}</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Дата:</label>
                <input type="date" name="date" class="form-input">
            </div>
            
            <div class="form-group">
                <label class="form-label">Инструктор:</label>
                <input type="text" name="instructor" class="form-input">
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>

</body>

</html>