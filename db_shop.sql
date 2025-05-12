-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 12 2025 г., 05:03
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `quantity` decimal(20,0) NOT NULL,
  `total_cost` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `quantity`, `total_cost`) VALUES
(1, 2, '2', '26000'),
(2, 2, '3', '27000'),
(3, 2, '2', '50000'),
(4, 2, '2', '26000'),
(5, 3, '2', '26000'),
(6, 3, '3', '75000'),
(7, 3, '3', '12500'),
(8, 2, '3', '25000'),
(9, 1, '7', '2275'),
(10, 1, '6', '2449'),
(11, 1, '1', '265'),
(12, 1, '7', '2410');

-- --------------------------------------------------------

--
-- Структура таблицы `order_product`
--

CREATE TABLE `order_product` (
  `id_order` int NOT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `order_product`
--

INSERT INTO `order_product` (`id_order`, `id_product`) VALUES
(1, 2),
(2, 2),
(3, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(6, 2),
(6, 2),
(7, 2),
(7, 3),
(7, 4),
(8, 1),
(8, 2),
(8, 1),
(9, 1),
(9, 1),
(9, 1),
(9, 1),
(9, 1),
(9, 1),
(9, 1),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 6),
(10, 7),
(11, 2),
(12, 3),
(12, 2),
(12, 7),
(12, 2),
(12, 6),
(12, 6),
(12, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cost` decimal(6,0) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `cost`, `image`) VALUES
(1, 'Тайна древнего замка', 'Автор: Алексей Петров. Жанр: Приключения. Рейтинг: 4.6', '325', 'book.png'),
(2, 'Путешествие во времени', 'Автор: Мария Иванова. Жанр: Фантастика. Рейтинг: 4.2', '265', 'book.png'),
(3, 'Загадка феникса', 'Автор: Игорь Смирнов. Жанр: Детектив. Рейтинг: 4.0', '756', 'book.png'),
(4, 'Мир без границ', 'Автор: Елена Козлова. Жанр: Научная фантастика. Рейтинг: 3.9', '541', 'book.png'),
(6, 'Сияние звёзд', 'Автор: Ольга Соколова. Жанр: Фантастика. Рейтинг: 4.1', '123', 'book.png'),
(7, 'Огонь и лёд', 'Автор: Луи Жермен. Жанр: Романтика. Рейтинг: 3.7', '439', 'book.png'),
(8, 'Мыс отчаяния', 'Автор: Алексей Петров. Жанр: Приключения. Рейтинг: 4.6', '325', 'book.png'),
(9, 'Странник', 'Автор: Мария Иванова. Жанр: Фантастика. Рейтинг: 4.2', '265', 'book.png'),
(10, 'Ложь в свету', 'Автор: Игорь Смирнов. Жанр: Детектив. Рейтинг: 4.0', '756', 'book.png'),
(11, 'Мир в небе', 'Автор: Елена Козлова. Жанр: Научная фантастика. Рейтинг: 3.9', '541', 'book.png'),
(12, 'Отец вечности', 'Автор: Ольга Соколова. Жанр: Фантастика. Рейтинг: 4.1', '123', 'book.png'),
(13, 'Последняя стена', 'Автор: Луи Жермен. Жанр: Романтика. Рейтинг: 3.7', '439', 'book.png');

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `role_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` decimal(20,0) NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `phone`, `role_id`) VALUES
(1, 'user', '1234', '89910369578', 2),
(2, 'user2', '1488', '1234567', 2),
(3, 'user3', '1234', '14881488', 2),
(4, 'root', '1', '12346789', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
