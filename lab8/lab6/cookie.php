<?php
$visit_count = 0;

// Проверяем, есть ли куки с количеством посещений
if (isset($_COOKIE['visit_count'])) {
    $visit_count = (int)$_COOKIE['visit_count'] + 1;
} else {
    $visit_count = 1;
}

// Устанавливаем куки с количеством посещений на 1 день
setcookie('visit_count', $visit_count, time() + 86400);

$last_visit = '';

// Проверяем, есть ли куки с датой последнего посещения
if (isset($_COOKIE['last_visit'])) {
    $last_visit = htmlspecialchars(trim($_COOKIE['last_visit']));
} 

// Устанавливаем куки с датой последнего посещения на 1 день
setcookie('last_visit', date('d-m-Y H:i:s'), time() + 86400);

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Последний визит</title>
</head>
<body>

<h1>Последний визит</h1>

<?php
if ($visit_count === 1) {
    echo "Добро пожаловать!";
} else {
    echo "Вы зашли на страницу $visit_count раз.<br>";
    echo "Последнее посещение: $last_visit";
}
?>

</body>
</html>
