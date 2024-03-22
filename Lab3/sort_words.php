<!-- sort_words.php -->

<?php
// Зчитування слів з файлу
$filename = 'words.txt';
$words = file_get_contents($filename);

// Розділення слів у масив
$wordArray = explode(' ', $words);

// Сортування за алфавітом
sort($wordArray);

// Запис відсортованих слів назад у файл
file_put_contents($filename, implode(' ', $wordArray));

echo "Слова відсортовані та записані у файл '$filename'.";
?>
