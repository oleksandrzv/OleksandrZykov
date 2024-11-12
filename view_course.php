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

$course_id = $_GET['id']; // Отримуємо ID курсу з параметра URL

$sql = "SELECT * FROM courses WHERE id = $course_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $description = $row['description'];
    $video_url = $row['video_url'];
} else {
    echo "Курс не знайдено!";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перегляд курсу - <?php echo $title; ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1><?php echo $title; ?></h1>
    </header>
    <main>
        <section>
            <h2>Опис курсу</h2>
            <p><?php echo $description; ?></p>
        </section>

        <section>
            <h2>Перегляд відео</h2>
            <?php if (!empty($video_url)): ?>
                <iframe width="560" height="315" src="<?php echo $video_url; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php else: ?>
                <p>Відео не надано для цього курсу.</p>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
