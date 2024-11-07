<?php
include 'db.php';


$login = $_POST['login'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$repeatpass = $_POST['repeat-password'];
// Проверка на существование пользователя с таким же email
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Пользователь с таким email уже существует.";
} else {
    // Вставка нового пользователя
    $stmt = $conn->prepare("INSERT INTO users (login, email, password, role) VALUES (?, ?, ?, 'student')");
    $stmt->bind_param("sss", $login, $email, $password);
    if ($stmt->execute()) {
        session_start();
        $_SESSION['id'] = $conn->insert_id;
        $_SESSION['role'] = 'student';
        header("Location: index.html");
        exit();
    } else {
        echo "Ошибка: " . $stmt->error;
    }
}

$stmt->close();
$conn->close();
?>
