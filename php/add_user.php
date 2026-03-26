<?php
session_start();
include "../db.php";

if ($_SESSION['role'] != 'admin') {
    die('Нет прав');
}

$login = $_POST['login'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (login, password_hash, role) VALUES (?, ?, 'user')");
$stmt->execute([$login, $password]);

header("Location: ../admin/dashboard.php");