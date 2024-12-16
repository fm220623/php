<?php
/**
 * Функция listFunctions выводит список всех загруженных расширений PHP и их функций.
 *
 * Для каждого загруженного расширения вызывается функция get_extension_funcs, 
 * чтобы получить список доступных функций этого расширения.
 * Затем список функций выводится в виде массива с индексами и названиями функций.
 * Если у расширения нет функций, выводится сообщение об этом.
 *
 * @return void
 */
function listFunctions() {
    $extensions = get_loaded_extensions();
    
    echo "<h1>Загруженные модули</h1><br>";
    
    // Проходим по каждому расширению
    foreach ($extensions as $extension) {
        $functions = get_extension_funcs($extension);
        
        echo "<h2><strong>" . $extension . "</strong></h2>";
        echo "Array<br>(" . "<br>";
        
        if ($functions !== false) {
            foreach ($functions as $index => $function) {
                echo "    [" . $index . "] => " . $function . "<br>";
            }
        } else {
            echo "    [0] => нет функций.<br>";
        }
        
        echo ")<br><br>";
    }
}

// Вызов функции для отображения списка функций расширений
listFunctions();
?>