-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 08 2015 г., 12:37
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
-- Структура таблицы `address`
--

CREATE TABLE IF NOT EXISTS `address` (
`id` int(11) NOT NULL,
  `town` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `house` varchar(45) DEFAULT NULL,
  `block` varchar(45) DEFAULT NULL,
  `comment` mediumtext,
  `metro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `images` mediumtext,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `floor`
--

CREATE TABLE IF NOT EXISTS `floor` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `hall`
--

CREATE TABLE IF NOT EXISTS `hall` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `square` int(11) DEFAULT NULL,
  `images` mediumtext,
  `optional_equipment` mediumtext,
  `created` datetime DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `floor_id` int(11) NOT NULL,
  `purpose_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `price_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `hall_has_equipment`
--

CREATE TABLE IF NOT EXISTS `hall_has_equipment` (
  `hall_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
`id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `purpose`
--

CREATE TABLE IF NOT EXISTS `purpose` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

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
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `address`
--
ALTER TABLE `address`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `agent`
--
ALTER TABLE `agent`
 ADD PRIMARY KEY (`id`,`user_id`), ADD KEY `fk_agent_user1_idx` (`user_id`);

--
-- Индексы таблицы `equipment`
--
ALTER TABLE `equipment`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `floor`
--
ALTER TABLE `floor`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hall`
--
ALTER TABLE `hall`
 ADD PRIMARY KEY (`id`,`floor_id`,`purpose_id`,`agent_id`,`price_id`,`address_id`), ADD KEY `fk_hall_floor1_idx` (`floor_id`), ADD KEY `fk_hall_purpose1_idx` (`purpose_id`), ADD KEY `fk_hall_agent1_idx` (`agent_id`), ADD KEY `fk_hall_price1_idx` (`price_id`), ADD KEY `fk_hall_address1_idx` (`address_id`);

--
-- Индексы таблицы `hall_has_equipment`
--
ALTER TABLE `hall_has_equipment`
 ADD PRIMARY KEY (`hall_id`,`equipment_id`), ADD KEY `fk_hall_has_equipment_equipment1_idx` (`equipment_id`), ADD KEY `fk_hall_has_equipment_hall1_idx` (`hall_id`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `purpose`
--
ALTER TABLE `purpose`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `address`
--
ALTER TABLE `address`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `agent`
--
ALTER TABLE `agent`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `equipment`
--
ALTER TABLE `equipment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `floor`
--
ALTER TABLE `floor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `hall`
--
ALTER TABLE `hall`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `purpose`
--
ALTER TABLE `purpose`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `agent`
--
ALTER TABLE `agent`
ADD CONSTRAINT `fk_agent_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `hall`
--
ALTER TABLE `hall`
ADD CONSTRAINT `fk_hall_address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hall_agent1` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hall_floor1` FOREIGN KEY (`floor_id`) REFERENCES `floor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hall_price1` FOREIGN KEY (`price_id`) REFERENCES `price` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hall_purpose1` FOREIGN KEY (`purpose_id`) REFERENCES `purpose` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `hall_has_equipment`
--
ALTER TABLE `hall_has_equipment`
ADD CONSTRAINT `fk_hall_has_equipment_equipment1` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hall_has_equipment_hall1` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
