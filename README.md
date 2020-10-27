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
* Composer >= 2.0.2
* MySQL

## Поднятие и настройка приложения

1. Скопировать и установить:
```
git clone https://github.com/mboyarinova/ArtVisio-library
cd Artvisio-library
composer install
```
2. В файле .env отредактировать параметр DATABASE_URL, где db_user - имя пользователя базы данных, db_password - пароль, и db_server_version - версия сервера:
```
DATABASE_URL=mysql://db_user:'db_password'@127.0.0.1:3306/library?serverVersion=db_server_version
```
3. Запустить локальный сервер и MySQL.
4. В терминале MySQL создать базу данных:
```
CREATE DATABASE library;
USE library;
CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, title TINYTEXT NOT NULL, author TINYTEXT NOT NULL, year INT NOT NULL, PRIMARY KEY(id));
```
5. Настроить виртуальный хост на локальном сервере (на Apache: conf/extra/httpd-vhosts.conf)
5. Б браузере открыть адрес виртуального хоста.
