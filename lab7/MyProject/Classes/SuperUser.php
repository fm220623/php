<?php
declare(strict_types=1);

namespace Classes;

require_once 'User.php';

/**
 * Класс SuperUser, наследующий User.
 */
class SuperUser extends User
{
    public string $role;

    /**
     * Конструктор класса SuperUser.
     * @param string $name Имя пользователя.
     * @param string $login Логин пользователя.
     * @param string $password Пароль пользователя.
     * @param string $role Роль суперпользователя.
     */
    public function __construct(string $name, string $login, string $password, string $role)
    {
        parent::__construct($name, $login, $password);
        $this->role = $role;
    }

    /**
     * Перегруженный метод showInfo(), выводящий информацию о суперпользователе.
     */
    public function showInfo(): void
    {
        parent::showInfo();
        echo "Роль: {$this->role}<br>";
    }
}
