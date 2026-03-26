<?php
include "../db.php";

$stmt = $conn->prepare("INSERT INTO instructions (instruction_type_id, date, instructor) VALUES (?, ?, ?)");
$stmt->execute([$_POST['type_id'],$_POST['date'],$_POST['instructor']]);

header("Location: ../admin/dashboard.php");