<?php
declare(strict_types=1);

// Подключение к базе данных
require_once 'config.php';

// Подключение к MySQL
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Установка кодировки соединения
mysqli_set_charset($conn, DB_CHARSET);

// Задание 1: Приём данных от пользователя и вставка новой записи
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['msg'])) {
        // Фильтрация данных
        $name = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['name'])));
        $email = mysqli_real_escape_string($conn, htmlspecialchars(trim($_POST['email'])));
        // Разрешить некоторые HTML-теги в сообщении, например <b>, <i>, <h1>, <h2>, <p>, <br>
        $msg = mysqli_real_escape_string($conn, strip_tags(trim($_POST['msg']), '<b><i><h1><h2><p><br>'));

        // SQL-запрос на вставку
        $sql = "INSERT INTO msgs (name, email, msg) VALUES ('$name', '$email', '$msg')";
        if (mysqli_query($conn, $sql)) {
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        } else {
            echo "Ошибка: " . mysqli_error($conn);
        }
    }
}

// Задание 3: Удаление записи
if (isset($_GET['delete_id'])) {
    $delete_id = (int) $_GET['delete_id'];
    $sql = "DELETE FROM msgs WHERE id = $delete_id";
    if (mysqli_query($conn, $sql)) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo "Ошибка удаления: " . mysqli_error($conn);
    }
}

// Задание 2: Выборка данных
$sql = "SELECT * FROM msgs ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Гостевая книга</title>
</head>
<body>
<h1>Гостевая книга</h1>

<!-- Форма для добавления сообщений -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Ваше имя:<br>
    <input type="text" name="name" required><br>
    Ваш E-mail:<br>
    <input type="email" name="email" required><br>
    Сообщение:<br>
    <textarea name="msg" cols="50" rows="5" required></textarea><br>
    <br>
    <input type="submit" value="Добавить!">
</form>

<hr>

<h2>Сообщения</h2>

<?php
if ($result && mysqli_num_rows($result) > 0) {
    echo "<p>Всего сообщений: " . mysqli_num_rows($result) . "</p>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<p><strong>Автор:</strong> " . htmlspecialchars($row['name']) . " (" . htmlspecialchars($row['email']) . ")</p>";
        // Вывод сообщения без htmlspecialchars, чтобы сохранялись HTML-теги
        echo "<p><strong>Сообщение:</strong> " . nl2br($row['msg']) . "</p>";
        echo "<p><a href='?delete_id=" . $row['id'] . "' onclick='return confirm(\"Удалить сообщение?\");'>Удалить</a></p>";
        echo "</div><hr>";
    }
} else {
    echo "<p>Сообщений пока нет.</p>";
}

// Закрытие соединения с базой данных
mysqli_close($conn);
?>
</body>
</html>
