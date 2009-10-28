<?php
//printf($1);
/**
 * Конфиг для подключения к БД
 */
require_once 'Config/Output.php';

/**
 * Конфиг с настройками вывода
 */
require_once 'Config/Db.php';

/**
 * @see Jabber_Lib_Status
 */
require_once 'Lib/Status.php';

/**
 * @see Jabber_Lib_Output
 */
require_once 'Lib/Output.php';

try {

    $jid = '';
    if (isset($_GET['jid'])) {
        $jid = $_GET['jid'];
    }

    /**
     * Проверка JID на валидность чтоб из за юного хакера который напишет jid=fuck
     * не конектиться лишний раз к БД.
     */
    if (!preg_match("#^[a-z0-9\.\-_]+@[a-z0-9\-_]+\.([a-z0-9\-_]+\.)*?[a-z]+$#uis", $jid)) {
        throw new Exception('JID is not defined or not valid');
    }

    $jabberStatus = new Jabber_Lib_Status(new Jabber_Config_Db());
    $output       = new Jabber_Lib_Output(new Jabber_Config_Output());

    /**
     * Отправляем ответ пользователю
     */
    $output->show($jabberStatus->get($jid));

} catch (Exception $e) {
    echo $e->getMessage(); // выводим ошибки
}
