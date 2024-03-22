<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    $gender = $_POST["gender"];
    $cities = $_POST["cities"];
    $gemes = $_POST["gemes"];
    $about = $_POST["about"];
    $photo = $_FILES["photo"];
    $_SESSION["login"] = $login;
    $_SESSION["password"] = $password;
    $_SESSION["password2"] = $password2;
    $_SESSION["gender"] = $gender;
    $_SESSION["cities"] = $cities;
    $_SESSION["gemes"] = $gemes;
    $_SESSION["about"] = $about;

    echo 'Логін:' . $login . '<br>';
    echo 'Пароль:' . checkpassword($password, $password2) . '<br>';
    echo 'Стать:' . $gender . '<br>';
    echo 'Місто:' . $cities . '<br>';
    echo 'Улюблені ігри:' . '<br>';
    foreach ($gemes as $geme) {
        echo $geme . '<br>';
    }
    echo 'Про себе:' . $about . '<br>';
    echo ' Фотографія ';

    $targetDir = "pics/";
    $targetFile = $targetDir . basename($photo["name"]);

    if (move_uploaded_file($photo["tmp_name"], $targetFile)) {
        echo "<img src='" . $targetFile . "' alt='Завантажене зображення'><br>";
    } else {
        echo "Помилка при завантаженні зображення.<br>";
    }

    echo "<a href='main.php'> main page </a>";
}

function checkpassword($password, $password2)
{
    if (strlen($password) !== strlen($password2)) {
        return 'Паролі не співпадають по довжині';
    }

    $length = strlen($password);
    $arrindex = array();

    for ($i = 0; $i < $length; $i++) {
        if ($password[$i] !== $password2[$i]) {
            $arrindex[] = $i;
        }
    }

    return count($arrindex) > 0 ?
        "Паролі не співпадають в символах " . implode(', ', $arrindex) :
        'Паролі співпадають';
}

?>
