<?php
    // ЗАДАНИЕ 1
    $cols = 5; 
    $rows = 6; 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Таблица умножения</title>
    <style>
        table {
            border: 2px solid black;
            border-collapse: collapse;
        }
        th,
        td {
            padding: 10px;
            border: 1px solid black;
            text-align: center; 
        }
        th {
            background-color: yellow;
            font-weight: bold; 
        }
        .bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Таблица умножения</h1>
    <table>
        <?php
        // ЗАДАНИЕ 2
        echo "<tr class='bold'><th></th>";
        for ($c = 1; $c <= $cols; $c++) {
            echo "<th class='bold'>$c</th>"; 
        }
        echo "</tr>";
        for ($r = 1; $r <= $rows; $r++) {
            echo "<tr>";
            echo "<th class='bold'>$r</th>";
            for ($c = 1; $c <= $cols; $c++) {
                echo "<td>" . ($r * $c) . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
