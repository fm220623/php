<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cols = abs((int)$_POST['cols']);
    $rows = abs((int)$_POST['rows']);
    $color = trim(strip_tags($_POST['color']));
} else {
    // Установка значений по умолчанию, если форма не была отправлена
    $cols = 10;
    $rows = 10;
    $color = '#ffff00';
}

// В случае, если значения были установлены из POST, используем их
$cols = ($cols) ? $cols : 10;
$rows = ($rows) ? $rows : 10;
$color = ($color) ? $color : '#ffff00';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Таблица умножения</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <img src="logo.png" width="130" height="80" alt="Наш логотип" class="logo">
    <span class="slogan">приходите к нам учиться</span>
  </header>
  <section>
    <h1>Таблица умножения</h1>
    <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
      <label>Количество колонок: </label>
      <br>
      <input name='cols' type='number' value='<?= htmlspecialchars($cols) ?>' required>
      <br>
      <label>Количество строк: </label>
      <br>
      <input name='rows' type='number' value='<?= htmlspecialchars($rows) ?>' required>
      <br>
      <label>Цвет: </label>
      <br>
      <input name='color' type='color' value='<?= htmlspecialchars($color) ?>' list="listColors">
      <datalist id="listColors">
        <option>#ff0000</option>
        <option>#00ff00</option>
        <option>#0000ff</option>
      </datalist>
      <br>
      <br>
      <input type='submit' value='Создать'>
    </form>
    <br>
    <!-- Таблица -->
    <?php include 'inc/lib.inc.php'; 
    getTable($cols, $rows, $color); ?>
    <!-- Таблица -->
  </section>
  <nav>
    <h2>Навигация по сайту</h2>
    <ul>
      <li><a href='index.php'>Домой</a></li>
      <li><a href='about.php'>О нас</a></li>
      <li><a href='contact.php'>Контакты</a></li>
      <li><a href='table.php'>Таблица умножения</a></li>
      <li><a href='calculator.php'>Калькулятор</a></li>
    </ul>
  </nav>
  <footer>
    &copy; Супер Мега Веб-мастер, 2000 &ndash; 20xx
  </footer>
</body>
</html>