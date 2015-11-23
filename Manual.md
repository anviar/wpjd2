Может отдавать статус в разных форматах:
  * изображение
  * xhtml
  * xml
  * json

## Требования ##
  1. PHP 5.1+ с установленым расширением mysqli
  1. Доступ к БД Jabber сервера jabberd2


## Настройки ##
  1. ./Сonfig/Db.php - наcтройки для подключения к БД
> > _Пользователь БД должен иметь минимальные права доступа к БД._
> > Пример:
```
GRANT SELECT ( `collection-owner` , `status` , `show` , `last-login` , `last-logout`
    ) ON `jabberd2`.`status`
    TO 'jabberd2_wp'@'localhost';
```
  1. ./Config/Output.php - настройки вывода


## Установка ##
  1. Скопировать папку ../Jabber в рабочую директорию
  1. Удалить папку ./test
  1. Настроить скрипт для роботы посредством изминения файлов в директории ./Сonfig


## Доступ к скрипту ##
Доступ к скрипту осуществляеться по ссылке: [xocт]/[путь к рабочей директории]/Jabber/webpresence.php[?параметры]


## Параметры ##
  1. jid compatible string jid=[username@host] - обязательный параметр, JID пользователя на сервере
  1. string skin=[crystal(default)|jabberbulb] - тема оформления
  1. string rtype=[image(default)|html|xhml|xml|json] - тип ответа


## Пример использования ##
  1. Вставка картинки стаутса в сообщения на форуме(например):
```
<img src="[url]/Jabber/webpresence.php?jid=username@host[&skin=[crystal|jabberbulb]">
```
  1. Ссылка на свой статус в Jabber (формат html):
```
<a href="[url]/Jabber/webpresence.php?jid=username@host&rtype=html[&skin=[crystal|jabberbulb]">Мой статус :)</a> 
```
  1. Получения и обработка статуса пользователя програмами(формат json или xml):
```
[url]/Jabber/webpresence.php?jid=username@host&rtype=[json|xml]
```