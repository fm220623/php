<?php
declare(strict_types=1);
// Устанавливаем константу для хранения имени файла
define('GUESTS_FILE', 'db/guests.txt');

// Проверяем, отправлялась ли форма и корректно ли отправлены данные из формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Фильтруем полученные значения
    $fname = trim(htmlspecialchars($_POST['fname']));
    $lname = trim(htmlspecialchars($_POST['lname']));
    
    // Проверяем, что оба поля не пустые
    if (!empty($fname) && !empty($lname)) {
        // Сформируем строку для записи в файл
        $entry = $fname . ' ' . $lname . PHP_EOL;

        // Открываем соединение с файлом и записываем в него строку
        file_put_contents(GUESTS_FILE, $entry, FILE_APPEND | LOCK_EX);

        // Перезапрашиваем текущую страницу
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        // Выводим сообщение об ошибке, если поля пустые
        $error = "Пожалуйста, заполните оба поля: Имя и Фамилия.";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Работа с файлами</title>
</head>
<body>

<h1>Заполните форму</h1>

<?php
// Если есть ошибка, выводим её
if (!empty($error)) {
    echo "<p style='color: red;'>$error</p>";
}
?>

<form method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    Имя: <input type="text" name="fname" required value="<?= isset($fname) ? htmlspecialchars($fname) : '' ?>"><br>
    Фамилия: <input type="text" name="lname" required value="<?= isset($lname) ? htmlspecialchars($lname) : '' ?>"><br>
    <br>
    <input type="submit" value="Отправить!">
</form>

<?php
// Проверяем, существует ли файл с информацией о пользователях
if (file_exists(GUESTS_FILE)) {
    // Получаем все содержимое файла в виде массива строк
    $lines = file(GUESTS_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    // Выводим все строки файла с порядковым номером строки
    foreach ($lines as $index => $line) {
        echo ($index + 1) . '. ' . $line . '<br>';
    }
    
    // Выводим размер файла в байтах
    echo '<br>Размер файла: ' . filesize(GUESTS_FILE) . ' байт.';
} else {
    echo 'Нет записей.';
}
?>

</body>
</html>