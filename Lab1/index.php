<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laba1</title>
</head>
<body>

<style>
    .bold { font-weight: bold; }
    .underline { text-decoration: underline; }
    .italic { font-style: italic; }
</style>

<?php

// Завдання 2
echo '<p>Полину в мріях в купель океану,<br>';
echo 'Відчую <span class="bold">шовковистість</span> глибини,<br>';
echo '&nbsp;Чарівні мушлі з дна собі дістану,<br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;Щоб <span class="italic"><span class="bold">взимку</span></span><br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="underline">тішили</span><br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;мене<br>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;вони…</p>';

// Завдання 3
$amountInHryvnia = 900;
$exchangeRate = 0.026; // Курс долара
$amountInDollars = $amountInHryvnia * $exchangeRate;

echo "<p>{$amountInHryvnia} грн. можна обміняти на {$amountInDollars} долар</p>";

// Завдання 4
$monthNumber = 2; // Візьмемо для лютого
$season = '';

if ($monthNumber >= 1 && $monthNumber <= 12) {
    if ($monthNumber >= 3 && $monthNumber <= 5) {
        $season = 'весна';
    } elseif ($monthNumber >= 6 && $monthNumber <= 8) {
        $season = 'літо';
    } elseif ($monthNumber >= 9 && $monthNumber <= 11) {
        $season = 'осінь';
    } else {
        $season = 'зима';
    }

    echo "<p>Місяць з номером {$monthNumber} належить до пори року {$season}</p>";
} else {
    echo "<p>Неправильний номер місяця. Введіть число від 1 до 12.</p>";
}

// Завдання 5
$char = isset($_POST['char']) ? $_POST['char'] : '';

if (!empty($char)) {
    $charType = '';

    switch (strtolower($char)) {
        case 'а':
        case 'о':
        case 'у':
        case 'и':
        case 'і':
        case 'е':
            $charType = 'голосний';
            break;
        default:
            $charType = 'приголосний';
    }

    echo "<p>Цей символ '{$char}' є {$charType}.</p>";
} else {
    echo '<form method="post">';
    echo '<label for="char">Введіть букву: </label>';
    echo '<input type="text" name="char" id="char" maxlength="1">';
    echo '<input type="submit" value="Визначити тип">';
    echo '</form>';
}

// Завдання 6
$customNumber = isset($_POST['customNumber']) ? $_POST['customNumber'] : '';

if (!empty($customNumber) && is_numeric($customNumber) && strlen($customNumber) == 3) {
    $digitSum = array_sum(str_split($customNumber));
    $reversedNumber = strrev($customNumber);

    echo "<p>1. Сума цифр числа {$customNumber}: {$digitSum}</p>";
    echo "<p>2. Число в зворотному порядку: {$reversedNumber}</p>";

    $digits = str_split($customNumber);
    rsort($digits);
    $maxNumber = implode('', $digits);

    echo "<p>3. Найбільше число, утворене перестановкою цифр: {$maxNumber}</p>";
} else {
    echo '<form method="post">';
    echo '<label for="customNumber">Введіть тризначне число: </label>';
    echo '<input type="text" name="customNumber" id="customNumber" maxlength="3">';
    echo '<input type="submit" value="Обчислити">';
    echo '</form>';
}

// Завдання 7
if (isset($_POST['rows']) && isset($_POST['columns'])) {
    $rows = (int)$_POST['rows'];
    $columns = (int)$_POST['columns'];

    if ($rows > 0 && $columns > 0) {
        printColorTable($rows, $columns);
    } else {
        echo '<p>Введіть кількість рядків та стовпців.</p>';
    }
} else {
    echo '<form method="post">';
    echo '<label for="rows">Введіть кількість рядків: </label>';
    echo '<input type="number" name="rows" id="rows" min="1" required>';
    echo '<label for="columns">Введіть кількість стовпців: </label>';
    echo '<input type="number" name="columns" id="columns" min="1" required>';
    echo '<input type="submit" value="Вивести таблицю">';
    echo '</form>';
}

// Завдання 7 - функція для виведення таблиці
function printColorTable($rows, $columns) {
    echo '<table border="1" cellpadding="5">';
    for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $columns; $j++) {
            $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF)); // Генерація випадкового кольору
            echo "<td style='background-color: {$color};'>{$i} x {$j}</td>";
        }
        echo '</tr>';
    }
    echo '</table>';
}

// Завдання 7 - функція для виведення червоних квадратів
function printRedSquares($n) {
    echo '<div style="position: relative; background-color: black; width: 500px; height: 500px;">';
    for ($i = 0; $i < $n; $i++) {
        $size = mt_rand(20, 100);
        $positionX = mt_rand(0, 400);
        $positionY = mt_rand(0, 400);
        echo "<div style='position: absolute; background-color: red; width: {$size}px; height: {$size}px; top: {$positionY}px; left: {$positionX}px;'></div>";
    }
    echo '</div>';
}

// Завдання 7 - користувацький ввід
if (isset($_POST['numRedSquares'])) {
    $numRedSquares = (int)$_POST['numRedSquares'];

    if ($numRedSquares > 0) {
        printRedSquares($numRedSquares);
    } else {
        echo '<p>Введіть правильну кількість червоних квадратів, яка буде додатнім числом більше за 0.</p>';
    }
} else {
    echo '<form method="post">';
    echo '<label for="numRedSquares">Введіть кількість червоних квадратів: </label>';
    echo '<input type="number" name="numRedSquares" id="numRedSquares" min="1" required>';
    echo '<input type="submit" value="Вивести червоні квадрати">';
    echo '</form>';
}

?>
</body>
</html>
