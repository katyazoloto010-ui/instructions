<?php
include "../db.php";

$stmt = $conn->prepare("INSERT INTO instruction_participants (instruction_id, employee_id, result) VALUES (?, ?, ?)");
$stmt->execute([$_POST['instruction_id'],$_POST['employee_id'],$_POST['result']]);

header("Location: ../admin/dashboard.php");