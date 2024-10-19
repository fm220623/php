<?php
// ЗАДАНИЕ 1
$age = 30;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Конструкции if-elseif-else</title>
</head>
<body>
	<h1>Конструкции if-elseif-else</h1>
	<?php
	// ЗАДАНИЕ 2
	if ($age >=1 && $age <=17) {
	    echo 'Вам еще рано работать';
	} elseif ($age >= 18 && $age <= 59) {
	    echo 'Вам еще работать и работать';
	} elseif ($age > 59) {
	    echo 'Вам пора на пенсию';
	} else {
	    echo 'Недопустимый возраст';
	}
	?> 
</body>
</html>