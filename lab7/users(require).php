<?php
declare(strict_types=1);

// Подключение классов вручную
require_once 'MyProject/Classes/User.php';
require_once 'MyProject/Classes/SuperUser.php';

use Classes\User;
use Classes\SuperUser;

// Создание пользователей
$user1 = new User("Иван Иванов", "ivanov", "pass123");
$user2 = new User("Петр Петров", "petrov", "qwerty");
$user3 = new User("Сидор Сидоров", "sidorov", "123456");
echo "<br>";

// Вызов метода showInfo() для пользователей
$user1->showInfo();
$user2->showInfo();
$user3->showInfo();
echo "<br>";

// Создание суперпользователя
$superUser = new SuperUser("Админ", "admin", "root", "Administrator");
$superUser->showInfo();
