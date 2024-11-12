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

// Збереження даних курсу
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $video_url = $_POST['video_url'];

    $sql = "INSERT INTO courses (title, description, video_url) VALUES ('$title', '$description', '$video_url')";
    if ($conn->query($sql) === TRUE) {
        echo "Курс успішно додано! <a href='index.html'>Повернутися на головну</a>";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>