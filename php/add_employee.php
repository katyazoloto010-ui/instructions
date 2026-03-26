<?php
include "../db.php";

$stmt = $conn->prepare("INSERT INTO employees (full_name, position, department) VALUES (?, ?, ?)");
$stmt->execute([
    $_POST['full_name'],
    $_POST['position'],
    $_POST['department']
]);

header("Location: ../employees.php");