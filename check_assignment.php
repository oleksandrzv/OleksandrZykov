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

if (isset($_GET['id'])) {
    $assignment_id = $_GET['id'];

    $sql = "UPDATE assignments SET is_checked = 1, checked_at = NOW() WHERE id = $assignment_id";
    if ($conn->query($sql) === TRUE) {
        echo "Завдання перевірено!";
    } else {
        echo "Помилка при перевірці завдання: " . $conn->error;
    }
}

$conn->close();
?>
