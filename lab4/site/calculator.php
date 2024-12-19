<?php 
declare(strict_types=1);

// Переменные
$result = null;
$num1 = null;
$num2 = null;
$operator = '+';

// Проверка, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Фильтрация и получение значений
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = filter_input(INPUT_POST, 'operator', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Проверка валидности чисел
    if ($num1 === false || $num2 === false) {
        echo "<p style='color: red;'>Пожалуйста, введите корректные числа.</p>";
    } else {
        // Вычисление результата
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
                    echo "<p style='color: red;'>Ошибка: Деление на ноль невозможно.</p>";
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                echo "<p style='color: red;'>Неизвестный оператор.</p>";
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
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <img src="logo.png" width="130" height="80" alt="Наш логотип" class="logo">
        <span class="slogan">Приходите к нам учиться</span>
    </header>
    <section>
        <h1>Калькулятор</h1>

        <?php if (isset($result)): ?>
            <h2>Результат: <?= htmlspecialchars((string)$result) ?></h2>
        <?php endif; ?>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <p>
                <label for="num1">Число 1</label><br>
                <input type="text" name="num1" id="num1" required value="<?= isset($num1) ? htmlspecialchars((string)$num1) : '' ?>">
            </p>
            <p>
                <label for="operator">Оператор</label><br>
                <select name="operator" id="operator">
                    <option value="+" <?= (isset($operator) && $operator === '+') ? 'selected' : '' ?>>+</option>
                    <option value="-" <?= (isset($operator) && $operator === '-') ? 'selected' : '' ?>>-</option>
                    <option value="*" <?= (isset($operator) && $operator === '*') ? 'selected' : '' ?>>*</option>
                    <option value="/" <?= (isset($operator) && $operator === '/') ? 'selected' : '' ?>>/</option>
                </select>
            </p>
            <p>
                <label for="num2">Число 2</label><br>
                <input type="text" name="num2" id="num2" required value="<?= isset($num2) ? htmlspecialchars((string)$num2) : '' ?>">
            </p>
            <button type="submit">Считать!</button>
        </form>
    </section>
    <nav>
        <h2>Навигация по сайту</h2>
        <ul>
            <li><a href="index.php">Домой</a></li>
            <li><a href="about.php">О нас</a></li>
            <li><a href="contact.php">Контакты</a></li>
            <li><a href="table.php">Таблица умножения</a></li>
            <li><a href="calculator.php">Калькулятор</a></li>
        </ul>
    </nav>
    <footer>
        &copy; Супер Мега Веб-мастер, 2000 &ndash; 20xx
    </footer>
</body>
</html>
