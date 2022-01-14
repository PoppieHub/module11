-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 14 2022 г., 13:42
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `module11`
--

-- --------------------------------------------------------

--
-- Структура таблицы `home`
--

CREATE TABLE `home` (
  `id` int NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `birth` date NOT NULL,
  `city` text NOT NULL,
  `author` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `home`
--

INSERT INTO `home` (`id`, `firstName`, `lastName`, `birth`, `city`, `author`) VALUES
(1, 'Андрей', 'Королев', '1999-06-05', 'Челябинск', 1),
(2, 'Петя', 'Тестовый', '1900-12-26', 'город которого нет(', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `periodoflife`
--

CREATE TABLE `periodoflife` (
  `id` int NOT NULL,
  `json` json NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `periodoflife`
--

INSERT INTO `periodoflife` (`id`, `json`) VALUES
(1, '{\"0\": {\"namePeriod\": \"подростковый\", \"periodFrom\": \"12\", \"periodUpTo\": \"16\"}, \"1\": {\"namePeriod\": \"юношеский\", \"periodFrom\": \"17\", \"periodUpTo\": \"20\"}, \"2\": {\"namePeriod\": \"зрелый возраст, 1 период\", \"periodFrom\": \"21\", \"periodUpTo\": \"34\"}, \"3\": {\"namePeriod\": \"зрелый возраст, 2 период\", \"periodFrom\": \"35\", \"periodUpTo\": \"59\"}, \"4\": {\"namePeriod\": \"пожилой возраст\", \"periodFrom\": \"60\", \"periodUpTo\": \"74\"}, \"5\": {\"namePeriod\": \"старческий возраст\", \"periodFrom\": \"75\", \"periodUpTo\": \"89\"}, \"6\": {\"namePeriod\": \"долгожители\", \"periodFrom\": \"90\", \"periodUpTo\": \"none\"}, \"7\": {\"namePeriod\": \"детский\", \"periodFrom\": \"none\", \"periodUpTo\": \"11\"}}');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `periodoflife`
--
ALTER TABLE `periodoflife`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `home`
--
ALTER TABLE `home`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `periodoflife`
--
ALTER TABLE `periodoflife`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
