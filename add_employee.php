<?
session_start();
if ($_SESSION['role'] != 'admin') {
    die('Нет прав');
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить сотрудника</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h2>Добавить сотрудника</h2>
    <a href="dashboard.php">Назад</a><br><br>

    <form method="POST" action="php/add_employee.php">
        <input type="text" name="full_name" placeholder="ФИО"><br><br>
        <input type="text" name="position" placeholder="Должность"><br><br>
        <input type="text" name="department" placeholder="Отдел"><br><br>
        <input type="submit">Добавить</button>
    </form>

</body>

</html>