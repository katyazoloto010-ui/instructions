<?php
session_start();
include "../db.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'user') {
    die('Доступ запрещен');
}

$user_id = $_SESSION['user_id'];

// 1. получаем пользователя
$stmt = $conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$employee_id = $user['employee_id'];

// 2. получаем записи инструктажей
$stmt = $conn->prepare("SELECT * FROM instruction_participants WHERE employee_id=?");
$stmt->execute([$employee_id]);
$parts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мои обучения</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <img src="../image/logo.png" alt="Логотип Роскадастр" class="logo">
            <h1 class="app-title">Журнал инструктажей и обучений</h1>
        </div>

        <h1 class="page-title">Мои обучения и инструктажи</h1>

        <section class="content-section">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Название</th>
                        <th>Дата</th>
                        <th>Статус</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($parts as $p): ?>

                        <?php
                        // 3. получаем инструктаж
                        $stmt2 = $conn->prepare("SELECT * FROM instructions WHERE id=?");
                        $stmt2->execute([$p['instruction_id']]);
                        $instr = $stmt2->fetch(PDO::FETCH_ASSOC);
                        
                        $stmt3 = $conn->prepare("SELECT * FROM instruction_types WHERE id = ?");
                        $stmt3->execute([$instr['instruction_type_id']]);
                        $type = $stmt3->fetch(PDO::FETCH_ASSOC);
                        ?>

                        <tr>
                            <td><?= $type['name'] ?></td>
                            <td><?= $instr['date'] ?></td>
                            <td><span class="status-badge status-<?= $p['result'] == 'пройден' ? 'success' : 'danger' ?>"><?= $p['result'] ?></span></td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        <a href="../logout.php" class="btn btn-secondary">Выйти</a>
    </div>

</body>
</html>