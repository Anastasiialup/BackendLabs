<!DOCTYPE html>
<html>
<head>
    <title>PHP Task 1</title>
</head>
<body>

<!-- Завдання 1 -->
<form method="post">
    <label for="text">Текст:</label>
    <input type="text" name="text" id="text" required><br>

    <label for="find">Знайти:</label>
    <input type="text" name="find" id="find" required><br>

    <label for="replace">Замінити:</label>
    <input type="text" name="replace" id="replace" required><br>

    <input type="submit" value="Виконати">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["text"]) && isset($_POST["find"]) && isset($_POST["replace"])) {
    $text = $_POST["text"];
    $find = $_POST["find"];
    $replace = $_POST["replace"];

    if (!empty($find) && !is_null($find) && !empty($replace) && !is_null($replace) && !empty($text) && !is_null($text)) {
        $result = str_replace($find, $replace, $text);
        echo "<p>Результат: $result</p>";
    } else {
        echo "<p>Будь ласка, заповніть всі поля форми.</p>";
    }
}
?>

<!-- Завдання 2 -->
<form method="post">
    <label for="cities">Міста через пробіл:</label>
    <input type="text" name="cities" id="cities" required><br>

    <input type="submit" value="Відсортувати міста">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cities"])) {
    $cities = $_POST["cities"];

    if (!empty($cities) && !is_null($cities)) {
        $citiesArray = explode(" ", $cities);
        sort($citiesArray);
        $sortedCities = implode(" ", $citiesArray);
        echo "<p>Відсортовані міста: $sortedCities</p>";
    } else {
        echo "<p>Будь ласка, заповніть поле з містами.</p>";
    }
}
?>

<!-- Завдання 3 -->
<form method="post">
    <label for="filePath">Шлях до файлу:</label>
    <input type="text" name="filePath" id="filePath" required><br>

    <input type="submit" value="Витягти ім'я файлу без розширення">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["filePath"])) {
    $filePath = $_POST["filePath"];

    if (!empty($filePath) && !is_null($filePath)) {
        $fileName = pathinfo($filePath, PATHINFO_FILENAME);
        echo "<p>Ім'я файлу без розширення: $fileName</p>";
    } else {
        echo "<p>Будь ласка, заповніть поле з шляхом до файлу.</p>";
    }
}
?>

<!-- Завдання 4 -->
<form method="post">
    <label for="date1">Дата 1 (День-Місяць-Рік):</label>
    <input type="text" name="date1" id="date1" required><br>

    <label for="date2">Дата 2 (День-Місяць-Рік):</label>
    <input type="text" name="date2" id="date2" required><br>

    <input type="submit" value="Визначити кількість днів між датами">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["date1"]) && isset($_POST["date2"])) {
    $date1 = $_POST["date1"];
    $date2 = $_POST["date2"];

    if (!empty($date1) && !is_null($date1) && !empty($date2) && !is_null($date2)) {
        $daysDiff = (strtotime($date2) - strtotime($date1)) / (60 * 60 * 24);
        echo "<p>Кількість днів між датами: $daysDiff днів</p>";
    } else {
        echo "<p>Будь ласка, заповніть поля з датами.</p>";
    }
}
?>

<!-- Завдання 5 -->
<form method="post">
    <label for="password">Пароль:</label>
    <input type="password" name="password" id="password" required><br>

    <input type="submit" value="Перевірити пароль">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["password"])) {
    $userPassword = $_POST["password"];

    if (!empty($userPassword) && !is_null($userPassword)) {
        function isPasswordStrong($password) {
            return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+]).{8,}$/', $password);
        }

        if (isPasswordStrong($userPassword)) {
            echo "<p>Пароль є достатньо міцним.</p>";
        } else {
            echo "<p>Пароль не є достатньо міцним.</p>";
        }
    } else {
        echo "<p>Будь ласка, введіть пароль.</p>";
    }
}
?>

<?php
function generatePassword($length = 12) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+';
    $password = '';

    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
    }

    return $password;
}

// Використання функції для генерації паролю
$generatedPassword = generatePassword();

echo "Згенерований пароль: $generatedPassword";
?>


</body>
</html>
