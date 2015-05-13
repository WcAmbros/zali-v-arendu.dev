-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 13 2015 г., 16:57
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `address`
--

INSERT INTO `address` (`id`, `town`, `district`, `street`, `house`, `block`, `comment`, `metro`) VALUES
(12, 'Санкт-Петербург', 'Красносельский', 'Лени Голикова', '45', '', 'из метро направо 500 метров', 'Проспект Ветеранов'),
(13, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '1А', '', '', ' Площадь Александра Невского 1'),
(14, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(15, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(16, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(17, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(18, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(19, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(20, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(21, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(22, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(23, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(24, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(25, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(26, 'Санкт-Петербург', 'Невский ', 'Дальневосточный', '71', '', '', ' Улица Дыбенко'),
(27, 'Санкт-Петербург', 'Центральный ', 'Александра Невского', '2', '', 'Пл. Александра Невского, от метро: 500 м', 'Площадь Александра Невского 1');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `agent`
--

INSERT INTO `agent` (`id`, `name`, `email`, `phone`, `images`, `user_id`) VALUES
(12, 'Стас', 'test@test.ru', '55555555', NULL, 2),
(13, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(14, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(15, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(16, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(17, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(18, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(19, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(20, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(21, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(22, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(23, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(24, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(25, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(26, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(27, 'Стас', 'test@test.ru', '55555555', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `district`
--

CREATE TABLE IF NOT EXISTS `district` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `town_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `district`
--

INSERT INTO `district` (`id`, `name`, `town_id`) VALUES
(1, 'Адмиралтейский', 1),
(2, 'Василеостровский', 1),
(3, 'Всеволожский', 1),
(4, 'Выборгский', 1),
(5, 'Калининский', 1),
(6, 'Кировский', 1),
(7, 'Колпинский', 1),
(8, 'Красногвардейский', 1),
(9, 'Красносельский', 1),
(10, 'Кронштадтский', 1),
(11, 'Курортный', 1),
(12, 'Московский', 1),
(13, 'Невский', 1),
(14, 'Петроградский', 1),
(15, 'Петродворцовый', 1),
(16, 'Приморский', 1),
(17, 'Пушкинский', 1),
(18, 'Фрунзенский', 1),
(19, 'Центральный', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `equipment`
--

INSERT INTO `equipment` (`id`, `name`) VALUES
(1, 'Кулер с водой'),
(2, 'Зеркальная стена'),
(3, 'Раздевалка'),
(4, 'Душ'),
(5, 'Wi-fi');

-- --------------------------------------------------------

--
-- Структура таблицы `floor`
--

CREATE TABLE IF NOT EXISTS `floor` (
`id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `floor`
--

INSERT INTO `floor` (`id`, `name`) VALUES
(1, 'Не выбран'),
(2, 'ламинат'),
(4, 'Керамическая плитка');

-- --------------------------------------------------------

--
-- Структура таблицы `hall`
--

CREATE TABLE IF NOT EXISTS `hall` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `attribs` mediumtext,
  `square` int(11) DEFAULT NULL,
  `images` mediumtext,
  `optional_equipment` mediumtext,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `public` tinyint(1) DEFAULT '1',
  `deleted` tinyint(1) DEFAULT NULL,
  `floor_id` int(11) NOT NULL,
  `purpose_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `price_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hall`
--

INSERT INTO `hall` (`id`, `name`, `attribs`, `square`, `images`, `optional_equipment`, `created_at`, `updated_at`, `public`, `deleted`, `floor_id`, `purpose_id`, `agent_id`, `price_id`, `address_id`) VALUES
(14, 'Дальневосточный, д.71', '{"images":[{"original":"uploads\\/hall\\/kSfMHIYCqU9zXluX9DHML3Eba4nIGZc0.jpg","thumbnail":"uploads\\/hall\\/th_kSfMHIYCqU9zXluX9DHML3Eba4nIGZc0.jpg","slide":"uploads\\/hall\\/slide_kSfMHIYCqU9zXluX9DHML3Eba4nIGZc0.jpg"},{"original":"uploads\\/hall\\/tD0F8JynJEVVUzH_4yo_j9-qfsmk61lY.jpg","thumbnail":"uploads\\/hall\\/th_tD0F8JynJEVVUzH_4yo_j9-qfsmk61lY.jpg","slide":"uploads\\/hall\\/slide_tD0F8JynJEVVUzH_4yo_j9-qfsmk61lY.jpg"},{"original":"uploads\\/hall\\/vL07cZbjyJOiifYUuHLiXOcHIVRrE67n.jpg","thumbnail":"uploads\\/hall\\/th_vL07cZbjyJOiifYUuHLiXOcHIVRrE67n.jpg","slide":"uploads\\/hall\\/slide_vL07cZbjyJOiifYUuHLiXOcHIVRrE67n.jpg"}],"geocode":"[\\"30.4770474\\",\\"59.8778098\\"]"}', 100, NULL, '', 1431422383, 1431422383, 1, NULL, 1, 1, 26, 26, 26),
(15, 'Александра Невского, д.2', '{"images":[{"original":"uploads\\/noimage.jpg","thumbnail":"uploads\\/th_noimage.jpg","slide":"uploads\\/slide_noimage.jpg"}],"geocode":"[\\"30.3866531\\",\\"59.9243231\\"]"}', 1000, NULL, 'Кондиционер', 1431435815, 1431435815, 1, NULL, 2, 1, 27, 27, 27);

-- --------------------------------------------------------

--
-- Структура таблицы `hall_has_equipment`
--

CREATE TABLE IF NOT EXISTS `hall_has_equipment` (
  `hall_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hall_has_equipment`
--

INSERT INTO `hall_has_equipment` (`hall_id`, `equipment_id`) VALUES
(14, 1),
(15, 1),
(15, 2),
(14, 3),
(15, 3),
(15, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `metro`
--

CREATE TABLE IF NOT EXISTS `metro` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `attribs` mediumtext,
  `district_id` int(11) NOT NULL,
  `district_town_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `metro`
--

INSERT INTO `metro` (`id`, `name`, `attribs`, `district_id`, `district_town_id`) VALUES
(1, 'Автово', '', 6, 1),
(2, 'Адмиралтейская', '', 1, 1),
(3, 'Академическая', '', 5, 1),
(4, 'Балтийская', '', 1, 1),
(5, 'Бухарестская', '', 18, 1),
(6, 'Василеостровская', '', 2, 1),
(7, 'Владимирская', '', 19, 1),
(8, 'Волковская', '', 18, 1),
(9, 'Выборгская', '', 4, 1),
(10, 'Горьковская', '', 14, 1),
(11, 'Гостиный двор', '', 19, 1),
(12, 'Гражданский Проспект', '', 5, 1),
(13, 'Девяткино', '', 3, 1),
(14, 'Достоевская', '', 19, 1),
(15, 'Елизаровская', '', 13, 1),
(16, 'Звёздная', '', 12, 1),
(17, 'Звенигородская', '', 1, 1),
(18, 'Кировский Завод', '', 6, 1),
(19, 'Комендантский Проспект', '', 16, 1),
(20, 'Крестовский Остров', '', 14, 1),
(21, 'Купчино', '', 18, 1),
(22, 'Ладожская', '', 8, 1),
(23, 'Ленинский Проспект', '', 6, 1),
(24, 'Лесная', '', 4, 1),
(25, 'Лиговский Проспект', '', 19, 1),
(26, 'Ломоносовская', '', 13, 1),
(27, 'Маяковская', '', 19, 1),
(28, 'Международная', '', 18, 1),
(29, 'Московская', '', 12, 1),
(30, 'Московские Ворота', '', 12, 1),
(31, 'Нарвская', '', 6, 1),
(32, 'Невский Проспект', '', 19, 1),
(33, 'Новочеркасская', '', 8, 1),
(34, 'Обводный Канал', '', 18, 1),
(35, 'Обухово', '', 13, 1),
(36, 'Озерки', '', 4, 1),
(37, 'Парк Победы', '', 12, 1),
(38, 'Парнас', '', 4, 1),
(39, 'Петроградская', '', 14, 1),
(40, 'Пионерская', '', 16, 1),
(41, 'Площадь Александра Невского 1', '', 19, 1),
(42, 'Площадь Александра Невского 2', '', 19, 1),
(43, 'Площадь Восстания', '', 19, 1),
(44, 'Площадь Ленина', '', 5, 1),
(45, 'Площадь Мужества', '', 5, 1),
(46, 'Политехническая', '', 5, 1),
(47, 'Приморская', '', 2, 1),
(48, 'Пролетарская', '', 13, 1),
(49, 'Проспект Большевиков', '', 13, 1),
(50, 'Проспект Ветеранов', '', 6, 1),
(51, 'Проспект Просвещения', '', 4, 1),
(52, 'Пушкинская', '', 1, 1),
(53, 'Рыбацкое', '', 13, 1),
(54, 'Садовая', '', 1, 1),
(55, 'Сенная Площадь', '', 1, 1),
(56, 'Спасская', '', 1, 1),
(57, 'Спортивная', '', 14, 1),
(58, 'Старая Деревня', '', 16, 1),
(59, 'Технологический Институт', '', 1, 1),
(60, 'Удельная', '', 4, 1),
(61, 'Улица Дыбенко', '', 13, 1),
(62, 'Фрунзенская', '', 12, 1),
(63, 'Чёрная Речка', '', 16, 1),
(64, 'Чернышевская', '', 19, 1),
(65, 'Чкаловская', '', 14, 1),
(66, 'Электросила', '', 12, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
`id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `min`, `max`) VALUES
(12, 100, 200),
(13, 100, 200),
(14, 2000, 3000),
(15, 2000, 3000),
(16, 2000, 3000),
(17, 2000, 3000),
(18, 2000, 3000),
(19, 2000, 3000),
(20, 2000, 3000),
(21, 2000, 3000),
(22, 2000, 3000),
(23, 2000, 3000),
(24, 2000, 3000),
(25, 2000, 3000),
(26, 2000, 3000),
(27, 300, 500);

-- --------------------------------------------------------

--
-- Структура таблицы `purpose`
--

CREATE TABLE IF NOT EXISTS `purpose` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `purpose`
--

INSERT INTO `purpose` (`id`, `name`) VALUES
(1, 'для танцев');

-- --------------------------------------------------------

--
-- Структура таблицы `town`
--

CREATE TABLE IF NOT EXISTS `town` (
`id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `town`
--

INSERT INTO `town` (`id`, `name`) VALUES
(1, 'Санкт-Петербург');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `created_at`, `updated_at`, `username`, `auth_key`, `email_confirm_token`, `password_hash`, `password_reset_token`, `email`, `status`) VALUES
(1, 1431083612, 1431083612, 'guest', '9J7BVOWfh9NaQbepmTnf2trfSqr_rXdp', 'mKaLQTyOR4BgB2vVINkO49esuRb5CUiu', '$2y$13$RIDZO5scZiLBsq75/gx3/OwIbLH4XilQYxK.3A0zeI6jLAeWLiZaW', NULL, 'guest@example.com', 1),
(2, 1431083645, 1431083645, 'stas', 'MZ0pNqTMDRcgII1CvTSbaQyjUGad7yoQ', '5I2BpYRiZcIFd6kNNuODJ1tQ36c49FOu', '$2y$13$Wc/puI9z0g25VrWjqd28dONNVOJalpUeSnPEPm7IGYAafwx8YNMmu', NULL, 'zahs88@yandex.ru', 1);

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
-- Индексы таблицы `district`
--
ALTER TABLE `district`
 ADD PRIMARY KEY (`id`,`town_id`), ADD KEY `fk_district_town1_idx` (`town_id`);

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
-- Индексы таблицы `metro`
--
ALTER TABLE `metro`
 ADD PRIMARY KEY (`id`,`district_id`,`district_town_id`), ADD KEY `fk_metro_district1_idx` (`district_id`,`district_town_id`);

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
-- Индексы таблицы `town`
--
ALTER TABLE `town`
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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `agent`
--
ALTER TABLE `agent`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `district`
--
ALTER TABLE `district`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `equipment`
--
ALTER TABLE `equipment`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `floor`
--
ALTER TABLE `floor`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `hall`
--
ALTER TABLE `hall`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `metro`
--
ALTER TABLE `metro`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT для таблицы `purpose`
--
ALTER TABLE `purpose`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `town`
--
ALTER TABLE `town`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `agent`
--
ALTER TABLE `agent`
ADD CONSTRAINT `fk_agent_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `district`
--
ALTER TABLE `district`
ADD CONSTRAINT `fk_district_town1` FOREIGN KEY (`town_id`) REFERENCES `town` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hall`
--
ALTER TABLE `hall`
ADD CONSTRAINT `fk_hall_address1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_hall_agent1` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hall_floor1` FOREIGN KEY (`floor_id`) REFERENCES `floor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hall_price1` FOREIGN KEY (`price_id`) REFERENCES `price` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_hall_purpose1` FOREIGN KEY (`purpose_id`) REFERENCES `purpose` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `hall_has_equipment`
--
ALTER TABLE `hall_has_equipment`
ADD CONSTRAINT `fk_hall_has_equipment_equipment1` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_hall_has_equipment_hall1` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `metro`
--
ALTER TABLE `metro`
ADD CONSTRAINT `fk_metro_district1` FOREIGN KEY (`district_id`, `district_town_id`) REFERENCES `district` (`id`, `town_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
