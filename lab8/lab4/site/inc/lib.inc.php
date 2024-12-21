<?php
/**
 * Генерирует HTML-таблицу с заданными количеством столбцов и строк.
 *
 * Таблица заполняется произведениями индексов строки и столбца.
 * Также выводится количество вызовов этой функции на каждой странице.
 *
 * @param int $cols Количество столбцов таблицы (по умолчанию 10).
 * @param int $rows Количество строк таблицы (по умолчанию 10).
 * @param string $color Цвет фона для таблицы и заголовков (по умолчанию 'yellow').
 * @return int Возвращает количество вызовов этой функции.
 */
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

/**
 * Генерирует меню в виде списка (горизонтальное или вертикальное).
 *
 * @param array $menu Ассоциативный массив с элементами меню. Каждый элемент должен
 *                    содержать ключи 'href' (ссылка) и 'link' (текст ссылки).
 * @param bool $vertical Определяет, будет ли меню вертикальным (по умолчанию true).
 * @return void
 */
function getMenu(array $menu, bool $vertical = true): void {
    echo '<ul class="menu' . ($vertical ? ' vertical' : ' horizontal') . '">';
    foreach ($menu as $item) {
        echo "<li><a href='{$item['href']}'>{$item['link']}</a></li>";
    }
    echo '</ul>';
}
?>
