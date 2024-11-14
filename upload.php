<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Загрузка файла на сервер</title>
</head>
<body>
<div>
    <?php
    // Переменная для хранения информации о загруженном файле
    $uploadedFilePath = '';

    // Проверяем, отправлялся ли файл на сервер
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fupload'])) {
        $file = $_FILES['fupload'];

        // Выводим информацию о файле
        echo "Имя файла: " . htmlspecialchars($file['name']) . "<br>";
        echo "Размер файла: " . $file['size'] . " байт<br>";
        echo "Имя временного файла: " . htmlspecialchars($file['tmp_name']) . "<br>";
        echo "Код ошибки: " . $file['error'] . "<br>";

        // Проверяем тип файла
        if ($file['error'] === UPLOAD_ERR_OK) {
            // Проверяем, что временное имя файла не пустое
            if (!empty($file['tmp_name'])) {
                $fileType = mime_content_type($file['tmp_name']);
                echo "Тип файла: " . htmlspecialchars($fileType) . "<br>";

                // Если файл типа "image/jpeg"
                if ($fileType === 'image/jpeg') {
                    // Генерируем MD5-хеш имени файла
                    $newFileName = md5($file['name']) . '.jpg';
                    // Перемещаем файл в директорию upload
                    if (move_uploaded_file($file['tmp_name'], 'upload/' . $newFileName)) {
                        $uploadedFilePath = 'upload/' . $newFileName; // Сохраняем путь к загруженному файлу для отображения
                        echo "Файл успешно загружен.<br>";
                    } else {
                        echo "Ошибка при перемещении файла.";
                    }
                } else {
                    echo "Загруженный файл не является изображением JPEG.";
                }
            } else {
                echo "Временное имя файла пустое. Проверьте настройки загрузки.";
            }
        } else {
            echo "Ошибка при загрузке файла: " . $file['error'];
        }
    }
    ?>
</div>
<form enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <p>
        <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
        <input type="file" name="fupload" required><br>
        <button type="submit">Загрузить</button>
    </p>
</form>

<?php
// Если файл успешно загружен, выводим его
if ($uploadedFilePath) {
    echo "<h3>Загруженное изображение:</h3>";
    echo "<img src='" . htmlspecialchars($uploadedFilePath) . "' alt='Загруженное изображение' style='max-width: 100%; height: auto;'><br>";
}
?>
</body>
</html>