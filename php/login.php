<?php
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Проверьте данные пользователя в базе данных
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Успешный вход
    header("Location: dashboard.php");
} else {
    // Ошибка входа
    echo "Неправильное имя пользователя или пароль";
}
?>
