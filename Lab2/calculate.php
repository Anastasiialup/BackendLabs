<?php

include('Function/func.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $x = $_POST['x'];
    $y = $_POST['y'];

    echo "<p><strong>Results:</strong></p>";

    echo "<table border='1'>
            <tr>
                <th>Operation</th>
                <th>Result</th>
            </tr>";

    // Calculate sin
    echo "<tr><td>sin($x)</td><td>" . my_sin($x) . "</td></tr>";

    // Calculate cos
    echo "<tr><td>cos($x)</td><td>" . my_cos($x) . "</td></tr>";

    // Calculate tan
    echo "<tr><td>tan($x)</td><td>" . my_tan($x) . "</td></tr>";

    // Calculate pow
    echo "<tr><td>pow($x, $y)</td><td>" . my_pow($x, $y) . "</td></tr>";

    // Calculate factorial
    echo "<tr><td>$x!</td><td>" . my_factorial($x) . "</td></tr>";

    echo "</table>";
}

?>
