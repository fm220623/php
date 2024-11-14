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

function getMenu(array $menu, bool $vertical = true): void {
    echo '<ul class="menu' . ($vertical ? ' vertical' : ' horizontal') . '">';
    foreach ($menu as $item) {
        echo "<li><a href='{$item['href']}'>{$item['link']}</a></li>";
    }
    echo '</ul>';
}
?>