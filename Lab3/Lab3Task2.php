<?php
// Початок або відновлення сесії
session_start();

// Обробка виходу з сесії
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('Location: Lab3Task2.php');
    exit();
}

// Перевірка, чи користувач вже авторизований
if (isset($_SESSION['login']) && $_SESSION['login'] === 'Admin') {
    $greeting = 'Добрий день, ' . $_SESSION['login'] . '!';
} else {
    $greeting = '';
}

// Обробка форми авторизації
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Перевірка логіну та паролю
    if ($login === 'Admin' && $password === 'password') {
        // Успішна авторизація
        $_SESSION['login'] = $login;
        $greeting = 'Добрий день, ' . $login . '!';
    } else {
        // Невірний логін або пароль
        $greeting = 'Невірний логін або пароль';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизація</title>
</head>
<body>
<h1>
    <?php echo $greeting; ?></h1>

<?php if (!isset($_SESSION['login']) || $_SESSION['login'] !== 'Admin') : ?>
    <!-- Форма авторизації -->
    <form method="post">
        <label for="login">Логін:</label>
        <input type="text" id="login" name="login" required>

        <label for="password">Пароль:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Увійти</button>
    </form>
<?php else : ?>
    <!-- Кнопка для виходу з сесії -->
    <a href="Lab3Task2.php?logout=true">Вийти з сесії</a>
<?php endif; ?>

</body>
</html>
