<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Перевірка існування папки
    $directory = "./$login";
    if (!is_dir($directory)) {
        // Створення папки
        mkdir($directory);

        // Створення підпапок
        mkdir("$directory/video");
        mkdir("$directory/music");
        mkdir("$directory/photo");

        // Створення декількох файлів у підпапках
        file_put_contents("$directory/video/video1.txt", "Video File 1 Content");
        file_put_contents("$directory/music/music1.txt", "Music File 1 Content");
        file_put_contents("$directory/photo/photo1.txt", "Photo File 1 Content");

        echo "Папка $login успішно створена!";
    } else {
        echo "Папка $login вже існує!";
    }
}
?>
