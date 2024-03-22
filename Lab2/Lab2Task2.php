<!DOCTYPE html>
<html>
<head>
    <title>PHP Tasks</title>
</head>
<body>

<!-- Завдання 2.1 -->
<?php
function findDuplicateElements($array) {
    $uniqueElements = array_unique($array);
    $duplicates = array_diff_assoc($array, $uniqueElements);

    echo "<p><strong>Завдання 2.1:</strong></p>";
    echo "<p>Масив: " . implode(', ', $array) . "</p>";
    echo "<p>Повторюючі елементи: " . implode(', ', $duplicates) . "</p>";
}

$arrayToCheck = [1, 2, 3, 4, 2, 5, 6, 3];
findDuplicateElements($arrayToCheck);
?>

<!-- Завдання 2.2 -->
<?php
function generateAnimalName($syllables) {
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $consonants = ['b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'];

    $name = '';
    for ($i = 0; $i < $syllables; $i++) {
        $name .= $consonants[rand(0, count($consonants) - 1)];
        $name .= $vowels[rand(0, count($vowels) - 1)];
    }

    return ucfirst($name);
}

$generatedAnimalName = generateAnimalName(2);
echo "<p><strong>Завдання 2.2:</strong></p>";
echo "<p>Згенероване ім'я тварини: $generatedAnimalName</p>";
?>

<!-- Завдання 2.3 -->
<?php
function createArray() {
    $length = rand(3, 7);
    $array = [];

    for ($i = 0; $i < $length; $i++) {
        $array[] = rand(10, 20);
    }

    return $array;
}

function mergeAndSortArrays($array1, $array2) {
    $mergedArray = array_merge($array1, $array2);
    $uniqueArray = array_unique($mergedArray);
    sort($uniqueArray);

    return $uniqueArray;
}

$array1 = createArray();
$array2 = createArray();

echo "<p><strong>Завдання 2.3:</strong></p>";
echo "<p>Масив 1: " . implode(', ', $array1) . "</p>";
echo "<p>Масив 2: " . implode(', ', $array2) . "</p>";

$mergedAndSortedArray = mergeAndSortArrays($array1, $array2);
echo "<p>Злитий та відсортований масив: " . implode(', ', $mergedAndSortedArray) . "</p>";
?>

<!-- Завдання 2.4 -->
<?php
function sortAssociativeArray($assocArray, $sortBy) {
    if ($sortBy === 'age') {
        arsort($assocArray);
    } elseif ($sortBy === 'name') {
        ksort($assocArray);
    }

    return $assocArray;
}

$userAges = ['Diona' => 10, 'Simon' => 37, 'Toma' => 25];
echo "<p><strong>Завдання 2.4:</strong></p>";
echo "<p>Не відсортований асоціативний масив:</p>";
echo "<pre>";
print_r($userAges);
echo "</pre>";

$sortedByAge = sortAssociativeArray($userAges, 'age');
echo "<p>Відсортований за віком масив:</p>";
echo "<pre>";
print_r($sortedByAge);
echo "</pre>";

$sortedByName = sortAssociativeArray($userAges, 'name');
echo "<p>Відсортований за ім'ям масив:</p>";
echo "<pre>";
print_r($sortedByName);
echo "</pre>";
?>
</body>
</html>
