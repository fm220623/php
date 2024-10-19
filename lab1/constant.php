<?php
// ЗАДАНИЕ 1
define('CONSTANTA', '24645354');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Константы</title>
</head>
<body>
	<h1>Константы</h1>
	<?php
	// ЗАДАНИЕ 2
    if (defined('CONSTANTA')) {
        echo '<p>Значение константы CONSTANTA: ' . CONSTANTA . '</p>';
    } else {
        echo '<p>Константа Const не определена.</p>';
    }
	// ЗАДАНИЕ 3
    echo '<p>Текущая версия PHP: ' . PHP_VERSION . '</p>';
    echo '<p>Директория скрипта: ' . __DIR__ . '</p>';
	?>
</body>
</html>