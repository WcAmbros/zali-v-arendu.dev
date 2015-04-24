-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 06 2015 г., 15:57
-- Версия сервера: 5.6.23-log
-- Версия PHP: 5.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `zali_v_arendu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `hall`
--

DROP TABLE IF EXISTS `hall`;
CREATE TABLE IF NOT EXISTS `hall` (
  `id` int(11) NOT NULL,
  `town` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house` varchar(45) DEFAULT NULL,
  `block` varchar(45) DEFAULT NULL,
  `comment` mediumtext,
  `metro` varchar(255) DEFAULT NULL,
  `attribs` mediumtext,
  `square` int(11) DEFAULT NULL,
  `images` mediumtext,
  `optional_equipment` mediumtext,
  `created` datetime DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `agent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `hall_has_type`
--

DROP TABLE IF EXISTS `hall_has_type`;
CREATE TABLE IF NOT EXISTS `hall_has_type` (
  `hall_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `params`
--

DROP TABLE IF EXISTS `params`;
CREATE TABLE IF NOT EXISTS `params` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

DROP TABLE IF EXISTS `price`;
CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `hall_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `email_confirm_token` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `attribs` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `hall`
--
ALTER TABLE `hall`
 ADD PRIMARY KEY (`id`,`agent_id`), ADD KEY `fk_hall_agent1_idx` (`agent_id`);

--
-- Индексы таблицы `hall_has_type`
--
ALTER TABLE `hall_has_type`
 ADD PRIMARY KEY (`hall_id`,`type_id`), ADD KEY `fk_hall_has_type_type1_idx` (`type_id`), ADD KEY `fk_hall_has_type_hall1_idx` (`hall_id`);

--
-- Индексы таблицы `params`
--
ALTER TABLE `params`
 ADD PRIMARY KEY (`id`,`type_id`), ADD KEY `fk_params_type1_idx` (`type_id`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
 ADD PRIMARY KEY (`id`,`hall_id`), ADD KEY `fk_price_hall_idx` (`hall_id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `hall`
--
ALTER TABLE `hall`
ADD CONSTRAINT `fk_hall_agent1` FOREIGN KEY (`agent_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `hall_has_type`
--
ALTER TABLE `hall_has_type`
ADD CONSTRAINT `fk_hall_has_type_hall1` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hall_has_type_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `params`
--
ALTER TABLE `params`
ADD CONSTRAINT `fk_params_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `price`
--
ALTER TABLE `price`
ADD CONSTRAINT `fk_price_hall` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
