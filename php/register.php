<?php
include "../db.php";

$login = $_POST['login'];
$password = $_POST['password'];
$employee_id = $_POST['employee_id'];

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT * FROM users WHERE login=?");
$stmt->execute([$login]);

if ($stmt->rowCount() > 0) {
    echo "Такой логин уже существует";
    exit;
}

$stmt = $conn->prepare("INSERT INTO users (login, password_hash, employee_id) VALUES (?, ?, ?)");
$stmt->execute([$login, $hash, $employee_id]);

header("Location: ../index.php");