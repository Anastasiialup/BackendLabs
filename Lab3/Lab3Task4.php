<?php
// Створення файлів зі словами
$file1 = "file1.txt";
$file2 = "file2.txt";
$fileOnlyInFirst = "fileOnlyInFirst.txt";
$fileCommon = "fileCommon.txt";
$fileDuplicates = "fileDuplicates.txt";

$words1 = explode(" ", file_get_contents($file1));
$words2 = explode(" ", file_get_contents($file2));

// Рядки, які зустрічаються тільки в першому файлі
$onlyInFirst = array_diff($words1, $words2);
file_put_contents($fileOnlyInFirst, implode(" ", $onlyInFirst));

// Рядки, які зустрічаються в обох файлах
$commonWords = array_intersect($words1, $words2);
file_put_contents($fileCommon, implode(" ", $commonWords));

// Рядки, які зустрічаються в кожному файлі більше двох разів
$wordCounts1 = array_count_values($words1);
$wordCounts2 = array_count_values($words2);
$duplicates = array_filter($commonWords, function ($word) use ($wordCounts1, $wordCounts2) {
    return $wordCounts1[$word] > 2 && $wordCounts2[$word] > 2;
});
file_put_contents($fileDuplicates, implode(" ", $duplicates));

// Обробка форми видалення файлу
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileToDelete = $_POST["fileToDelete"];
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
        echo "Файл '$fileToDelete' був успішно видалений.";
    } else {
        echo "Файл '$fileToDelete' не існує.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Завдання 2: Робота з файлами</title>
</head>
<body>
<!-- Форма для введення ім'я файла для видалення -->
<form action="" method="post">
    <label for="fileToDelete">Введіть ім'я файла для видалення:</label>
    <input type="text" name="fileToDelete" required>
    <input type="submit" value="Видалити файл">
</form>
</body>
</html>
