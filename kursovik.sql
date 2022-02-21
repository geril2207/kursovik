-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 21 2022 г., 22:29
-- Версия сервера: 5.6.47
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kursovik`
--

-- --------------------------------------------------------

--
-- Структура таблицы `abonements`
--

CREATE TABLE `abonements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `abonements`
--

INSERT INTO `abonements` (`id`, `title`, `price`) VALUES
(1, 'Lite', '650'),
(2, 'Standart', '800'),
(3, 'VIP', '1200'),
(4, 'student', '500');

-- --------------------------------------------------------

--
-- Структура таблицы `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `firstname`, `lastname`, `surname`, `type`) VALUES
(4, '', '', '$2y$10$wB7HCUjGLuaD5G8mfl.jqewLqdP.Hdt0oPxD9z1woz5cGjpaN.Tem', '', '', '', 'user'),
(5, 'ilya', 'ilya.bgd@mail.ru', '$2y$10$H6FcXdrQj8HTLPyiAvoll.oHGA/PS1frAwnvFYmjWUD6Xu.aUwFs2', '', '', '', 'user'),
(14, 'ilya123', 'ilya.bgd@mail.ru123', '$2y$10$vB5SjIm0E.5AxSKvuyrAFOh5Kbe73oRk6UYxnPR9Sc4Jb8cOlALl6', '', '', '', 'user'),
(44, 'asdas', 'asdasd', '$2y$10$HIanMMptzoMR4qhVwhQudeRxuLMpbhSTeSehnHYT4U7Wn0y6j.hLy', '', '', '', 'user'),
(91, 'i', 'ilya@mail.ru', '$2y$10$FTNoY2kVUdaf4IHeIUro9eeCbnyq6CgLf.jLUpTKm75SUZlbUrczK', '', '', '', 'user'),
(93, 'e', 'gergert.ilya228@gmail.com', '$2y$10$pURXWcFYFwn/e9HAloGEg.u1aWWQ4kI3uqnygpwzVM09sHrT/2bo2', '', '', '', 'user'),
(99, 'asd', 'asd@mail.ru', '$2y$10$Gvr.GyYt9y7DLaeN1dCsteCeSlEvjS7bs8InkWL0kiaUELlkkQtb2', '', '', '', 'user'),
(110, 'Quisquam quaerat eiu', 'dojubitoh@mailinator.com', '$2y$10$T5zUxM91rRopf/IWUbC23eURZXDNkFYqO4iGGApt3Zit84tuMD7Aq', '', '', '', 'user'),
(111, 'Laudantium illum q', 'vydebafagi@mailinator.com', '$2y$10$nUyfzxS9l5M5IRETv3IQ9uBD3fwWHPAf7fwCX3.gvooVLriFlnOmK', '', '', '', 'user'),
(112, 'Pariatur Et cillum ', 'bivewaj@mailinator.com', '$2y$10$PD9Cz7rtYUwe/djH/SrV1OV1yIu0fxg8d87mTf9HxVT9F6LOiK0wy', '', '', '', 'user'),
(119, 'Tempora dolor dolore', 'kebixi@mailinator.com', '$2y$10$ogZKLhjKbO2pmU6GG3vleuqX3HR3IBqQ3h6R0hjIESaPKwum4cjIO', 'Germane', 'Britt', 'Coffey', 'user'),
(121, 'il', '2131@mail.ru', '$2y$10$x6iWmYIXla8ph/ueen0/XegvTgx.Z.YoOc0nJOp7bTA7gII/h2EAG', '', '', '', 'user'),
(122, 'Voluptas est do lau', 'dego@mailinator.com', '$2y$10$tOtXeoezGcxjUSz/Dd4rJOhwZnBi68TtfGvCDB1abnANGbrSnucM2', '', '', '', 'user'),
(123, 'hello', 'naferak@mailinator.com', '$2y$10$iYfCwvKimLfOef9WHq4WBOfl1sDvTQaS7/vAzUi1fYDwgHHwax8he', '', '', '', 'user'),
(126, 'Esse quis nesciunt ', 'deqefoqo@mailinator.com', '$2y$10$Zjie3wq4lA9q5Nes.AtcJugG37XDj9OzHemrCKONvPAZhZWPgnIEC', '', '', '', 'user'),
(127, 'ilya222', 'jekyk@mailinator.com', '$2y$10$5n6QTWBoFVyigXfZeZR9cuypZ3xsuTOud6aXngOs1YoWxRLI7JVty', 'Keith', 'Maxwell', 'Dejesus', 'user'),
(130, 'a', 'nido@mailinator.com', '$2y$10$UnUaoi6RACCdzsOAgV1ujOj7.Xs1HedFNEnq83JQnI/FFTAeGkjC.', 'Chardeddd', 'Kramerdasd', 'Jenkins', 'user'),
(131, 'test', 'test@mail.ru', '$2y$10$QQbH/sRKBrzLqOjcvICdhOJo09l9SJOzJZbTeX6brcuee3uoVch2u', 'Илья', 'Гергерт', 'Максимович', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `abonements`
--
ALTER TABLE `abonements`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `abonements`
--
ALTER TABLE `abonements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
