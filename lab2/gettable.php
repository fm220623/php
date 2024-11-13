<?php
function getTable(int $cols = 10, int $rows = 10, string $color = 'yellow'): int {
    static $count = 0;
    $count++;

    echo "<table>";
    
    // Заголовок таблицы
    echo "<tr style='background-color: $color;'><th style='background-color: $color;'></th>";
    for ($c = 1; $c <= $cols; $c++) {
        echo "<th style='background-color: $color;'>$c</th>"; 
    }
    echo "</tr>";

    // Заполнение таблицы
    for ($r = 1; $r <= $rows; $r++) {
        echo "<tr>"; // Начинаем новую строку
        echo "<th style='background-color: $color;'>$r</th>";
        for ($c = 1; $c <= $cols; $c++) {
            echo "<td>" . ($r * $c) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";

    return $count;
}
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
      font-weight: bold; 
    }
    
    .bold {
      font-weight: bold;
    }
  </style>
</head>
<body> 
  <h1>Таблица умножения</h1>
  
  <?php
  // ЗАДАНИЕ 3
  getTable(); // 0
  getTable(4); // 1 (cols)
  getTable(4, 5); // 2 (cols+rows)

  $totalCalls = getTable(3, 3, 'lightblue');
  echo "<p>Таблица была отрисована $totalCalls раз(а).</p>";
  ?>
</body>
</html>
