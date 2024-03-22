<?php
session_start ();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['lang'])) {
        $lang = $_GET['lang'];

        setcookie('lang', $lang, time() + (6 * 30 * 24 * 60 * 60));
    } else {
        if (isset($_COOKIE['lang'])) {
            $lang = $_COOKIE['lang'];
        } else {
            $lang = 'ua';
        }
    }
}
$languages = array(
    'ua' => 'Українська',
    'uk' => 'Англійська',
    'pl' => 'Польська',
);

echo "Вибрана мова:" . $languages[$lang];


$login = isset ($_SESSION["login"]) ? $_SESSION["login"] : "";
$password = isset($_SESSION["password"]) ? $_SESSION["password"] : "";
$password2 = isset($_SESSION["password2"]) ? $_SESSION["password2"] : "";
$gender = isset ($_SESSION["gender"]) ? $_SESSION["gender"] : "";
$cities = isset ($_SESSION["cities"]) ? $_SESSION["cities"] : "";
$gemes = isset ($_SESSION["gemes"]) ? $_SESSION["gemes"] : array();
$about = isset ($_SESSION["about"]) ? $_SESSION["about"] : "";

?>
    <html>
    <header>
        <title> Зміна симвелів </title>
    </header>
<body>
<form action = "index.php" enctype="multipart/form-data" method = "post">
    <label for="login">Логін:</label><br>
    <input type = "text" name = "login"/><br>
    <label for="password">Пароль:</label><br>
    <input type = "password" name = "password"/><br>
    <label for="password2">Повторіть пароль:</label><br>
    <input type = "password" name = "password2"/><br>
    <label >Стать:</label><br>
    <label for="gender">Чоловік</label>
    <input type = "radio" name = "gender" value = "чоловік"/><br>
    <label for="gender">Жінка</label>
    <input type = "radio" name = "gender" value = "жінка"/><br>
    <label for="cities">Місто:</label><br>
    <select name ="cities" >
        <option value="Чернігів">Чернігів</option>
        <option value="Київ">Київ</option>
        <option value="Одеса">Одеса</option>
    </select><br>
    <label >Улюблені ігри:</label><br>
    <input type="checkbox" id="gemeFootball" name="gemes[]" value="Football">
    <label for="gemeFootball">Футбол</label><br>
    <input type="checkbox" id="gemeBasketball" name="gemes[]" value="Basketball">
    <label for="gemeBasketball">Баскетбол</label><br>
    <input type="checkbox" id="gemeVolleyball" name="gemes[]" value="Volleyball">
    <label for="gemeVolleyball">Волейбол</label><br>
    <input type="checkbox" id="gemeChess" name="gemes[]" value="Chess">
    <label for="gemeChess">Шахи</label><br>
    <input type="checkbox" id="gemeGenshinImpact" name="gemes[]" value="GenshinImpact">
    <label for="gemeGenshinImpact">Genshin Impact</label><br>
    <label for= "about">Про себе:</label><br>
    <textarea name = "about"></textarea><br>
    <label for="photo" >Фотографія:</label><br>
    <input type = "file" name = "photo"/><br>
    <input type = "submit" value = "Зареєструватися" />
</form>
    <a href="main.php?lang=ua"><img src="pics/ukr_icon.png" alt="Українська" width="50" height="50"></a>
    <a href="main.php?lang=uk"><img src="pics/eng_icon.png" alt="Англійська" width="50" height="50"></a>
    <a href="main.php?lang=pl"><img src="pics/pol_icon.png" alt="Польська" width="50" height="50"></a><?php
