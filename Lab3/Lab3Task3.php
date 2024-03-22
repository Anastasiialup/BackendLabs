<?php
// Збереження коментарів у файл
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $comment = $_POST["comment"];

    // Формування рядка з коментарем
    $commentLine = $name . ": " . $comment . PHP_EOL;

    // Збереження коментаря у файл
    $filename = "comments.txt";
    file_put_contents($filename, $commentLine, FILE_APPEND | LOCK_EX);
}

// Зчитування коментарів з файлу
$comments = [];
$filename = "comments.txt";
if (file_exists($filename)) {
    $comments = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завдання 3: Робота з файлами</title>
</head>
<body>
<!-- Форма для введення коментарів -->
<form action="" method="post">
    <label for="name">Ім'я:</label>
    <input type="text" name="name" required><br>
    <label for="comment">Коментар:</label>
    <textarea name="comment" required></textarea><br>
    <input type="submit" value="Додати коментар">
</form>

<!-- Виведення поточних коментарів у таблицю -->
<h2>Поточні коментарі:</h2>
<table border="1">
    <tr>
        <th>Ім'я</th>
        <th>Коментар</th>
    </tr>
    <?php foreach ($comments as $comment): ?>
        <?php list($name, $commentText) = explode(':', $comment, 2); ?>
        <tr>
            <td><?php echo htmlspecialchars(trim($name)); ?></td>
            <td><?php echo htmlspecialchars(trim($commentText)); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
