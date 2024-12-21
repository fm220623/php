<?php
declare(strict_types=1);
// Задание 2: Вывод списка посещённых страниц

// Проверяем, существует ли массив посещённых страниц в сессии
if (isset($_SESSION['visited_pages']) && !empty($_SESSION['visited_pages'])) {
    echo '<h3>Список посещённых страниц:</h3>';
    echo '<ul>';
    
    // Проходим по всем посещённым страницам и выводим их
    foreach ($_SESSION['visited_pages'] as $page) {
        echo '<li>' . htmlspecialchars($page) . '</li>';
    }
    
    echo '</ul>';
} else {
    echo '<p>Список посещённых страниц пуст.</p>';
}
?>