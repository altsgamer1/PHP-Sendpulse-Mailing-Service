
# Сервис авторассылок 
## 1. Установка
### 1.1 Загрузка зависимостей
    composer require sendpulse/rest-api amocrm/amocrm-api-library
### 1.2 Создание БД
    CREATE DATABASE `mailing_service` /*!40100 COLLATE 'utf8_general_ci' */;
### 1.3 Создание таблиц
    CREATE TABLE `posts` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`description` TEXT NOT NULL COLLATE 'utf8_general_ci',
	`youtube` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`vc` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`not_returnable` INT(11) NOT NULL,
	`new` INT(11) NOT NULL,
	`created` DATETIME NULL DEFAULT NULL,
	`modified` DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
    )
    COLLATE='utf8_general_ci'
    ENGINE=InnoDB;
### 1.4 Указать данные Sendpulse
Задать свои значения $sender_name, $sender_email, $list_id, $client_id, $secret в файле **classes/SendpulseProvider.php**
## 2. Использование
**index.php** - UI для добавления постов

**run_bot.php** - Создание рассылок

**return.php** - Возвращение поста из отстойника
