<?php
/**
 * Jabber_Lib_Output
 *
 * Выводит ответ пользователю, автоматически выбирает формат.
 *
 * @category  Jabber
 * @package   Jabber_Lib
 * @copyright Олег AnViar Ключкин
 * @author    Written by Rostyslav Hulka
 * @version   Release: 0.1
 * @since     Class available since Release 0.1
 */
class Jabber_Lib_Output
{
    /**
     * Скин по умолчанию
     * @var string
     */
    private $skin = 'crystal';

    /**
     * Тип ответа по умолчанию
     * @var string
     */
    private $responseType = 'image';

    /**
     * @var Jabber_Config_Output
     */
    private $config = null;


    /**
     * @param Jabber_Config_Output $config 
     */
    public function __construct(Jabber_Config_Output $config)
    {
        $this->config = $config;

        $this->setSkin();
        $this->setResponseType();
    }

    /**
     * Выводит "ответ"
     * @param array $data
     */
    public function show($data)
    {
        $status = 'online';
        if ($data['status'] == 'offline') {
            $status = 'offline';
        } elseif (!empty($data['show']))  {
            $status = $data['show'];
        }

        $image = $this->config->images[$status];
        
        switch ($this->responseType) {
            case 'image' :
                $filename = $this->config->fullPathToSkinFolder[$this->skin] . $image;
                if (!file_exists($filename)) {
                    throw new Exception('Status image not exists');
                }

                /**
                 * Если используеться nginx
                 * можно отдавать кртинку с помощью него
                 * @see http://kovyrin.net/2006/11/01/nginx-x-accel-redirect-php-rails/lang/ru/
                 */
                header('Content-Type: image/png');
                ob_start();
                @readfile($filename);
                ob_end_flush();
                break;

            case 'xhtml' :
            case 'html' :
                $skin  = $this->config->skins[$this->skin];
                $image = str_replace('{HTTP_HOST}', $_SERVER['HTTP_HOST'], $skin) . $image;
                require 'Views/xhtml.php';
                break;

            case 'xml' :
                require 'Views/xml.php';
                break;
            
            case 'json' :
                header('Content-type: text/json; charset=utf-8');
                $json = array(
                    'status' => $data['status'],
                    'show'   => $status,
                    'login'  => $data['last-login'],
                    'logout' => $data['last-logout']
                );
                echo json_encode($json);
                break;
        }
    }

    /**
     * Выбор скина
     */
    private function setSkin()
    {
        if (!isset($_GET['skin'])) {
            return;
        }

        $skin = $_GET['skin'];
        if (isset($this->config->skins[$skin])) {
            $this->skin = $skin;
        }
    }

    /**
     * Выбор формата ответа
     */
    private function setResponseType()
    {
        if (!isset($_GET['rtype'])) {
            return;
        }

        $rtype = $_GET['rtype'];
        switch ($rtype) {
            case 'xml' :
            case 'xhtml' :
            case 'html' :
            case 'json' :
                $this->responseType = $rtype;
                break;
        }
    }
}