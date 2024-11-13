<?php
$constants = get_defined_constants(true);
header('Content-Type: text/html; charset=utf-8');

foreach ($constants as $category => $constArray) {
    echo "[$category] => Array<br>";
    echo "(&lt;<br>&gt;"; //HTML
    foreach ($constArray as $name => $value) {
        echo "    [$name] => ";
        if (is_bool($value)) {
            echo $value ? 'true' : 'false';
        } elseif (is_null($value)) {
            echo 'NULL';
        } else {
            echo $value;
        }
        echo "<br>"; 
    }
    echo ")<br><br>"; //доп отступ
}
?>