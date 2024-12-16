<!DOCTYPE html>
<html>

<head>
  <title>Контакты</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <section>
    <!-- Заголовок -->
    <h1>Обратная связь</h1>
    <!-- Заголовок -->
    <!-- Область основного контента -->
    <h3>Адрес</h3>
    <address>123456 Москва, Малый Американский переулок 21</address>
    <h3>Задайте вопрос</h3>

    <?php
    // Проверка, была ли форма отправлена методом POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Фильтрация данных из полей
        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);
        $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);

        // Проверка, что оба поля заполнены
        if ($subject && $body) {
            // Адрес получателя 
            $to = 'igor_5074@mail.ru'; 

            // Заголовки для установки отправителя
            $headers = 'From: admin@center.ogu' . "\r\n";
            $headers .= 'Reply-To: admin@center.ogu' . "\r\n";
            $headers .= 'X-Mailer: PHP/' . phpversion();

            // Отправка письма
            if (mail($to, $subject, $body, $headers)) {
                echo "<p>Ваше сообщение успешно отправлено!</p>";
            } else {
                echo "<p>Произошла ошибка при отправке сообщения. Пожалуйста, попробуйте снова.</p>";
            }
        } else {
            echo "<p>Пожалуйста, заполните все поля формы.</p>";
        }
    }
    ?>

    <!-- Форма -->
    <form action="" method="post">
      <label>Тема письма: </label>
      <br>
      <input name="subject" type="text" size="50" required>
      <br>
      <label>Содержание: </label>
      <br>
      <textarea name="body" cols="50" rows="10" required></textarea>
      <br><br>
      <input type="submit" value="Отправить">
    </form>
    <!-- Область основного контента -->
  </section>

</body>

</html>
