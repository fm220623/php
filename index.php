
<?php
include 'inc/lib.inc.php';
include 'inc/data.inc.php';
		/*
		ЗАДАНИЕ 1
		- В папке сайта создайте папку под названием inc
		- В текстовом редакторе создайте новый файл
		- Перенесите в файл php-блок с функцией getTable()
		- Перенесите в файл функцию getMenu()
		- Сохраните файл под именем lib.inc.php в папке inc
		- В файле table.php в блоке <!--Таблица --> (там, где ранее отрисовывалась таблица) отрисуйте таблицу умножения вызывая функцию getTable() с произвольными параметрами
		- В файле index.php в блоке <!--Меню --> (там, где ранее отрисовывалось меню) отрисуйте меню навигации вызвав функцию getMenu()с необходимыми параметрами
		- В текстовом редакторе создайте новый файл и создайте в нем php-блок
		- Перенесите в файл весь php-код, необходимый для работы функций getTable() и getMenu() (значения параметров функций)
		- Сохраните файл под именем data.inc.php в папке inc
		- В текстовом редакторе создайте новый файл
		- Перенесите в файл всё, что находится внутри блока <!--Верхняя часть страницы --> из файла index.php
		- Сохраните файл под именем top.inc.php в папке inc
		- В текстовом редакторе создайте новый файл
		- Перенесите в файл всё, что находится внутри блока <!--Навигация --> из файла index.php
		- Сохраните файл под именем menu.inc.php в папке inc
		- В текстовом редакторе создайте новый файл
		- Перенесите в файл всё, что находится внутри блока <!--Нижняя часть страницы --> из файла index.php
		- Сохраните файл под именем bottom.inc.php в папке inc
		- В текстовом редакторе создайте новый файл
		- Перенесите в файл всё, что находится внутри блока <!--Область основного контента --> из файла index.php
		- Сохраните файл под именем index.inc.php в папке inc


		ЗАДАНИЕ 2
		- В текстовом редакторе откройте файл index.php
		- В самом верху файла подключите файлы lib.inc.php и data.inc.php из папки inc
		- В блоке <!--Верхняя часть страницы --> подключите файл top.inc.php из папки inc
		- В блоке <!--Навигация --> подключите файл menu.inc.phpиз папки inc
		- В блоке <!--Область основного контента --> подключите файл index.inc.php из папки inc
		- В блоке <!--Нижняя часть страницы --> подключите файл bottom.inc.php из папки inc
		- Сохраните файл index.php
		- Посмотрите результат в браузере
		*/ 
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Сайт нашей школы</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <!-- Верхняя часть страницы -->
    <?php include 'inc/top.inc.php'; ?>
    <!-- Верхняя часть страницы -->
  </header>

  <section>
    <?php include 'inc/index.inc.php'; ?>
  </section>
  <nav>
    <!-- Навигация -->
    <?php include 'inc/menu.inc.php'; ?>
    <!-- Навигация -->
  </nav>
  <footer>
    <!-- Нижняя часть страницы -->
    <?php include 'inc/bottom.inc.php'; ?>
    <!-- Нижняя часть страницы -->
  </footer>
</body>
</html>
