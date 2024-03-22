<form action="process.php" method="post">
    <label for="login">Логін:</label>
    <input type="text" id="login" name="login" required><br>
    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Створити">
    <button type="button" onclick="window.location.href='delete.php'">Видалити</button>
</form>
