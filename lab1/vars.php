<?php
// ЗАДАНИЕ 1
$name = 'Игарь';
$age = 20;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Переменные и вывод</title>
</head>
<body>
	<h1>Переменные и вывод</h1>
	// ЗАДАНИЕ 2
	<p><?php echo "Меня зовут: $name"; ?></p>
	<p><?php echo "Мне $age лет"; ?></p>
	<p><?php echo "Тип переменной \$name: " . gettype($name); ?></p>
	<p><?php echo "Тип переменной \$age: " . gettype($age); ?></p>
	
	<?php
	unset($name);
	unset($age);
	?> 
</body>
</html>