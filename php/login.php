<?php
session_start();
include "../db.php";

$login = $_POST['login'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE login=?");
$stmt->execute([$login]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password_hash'])) {
    
    $_SESSION['user'] = $login;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['role'] = $user['role'];

    if ($user['role'] == 'admin') {
        header("Location: ../admin/dashboard.php");
    } else {
        header("Location: ../user/dashboard.php");
    }
    exit();
} else {
    echo "Неверный логин или пароль";
}
?>