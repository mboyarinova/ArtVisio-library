# WEB приложение "Библиотека"

Приложение содержит три страницы:
* список книг
* добавление книги
* редактирование книги

Каждая книга, сохраненная в приложении, имеет имя, автора и год выпуска.

## Требования

* Symfony >= 5.1
* PHP >= 7.2.5
* Twig >= 2.12
* MySQL

## Поднятие и настройка приложения

1. Скопировать и установить:
```
git clone https://github.com/mboyarinova/ArtVisio-library
cd Artvisio-library
composer install
```
2. Создать файл .env.local и замените значения в DATABASE_URL на актуальные.
```
DATABASE_URL=mysql://db_user:'db_password'@127.0.0.1:3306/library?serverVersion=db_server_version
```
3. Запустить локальный сервер и MySQL.
4. Создать базу данных.
```
php bin/console doctrine:database:create --if-not-exists
php bin/console doctrine:migrations:migrate --no-interaction
```
5. Настроить виртуальный хост на локальном сервере (на Apache: conf/extra/httpd-vhosts.conf)
5. Б браузере открыть адрес виртуального хоста.
