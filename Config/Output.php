<?php
/**
 * Jabber_Config_Output
 *
 * Класс с настройками параметров вывода.
 *
 * @category  Jabber
 * @package   Jabber_Config
 * @copyright Олег AnViar Ключкин
 * @author    Written by Rostyslav Hulka
 * @version   Release: 0.1
 * @since     Class available since Release 0.1
 */
class Jabber_Config_Output
{
    /**
     * Отнсительные пути (относительно корневой директории сайта)
     * или ссылке на папки с скинами.
     * Формат: формат массива PHP, ключ - названия скина, значения - путь к папке.
     * @var array
     */
    public $skins = array(
        'crystal'      => 'http://{HTTP_HOST}/skins/crystal/',
        'jabberbulb'   => 'http://{HTTP_HOST}/skins/jabberbulb/'
    );

    /**
     * Полные(от "/") или относительные(относительно директории ../) пути к папкам с скинами.
     * Формат: формат массива PHP, ключ - названия скина, значения - путь к папке.
     * @var array
     */
    public $fullPathToSkinFolder = array(
        'crystal'    => 'skins/crystal/',
        'jabberbulb' => 'skins/jabberbulb/'
    );

    public $images = array(
        'online'    => 'online.png',
        'offline'   => 'offline.png',
        'chat'      => 'chat.png',
        'xa'        => 'xa.png',
        'away'      => 'away.png',
        'dnd'       => 'dnd.png',
        'invisible' => 'invisible.png'
    );
}
