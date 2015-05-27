-- phpMyAdmin SQL Dump
-- version 4.3.13
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 27 2015 г., 06:36
-- Версия сервера: 5.6.23-1~dotdeb.3
-- Версия PHP: 5.4.40-1~dotdeb+wheezy.1

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `address`
--

INSERT INTO `address` (`id`, `town`, `district`, `street`, `house`, `block`, `comment`, `metro`) VALUES
(2, 'Санкт-Петербург', 'Петроградский', 'Чкаловский', '15', '', '', 'Чкаловская'),
(3, 'Санкт-Петербург', 'Петроградский', 'Планерная', '20', '', '', 'Петроградская'),
(4, 'Санкт-Петербург', 'Центральный', 'Казанская', '7', '', '', 'Невский проспект'),
(5, 'Санкт-Петербург', 'Адмиралтейский', 'Звенигородская', '11', '', '', 'Звенигородская'),
(6, 'Санкт-Петербург', 'Адмиралтейский', 'Обводного канала', '134', '3', '', 'Балтийская');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Танцевальный зал'),
(2, 'Спортивный зал'),
(3, 'Ледовый зал'),
(4, 'Конференц зал'),
(5, 'Йога'),
(6, 'Единоборства'),
(7, 'Акробатика');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `user_id`) VALUES
(1, '', '', '79522234322', 1),
(2, '', '', '79626962222', 1),
(3, '', '', '79112494689', 1),
(4, '', '', '79062473419', 1),
(5, '', '', '79213413047', 1);

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
-- Структура таблицы `floor`
--

CREATE TABLE IF NOT EXISTS `floor` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `floor`
--

INSERT INTO `floor` (`id`, `name`) VALUES
(1, 'Линолеум'),
(2, 'Ламинат'),
(4, 'Паркет'),
(5, 'Винил');

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
  `price_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `contacts_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hall`
--

INSERT INTO `hall` (`id`, `name`, `attribs`, `square`, `images`, `optional_equipment`, `created_at`, `updated_at`, `public`, `deleted`, `floor_id`, `price_id`, `address_id`, `category_id`, `contacts_id`) VALUES
(1, 'Чкаловский, д.15', '{"images":[{"original":"uploads\\/noimage.jpg","thumbnail":"uploads\\/th_noimage.jpg","slide":"uploads\\/slide_noimage.jpg"}],"geocode":"[\\"59.9626638\\",\\"30.2957918\\"]"}', 35, NULL, '', 1432641783, 1432641783, 1, NULL, 1, 2, 2, 1, 1),
(2, 'Планерная, д.20', '{"images":[{"original":"uploads\\/noimage.jpg","thumbnail":"uploads\\/th_noimage.jpg","slide":"uploads\\/slide_noimage.jpg"}],"geocode":"[\\"60.0025942\\",\\"30.2347898\\"]"}', 35, NULL, '', 1432642186, 1432642186, 1, NULL, 5, 3, 3, 1, 2),
(3, 'Казанская, д.7', '{"images":[{"original":"uploads\\/noimage.jpg","thumbnail":"uploads\\/th_noimage.jpg","slide":"uploads\\/slide_noimage.jpg"}],"geocode":"[\\"59.9252645\\",\\"30.4294255\\"]"}', 50, NULL, '', 1432642445, 1432642445, 1, NULL, 1, 4, 4, 1, 3),
(4, 'Звенигородская, д.11', '{"images":[{"original":"uploads\\/noimage.jpg","thumbnail":"uploads\\/th_noimage.jpg","slide":"uploads\\/slide_noimage.jpg"}],"geocode":"[\\"59.920141\\",\\"30.3391156\\"]"}', 75, NULL, '', 1432642637, 1432642637, 1, NULL, 1, 5, 5, 1, 4),
(5, 'Обводного канала, д.134, к.3', '{"images":[{"original":"uploads\\/noimage.jpg","thumbnail":"uploads\\/th_noimage.jpg","slide":"uploads\\/slide_noimage.jpg"}],"geocode":"[\\"59.9084005\\",\\"30.2894966\\"]"}', 35, NULL, '', 1432647746, 1432647746, 1, NULL, 2, 6, 6, 1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `hall_has_options`
--

CREATE TABLE IF NOT EXISTS `hall_has_options` (
  `hall_id` int(11) NOT NULL,
  `options_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hall_has_options`
--

INSERT INTO `hall_has_options` (`hall_id`, `options_id`) VALUES
(1, 1),
(1, 3),
(4, 3),
(1, 6),
(1, 8),
(1, 9),
(4, 9);

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
(1, 'Автово', '{"options":{"class":"i-metro_red"}}', 6, 1),
(2, 'Адмиралтейская', '{"options":{"class":"i-metro_purple"}}', 1, 1),
(3, 'Академическая', '{"options":{"class":"i-metro_red"}}', 5, 1),
(4, 'Балтийская', '{"options":{"class":"i-metro_red"}}', 1, 1),
(5, 'Бухарестская', '{"options":{"class":"i-metro_purple"}}', 18, 1),
(6, 'Василеостровская', '{"options":{"class":"i-metro_green"}}', 2, 1),
(7, 'Владимирская', '{"options":{"class":"i-metro_red"}}', 19, 1),
(8, 'Волковская', '{"options":{"class":"i-metro_purple"}}', 18, 1),
(9, 'Выборгская', '{"options":{"class":"i-metro_red"}}', 4, 1),
(10, 'Горьковская', '{"options":{"class":"i-metro_blue"}}', 14, 1),
(11, 'Гостиный двор', '{"options":{"class":"i-metro_green"}}', 19, 1),
(12, 'Гражданский Проспект', '{"options":{"class":"i-metro_red"}}', 5, 1),
(13, 'Девяткино', '{"options":{"class":"i-metro_red"}}', 3, 1),
(14, 'Достоевская', '{"options":{"class":"i-metro_orange"}}', 19, 1),
(15, 'Елизаровская', '{"options":{"class":"i-metro_green"}}', 13, 1),
(16, 'Звёздная', '{"options":{"class":"i-metro_blue"}}', 12, 1),
(17, 'Звенигородская', '{"options":{"class":"i-metro_purple"}}', 1, 1),
(18, 'Кировский Завод', '{"options":{"class":"i-metro_red"}}', 6, 1),
(19, 'Комендантский Проспект', '{"options":{"class":"i-metro_purple"}}', 16, 1),
(20, 'Крестовский Остров', '{"options":{"class":"i-metro_purple"}}', 14, 1),
(21, 'Купчино', '{"options":{"class":"i-metro_blue"}}', 18, 1),
(22, 'Ладожская', '{"options":{"class":"i-metro_orange"}}', 8, 1),
(23, 'Ленинский Проспект', '{"options":{"class":"i-metro_red"}}', 6, 1),
(24, 'Лесная', '{"options":{"class":"i-metro_red"}}', 4, 1),
(25, 'Лиговский Проспект', '{"options":{"class":"i-metro_orange"}}', 19, 1),
(26, 'Ломоносовская', '{"options":{"class":"i-metro_green"}}', 13, 1),
(27, 'Маяковская', '{"options":{"class":"i-metro_green"}}', 19, 1),
(28, 'Международная', '{"options":{"class":"i-metro_purple"}}', 18, 1),
(29, 'Московская', '{"options":{"class":"i-metro_blue"}}', 12, 1),
(30, 'Московские Ворота', '{"options":{"class":"i-metro_blue"}}', 12, 1),
(31, 'Нарвская', '{"options":{"class":"i-metro_red"}}', 6, 1),
(32, 'Невский Проспект', '{"options":{"class":"i-metro_blue"}}', 19, 1),
(33, 'Новочеркасская', '{"options":{"class":"i-metro_orange"}}', 8, 1),
(34, 'Обводный Канал', '{"options":{"class":"i-metro_purple"}}', 18, 1),
(35, 'Обухово', '{"options":{"class":"i-metro_green"}}', 13, 1),
(36, 'Озерки', '{"options":{"class":"i-metro_blue"}}', 4, 1),
(37, 'Парк Победы', '{"options":{"class":"i-metro_blue"}}', 12, 1),
(38, 'Парнас', '{"options":{"class":"i-metro_blue"}}', 4, 1),
(39, 'Петроградская', '{"options":{"class":"i-metro_blue"}}', 14, 1),
(40, 'Пионерская', '{"options":{"class":"i-metro_blue"}}', 16, 1),
(41, 'Площадь Александра Невского 1', '{"options":{"class":"i-metro_green"}}', 19, 1),
(42, 'Площадь Александра Невского 2', '{"options":{"class":"i-metro_orange"}}', 19, 1),
(43, 'Площадь Восстания', '{"options":{"class":"i-metro_red"}}', 19, 1),
(44, 'Площадь Ленина', '{"options":{"class":"i-metro_red"}}', 5, 1),
(45, 'Площадь Мужества', '{"options":{"class":"i-metro_red"}}', 5, 1),
(46, 'Политехническая', '{"options":{"class":"i-metro_red"}}', 5, 1),
(47, 'Приморская', '{"options":{"class":"i-metro_green"}}', 2, 1),
(48, 'Пролетарская', '{"options":{"class":"i-metro_green"}}', 13, 1),
(49, 'Проспект Большевиков', '{"options":{"class":"i-metro_orange"}}', 13, 1),
(50, 'Проспект Ветеранов', '{"options":{"class":"i-metro_red"}}', 6, 1),
(51, 'Проспект Просвещения', '{"options":{"class":"i-metro_blue"}}', 4, 1),
(52, 'Пушкинская', '{"options":{"class":"i-metro_red"}}', 1, 1),
(53, 'Рыбацкое', '{"options":{"class":"i-metro_green"}}', 13, 1),
(54, 'Садовая', '{"options":{"class":"i-metro_purple"}}', 1, 1),
(55, 'Сенная Площадь', '{"options":{"class":"i-metro_blue"}}', 1, 1),
(56, 'Спасская', '{"options":{"class":"i-metro_orange"}}', 1, 1),
(57, 'Спортивная', '{"options":{"class":"i-metro_purple"}}', 14, 1),
(58, 'Старая Деревня', '{"options":{"class":"i-metro_purple"}}', 16, 1),
(59, 'Технологический Институт', '{"options":{"class":"i-metro_red"}}', 1, 1),
(60, 'Удельная', '{"options":{"class":"i-metro_blue"}}', 4, 1),
(61, 'Улица Дыбенко', '{"options":{"class":"i-metro_orange"}}', 13, 1),
(62, 'Фрунзенская', '{"options":{"class":"i-metro_blue"}}', 12, 1),
(63, 'Чёрная Речка', '{"options":{"class":"i-metro_blue"}}', 16, 1),
(64, 'Чернышевская', '{"options":{"class":"i-metro_red"}}', 19, 1),
(65, 'Чкаловская', '{"options":{"class":"i-metro_purple"}}', 14, 1),
(66, 'Электросила', '{"options":{"class":"i-metro_blue"}}', 12, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `options`
--

INSERT INTO `options` (`id`, `name`) VALUES
(1, 'Кулер с водой'),
(2, 'Зеркальная стена'),
(3, 'Раздевалка'),
(4, 'Душ'),
(5, 'Wi-fi'),
(6, 'Станок'),
(7, 'Пилон'),
(8, 'Интерьер для съемки'),
(9, 'Коврики');

-- --------------------------------------------------------

--
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `price`
--

INSERT INTO `price` (`id`, `min`, `max`) VALUES
(2, 300, 1200),
(3, 250, 250),
(4, 400, 600),
(5, 700, 700),
(6, 250, 250);

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `images` mediumtext,
  `user_id` int(11) NOT NULL,
  `attribs` mediumtext
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`id`, `name`, `email`, `phone`, `images`, `user_id`, `attribs`) VALUES
(1, 'Разработчик', 'support@example.com', '3330000', 'uploads/profile/icon_5zn46s9cWbzOouzOzYNH_tpAa_QwpShw.jpg', 2, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `town`
--

CREATE TABLE IF NOT EXISTS `town` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `subdomain` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `town`
--

INSERT INTO `town` (`id`, `name`, `subdomain`) VALUES
(1, 'Санкт-Петербург', 'spb');

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
(2, 1432647850, 1432647850, 'admin', 'YOrNM0mdy8Q16QeV9gXSqA157CgcXA7Z', 'Beagwlg1aQhmk_ejuAAqKTruNvAZuJkV', '$2y$13$7iYJrg0vGtRhjIqCsT3bGeHDS.HPm5HxMR4GUnuKbGSkmffADQpUq', NULL, 'admin@example.ru', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`,`user_id`), ADD KEY `fk_agent_user1_idx` (`user_id`);

--
-- Индексы таблицы `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`,`town_id`), ADD KEY `fk_district_town1_idx` (`town_id`);

--
-- Индексы таблицы `floor`
--
ALTER TABLE `floor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`id`,`floor_id`,`price_id`,`address_id`,`category_id`,`contacts_id`), ADD KEY `fk_hall_floor1_idx` (`floor_id`), ADD KEY `fk_hall_price1_idx` (`price_id`), ADD KEY `fk_hall_address1_idx` (`address_id`), ADD KEY `fk_hall_category1_idx` (`category_id`), ADD KEY `fk_hall_contacts1_idx` (`contacts_id`);

--
-- Индексы таблицы `hall_has_options`
--
ALTER TABLE `hall_has_options`
  ADD PRIMARY KEY (`hall_id`,`options_id`), ADD KEY `fk_hall_has_options_options1_idx` (`options_id`), ADD KEY `fk_hall_has_options_hall1_idx` (`hall_id`);

--
-- Индексы таблицы `metro`
--
ALTER TABLE `metro`
  ADD PRIMARY KEY (`id`,`district_id`,`district_town_id`), ADD KEY `fk_metro_district1_idx` (`district_id`,`district_town_id`);

--
-- Индексы таблицы `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`,`user_id`), ADD KEY `fk_agent_user1_idx` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `floor`
--
ALTER TABLE `floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `hall`
--
ALTER TABLE `hall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `metro`
--
ALTER TABLE `metro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT для таблицы `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `profile`
--
ALTER TABLE `profile`
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
-- Ограничения внешнего ключа таблицы `contacts`
--
ALTER TABLE `contacts`
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
ADD CONSTRAINT `fk_hall_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_hall_contacts1` FOREIGN KEY (`contacts_id`) REFERENCES `contacts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hall_floor1` FOREIGN KEY (`floor_id`) REFERENCES `floor` (`id`) ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_hall_price1` FOREIGN KEY (`price_id`) REFERENCES `price` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `hall_has_options`
--
ALTER TABLE `hall_has_options`
ADD CONSTRAINT `fk_hall_has_options_hall1` FOREIGN KEY (`hall_id`) REFERENCES `hall` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_hall_has_options_options1` FOREIGN KEY (`options_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `metro`
--
ALTER TABLE `metro`
ADD CONSTRAINT `fk_metro_district1` FOREIGN KEY (`district_id`, `district_town_id`) REFERENCES `district` (`id`, `town_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
ADD CONSTRAINT `fk_agent_user10` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
