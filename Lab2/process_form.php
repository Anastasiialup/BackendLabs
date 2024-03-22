<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Зберегти дані форми у сесії
    $_SESSION['form_data'] = $_POST;

    // Зберегти значення фотографії у сесії (необхідно використовувати додаткові перевірки та обробку для завантаження файлів)
    if ($_FILES['photo']['error'] === 0) {
        $photoPath = 'uploads/' . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], $photoPath);
        $_SESSION['form_data']['photo_path'] = $photoPath;
    }

    // Перенаправити користувача на головну сторінку
    header('Location: index.php');
    exit;
}
?>
