<?php
// ЗАДАНИЕ 1
$result = null;

// Проверка, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Фильтрация и получение значений
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = filter_input(INPUT_POST, 'operator', FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Изменено на FILTER_SANITIZE_FULL_SPECIAL_CHARS

    // Проверка, что оба числа валидны
    if ($num1 === false || $num2 === false) {
        echo "Пожалуйста, введите корректные числа.";
    } else {
        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 == 0) {
                    echo "Ошибка: Деление на ноль невозможно.";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                echo "Неизвестный оператор.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Калькулятор</title>
</head>
<body>

<h1>Калькулятор</h1>

<?php
// ЗАДАНИЕ 2
if (isset($result)) {
    echo "<h2>Результат: " . htmlspecialchars($result) . "</h2>";
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<p><label for="num1">Число 1</label><br>
<input type="text" name="num1" id="num1" required></p>

<p><label for="operator">Оператор</label><br>
<select name="operator" id="operator">
    <option value="+" selected >+</option>
    <option value="-">-</option>
    <option value="*">*</option>
    <option value="/">/</option>
</select></p>

<p><label for="num2">Число 2</label><br>
<input type="text" name="num2" id="num2" required></p>

<button type="submit">Считать!</button>

</form>

</body>
</html>
