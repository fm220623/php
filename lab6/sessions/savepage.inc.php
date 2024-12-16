<?php
// Задание 1: Сохранение посещённой страницы в сессии

// Включаем настройки для работы с сессиями до начала сессии
ini_set("session.use_only_cookies", "0");
ini_set("session.use_trans_sid", "1");

// Инициализируем сессию, если она не была начата
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Проверяем, существует ли массив посещённых страниц в сессии
if (!isset($_SESSION['visited_pages'])) {
    // Если нет, создаём его
    $_SESSION['visited_pages'] = array();
}

// Добавляем текущую страницу в массив посещённых
$_SESSION['visited_pages'][] = $_SERVER['REQUEST_URI'];
?>
