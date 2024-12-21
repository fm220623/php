<?php
    // ЗАДАНИЕ 1
    // Создаем строковые переменные
    $login = ' User ';
    $password = 'megaP@ssw0rd';
    $name = 'иван';
    $email = 'ivan@petrov.ru';
    $code = '<?=$login?>';
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Использование функций обработки строк</title>
</head>
<body>
<?php
    /**
     * Функция checkPass проверяет сложность пароля.
     *
     * Пароль должен содержать минимум 8 символов, включать хотя бы одну заглавную букву,
     * одну строчную букву и хотя бы одну цифру.
     * Если пароль соответствует этим требованиям, функция возвращает true, иначе false.
     *
     * @param string $password Пароль, который необходимо проверить
     * @return bool Возвращает true, если пароль соответствует требованиям, иначе false
     */
    // Функция проверки сложности пароля
    function checkPass($password) {
        if (strlen($password) < 8) {
            return false; // Длина пароля меньше 8 символов
        }
        if (!preg_match('/[A-Z]/', $password)) {
            return false; // Нет заглавной буквы
        }
        if (!preg_match('/[a-z]/', $password)) {
            return false; // Нет строчной буквы
        }
        if (!preg_match('/[0-9]/', $password)) {
            return false; // Нет цифры
        }
        return true; // Пароль соответствует всем критериям
    }

    // Проверка сложности пароля
    $isPasswordComplex = checkPass($password);
    if ($isPasswordComplex) {
        echo "Пароль соответствует требованиям сложности.<br>";
    } else {
        echo "Пароль не соответствует требованиям сложности.<br>";
    }

    // Преобразование первого символа имени в заглавный
    $name = ucfirst($name);

    // Проверка корректности email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email '$email' корректен.<br>";
    } else {
        echo "Email '$email' некорректен.<br>";
    }

    // Вывод значения переменной $code
    echo "Значение переменной code: " . htmlspecialchars($code) . "<br>";
?>
</body>
</html>
