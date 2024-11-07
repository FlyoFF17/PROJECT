<?php
$servername = 'localhost'; // Хост сервера
$username = 'root'; // Имя пользователя MySQL
$password = ''; // Пароль, по умолчанию пустой в XAMPP
$dbname = 'school'; // Имя базы данных, которую вы создали в phpMyAdmin

// Создаем соединение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Соединение успешно установлено";
}
?>
