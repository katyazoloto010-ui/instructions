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
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Мои обучения и инструктажи</h1>

<table border="1">
    <tr>
        <th>Название</th>
        <th>Дата</th>
        <th>Статус</th>
    </tr>

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
            <td><?= $p['result'] ?></td>
        </tr>

    <?php endforeach; ?>

</table>

<a href="../logout.php">Выйти</a>

</body>
</html>