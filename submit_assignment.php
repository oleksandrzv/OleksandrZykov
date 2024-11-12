<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "online_courses";

// Підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Збереження даних домашнього завдання
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_id = $_POST['course_id'];
    $user_id = 1; // Ідентифікатор користувача, можна замінити на реального користувача
    $submission = $_POST['submission'];

    $sql = "INSERT INTO assignments (course_id, user_id, submission) VALUES ('$course_id', '$user_id', '$submission')";
    if ($conn->query($sql) === TRUE) {
        echo "Домашнє завдання успішно здано! <a href='index.html'>Повернутися на головну</a>";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
