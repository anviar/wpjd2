<?php
/**
 * Jabber_Config_Db
 *
 * Класс с настройками параметров соединения с БД.
 *
 * @category  Jabber
 * @package   Jabber_Config
 * @copyright Олег AnViar Ключкин
 * @author    Written by Rostyslav Hulka
 * @version   Release: 0.1
 * @since     Class available since Release 0.1
 */
class Jabber_Config_Db
{
    /**
     * Хост
     * @var string
     */
    public $host = 'localhost';

    /**
     * Пользователь
     * @var string
     */
    public $user = 'jabberd2';

    /**
     * Пароль
     * @var string
     */
    public $passwd = 'secret';

    /**
     * Порт
     * @var int
     */
    public $port = 3306;

    /**
     * Название БД
     * @var string
     */
    public $database = 'jabberd2';
}