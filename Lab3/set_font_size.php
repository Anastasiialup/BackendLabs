<?php
if (isset($_GET['size'])) {
    $fontSize = $_GET['size'];

    // Встановлення cookie на 30 днів
    setcookie('fontSize', $fontSize, time() + (30 * 24 * 60 * 60), '/');
}

// Перенаправлення на головну сторінку
header('Location: index.php');
exit();
?>
