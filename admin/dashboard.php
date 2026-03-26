<?php
session_start();
include "../db.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    die('Доступ запрещен');
}

// Получаем список сотрудников из таблицы employees
$stmt = $conn->query("SELECT * FROM employees");
$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

        <!-- Секция управления -->
        <section class="content-section">
            <h2 class="section-title">Управление</h2>
            <div class="action-buttons">
                <a href="../add_employee.php" class="btn btn-primary">Добавить сотрудника</a>
                <a href="../add_instruction.php" class="btn btn-primary">Добавить инструктаж</a>
                <a href="../add_participant.php" class="btn btn-primary">Назначить инструктаж</a>
            </div>
        </section>

        <hr class="divider">

        <!-- Список сотрудников -->
        <section class="content-section">
            <h2 class="section-title">Список сотрудников</h2>

            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Должность</th>
                        <th>Отдел</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($employees) > 0): ?>
                        <?php foreach ($employees as $e): ?>
                            <tr>
                                <td><?= $e['id'] ?></td>
                                <td><?= htmlspecialchars($e['full_name']) ?></td>
                                <td><?= htmlspecialchars($e['position']) ?></td>
                                <td><?= htmlspecialchars($e['department']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="empty-message">Сотрудники не найдены</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>

        <hr class="divider">

        <a href="../logout.php" class="btn btn-secondary">Выйти</a>
    </div>

</body>
</html>