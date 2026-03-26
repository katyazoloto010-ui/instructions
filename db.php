<?php
$db = 'mysql:host=localhost;dbname=instruction_journal;charset=utf8';
$user = 'root';
$pass = '';

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

$conn = new PDO($db, $user, $pass, $options);
?>