-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 22 2021 г., 23:01
-- Версия сервера: 5.7.33-0ubuntu0.16.04.1
-- Версия PHP: 7.0.33-0ubuntu0.16.04.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `card`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`user`@`%` PROCEDURE `addOrganization` (IN `user_id_arg` INT, `name_arg` VARCHAR(255), `about_arg` VARCHAR(255), `address_arg` VARCHAR(255), `phone_arg` VARCHAR(255), `type_organization_id_arg` INT)  BEGIN
  INSERT into organization(user_id, name, about, address, phone, type_organization_id) VALUES (user_id_arg,name_arg, about_arg, address_arg, phone_arg, type_organization_id_arg);
END$$

CREATE DEFINER=`user`@`%` PROCEDURE `addProduct` (`organization_id_arg` INT, `name_arg` VARCHAR(255), `price_1_arg` INT, `price_3_arg` INT, `price_4_arg` INT, `about_arg` VARCHAR(255))  BEGIN
  INSERT into product(organization_id, name, price_1, price_3, price_4, about) VALUES (organization_id_arg, name_arg, price_1_arg, price_3_arg, price_4_arg, about_arg);
END$$

CREATE DEFINER=`user`@`%` PROCEDURE `getMeFromLogin` (IN `login_arg` VARCHAR(255))  BEGIN
    Select user.id, last_name, first_name, middle_name, phone, age, sekas, address, passport, status_user_id, login, balance, su.name as name from user inner join status_user su on user.status_user_id = su.id where user.login=login_arg;
END$$

CREATE DEFINER=`user`@`%` PROCEDURE `login` (IN `login_arg` VARCHAR(150))  BEGIN
    select password from user where login=login_arg;
END$$

CREATE DEFINER=`user`@`%` PROCEDURE `register` (IN `last` VARCHAR(150), IN `first` VARCHAR(150), IN `middle` VARCHAR(150), IN `phone_arg` VARCHAR(255), IN `age_arg` INT, IN `sekas_arg` VARCHAR(255), IN `address_arg` VARCHAR(255), IN `passport_arg` VARCHAR(255), IN `status_user_id_arg` INT, IN `login_arg` VARCHAR(255), IN `password_arg` VARCHAR(255))  BEGIN
    insert into user (last_name, first_name, middle_name, phone, age, sekas, address, passport, status_user_id, login, password)
    values (last,first,middle,phone_arg,age_arg,sekas_arg,address_arg,passport_arg,status_user_id_arg,login_arg,password_arg);
END$$

CREATE DEFINER=`user`@`%` PROCEDURE `selOrganization` (IN `id_arg` INT)  BEGIN

    select `order`.data as data, product.name, user_card.card, `order`.price from `order` inner join product on `order`.product_id = product.id inner join user_card on `order`.user_card_id = user_card.id where id_arg=product.organization_id order by `order`.id desc ;

END$$

CREATE DEFINER=`user`@`%` PROCEDURE `selProduct` (`id_arg` INT)  BEGIN

    select product.name, organization.name, user_card.card, `order`.price from `order` inner join product on `order`.product_id = product.id inner join user_card on `order`.user_card_id = user_card.id inner join organization on organization.id=product.organization_id where `order`.user_id=id_arg;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_card_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `data` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `user_id`, `user_card_id`, `product_id`, `price`, `data`) VALUES
(11, 16, 7, 4, 100, '2021-05-22 10:43:49'),
(12, 16, 5, 4, 100, '2021-05-22 10:43:49'),
(13, 15, 6, 4, 120, '2021-05-22 10:43:49'),
(14, 15, 6, 4, 120, '2021-05-22 10:43:49'),
(15, 15, 6, 4, 120, '2021-05-22 10:43:49'),
(16, 15, 6, 4, 120, '2021-05-22 10:43:49'),
(17, 15, 6, 4, 120, '2021-05-22 10:43:49'),
(18, 17, 8, 4, 30, '2021-05-22 10:43:49'),
(19, 15, 6, 4, 120, '2021-05-22 10:43:49'),
(20, 16, 7, 3, 150, '2021-05-22 10:43:49'),
(21, 16, 5, 3, 150, '2021-05-22 10:43:49'),
(23, 17, 8, 3, 50, '2021-05-22 12:08:28'),
(24, 16, 7, 3, 150, '2021-05-22 12:09:09'),
(25, 16, 7, 3, 150, '2021-05-22 12:31:30'),
(26, 16, 7, 3, 150, '2021-05-22 15:25:09'),
(27, 16, 7, 3, 150, '2021-05-22 15:25:20'),
(28, 16, 7, 3, 150, '2021-05-22 15:26:59'),
(29, 16, 7, 3, 150, '2021-05-22 15:28:34'),
(30, 16, 5, 3, 150, '2021-05-22 15:33:31'),
(31, 17, 8, 3, 50, '2021-05-22 18:24:41'),
(32, 17, 8, 3, 50, '2021-05-22 18:26:53'),
(33, 17, 8, 3, 50, '2021-05-22 18:41:33'),
(34, 17, 8, 3, 50, '2021-05-22 18:58:26'),
(35, 19, 12, 3, 300, '2021-05-22 20:37:09'),
(36, 19, 11, 3, 300, '2021-05-22 20:37:22'),
(37, 20, 13, 3, 50, '2021-05-22 20:43:36'),
(38, 20, 14, 3, 50, '2021-05-22 20:43:48'),
(39, 16, 5, 3, 150, '2021-05-22 20:47:08'),
(40, 16, 7, 3, 150, '2021-05-22 20:47:25');

-- --------------------------------------------------------

--
-- Структура таблицы `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `type_organization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `organization`
--

INSERT INTO `organization` (`id`, `user_id`, `name`, `about`, `address`, `phone`, `type_organization_id`) VALUES
(4, 14, 'Музей г. Новороссийск', 'Музей в центре города', 'Карла Либнехта 3', '79195800253', 1),
(5, 14, 'Столовая ШГПУ', 'Покушать вкусно)', 'Февральская 44-20', '79195800253', 4),
(6, 14, 'Кинотеатр Киномир', 'Кинотеатр г.Новороссийск', 'Ленина 44-20', '71235632200', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `location_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `price_1` int(11) NOT NULL,
  `price_3` int(11) DEFAULT NULL,
  `price_4` int(11) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `organization_id`, `location_id`, `name`, `price_1`, `price_3`, `price_4`, `about`) VALUES
(3, 4, NULL, 'Посещение музей', 300, 150, 50, NULL),
(4, 5, NULL, 'Ланч обед', 120, 100, 30, NULL),
(5, 5, NULL, 'Завтрак', 50, 40, 20, NULL),
(6, 6, NULL, 'Просмотр кино', 300, 150, 50, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `status_user`
--

CREATE TABLE `status_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `status_user`
--

INSERT INTO `status_user` (`id`, `name`) VALUES
(1, 'Турист'),
(2, 'Юр. лицо'),
(3, 'Житель'),
(4, 'Малоимущий');

-- --------------------------------------------------------

--
-- Структура таблицы `type_organization`
--

CREATE TABLE `type_organization` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `type_organization`
--

INSERT INTO `type_organization` (`id`, `name`) VALUES
(1, 'Музей'),
(2, 'Театр'),
(3, 'Кинотеатр'),
(4, 'Предприятие общественного питания'),
(5, 'Транспорт'),
(6, 'Типография'),
(7, 'Салон красоты'),
(8, 'Развлекательный центр'),
(9, 'Предприятие розничной торговли (ИП)');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `middle_name` varchar(150) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `sekas` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `status_user_id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `last_name`, `first_name`, `middle_name`, `phone`, `age`, `sekas`, `address`, `passport`, `status_user_id`, `login`, `password`, `balance`) VALUES
(14, 'Копорулин', 'Александр', 'Алексеевич', '79195800255', 22, '1', '0', '0', 2, 'sanyakop98', '$2y$10$S0kJmFcoFHT/m6uGNid2puDuebXVYsTsqUpimsEctxel1XKANkBIS', 4000),
(15, 'Руковишников', 'Григорий', 'Алексеевич', '79195800254', 32, '1', '0', '0', 1, 'qwer543', '$2y$10$haueXbz7sy07IzKK8nOVlueJj74RikXAh5jStKhNc.r2OB67BVHUS', 220),
(16, 'Кутыгин', 'Олег', 'Игоревич', '79003794162', 22, '1', '0', '0', 3, 'cakeislie', '$2y$10$mKnyKRPWL0RFbqlnJcA45.q0ZfhPexstXnDEKe9lAhqOHIzqEuTey', 200),
(17, 'Бадин', 'Виталий', 'Андреевич', '79003794163', 20, '1', '0', '0', 4, 'BeToC', '$2y$10$l/2VLMObP3pvbMDOlIWju..1QYHmxio8acxD87PcHhjrZPL0IU4E6', 68),
(18, 'Юрьева', 'Алёна', 'Андреевна', '79192500022', 19, '2', '0', '0', 1, 'sascha1111', '$2y$10$SEOpPe3as/C0a2420s9b0uyw.j9wqVqHfYsLNGeMqMW0yhdwzZQHe', 0),
(19, 'Иванов', 'Иван', 'Иванович', '79195800253', 23, '1', '0', '0', 1, 'ivan', '$2y$10$Yg0PxGR3tmpfYpCd/Oy0EudoCp1/cgQRTNlMHMSzexfu4RmEs.aoi', -540),
(20, 'Сидоров', 'Иван', 'Алексеевич', '79195800253', 34, '1', '0', '0', 4, 'tank', '$2y$10$.Y.S2O6YeKMosL.FE2MIlOEV7Op.y8UvGNuL4.4VD01NBfoh1qW/u', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `user_card`
--

CREATE TABLE `user_card` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `card` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user_card`
--

INSERT INTO `user_card` (`id`, `user_id`, `card`) VALUES
(5, 16, '16909060'),
(6, 15, '5324523'),
(7, 16, '3803270785'),
(8, 17, '239390975'),
(9, 18, '123534'),
(10, 18, '333333'),
(11, 19, '312312'),
(12, 19, '12312'),
(13, 20, '239390976'),
(14, 20, '1493966515');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `location_organization_id_fk` (`organization_id`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_user_id_fk` (`user_id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_location_id_fk` (`location_id`),
  ADD KEY `product_organization_id_fk` (`organization_id`);

--
-- Индексы таблицы `status_user`
--
ALTER TABLE `status_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type_organization`
--
ALTER TABLE `type_organization`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status_user_id` (`status_user_id`);

--
-- Индексы таблицы `user_card`
--
ALTER TABLE `user_card`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `user_card_card_uindex` (`card`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблицы `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `status_user`
--
ALTER TABLE `status_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `type_organization`
--
ALTER TABLE `type_organization`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `user_card`
--
ALTER TABLE `user_card`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
