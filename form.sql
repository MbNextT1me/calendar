-- СОЗДАНИЕ БАЗЫ ДАННЫХ
-- CREATE DATABASE form;
-- USE form;
-- В моем случае нет необходимости создавать бд, ибо на хосте форлабса она уже есть
-- Создание таблицы
CREATE TABLE IF NOT EXISTS `form` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`type` int(5) unsigned DEFAULT NULL,
	`topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`datetime` TIMESTAMP DEFAULT NULL,
	`duration` int(6) unsigned DEFAULT NULL,
	`comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`complete` int(2) unsigned DEFAULT NULL,
	`deleted` int(2) unsigned DEFAULT NULL,
	PRIMARY KEY (`id`)
);
