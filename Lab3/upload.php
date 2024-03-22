<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $targetDir = "uploads/"; // Каталог для збереження завантажених файлів
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Перевірка чи файл є зображенням
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "Файл є зображенням - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Файл не є зображенням.";
        $uploadOk = 0;
    }

    // Перевірка чи файл існує вже на сервері
    if (file_exists($targetFile)) {
        echo "Вибачте, файл з таким ім'ям вже існує.";
        $uploadOk = 0;
    }

    // Перевірка розміру файлу
    if ($_FILES["image"]["size"] > 500000) {
        echo "Вибачте, ваш файл завеликий.";
        $uploadOk = 0;
    }

    // Заборона завантаження файлів інших типів, крім зображень
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Вибачте, тільки файли з розширенням JPG, JPEG, PNG та GIF дозволені.";
        $uploadOk = 0;
    }

    // Перевірка чи $uploadOk не було змінено на 0 через помилки
    if ($uploadOk == 0) {
        echo "Вибачте, ваш файл не був завантажений.";
    } else {
        // Якщо все в порядку, спробуйте завантажити файл
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "Файл " . htmlspecialchars(basename($_FILES["image"]["name"])) . " успішно завантажено.";
        } else {
            echo "Виникла помилка при завантаженні файлу.";
        }
    }
} else {
    echo "Некоректний запит.";
}
?>
