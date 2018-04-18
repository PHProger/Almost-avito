-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 18 2018 г., 05:46
-- Версия сервера: 10.1.29-MariaDB
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `avto`
--

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(2, 'Audi'),
(11, 'Toyota'),
(12, 'BMW'),
(13, 'Volkswagen');

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `mileage` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `model_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `mileage`, `price`, `phone`, `model_id`, `created_at`, `updated_at`) VALUES
(2, '124 068', '500 000', '88005553535', 3, '0000-00-00 00:00:00', NULL),
(10, '123 456', '500 000', '8 800 555 35 35', 4, '0000-00-00 00:00:00', NULL),
(11, '120 000', '300 000', '8 800 555 35 35', 6, '0000-00-00 00:00:00', NULL),
(12, '87 000', '1 500 000', '8 800 555 35 35', 8, '0000-00-00 00:00:00', NULL),
(13, '134 200', '1 100 000', '8 800 555 35 35', 9, '0000-00-00 00:00:00', NULL),
(14, '900 000', '50 000', '8 800 555 35 35', 10, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `cars_options`
--

CREATE TABLE `cars_options` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cars_options`
--

INSERT INTO `cars_options` (`id`, `car_id`, `option_id`) VALUES
(99, 2, 2),
(100, 2, 4),
(101, 2, 9),
(102, 10, 2),
(103, 10, 3),
(104, 10, 8),
(105, 10, 9),
(106, 14, 8),
(107, 14, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `full` varchar(255) NOT NULL,
  `medium` varchar(255) NOT NULL,
  `small` varchar(255) NOT NULL,
  `car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `full`, `medium`, `small`, `car_id`) VALUES
(1, '/images/full/2_image-f54bfde8-1250x550.jpg', '/images/medium/2_image-f54bfde8-1250x550.jpg', '/images/small/2_image-f54bfde8-1250x550.jpg', 2),
(2, '/images/full/2_mil_tt-rs-coupe-671.jpg', '/images/medium/2_mil_tt-rs-coupe-671.jpg', '/images/small/2_mil_tt-rs-coupe-671.jpg', 2),
(7, '/images/full/2_2018-audi-tt-rs-side-angle-1500x1000.jpg', '/images/medium/2_2018-audi-tt-rs-side-angle-1500x1000.jpg', '/images/small/2_2018-audi-tt-rs-side-angle-1500x1000.jpg', 2),
(11, '/images/full/10_aad3.jpg', '/images/medium/10_aad3.jpg', '/images/small/10_aad3.jpg', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1523888230),
('m180414_073514_create_brands_table', 1523888585),
('m180414_073515_create_models_table', 1523888587),
('m180414_073516_create_cars_table', 1523888589),
('m180414_073638_create_options_table', 1523888589),
('m180414_073649_create_images_table', 1523907071),
('m180415_181327_create_cars_options_table', 1523907074);

-- --------------------------------------------------------

--
-- Структура таблицы `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `models`
--

INSERT INTO `models` (`id`, `name`, `brand_id`) VALUES
(3, 'TT', 2),
(4, 'A3', 2),
(6, 'Corolla', 11),
(8, 'X6', 12),
(9, 'A4', 2),
(10, 'Golf', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `options`
--

INSERT INTO `options` (`id`, `name`) VALUES
(1, 'Кондиционер'),
(2, 'Автопилот'),
(3, 'Детские кресла'),
(4, 'Холодильник'),
(8, 'Пулемёты в фарах'),
(9, 'Устройство разбрасывания шипов');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_to_models` (`model_id`);

--
-- Индексы таблицы `cars_options`
--
ALTER TABLE `cars_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_to_options` (`car_id`),
  ADD KEY `option_to_cars` (`option_id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_to_cars` (`car_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `model_to_brand` (`brand_id`);

--
-- Индексы таблицы `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `cars_options`
--
ALTER TABLE `cars_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_to_models` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cars_options`
--
ALTER TABLE `cars_options`
  ADD CONSTRAINT `car_to_options` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `option_to_cars` FOREIGN KEY (`option_id`) REFERENCES `options` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_to_cars` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `models`
--
ALTER TABLE `models`
  ADD CONSTRAINT `model_to_brand` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
