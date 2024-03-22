<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Font Size Selection</title>
</head>
<body>
<?php
// Перевірка, чи була вибрана опція розміру шрифту
if (isset($_COOKIE['fontSize'])) {
    $fontSize = $_COOKIE['fontSize'];
} else {
    $fontSize = 'medium'; // Значення за замовчуванням
}
?>

<p style="font-size: <?php echo $fontSize; ?>">
    Текст з обраним розміром шрифту.
</p>

<p>
    <a href="set_font_size.php?size=large">Великий шрифт</a> |
    <a href="set_font_size.php?size=medium">Середній шрифт</a> |
    <a href="set_font_size.php?size=small">Маленький шрифт</a>
</p>
</body>
</html>