-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 16 2024 г., 19:17
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dem1305`
--

-- --------------------------------------------------------

--
-- Структура таблицы `master`
--

CREATE TABLE `master` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `master`
--

INSERT INTO `master` (`id`, `name`) VALUES
(1, 'Волочкова Наталья Андреевна'),
(2, 'Портаков Дмитрий Иванович');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(255) NOT NULL,
  `id_master` int(255) NOT NULL,
  `id_client` int(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Новое'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_master`, `id_client`, `date`, `time`, `status`) VALUES
(1, 2, 1, '2024-05-15', '8:00', 'Подтверждено'),
(2, 1, 5, '2024-05-15', '8:00', 'Подтверждено'),
(3, 1, 5, '2024-05-15', '17:00', 'Подтверждено'),
(5, 1, 5, '2024-05-15', '16:00', 'Подтверждено'),
(6, 1, 5, '2024-05-16', '14:00', 'Подтверждено'),
(7, 1, 5, '2024-05-16', '11:00', 'Подтверждено'),
(8, 2, 5, '2024-05-31', '11:00', 'Подтверждено'),
(9, 1, 5, '2024-05-19', '15:00', 'Подтверждено'),
(10, 1, 5, '2024-05-23', '15:00', 'Подтверждено'),
(11, 2, 5, '2024-05-01', '15:00', 'Подтверждено'),
(12, 1, 5, '2024-05-01', '8:00', 'Отклонено'),
(13, 1, 5, '2024-04-11', '8:00', 'Новое'),
(14, 1, 5, '2024-06-02', '8:00', 'Новое');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `auto_number` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `fio`, `login`, `pass`, `auto_number`, `role`) VALUES
(1, 'Русаков Илья Олегович', 'ilya', '123', '123123', 'user'),
(2, NULL, 'beauty', 'pass', NULL, 'admin'),
(3, '$fio', '$login', '$pass', '%auto_number', 'user'),
(5, '123', '123', '123', '123', 'user'),
(7, '', '435', '', '', 'user'),
(9, 'фыв', 'фыв', 'фыввы1', 'фыв', 'user'),
(10, '', 'tretrtert', '', '', 'user'),
(11, 'Фамилия Имя Отчество', '123@mail.ru', 'ew1', '123123', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_master` (`id_master`,`id_client`),
  ADD KEY `id_client` (`id_client`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `master`
--
ALTER TABLE `master`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_master`) REFERENCES `master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
