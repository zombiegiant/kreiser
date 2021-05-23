# kreiser
Для установки системы нужно:
Установить composer
Установить LAMP server
Установить расширение PHP json
Установить расширение PHP curl

То есть, прописать команды в консоли:
apt-get install lamp-server php-json php-curl composer
cd /opt
composer require qiwi/bill-payments-php-sdk

Настроить mysql и создать бд card.
Применить команду: mysql -uUSERNAME -pPASSWORD card < card.sql (Менять только USERNAME и PASSWORD)

Переместить содержимое html в /var/www/html/
В файле config.php изменить константы: dbUserName - пользователь бд, dbPassword - пароль бд.
В файле pay.php прописать SECRET_KEY и $publicKey,
которые можно получить на: https://developer.qiwi.com/ru/p2p-payments/#auth в разделе "Авторизация".

Загрузить скетч pay_example.php на арудино с подключенным устройством rfid, дисплеем и интернетом.
