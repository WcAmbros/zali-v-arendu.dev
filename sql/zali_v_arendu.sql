-- phpMyAdmin SQL Dump
-- version 4.3.13
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 25 2015 г., 14:10
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

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
(27, 'Санкт-Петербург', 'Центральный ', 'Александра Невского', '2', '', 'Пл. Александра Невского, от метро: 500 м', 'Площадь Александра Невского 1'),
(28, 'Санкт-Петербург', 'Центральный ', 'Александра Невского', '2', '', 'направо, 500м от гостиницы Москва', 'Площадь Александра Невского 1'),
(29, 'Санкт-Петербург', 'Центральный ', 'Невский', '180/2', '', '', 'Площадь Александра Невского 1'),
(30, 'Санкт-Петербург', 'Центральный ', 'Невский', '184', '', '500 метров от станции метро "площадь Александра Невского"', 'Площадь Александра Невского 1'),
(31, 'Санкт-Петербург', 'Центральный ', 'Константина Заслонова', '15', '', '1000 метров от метро', ' Звенигородская'),
(32, 'Санкт-Петербург', 'Фрунзенский ', 'Альпийский', '23', '1', '', ' Звёздная');

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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `agent`
--

INSERT INTO `agent` (`id`, `name`, `email`, `phone`, `images`, `user_id`) VALUES
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
(27, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(28, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(29, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(30, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(31, 'Стас', 'test@test.ru', '55555555', NULL, 1),
(47, 'Станислав', 'zahs88@yandex.ru', '3330000', 'uploads/agent/icon_tr0LpcASyrldm7S8ImwV-naxjIiGDEKw.jpg', 4),
(48, 'Александр', 'qwwerty@yandex.ru', '1111111111', 'uploads/agent/icon_NqtHVUHZTyDLES5BN8_VYrieAo3S5V7l.jpg', 5),
(49, 'Админ', 'admin@zali-v-arendu.ru', '777000222', 'uploads/agent/icon_RC4EYpQ_Mu9wck0lYTD9g55Y9grgCW2o.jpg', 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `hall`
--

INSERT INTO `hall` (`id`, `name`, `attribs`, `square`, `images`, `optional_equipment`, `created_at`, `updated_at`, `public`, `deleted`, `floor_id`, `purpose_id`, `agent_id`, `price_id`, `address_id`) VALUES
(14, 'Дальневосточный, д.71', '{"images":[{"original":"uploads\\/hall\\/kSfMHIYCqU9zXluX9DHML3Eba4nIGZc0.jpg","thumbnail":"uploads\\/hall\\/th_kSfMHIYCqU9zXluX9DHML3Eba4nIGZc0.jpg","slide":"uploads\\/hall\\/slide_kSfMHIYCqU9zXluX9DHML3Eba4nIGZc0.jpg"},{"original":"uploads\\/hall\\/tD0F8JynJEVVUzH_4yo_j9-qfsmk61lY.jpg","thumbnail":"uploads\\/hall\\/th_tD0F8JynJEVVUzH_4yo_j9-qfsmk61lY.jpg","slide":"uploads\\/hall\\/slide_tD0F8JynJEVVUzH_4yo_j9-qfsmk61lY.jpg"},{"original":"uploads\\/hall\\/vL07cZbjyJOiifYUuHLiXOcHIVRrE67n.jpg","thumbnail":"uploads\\/hall\\/th_vL07cZbjyJOiifYUuHLiXOcHIVRrE67n.jpg","slide":"uploads\\/hall\\/slide_vL07cZbjyJOiifYUuHLiXOcHIVRrE67n.jpg"}],"geocode":"[\\"59.8778098\\",\\"30.4770474\\"]"}', 100, NULL, '', 1431422383, 1431422383, 1, NULL, 1, 1, 26, 26, 26),
(15, 'Александра Невского, д.2', '{"images":[{"original":"uploads\\/noimage.jpg","thumbnail":"uploads\\/th_noimage.jpg","slide":"uploads\\/slide_noimage.jpg"}],"geocode":"[\\"59.9243231\\",\\"30.3866531\\"]"}', 1000, NULL, 'Кондиционер', 1431435815, 1431435815, 1, NULL, 2, 1, 27, 27, 27),
(16, 'Александра Невского, д.2', '{"images":[{"original":"uploads\\/hall\\/KcldcLABhyE_Vyn_2M7VML17_hrvR3MW.jpg","thumbnail":"uploads\\/hall\\/th_KcldcLABhyE_Vyn_2M7VML17_hrvR3MW.jpg","slide":"uploads\\/hall\\/slide_KcldcLABhyE_Vyn_2M7VML17_hrvR3MW.jpg"},{"original":"uploads\\/hall\\/-5PhQkvOU0Fot7M7z06ZwyeUCRknL1Bk.jpg","thumbnail":"uploads\\/hall\\/th_-5PhQkvOU0Fot7M7z06ZwyeUCRknL1Bk.jpg","slide":"uploads\\/hall\\/slide_-5PhQkvOU0Fot7M7z06ZwyeUCRknL1Bk.jpg"},{"original":"uploads\\/hall\\/h-MMjwr6sA7AvegQqOZfXKhyeCPEur0d.jpg","thumbnail":"uploads\\/hall\\/th_h-MMjwr6sA7AvegQqOZfXKhyeCPEur0d.jpg","slide":"uploads\\/hall\\/slide_h-MMjwr6sA7AvegQqOZfXKhyeCPEur0d.jpg"},{"original":"uploads\\/hall\\/ltOfsExHVWEVfZOgxnELaI6bY9UiqCOE.jpg","thumbnail":"uploads\\/hall\\/th_ltOfsExHVWEVfZOgxnELaI6bY9UiqCOE.jpg","slide":"uploads\\/hall\\/slide_ltOfsExHVWEVfZOgxnELaI6bY9UiqCOE.jpg"},{"original":"uploads\\/hall\\/UYNy5Zo20umBJthClK_SO9dHiJ9oc_B1.jpg","thumbnail":"uploads\\/hall\\/th_UYNy5Zo20umBJthClK_SO9dHiJ9oc_B1.jpg","slide":"uploads\\/hall\\/slide_UYNy5Zo20umBJthClK_SO9dHiJ9oc_B1.jpg"},{"original":"uploads\\/hall\\/ltA1jvY5YE86u5lo9vgdxwZgkq6oxtNi.jpg","thumbnail":"uploads\\/hall\\/th_ltA1jvY5YE86u5lo9vgdxwZgkq6oxtNi.jpg","slide":"uploads\\/hall\\/slide_ltA1jvY5YE86u5lo9vgdxwZgkq6oxtNi.jpg"}],"geocode":"[\\"59.9243231\\",\\"30.3866531\\"]"}', 500, NULL, 'Есть душевая кабинка,  ', 1431671929, 1431671929, 1, NULL, 2, 1, 28, 28, 28),
(17, 'Невский, д.180/2', '{"images":[{"original":"uploads\\/hall\\/vVuxoORwHLVJPAfyN1ISV0KPJp9fww34.jpg","thumbnail":"uploads\\/hall\\/th_vVuxoORwHLVJPAfyN1ISV0KPJp9fww34.jpg","slide":"uploads\\/hall\\/slide_vVuxoORwHLVJPAfyN1ISV0KPJp9fww34.jpg"},{"original":"uploads\\/hall\\/6HYs-qTGdM1e-f68mkBR13BriGOeYcl_.jpg","thumbnail":"uploads\\/hall\\/th_6HYs-qTGdM1e-f68mkBR13BriGOeYcl_.jpg","slide":"uploads\\/hall\\/slide_6HYs-qTGdM1e-f68mkBR13BriGOeYcl_.jpg"},{"original":"uploads\\/hall\\/HJGCA197z_QukZT9iD7wPyn-lwZFnwak.jpg","thumbnail":"uploads\\/hall\\/th_HJGCA197z_QukZT9iD7wPyn-lwZFnwak.jpg","slide":"uploads\\/hall\\/slide_HJGCA197z_QukZT9iD7wPyn-lwZFnwak.jpg"},{"original":"uploads\\/hall\\/ZEteb9Eg4nIP0U7dMk_acxB6pZkpnl6U.jpg","thumbnail":"uploads\\/hall\\/th_ZEteb9Eg4nIP0U7dMk_acxB6pZkpnl6U.jpg","slide":"uploads\\/hall\\/slide_ZEteb9Eg4nIP0U7dMk_acxB6pZkpnl6U.jpg"},{"original":"uploads\\/hall\\/woapty7NkLeaAdCPMmmGUyVVAiHBXAGP.jpg","thumbnail":"uploads\\/hall\\/th_woapty7NkLeaAdCPMmmGUyVVAiHBXAGP.jpg","slide":"uploads\\/hall\\/slide_woapty7NkLeaAdCPMmmGUyVVAiHBXAGP.jpg"},{"original":"uploads\\/hall\\/84p3NBz4oF_tHohXFZ2loi5Y-fXsPX1X.jpg","thumbnail":"uploads\\/hall\\/th_84p3NBz4oF_tHohXFZ2loi5Y-fXsPX1X.jpg","slide":"uploads\\/hall\\/slide_84p3NBz4oF_tHohXFZ2loi5Y-fXsPX1X.jpg"},{"original":"uploads\\/hall\\/hqydBLt1riwGTnGXhtQuA9oZx7RxcGyB.jpg","thumbnail":"uploads\\/hall\\/th_hqydBLt1riwGTnGXhtQuA9oZx7RxcGyB.jpg","slide":"uploads\\/hall\\/slide_hqydBLt1riwGTnGXhtQuA9oZx7RxcGyB.jpg"},{"original":"uploads\\/hall\\/vUkL9n2Td_HgJIwLT06X7q3F9ULpyDpd.jpg","thumbnail":"uploads\\/hall\\/th_vUkL9n2Td_HgJIwLT06X7q3F9ULpyDpd.jpg","slide":"uploads\\/hall\\/slide_vUkL9n2Td_HgJIwLT06X7q3F9ULpyDpd.jpg"}],"geocode":"[\\"59.9252257\\",\\"30.382046\\"]"}', 1000, NULL, 'Хорошо проветриваемое помещение, есть кондиционер, душ, туалет мужская и женская раздевалка', 1431945847, 1431945847, 1, NULL, 1, 1, 29, 29, 29),
(18, 'Невский, д.184', '{"images":[{"original":"uploads\\/hall\\/uEo7DJpynZbgj1waVr8gawXE6ejRpaU6.jpg","thumbnail":"uploads\\/hall\\/th_uEo7DJpynZbgj1waVr8gawXE6ejRpaU6.jpg","slide":"uploads\\/hall\\/slide_uEo7DJpynZbgj1waVr8gawXE6ejRpaU6.jpg"},{"original":"uploads\\/hall\\/2r7R88CKdvzDZNWGD6I8WV3ckA9kU_Gx.jpg","thumbnail":"uploads\\/hall\\/th_2r7R88CKdvzDZNWGD6I8WV3ckA9kU_Gx.jpg","slide":"uploads\\/hall\\/slide_2r7R88CKdvzDZNWGD6I8WV3ckA9kU_Gx.jpg"},{"original":"uploads\\/hall\\/jFJb78Taqgp6E7G7CYMnlwLOmQbrTQvD.jpg","thumbnail":"uploads\\/hall\\/th_jFJb78Taqgp6E7G7CYMnlwLOmQbrTQvD.jpg","slide":"uploads\\/hall\\/slide_jFJb78Taqgp6E7G7CYMnlwLOmQbrTQvD.jpg"},{"original":"uploads\\/hall\\/YCeT_c2d6lJ_CU65TIMqCFs3P4KuKecM.jpg","thumbnail":"uploads\\/hall\\/th_YCeT_c2d6lJ_CU65TIMqCFs3P4KuKecM.jpg","slide":"uploads\\/hall\\/slide_YCeT_c2d6lJ_CU65TIMqCFs3P4KuKecM.jpg"},{"original":"uploads\\/hall\\/o3RtR5GmIy0AvUxsXr76bFtkDa5tW71r.jpg","thumbnail":"uploads\\/hall\\/th_o3RtR5GmIy0AvUxsXr76bFtkDa5tW71r.jpg","slide":"uploads\\/hall\\/slide_o3RtR5GmIy0AvUxsXr76bFtkDa5tW71r.jpg"},{"original":"uploads\\/hall\\/Jt_e41R3cClyd0UasM9Z4hYciOyNyntz.jpg","thumbnail":"uploads\\/hall\\/th_Jt_e41R3cClyd0UasM9Z4hYciOyNyntz.jpg","slide":"uploads\\/hall\\/slide_Jt_e41R3cClyd0UasM9Z4hYciOyNyntz.jpg"},{"original":"uploads\\/hall\\/K9ii41eg7Ps-ptUQSm8N6l-L-urInRg0.jpg","thumbnail":"uploads\\/hall\\/th_K9ii41eg7Ps-ptUQSm8N6l-L-urInRg0.jpg","slide":"uploads\\/hall\\/slide_K9ii41eg7Ps-ptUQSm8N6l-L-urInRg0.jpg"},{"original":"uploads\\/hall\\/GxB0Vdvw7ghClddjiYY1IUjEiSL84miN.jpg","thumbnail":"uploads\\/hall\\/th_GxB0Vdvw7ghClddjiYY1IUjEiSL84miN.jpg","slide":"uploads\\/hall\\/slide_GxB0Vdvw7ghClddjiYY1IUjEiSL84miN.jpg"},{"original":"uploads\\/hall\\/B4TBQLROM7lK-BUEg3ESAxEt8i74iV9i.jpg","thumbnail":"uploads\\/hall\\/th_B4TBQLROM7lK-BUEg3ESAxEt8i74iV9i.jpg","slide":"uploads\\/hall\\/slide_B4TBQLROM7lK-BUEg3ESAxEt8i74iV9i.jpg"},{"original":"uploads\\/hall\\/6uiG8GD18HN2Oi7z_cyhU_RkhWKfNFOA.jpg","thumbnail":"uploads\\/hall\\/th_6uiG8GD18HN2Oi7z_cyhU_RkhWKfNFOA.jpg","slide":"uploads\\/hall\\/slide_6uiG8GD18HN2Oi7z_cyhU_RkhWKfNFOA.jpg"}],"geocode":"[\\"59.9240983\\",\\"30.384307\\"]"}', 1000, NULL, '', 1431946284, 1431946284, 1, NULL, 2, 1, 30, 30, 30),
(19, 'Константина Заслонова, д.15', '{"images":[{"original":"uploads\\/hall\\/51BhmW0UJPiscLEImuUtBl127RXja80j.jpg","thumbnail":"uploads\\/hall\\/th_51BhmW0UJPiscLEImuUtBl127RXja80j.jpg","slide":"uploads\\/hall\\/slide_51BhmW0UJPiscLEImuUtBl127RXja80j.jpg"},{"original":"uploads\\/hall\\/ngjP4xEBlWiunLXaSFbgiuf7twds2zK2.jpg","thumbnail":"uploads\\/hall\\/th_ngjP4xEBlWiunLXaSFbgiuf7twds2zK2.jpg","slide":"uploads\\/hall\\/slide_ngjP4xEBlWiunLXaSFbgiuf7twds2zK2.jpg"},{"original":"uploads\\/hall\\/SQXOYg3rMk0UnemKNvg4ZKupuSUT3-Zm.jpg","thumbnail":"uploads\\/hall\\/th_SQXOYg3rMk0UnemKNvg4ZKupuSUT3-Zm.jpg","slide":"uploads\\/hall\\/slide_SQXOYg3rMk0UnemKNvg4ZKupuSUT3-Zm.jpg"}],"geocode":"[\\"59.9199021\\",\\"30.3491642\\"]"}', 1000, NULL, 'Есть душ', 1431960219, 1431960219, 1, NULL, 2, 1, 31, 31, 31);

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
(16, 1),
(18, 1),
(19, 1),
(15, 2),
(14, 3),
(15, 3),
(16, 3),
(15, 5),
(16, 5);

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
-- Структура таблицы `price`
--

CREATE TABLE IF NOT EXISTS `price` (
  `id` int(11) NOT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

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
(27, 300, 500),
(28, 300, 400),
(29, 300, 700),
(30, 300, 400),
(31, 100, 200),
(32, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `purpose`
--

CREATE TABLE IF NOT EXISTS `purpose` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `purpose`
--

INSERT INTO `purpose` (`id`, `name`) VALUES
(1, 'Танцевальный зал'),
(2, 'Спортивный зал'),
(3, 'Ледовый зал'),
(4, 'Конференц зал'),
(5, 'Йога'),
(6, 'Единоборства'),
(7, 'Акробатика');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `created_at`, `updated_at`, `username`, `auth_key`, `email_confirm_token`, `password_hash`, `password_reset_token`, `email`, `status`) VALUES
(1, 1431083612, 1431083612, 'guest', '9J7BVOWfh9NaQbepmTnf2trfSqr_rXdp', 'mKaLQTyOR4BgB2vVINkO49esuRb5CUiu', '$2y$13$RIDZO5scZiLBsq75/gx3/OwIbLH4XilQYxK.3A0zeI6jLAeWLiZaW', NULL, 'guest@example.com', 1),
(4, 1432020311, 1432020311, 'stas', '8wagWTxVVYyfQ0tSIW9joC5EkYHwv2DM', 'DNuvKAYU4TzElUCSdJsbyDTD8iUYb7Fk', '$2y$13$SAKGWJZmyYLdy.pWIlHhIuQgWHHfZmQyqoHPyCji/iUgebwSViUzC', NULL, 'zahs88@yandex.ru', 1),
(5, 1432286078, 1432286078, 'ambros', 'by47PgLml1tadS8iHr927JiOwi8bAz07', 'RTEGRhd-KeXePya7fXeV26sgrHgirwjn', '$2y$13$VHY9Hf55P0YUZy12.bI9s.9rAgR/0yyq4GAszNlpdFTBYNNvpN9uu', NULL, 'zahs88@gmail.com', 1),
(6, 1432543171, 1432543171, 'admin', 'kPHLU_iN_WM-4ww3ZCcVOx2p1_T076IY', 'DVKdl-T-6SyHMGrfM1F8_GE1gUcicWLl', '$2y$13$KMS2POIXTdv8hG1DH9D8M.yVo1umfCshNPOsZC/iSpq4oTHrc/ZJa', NULL, 'admin@gmail.com', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT для таблицы `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `metro`
--
ALTER TABLE `metro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT для таблицы `price`
--
ALTER TABLE `price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT для таблицы `purpose`
--
ALTER TABLE `purpose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `town`
--
ALTER TABLE `town`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
ADD CONSTRAINT `fk_metro_district1` FOREIGN KEY (`district_id`, `district_town_id`) REFERENCES `district` (`id`, `town_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
