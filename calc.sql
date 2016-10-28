-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 28 2016 г., 13:54
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `calc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `calculation`
--

CREATE TABLE IF NOT EXISTS `calculation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text,
  `material` int(11) DEFAULT NULL,
  `product_surface_area` float DEFAULT NULL,
  `wall_panel_surface_area` float DEFAULT NULL,
  `cut_under_the_hob` int(11) DEFAULT NULL,
  `cut_under_the_sink` int(11) DEFAULT NULL,
  `cut_under_the_sink_type` int(11) DEFAULT NULL,
  `skirting_type` int(11) DEFAULT NULL,
  `skirting` float DEFAULT NULL,
  `edge_type` int(11) DEFAULT NULL,
  `edge_size` int(11) DEFAULT NULL,
  `edge` int(11) DEFAULT NULL,
  `hem` int(11) DEFAULT NULL,
  `hem_size` int(11) DEFAULT NULL,
  `radius_elements` int(11) DEFAULT NULL,
  `product_and_wall_panel_install` int(11) DEFAULT NULL,
  `shipment` int(11) DEFAULT NULL,
  `washing` int(11) DEFAULT NULL,
  `washing_type` int(11) DEFAULT NULL,
  `protochka_stoka_vody` int(11) DEFAULT NULL,
  `podstavka_goryachee` int(11) DEFAULT NULL,
  `demontaj_izdelia` int(11) DEFAULT NULL,
  `montaj_podokonnikov` int(11) DEFAULT NULL,
  `podlojka_fanera` float DEFAULT NULL,
  `kreplenia` int(11) DEFAULT NULL,
  `hidden_cut_under_the_hob_for_one` float DEFAULT NULL,
  `hidden_cut_under_the_sink_for_one` float DEFAULT NULL,
  `hidden_skirting_for_one` float DEFAULT NULL,
  `hidden_edge_for_one` float DEFAULT NULL,
  `hidden_hem_for_one` float DEFAULT NULL,
  `hidden_radius_elements_for_one` float DEFAULT NULL,
  `hidden_product_and_wall_panel_install_for_one` float DEFAULT NULL,
  `hidden_shipment_for_one` float DEFAULT NULL,
  `hidden_washing_for_one` float DEFAULT NULL,
  `hidden_protochka_stoka_vody_for_one` float DEFAULT NULL,
  `hidden_podstavka_goryachee_for_one` float DEFAULT NULL,
  `hidden_demontaj_izdelia_for_one` float DEFAULT NULL,
  `hidden_montaj_podokonnikov_for_one` float DEFAULT NULL,
  `hidden_podlojka_fanera_for_one` float DEFAULT NULL,
  `hidden_kreplenia_for_one` float DEFAULT NULL,
  `is_draft` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `calculation`
--

INSERT INTO `calculation` (`id`, `comment`, `material`, `product_surface_area`, `wall_panel_surface_area`, `cut_under_the_hob`, `cut_under_the_sink`, `cut_under_the_sink_type`, `skirting_type`, `skirting`, `edge_type`, `edge_size`, `edge`, `hem`, `hem_size`, `radius_elements`, `product_and_wall_panel_install`, `shipment`, `washing`, `washing_type`, `protochka_stoka_vody`, `podstavka_goryachee`, `demontaj_izdelia`, `montaj_podokonnikov`, `podlojka_fanera`, `kreplenia`, `hidden_cut_under_the_hob_for_one`, `hidden_cut_under_the_sink_for_one`, `hidden_skirting_for_one`, `hidden_edge_for_one`, `hidden_hem_for_one`, `hidden_radius_elements_for_one`, `hidden_product_and_wall_panel_install_for_one`, `hidden_shipment_for_one`, `hidden_washing_for_one`, `hidden_protochka_stoka_vody_for_one`, `hidden_podstavka_goryachee_for_one`, `hidden_demontaj_izdelia_for_one`, `hidden_montaj_podokonnikov_for_one`, `hidden_podlojka_fanera_for_one`, `hidden_kreplenia_for_one`, `is_draft`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'первый тестовый заказ, выполнен на основе тестовых данных.', 1, 5, 6, 1, 1, 2, 2, 3, 2, 90, 2, 10, 80, 2, 1, 1, 2, 4, 1, 2, 3, 4, 5, 6, 758.36, 1061.71, 1365.06, 1677.7, 958.8, 4115.7, 24145.4, 2500, 7650, 1020, 2040, 3060, 4080, 5100, 6120, NULL, 1, 1477651588, 1477651588),
(2, 'тк в advanced приложении в init миграции для created_at используется тип int', 3, 2, 0, 1, 1, 1, 1, 1, 1, 40, 1, 1, 40, 1, 0, 1, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, 758.36, 682.523, 606.696, 581.767, 479.4, 4115.7, 4390.08, 2500, 9180, 1020, 2040, 3060, 4080, 5100, 6120, NULL, 1, 1477651588, 1477651588),
(3, 'Запуская наш проект в регионе, где часовой пояс был отличен от московского, мы столкнулись с проблемой разницы местного времени и времени сервера (московский часовой пояс). ', 1, 1, 1, 1, 1, 1, 1, 1, 1, 40, 1, 1, 40, 1, 1, 1, 1, 4, 1, 1, 1, 1, 1, 1, 758.36, 682.523, 606.696, 581.767, 479.4, 4115.7, 4829.09, 2500, 7650, 1020, 2040, 3060, 4080, 5100, 6120, NULL, 1, 1477651588, 1477651588),
(4, 'Итак нам требовалось найти решение, не требующее масштабного переписывания кода и SQL запросов, поэтому варианты корректировать время в запросах или средствами PHP не выглядели удачными. ', 2, 1, 2, 1, 1, 1, 1, 0, 1, 40, 0, 0, 40, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 758.36, 682.523, 606.696, 581.767, 479.4, 4115.7, 7024.13, 2500, 0, 1020, 2040, 3060, 4080, 5100, 6120, NULL, 1, 1477651588, 1477651588);

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `cost_price` float DEFAULT NULL,
  `plywood_glue_on_1mkv` float DEFAULT NULL,
  `cheat_profit_on_1mkv` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Дамп данных таблицы `material`
--

INSERT INTO `material` (`id`, `name`, `cost_price`, `plywood_glue_on_1mkv`, `cheat_profit_on_1mkv`) VALUES
(1, 'Akrillika A, B', 8.51911, 1000, 1),
(2, 'Akrillika C, D', 9.3949, 1000, 1),
(3, 'Akrillika E, G', 9.71338, 1000, 1),
(4, 'Akrillika F', 10.2707, 1000, 1),
(5, 'Akrillika FH', 11.3854, 1000, 1),
(6, 'Akrillika H (KA, DA)', 12.8185, 1000, 1),
(7, 'Akrillika HI (KA, DA)', 13.3758, 1000, 1),
(8, 'Apietra M1', 7.16561, 1000, 1),
(9, 'Apietra M2', 7.72293, 1000, 1),
(10, 'Apietra M3', 8.51911, 1000, 1),
(11, 'Corian-1', 10.1115, 1000, 1),
(12, 'Corian-2', 11.5446, 1000, 1),
(13, 'Corian-3', 12.6592, 1000, 1),
(14, 'Corian-4', 13.8535, 1000, 1),
(15, 'Hi-macs S-028', 384.156, 1000, 1),
(16, 'Hi-macs SOLID', 511.943, 1000, 1),
(17, 'Hi-macs LUCENT', 511.943, 1000, 1),
(18, 'Hi-macs SAND&PEARL', 540.605, 1000, 1),
(19, 'Hi-macs QUARTZ', 583.201, 1000, 1),
(20, 'Hi-macs GRANITE', 583.201, 1000, 1),
(21, 'Hi-macs VOLCANICS', 910.032, 1000, 1),
(22, 'Hi-macs GALAXY', 995.223, 1000, 1),
(23, 'Hi-macs SPARKLE', 995.223, 1000, 1),
(24, 'Hi-macs MARMO', 1080.81, 1000, 1),
(25, 'Hi-macs MIDAS', 1109.08, 1000, 1),
(26, 'Montelli A. B', 7.88217, 1000, 1),
(27, 'Montelli C', 8.9172, 1000, 1),
(28, 'Montelli D', 15.5255, 1000, 1),
(29, 'Samsung Sanded', 9.87261, 1000, 1),
(30, 'Samsung Solid', 9.87261, 1000, 1),
(31, 'Samsung Aspen', 10.6688, 1000, 1),
(32, 'Samsung Metallic', 10.7484, 1000, 1),
(33, 'Samsung Pebble', 11.3057, 1000, 1),
(34, 'Samsung Quarry', 15.2866, 1000, 1),
(35, 'Samsung Mosaic', 15.2866, 1000, 1),
(36, 'Samsung Tempest', 18.0732, 1000, 1),
(37, 'Tristone A (', 7.88217, 1000, 1),
(38, 'Tristone S, ST, ', 8.83758, 1000, 1),
(39, 'Tristone F', 9.55414, 1000, 1),
(40, 'Tristone T', 12.3408, 1000, 1),
(41, 'Tristone B', 12.3408, 1000, 1),
(42, 'Tristone TS, MT', 13.9331, 1000, 1),
(43, 'Tristone V', 13.9331, 1000, 1),
(44, 'Grandex P-104', 5.57325, 1000, 1),
(45, 'Grandex P-101, -102, -105', 6.21019, 1000, 1),
(46, 'Grandex P', 6.76752, 1000, 1),
(47, 'Grandex S, D', 7.00637, 1000, 1),
(48, 'Grandex A', 7.48408, 1000, 1),
(49, 'Grandex J', 9.23567, 1000, 1),
(50, 'Grandex V', 9.23567, 1000, 1),
(51, 'Grandex E', 10.9873, 1000, 1),
(52, 'Grandex MARMO', 12.0223, 1000, 1),
(53, 'Hanex Solo', 7.72293, 1000, 1),
(54, 'Hanex Magic', 7.72293, 1000, 1),
(55, 'Hanex Duo', 8.20064, 1000, 1),
(56, 'Hanex Cubic', 8.43949, 1000, 1),
(57, 'Hanex Trio', 8.43949, 1000, 1),
(58, 'Hanex Pearl', 8.20064, 1000, 1),
(59, 'Hanex Therapy', 8.83758, 1000, 1),
(60, 'Hanex Galleria', 10.7484, 1000, 1),
(61, 'Hanex Glittering', 12.7389, 1000, 1),
(62, 'Hanex Brionne', 12.0223, 1000, 1),
(63, 'Hanex Bellassimo', 12.0223, 1000, 1),
(64, 'Hanex Bellassimo Episode 2', 14.0127, 1000, 1),
(65, 'Hanex Nativo', 14.3312, 1000, 1),
(66, 'Grandex S-201, -204, -208, -211', 7.96178, 1000, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1475558920),
('m140209_132017_init', 1475558927),
('m140403_174025_create_account_table', 1475558928),
('m140504_113157_update_tables', 1475558931),
('m140504_130429_create_token_table', 1475558932),
('m140830_171933_fix_ip_field', 1475558934),
('m140830_172703_change_account_table_name', 1475558934),
('m141222_110026_update_ip_field', 1475558934),
('m141222_135246_alter_username_length', 1475558935),
('m150614_103145_update_social_account_table', 1475558937),
('m150623_212711_fix_username_notnull', 1475558937),
('m151218_234654_add_timezone_to_profile', 1475558938),
('m161027_060204_create_material_table', 1477548482),
('m161027_070049_create_options_table', 1477551706),
('m161027_074935_add_cut_under_the_hob_column_to_options_table', 1477554587),
('m161027_075905_add_wrapping_of_the_retail_price_column_to_options_table', 1477555150),
('m161027_083122_add_cut_under_the_sink_column_to_options_table', 1477557089),
('m161027_083451_add_cut_under_the_sink_fields_to_options_table', 1477557338),
('m161027_101329_add_skirting_fields_to_options_table', 1477563237),
('m161027_110754_add_edge_fields_to_options_table', 1477566510),
('m161027_132057_add_radius_elements_to_options_table', 1477574483),
('m161028_053420_add_install_fields_to_options_table', 1477632902),
('m161028_061435_add_shipment_field_to_options_table', 1477635296),
('m161028_063034_create_washing_table', 1477636989),
('m161028_065959_create_washing_prices_table', 1477638086),
('m161028_090018_add_six_fields_to_options_table', 1477648781),
('m161028_101044_create_calculation_table', 1477649843);

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usd_current_value` float DEFAULT NULL,
  `cut_under_the_hob` float DEFAULT NULL,
  `wrapping_of_the_retail_price` float DEFAULT NULL,
  `cut_under_the_sink_type1` float DEFAULT NULL,
  `cut_under_the_sink_type2` float DEFAULT NULL,
  `cut_under_the_sink_type3` float DEFAULT NULL,
  `cut_under_the_sink_type4` float DEFAULT NULL,
  `cut_under_the_sink_type5` float DEFAULT NULL,
  `skirting_type1` float DEFAULT NULL,
  `skirting_type2` float DEFAULT NULL,
  `edge_type1` float DEFAULT NULL,
  `edge_type2` float DEFAULT NULL,
  `edge_type3` float DEFAULT NULL,
  `radius_elements` float DEFAULT NULL,
  `product_install` float DEFAULT NULL,
  `wall_panel_install` float DEFAULT NULL,
  `shipment` float DEFAULT NULL,
  `protochka_stoka_vody` float DEFAULT NULL,
  `podstavka_goryachee` float DEFAULT NULL,
  `demontaj_izdelia` float DEFAULT NULL,
  `montaj_podokonnikov` float DEFAULT NULL,
  `podlojka_fanera` float DEFAULT NULL,
  `kreplenia` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `options`
--

INSERT INTO `options` (`id`, `usd_current_value`, `cut_under_the_hob`, `wrapping_of_the_retail_price`, `cut_under_the_sink_type1`, `cut_under_the_sink_type2`, `cut_under_the_sink_type3`, `cut_under_the_sink_type4`, `cut_under_the_sink_type5`, `skirting_type1`, `skirting_type2`, `edge_type1`, `edge_type2`, `edge_type3`, `radius_elements`, `product_install`, `wall_panel_install`, `shipment`, `protochka_stoka_vody`, `podstavka_goryachee`, `demontaj_izdelia`, `montaj_podokonnikov`, `podlojka_fanera`, `kreplenia`) VALUES
(1, 70, 743.49, 2, 669.14, 1040.89, 2081.78, 2081.78, 2081.78, 594.8, 1338.29, 100.36, 594.8, 1338.28, 4035, 2152, 2152, 2500, 1000, 2000, 3000, 4000, 5000, 6000);

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `social_account`
--

CREATE TABLE IF NOT EXISTS `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  UNIQUE KEY `account_unique_code` (`code`),
  KEY `fk_user_account` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `token`
--

CREATE TABLE IF NOT EXISTS `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_email` (`email`),
  UNIQUE KEY `user_unique_username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`) VALUES
(1, 'admin', 'alaevka@gmail.com', '$2y$10$TdK/3TBU4Jl95ZBaO2jxL.HmzDktKGdw7OZs3CIyQiBvohYvmonHS', 'iYojh_sb-Gs9m-0IzTSdoe0SHJT0zNiH', 1475560499, NULL, NULL, '127.0.0.1', 1475560469, 1475560469, 0),
(2, 'manager1', 'manager1@app.com', '$2y$10$H.pRCWSwW2.CGVPxgbl72uw2T601FuLGqI.9S.wY2SX3Z74kzGg/e', 'x5fV3oP5fSfsJuyhEGGIGU3u7p4fM-nU', 1475576796, NULL, NULL, '127.0.0.1', 1475576796, 1475576796, 0),
(3, 'manager2', 'manager2@app.com', '$2y$10$UihD79uBTLzoaY.wbe/mveU44TfrO4phADZJFGvWoFprZI9dR1YPO', 'gw8YUdsL6MQBI4b_cJJ81o8xSAuAegGH', 1475576915, NULL, NULL, '127.0.0.1', 1475576915, 1475576915, 0),
(5, 'partner1', 'partner1@app.com', '$2y$10$eAXYsKxJoeKpYsazomxXHOGc.WRRn1MlsdlH2QSfY68nJc3Bwrdpq', '_lY_2AkS2wFQKb_OWsZi6UVH_fcHDk0W', 1475576983, NULL, NULL, '127.0.0.1', 1475576983, 1475576983, 0),
(6, 'partner2', 'partner2@app.com', '$2y$10$uc0dgRtQfnXZR9J9hs5RHOZGMWFBk4FIt1gvsSNM8zlTbXfZ./e6m', 'Qn-__fEq4wyka-bj20gex_3hjsLRWu0Q', 1475577009, NULL, NULL, '127.0.0.1', 1475577010, 1475577010, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `washing`
--

CREATE TABLE IF NOT EXISTS `washing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `washing`
--

INSERT INTO `washing` (`id`, `name`) VALUES
(4, 'Omega 853'),
(5, 'Omega 809');

-- --------------------------------------------------------

--
-- Структура таблицы `washing_prices`
--

CREATE TABLE IF NOT EXISTS `washing_prices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `washing_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `price_for_partners` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Дамп данных таблицы `washing_prices`
--

INSERT INTO `washing_prices` (`id`, `washing_id`, `material_id`, `price`, `price_for_partners`) VALUES
(2, 3, 6666, 5666, 6666),
(4, 4, 1, 5000, 7500),
(5, 4, 2, 5000, 7500),
(6, 4, 3, 5000, 7500),
(7, 4, 4, 5000, 7500),
(8, 4, 5, 5000, 7500),
(9, 4, 6, 5000, 7500),
(10, 4, 7, 5000, 7500),
(11, 4, 8, 5000, 7500),
(12, 5, 1, 6000, 9000),
(13, 5, 2, 6000, 9000),
(14, 5, 3, 6000, 9000),
(15, 5, 4, 6000, 9000),
(16, 5, 5, 6000, 9000),
(17, 5, 6, 6000, 9000);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
