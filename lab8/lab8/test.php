<?php
require_once 'config.php';
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
} else {
    echo "Подключение успешно!";
}

mysqli_close($conn);
