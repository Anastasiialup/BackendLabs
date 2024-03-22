<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];

// Перевірка логіна та пароля

    $directory = "./$login";
    if (is_dir($directory)) {
// Викликаємоо функцію для вилучення папки з усім вмістом
        $success = deleteDir($directory);
        if ($success) {
            echo "Папка $login та її вміст успішно вилучені!";
        } else {
            echo "Помилка: Неможливо вилучити папку $login!";
        }
    } else {
        echo "Помилка: Папка $login не знайдена!";
    }
}

// Функція для видалення папки з усім вмістом
function deleteDir($dirPath) {
    if (!is_dir($dirPath)) {
        return false;
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
    return true;
}
?>
