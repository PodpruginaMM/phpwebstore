-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 25 2020 г., 23:12
-- Версия сервера: 8.0.12
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1, 'Товар1', '100', 'Информация о первом товаре', 'img-66df5.jpg'),
(2, 'Товар2', '200', 'Информация о Втором товаре', 'img-66df5.jpg'),
(3, 'Товар3', '300', 'Информация о Третьем товаре', 'img-66df5.jpg'),
(4, 'Товар4', '400', 'Информация о Четвертом товаре', 'img-66df5.jpg'),
(5, 'Товар5', '500', 'Информация о пятом товаре', 'img-66df5.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(50) NOT NULL COMMENT 'Фио',
  `login` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0' COMMENT '0 - uesr, 1 - admin'
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
(22, '1', '2', '3', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
