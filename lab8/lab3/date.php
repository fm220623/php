<?php
// ЗАДАНИЕ 1
$now = time();
$birthdayMonthDay = '03-11'; // День и месяц дня рождения (без года)
$currentYear = date('Y');
$currentDate = getdate($now);
$hour = $currentDate['hours'];

// Вычисление следующего дня рождения
$nextBirthday = strtotime("$currentYear-$birthdayMonthDay");
if ($nextBirthday < $now) {
    $nextBirthday = strtotime(($currentYear + 1) . "-$birthdayMonthDay");
}

$timeRemaining = $nextBirthday - $now;
$days = floor($timeRemaining / (60 * 60 * 24));
$hours = floor(($timeRemaining % (60 * 60 * 24)) / (60 * 60));
$minutes = floor(($timeRemaining % (60 * 60)) / 60);
$seconds = $timeRemaining % 60;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Использование функций даты и времени</title>
</head>
<body>
	<h1>Использование функций даты и времени</h1>
	<?php
	// ЗАДАНИЕ 2
	setlocale(LC_TIME, 'ru_RU.UTF-8');

	if ($hour >= 0 && $hour < 6) {
		$welcome = 'Доброй ночи';
	} elseif ($hour >= 6 && $hour < 12) {
		$welcome = 'Доброе утро';
	} elseif ($hour >= 12 && $hour < 18) {
		$welcome = 'Добрый день';
	} elseif ($hour >= 18 && $hour < 23) {
		$welcome = 'Добрый вечер';
	} else {
		$welcome = 'Доброй ночи';
	}
	echo "<p>$welcome</p>";

	$format = IntlDateFormatter::create(
		'ru_RU',
		IntlDateFormatter::LONG,
		IntlDateFormatter::NONE,
		date_default_timezone_get(),
		IntlDateFormatter::GREGORIAN,
		"Сегодня d MMMM yyyy года, EEEE HH:mm:ss"
	);
	echo "<p>" . $format->format($now) . "</p>";

	echo "<p>До моего дня рождения осталось:</p>";
	echo "<p>$days дней, $hours часов, $minutes минут и $seconds секунд.</p>";
	?>
</body>
</html>
