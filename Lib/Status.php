<?php
/**
 * Jabber_Lib_Status
 *
 * Достает массив с информацией о пользователе с БД.
 *
 * @category  Jabber
 * @package   Jabber_Lib
 * @copyright Олег AnViar Ключкин
 * @author    Written by Rostyslav Hulka
 * @version   Release: 0.1
 * @since     Class available since Release 0.1
 */
class Jabber_Lib_Status
{
    private $config = null;

    private $conn = null;


    public function __construct(Jabber_Config_Db $config)
    {
        $this->config = $config;
        $this->connect();
    }

    /**
     * Закрывает соединения с БД
     */
    public function  __destruct()
    {
        mysqli_close($this->conn);
    }

    /**
     * Возвращет информацию о пользователе
     *
     * @param string $jid
     * @return array
     */
    public function get($jid)
    {
        $jid    = mysqli_real_escape_string($this->conn, $jid);
        $result = @mysqli_query(
            $this->conn,
            "SELECT `status`,`show`,`last-login`,`last-logout`, `collection-owner`
             FROM `status`
             WHERE `collection-owner`='{$jid}'"
        );

        if (!$result) {
            throw new Exception("Database query error");
        }

        if (mysqli_num_rows($result) === 0) {
            throw new Exception('JID not found on this server');
        }

        return mysqli_fetch_assoc($result);
    }

    /**
     * Подключение к БД
     *
     * Информацию об ошибке можно получить с помощью:
     *  mysqli_connect_error()
     *  mysqli_connect_errno()
     *
     * При том обычному пользователю лучше этого не показывать,
     * можно себе в логи писать например.
     * Это
     * die("could not connect to server : ".mysql_error())
     * дыра в безопасности.
     */
    private function connect()
    {
        $this->conn = @mysqli_connect(
            $this->config->host,
            $this->config->user,
            $this->config->passwd,
            $this->config->database,
            $this->config->port
        );

        if (mysqli_connect_error()) {
            throw new Exception('Service temporary unavailable, please try again later');
        }

        $result = @mysqli_query($this->conn, 'SET NAMES utf8 COLLATE utf8_unicode_ci');
        
        if (!$result) {
            throw new Exception("Database query error");
        }
    }
}