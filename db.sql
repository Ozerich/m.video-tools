-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июл 28 2013 г., 22:52
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mvideo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `newspapers`
--

CREATE TABLE IF NOT EXISTS `newspapers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reff` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `newspapers`
--

INSERT INTO `newspapers` (`id`, `reff`, `user_id`, `date`, `name`) VALUES
(4, 'int_gazeta_08_extra_2013', 1, '2028-07-20', 'Газета N11');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `newspaper_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `newspaper_id`, `num`, `image`) VALUES
(19, 4, 1, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_01.jpg'),
(20, 4, 2, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_02.jpg'),
(21, 4, 3, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_03.jpg'),
(22, 4, 4, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_04.jpg'),
(23, 4, 5, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_05.jpg'),
(24, 4, 6, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_06.jpg'),
(25, 4, 7, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_07.jpg'),
(26, 4, 8, 'http://www.mvideo.ru/pics/o/red_newspaper/pages/130709/page_08.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `x` int(10) unsigned NOT NULL,
  `y` int(10) unsigned NOT NULL,
  `width` int(10) unsigned NOT NULL,
  `height` int(10) unsigned NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`) VALUES
(1, 'ozicoder@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Виталий', 'Озерский');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
