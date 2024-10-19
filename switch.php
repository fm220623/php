<?php
// ЗАДАНИЕ 1
$day = 3;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Конструкция switch</title>
</head>
<body>
	<h1>Конструкция switch</h1>
	<?php
	// ЗАДАНИЕ 2
        switch($day) {
        case 1:
        case 2:
        case 3:
        case 4:
        case 5:
            echo 'Это рабочий день <br/>';
            break;
        case 6:
        case 7:
            echo 'Это выходной день <br/>';
            break;
        default:
            echo 'Неизвестный день <br/>';
    }
	// ЗАДАНИЕ 3
	$result = match (true) {
	    $day >= 1 && $day <= 5 => 'Это рабочий день',
	    $day == 6 || $day == 7 => 'Это выходной день',
	    default => 'неизвестный день',
	};
	
	echo $result;
	?> 
</body>
</html>