-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 30 2020 г., 13:29
-- Версия сервера: 10.4.13-MariaDB
-- Версия PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gbphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL,
  `info` text NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `info`, `img`) VALUES
(1, 'Японская картина Волны', '11000', 'Невероятное произведение искусства', 'waves.jpeg'),
(2, 'Кошелек', '350', 'Ошеломительный элемент декора', 'purse.jpeg'),
(3, 'Ковер-самолет', '19990', 'Этно ковер ручной работы', 'kazakh_carpet.jpg'),
(4, 'Кеды Животное', '990', 'Уникальные Кеды с принтом', 'cool_sneakers.jpg'),
(5, 'Пеньковый прямоугольник', '21000', 'Забытая картина брата Малевича', 'wooden_wall.jpg'),
(6, 'Сумка Фродо', '6000', 'Уникальная сумка из натуральной кожи дракона', 'bag.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL DEFAULT 'anonimus',
  `cart` text NOT NULL,
  `state` text NOT NULL DEFAULT 'paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='orders database';

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_name`, `cart`, `state`) VALUES
(4, 'admin', '{\"5\":{\"name\":\"Пеньковый прямоугольник\",\"price\":\"21000\",\"count\":1,\"id\":\"5\"},\"6\":{\"name\":\"Сумка Фродо\",\"price\":\"6000\",\"count\":2,\"id\":\"6\"}}', 'Успешно доставлен'),
(5, 'admin', '{\"6\":{\"name\":\"Сумка Фродо\",\"price\":\"6000\",\"count\":2,\"id\":\"6\"},\"5\":{\"name\":\"Пеньковый прямоугольник\",\"price\":\"21000\",\"count\":2,\"id\":\"5\"},\"4\":{\"name\":\"Кеды Животное\",\"price\":\"990\",\"count\":1,\"id\":\"4\"}}', 'Успешно доставлен');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(50) NOT NULL COMMENT 'Фио',
  `login` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 0 COMMENT '0 - uesr, 1 - admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `password`, `is_admin`) VALUES
(1, 'anonimus', 'admin', '$2y$10$VmxRReBSwmxlcIrLiEhCxuVJn9Ajz7NV8zRiCWbqKgMtZIPaE2KCq', 1),
(13, 'Test', 'test', '$2y$10$VmxRReBSwmxlcIrLiEhCxuVJn9Ajz7NV8zRiCWbqKgMtZIPaE2KCq', 0),
(15, 'Test', 'LoginTest', 'testPassword', 0),
(16, '11', '22', '33', 0),
(17, '22', '22', '22', 0),
(18, '22', '22', '22', 0),
(19, '22', '22', '22', 0),
(20, '22', '22', '22', 0),
(21, '22', '22', '22', 0),
(22, '1', '2', '3', 0),
(23, 'Jon Doe', 'test@gmail.com', 'mypass', 0),
(24, 'Jon Doe', 'no@gmail.com', '$2y$10$dEmCQswAXyOah4uLvyTzOOMv5M7KDmmpFVWnI/9gKribHTz6K5KXq', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
