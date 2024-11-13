<?php
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

listFunctions();
?>
