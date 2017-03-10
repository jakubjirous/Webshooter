-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `device`;
CREATE TABLE `device` (
  `id_device` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) NOT NULL,
  `device` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `platform` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `screen_in` float NOT NULL COMMENT 'value in inches',
  `screen_width_in` float NOT NULL COMMENT 'value in inches',
  `screen_height_in` float NOT NULL COMMENT 'value in inches',
  `screen_cm` float NOT NULL COMMENT 'value in centimetres',
  `screen_width_cm` float NOT NULL COMMENT 'value in centimetres',
  `screen_height_cm` float NOT NULL COMMENT 'value in centimetres',
  `aspect_ratio` varchar(20) COLLATE utf8_czech_ci NOT NULL,
  `width_dp` float NOT NULL COMMENT 'value in density independent pixels',
  `height_dp` float NOT NULL COMMENT 'value in density independent pixels',
  `width_px` float NOT NULL COMMENT 'value in pixels',
  `height_px` float NOT NULL COMMENT 'value in pixels',
  `density` float NOT NULL,
  PRIMARY KEY (`id_device`),
  KEY `type_id` (`id_type`),
  CONSTRAINT `device_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `device_type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `device` (`id_device`, `id_type`, `device`, `platform`, `screen_in`, `screen_width_in`, `screen_height_in`, `screen_cm`, `screen_width_cm`, `screen_height_cm`, `aspect_ratio`, `width_dp`, `height_dp`, `width_px`, `height_px`, `density`) VALUES
(1,	4,	'Chromebox 30',	'Chrome',	30,	25.4,	15.9,	76.2,	64.5,	40.4,	'16:10',	2560,	1600,	2560,	1600,	1.5),
(2,	4,	'iMac 27',	'OS X',	27,	23.5,	13.2,	68.6,	59.7,	33.5,	'16:9',	2560,	1440,	2560,	1440,	1),
(3,	4,	'iMac 5K',	'OS X',	27,	23.5,	13.2,	68.6,	59.7,	33.5,	'16:9',	2560,	1440,	5120,	2880,	2),
(6,	1,	'Android One',	'Android',	4.5,	2.2,	3.9,	11.4,	5.6,	9.9,	'16:9',	320,	569,	480,	854,	1.5),
(7,	1,	'Google Pixel',	'Android',	5,	2.5,	4.4,	12.7,	6.3,	11.2,	'16:9',	411,	731,	1080,	1920,	2.6),
(8,	1,	'Google Pixel XL',	'Android',	5.5,	2.7,	4.8,	14,	6.9,	12.2,	'16:9',	411,	731,	1440,	2560,	3.5),
(9,	1,	'HTC One M8',	'Android',	5,	2.5,	4.4,	12.7,	6.3,	11.2,	'16:9',	360,	640,	1080,	1920,	3),
(10,	1,	'HTC One M9',	'Android',	5,	2.5,	4.4,	12.7,	6.3,	11.2,	'16:9',	360,	640,	1080,	1920,	3),
(11,	1,	'iPhone',	'iOS',	3.5,	1.9,	2.9,	8.9,	4.8,	7.4,	'3:2',	320,	480,	320,	480,	1),
(12,	1,	'iPhone 4',	'iOS',	3.5,	2,	2.9,	8.9,	5.1,	7.4,	'3:2',	320,	480,	640,	960,	2),
(13,	1,	'iPhone 5',	'iOS',	4.7,	2,	3.5,	10.2,	5.1,	8.9,	'16:9',	320,	568,	640,	1136,	2),
(14,	1,	'iPhone 6',	'iOS',	4.7,	2.3,	4.1,	11.9,	5.8,	10.4,	'16:9',	375,	667,	750,	1334,	2),
(15,	1,	'iPhone 6 Plus',	'iOS',	5.5,	2.7,	4.8,	14,	6.9,	12.2,	'16:9',	414,	736,	1080,	1920,	3),
(16,	1,	'LG G2',	'Android',	5.2,	2.5,	4.5,	13.2,	6.3,	11.4,	'16:9',	360,	640,	1080,	1920,	3),
(17,	1,	'LG G3',	'Android',	5.5,	2.7,	4.8,	14,	6.9,	12.2,	'16:9',	480,	853,	1440,	2560,	3),
(18,	1,	'Moto G',	'Android',	4.5,	2.2,	3.9,	11.4,	5.6,	9.9,	'16:9',	360,	640,	720,	1280,	2),
(19,	1,	'Moto X',	'Android',	4.7,	2.3,	4.1,	11.9,	5.8,	10.4,	'16:9',	360,	640,	720,	1280,	2),
(20,	1,	'Moto X (2nd Gen)',	'Android',	5.2,	2.5,	4.5,	13.2,	6.3,	11.4,	'16:9',	320,	640,	1080,	1920,	3),
(21,	1,	'Nexus 4',	'Android',	4.7,	3.2,	4,	11.9,	8.1,	10.2,	'5:3',	384,	640,	768,	1280,	2),
(22,	1,	'Nexus 5',	'Android',	5,	2.4,	4.3,	12.7,	6.1,	10.9,	'16:9',	360,	640,	1080,	1920,	3),
(23,	1,	'Nexus 5X',	'Android',	5.2,	2.5,	4.5,	13.2,	6.3,	11.4,	'16:9',	411,	731,	1080,	1920,	2.6),
(24,	1,	'Nexus 6',	'Android',	6,	2.9,	5.2,	15.2,	7.4,	13.2,	'16:9',	411,	731,	1440,	2560,	3.5),
(25,	1,	'Nexus 6P',	'Android',	5.7,	2.8,	5,	14.5,	7.1,	12.7,	'16:9',	411,	731,	1440,	2560,	3.5),
(26,	1,	'Samsung Galaxy Note 4',	'Android',	5.7,	2.8,	5,	14.5,	7.1,	12.7,	'16:9',	480,	853,	1440,	2560,	3),
(27,	1,	'Samsung Galaxy S5',	'Android',	5.1,	2.9,	5.6,	13,	7.4,	14.2,	'16:9',	320,	640,	1080,	1920,	3),
(28,	1,	'Samsung Galaxy S6',	'Android',	5.1,	2.5,	4.4,	13,	6.3,	11.2,	'16:9',	360,	640,	1440,	2560,	4),
(29,	1,	'Sony Xperia C4',	'Android',	5.5,	2.7,	4.8,	14,	6.9,	12.2,	'16:9',	540,	960,	1080,	1920,	2),
(30,	1,	'Sony Xperia Z Ultra',	'Android',	6.4,	3.1,	5.6,	16.3,	7.9,	14.2,	'16:9',	540,	960,	1080,	1920,	2),
(31,	1,	'Sony Xperia Z1 Compact',	'Android',	4.3,	2.1,	3.7,	10.9,	5.3,	9.4,	'16:9',	360,	640,	720,	1280,	2),
(32,	1,	'Sony Xperia Z2/Z3',	'Android',	5.2,	2.5,	4.5,	13.2,	6.3,	11.4,	'16:9',	360,	640,	1080,	1920,	3),
(33,	1,	'Sony Xperia Z3 Compact',	'Android',	4.6,	2.3,	4,	11.7,	5.8,	10.2,	'16:9',	320,	640,	720,	1280,	2),
(34,	3,	'Chromebook 11',	'Chrome',	11.6,	10.1,	5.7,	29.5,	25.7,	14.5,	'16:9',	1366,	768,	1366,	768,	1),
(35,	3,	'Chomebook Pixel',	'Chrome',	12.9,	10.7,	7.1,	32.8,	27.2,	18,	'3:2',	1280,	850,	2560,	1700,	2),
(36,	3,	'MacBook 12',	'OS X',	12,	10.2,	6.4,	30.5,	25.9,	16.3,	'16:10',	1280,	800,	2304,	1440,	2),
(37,	3,	'MacBook Air 11',	'OS X',	11.6,	10.1,	5.7,	25.9,	25.7,	14.5,	'16:9',	1366,	768,	1366,	768,	1),
(38,	3,	'MacBook Air 13',	'OS X',	13.3,	11.3,	7,	33.8,	28.7,	17.8,	'16:10',	1440,	900,	1440,	900,	1),
(39,	3,	'MacBook Pro 13',	'OS X',	13.3,	11.3,	7,	33.8,	28.7,	17.8,	'16:10',	1280,	800,	2560,	1600,	2),
(40,	3,	'MacBook Pro 15',	'OS X',	15.4,	13.1,	8.2,	39.1,	33.3,	20.8,	'16:10',	1440,	900,	2880,	1800,	2),
(41,	3,	'Surface',	'Windows',	10.6,	9.2,	5.2,	26.9,	23.4,	13.2,	'16:9',	1366,	768,	1366,	768,	1),
(42,	3,	'Surface 2',	'Windows',	10.6,	9.2,	5.2,	26.9,	23.4,	13.2,	'16:9',	1280,	720,	1920,	1080,	1.5),
(43,	3,	'Surface 3',	'Windows',	10.8,	9.4,	5.3,	27.4,	23.9,	13.5,	'16:9',	1280,	720,	1920,	1080,	1.5),
(44,	3,	'Surface Book',	'Windows',	13.5,	11.2,	7.5,	34.3,	28.4,	19.1,	'3:2',	1500,	1000,	3000,	2000,	2),
(45,	3,	'Surface Pro',	'Windows',	10.6,	9.2,	5.2,	26.9,	23.4,	13.2,	'16:9',	1280,	720,	1920,	1080,	1.5),
(46,	3,	'Surface Pro 3',	'Windows',	12,	10,	6.7,	30.5,	25.4,	17,	'3:2',	1440,	960,	2160,	1440,	1.5),
(47,	3,	'Surface Pro 4',	'Windows',	12.4,	10.3,	6.9,	31.5,	26.2,	17.5,	'3:2',	1368,	912,	2736,	1824,	2),
(48,	2,	'Dell Venue 8',	'Android',	8.4,	4.5,	7.1,	21.3,	11.4,	18,	'16:10',	800,	1280,	1600,	2560,	2),
(49,	2,	'iPad',	'iOS',	9.7,	5.8,	7.8,	24.6,	14.7,	19.8,	'4:3',	768,	1024,	768,	1024,	1),
(50,	2,	'iPad Mini',	'iOS',	7.9,	4.7,	6.3,	20.1,	11.9,	16,	'4:3',	768,	1024,	768,	1024,	1),
(51,	2,	'iPad Mini Retina',	'iOS',	7.9,	4.7,	6.3,	20.1,	1.9,	16,	'4:3',	768,	1024,	1536,	2048,	2),
(52,	2,	'iPad Pro',	'iOS',	12.9,	10.3,	7.7,	32.8,	26.2,	19.6,	'4:3',	1366,	1024,	2732,	2048,	2),
(53,	2,	'iPad Retina',	'iOS',	9.7,	5.8,	7.8,	24.6,	14.7,	19.8,	'4:3',	768,	1024,	1536,	2048,	2),
(54,	2,	'Nexus 10',	'Android',	10.1,	8.6,	5.4,	25.7,	21.8,	13.7,	'16:10',	1280,	800,	2560,	1600,	2),
(55,	2,	'Nexus 7 (\"12)',	'Android',	7,	3.7,	5.9,	17.8,	9.4,	15,	'16:10',	600,	960,	800,	1280,	1.3),
(56,	2,	'Nexus 7 (\"13)',	'Android',	7,	3.7,	6,	17.8,	9.4,	15.2,	'16:10',	600,	960,	1200,	1920,	2),
(57,	2,	'Nexus 9',	'Android',	8.9,	7.1,	5.3,	22.6,	18,	13.5,	'4:3',	1024,	768,	2048,	1536,	2),
(58,	2,	'Samsung Galaxy Tab 10',	'Android',	10.1,	5.4,	8.6,	25.7,	13.7,	21.8,	'16:10',	800,	1280,	800,	1280,	1),
(59,	2,	'Sony Xperia Z3 Tablet',	'Android',	8,	6.8,	4.2,	20.3,	17.3,	10.7,	'16:10',	960,	600,	1920,	1200,	2),
(60,	3,	'Sony Xperia Z4 Tablet',	'Android',	10.1,	8.6,	5.4,	25.7,	21.8,	13.7,	'16:10',	1280,	800,	2560,	1600,	2);

DROP TABLE IF EXISTS `device_type`;
CREATE TABLE `device_type` (
  `id_type` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `device_type` (`id_type`, `type`) VALUES
(1,	'Mobile'),
(2,	'Tablet'),
(3,	'Laptop'),
(4,	'Desktop'),
(5,	'Other'),
(6,	'Crop');

DROP TABLE IF EXISTS `plan`;
CREATE TABLE `plan` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) NOT NULL COMMENT 'id',
  `id_source` int(10) NOT NULL COMMENT 'id',
  `id_target` int(10) NOT NULL COMMENT 'id',
  `start_date` datetime NOT NULL,
  `primary_email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `secondary_email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT 'True / False',
  `start_type` int(11) DEFAULT NULL COMMENT 'id',
  `start_value` int(10) DEFAULT NULL,
  `end_type` int(11) DEFAULT NULL COMMENT 'id',
  `end_occurrence` int(10) NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `color` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `background` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `tolerance` int(10) NOT NULL COMMENT '%',
  `difference` float NOT NULL COMMENT '%',
  `ignore_top` int(10) DEFAULT NULL COMMENT 'px',
  `ignore_left` int(10) DEFAULT NULL COMMENT 'px',
  `ignore_width` int(10) DEFAULT NULL COMMENT 'px',
  `ignore_height` int(10) DEFAULT NULL COMMENT 'px',
  PRIMARY KEY (`id_plan`),
  KEY `repeate_end_type` (`end_type`),
  KEY `repeate_start_type` (`start_type`),
  KEY `id_user` (`id_user`),
  KEY `id_source` (`id_source`),
  KEY `id_target` (`id_target`),
  CONSTRAINT `plan_ibfk_10` FOREIGN KEY (`start_type`) REFERENCES `repeate_start` (`id_repeate`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `plan_ibfk_11` FOREIGN KEY (`id_source`) REFERENCES `shoot` (`id_shoot`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `plan_ibfk_12` FOREIGN KEY (`id_target`) REFERENCES `shoot` (`id_shoot`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `plan_ibfk_13` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `plan_ibfk_9` FOREIGN KEY (`end_type`) REFERENCES `repeate_end` (`id_repeate`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `plan` (`id_plan`, `id_user`, `id_source`, `id_target`, `start_date`, `primary_email`, `secondary_email`, `status`, `start_type`, `start_value`, `end_type`, `end_occurrence`, `end_date`, `color`, `background`, `tolerance`, `difference`, `ignore_top`, `ignore_left`, `ignore_width`, `ignore_height`) VALUES
(34,	20,	38,	37,	'2017-02-28 19:20:15',	'admin@example.org',	'',	1,	2,	1,	1,	5,	'2017-04-27 10:26:00',	'red',	'grayscale',	50,	10,	NULL,	NULL,	NULL,	NULL),
(35,	20,	38,	37,	'2017-02-02 19:20:00',	'admin@example.org',	'',	1,	2,	1,	1,	5,	'2017-04-27 10:26:00',	'yellow',	'black',	20,	0,	NULL,	NULL,	NULL,	NULL),
(41,	20,	48,	49,	'2017-03-09 17:10:00',	'admin@example.org',	'',	1,	1,	1,	1,	5,	'2017-04-27 10:26:00',	'red',	'grayscale',	20,	2,	NULL,	NULL,	NULL,	NULL),
(42,	20,	48,	49,	'2017-03-09 17:10:00',	'test@example.org',	'',	1,	1,	1,	1,	5,	'2017-04-27 10:26:00',	'red',	'grayscale',	20,	2,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `repeate_end`;
CREATE TABLE `repeate_end` (
  `id_repeate` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_repeate`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `repeate_end` (`id_repeate`, `type`) VALUES
(1,	'Never'),
(2,	'After X occurrences'),
(3,	'Date');

DROP TABLE IF EXISTS `repeate_start`;
CREATE TABLE `repeate_start` (
  `id_repeate` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_repeate`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `repeate_start` (`id_repeate`, `type`) VALUES
(1,	'Daily'),
(2,	'Weekly'),
(3,	'Monthly'),
(4,	'Yearly');

DROP TABLE IF EXISTS `result`;
CREATE TABLE `result` (
  `id_source` int(10) NOT NULL,
  `id_target` int(10) NOT NULL,
  `color` varchar(100) COLLATE utf8_czech_ci NOT NULL DEFAULT '',
  `background` varchar(100) COLLATE utf8_czech_ci NOT NULL DEFAULT '',
  `tolerance` int(10) NOT NULL COMMENT 'Tolerance in %',
  `difference` float NOT NULL COMMENT 'Differences in comparison in %',
  `ignore_active` int(1) NOT NULL COMMENT 'Active ignore path',
  `ignore_top` int(10) DEFAULT NULL COMMENT 'px',
  `ignore_left` int(10) DEFAULT NULL COMMENT 'px',
  `ignore_width` int(10) DEFAULT NULL COMMENT 'px',
  `ignore_height` int(10) DEFAULT NULL COMMENT 'px',
  `path_img` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY `id_source_id_target` (`id_source`,`id_target`),
  KEY `id_target` (`id_target`),
  CONSTRAINT `result_ibfk_1` FOREIGN KEY (`id_source`) REFERENCES `shoot` (`id_shoot`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `result_ibfk_2` FOREIGN KEY (`id_target`) REFERENCES `shoot` (`id_shoot`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `result` (`id_source`, `id_target`, `color`, `background`, `tolerance`, `difference`, `ignore_active`, `ignore_top`, `ignore_left`, `ignore_width`, `ignore_height`, `path_img`, `date`) VALUES
(49,	48,	'red',	'grayscale',	94,	0.99,	0,	NULL,	NULL,	NULL,	NULL,	'/WS/results/1488105940-www-czc-cz-ipad-768x1024.jpg',	'2017-03-10 08:40:58');

DROP TABLE IF EXISTS `shoot`;
CREATE TABLE `shoot` (
  `id_shoot` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` int(10) DEFAULT NULL,
  `id_device` int(11) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `engine` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `browser_name` varchar(100) COLLATE utf8_czech_ci DEFAULT NULL,
  `browser_version` varchar(50) COLLATE utf8_czech_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `url_autority` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `img_type` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `img_mime` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `path_img` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `path_js` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `other_width` int(11) DEFAULT NULL COMMENT 'value in pixels',
  `other_height` int(11) DEFAULT NULL COMMENT 'value in pixels',
  `crop_viewport_width` int(11) DEFAULT NULL COMMENT 'value in pixels',
  `crop_viewport_height` int(11) DEFAULT NULL COMMENT 'value in pixels',
  `crop_top` int(11) DEFAULT NULL COMMENT 'value in pixels',
  `crop_left` int(11) DEFAULT NULL COMMENT 'value in pixels',
  `crop_width` int(11) DEFAULT NULL COMMENT 'value in pixels',
  `crop_height` int(11) DEFAULT NULL COMMENT 'value in pixels',
  PRIMARY KEY (`id_shoot`),
  KEY `id_device` (`id_device`),
  KEY `id_user` (`id_user`),
  KEY `id_shoot` (`id_shoot`),
  CONSTRAINT `shoot_ibfk_1` FOREIGN KEY (`id_device`) REFERENCES `device` (`id_device`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `shoot_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `shoot` (`id_shoot`, `id_user`, `id_device`, `date`, `engine`, `browser_name`, `browser_version`, `url`, `url_autority`, `img_type`, `img_mime`, `path_img`, `path_js`, `other_width`, `other_height`, `crop_viewport_width`, `crop_viewport_height`, `crop_top`, `crop_left`, `crop_width`, `crop_height`) VALUES
(12,	20,	59,	'2017-01-27 20:37:29',	'webkit',	'Chrome',	'55.0',	'http://www.benecko.info/webkamery/',	'www.benecko.info',	'png',	'image/png',	'/WS/shoots/1485545849-www-benecko-info-webkamery-sony-xperia-z3-tablet-960x600.png',	'/WS/js/1485545849-www-benecko-info-webkamery-sony-xperia-z3-tablet-960x600.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(19,	20,	35,	'2017-01-29 19:40:57',	'webkit',	'Chrome',	'55.0',	'http://www.fm.tul.cz/',	'www.fm.tul.cz',	'jpg',	'image/jpg',	'/WS/shoots/1485715257-www-fm-tul-cz-chomebook-pixel-1280x850.jpg',	'/WS/js/1485715257-www-fm-tul-cz-chomebook-pixel-1280x850.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(20,	20,	35,	'2017-01-29 19:58:39',	'gecko',	'Chrome',	'55.0',	'http://www.fm.tul.cz/',	'www.fm.tul.cz',	'jpg',	'image/jpg',	'/WS/shoots/1485716319-www-fm-tul-cz-chomebook-pixel-1280x850.jpg',	'/WS/js/1485716319-www-fm-tul-cz-chomebook-pixel-1280x850.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(25,	20,	48,	'2017-02-19 15:50:00',	'webkit',	'Chrome',	'56.0',	'http://www.apul.cz/',	'www.apul.cz',	'jpg',	'image/jpg',	'/WS/shoots/1487515800-www-apul-cz-dell-venue-8-800x1280.jpg',	'/WS/js/1487515800-www-apul-cz-dell-venue-8-800x1280.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(26,	20,	48,	'2017-02-19 16:06:07',	'gecko',	'Chrome',	'56.0',	'http://www.apul.cz/',	'www.apul.cz',	'jpg',	'image/jpg',	'/WS/shoots/1487516767-www-apul-cz-dell-venue-8-800x1280.jpg',	'/WS/js/1487516767-www-apul-cz-dell-venue-8-800x1280.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(27,	20,	48,	'2017-02-19 16:20:09',	'webkit',	'Chrome',	'56.0',	'http://www.apul.cz/',	'www.apul.cz',	'png',	'image/png',	'/WS/shoots/1487517609-www-apul-cz-dell-venue-8-800x1280.png',	'/WS/js/1487517609-www-apul-cz-dell-venue-8-800x1280.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(30,	20,	48,	'2017-02-19 16:20:58',	'gecko',	'Chrome',	'56.0',	'http://www.apul.cz/',	'www.apul.cz',	'jpg',	'image/jpg',	'/WS/shoots/1487517658-www-apul-cz-dell-venue-8-800x1280.jpg',	'/WS/js/1487517658-www-apul-cz-dell-venue-8-800x1280.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(34,	20,	34,	'2017-02-19 20:39:26',	'webkit',	'Chrome',	'56.0',	'http://www.porfix.cz/',	'www.porfix.cz',	'png',	'image/png',	'/WS/shoots/1487533166-www-porfix-cz-chromebook-11-1366x768.png',	'/WS/js/1487533166-www-porfix-cz-chromebook-11-1366x768.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(35,	20,	34,	'2017-02-19 20:39:41',	'webkit',	'Chrome',	'56.0',	'http://www.porfix.cz/',	'www.porfix.cz',	'jpg',	'image/jpg',	'/WS/shoots/1487533181-www-porfix-cz-chromebook-11-1366x768.jpg',	'/WS/js/1487533181-www-porfix-cz-chromebook-11-1366x768.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(36,	20,	48,	'2017-02-21 12:10:15',	'webkit',	'Microsoft Edge',	'14.14393',	'http://www.apul.cz/',	'www.apul.cz',	'jpg',	'image/jpg',	'/WS/shoots/1487675415-www-apul-cz-dell-venue-8-800x1280.jpg',	'/WS/js/1487675415-www-apul-cz-dell-venue-8-800x1280.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(37,	20,	48,	'2017-02-21 12:10:53',	'webkit',	'Firefox',	'50.0',	'http://www.apul.cz/',	'www.apul.cz',	'jpg',	'image/jpg',	'/WS/shoots/1487675453-www-apul-cz-dell-venue-8-800x1280.jpg',	'/WS/js/1487675453-www-apul-cz-dell-venue-8-800x1280.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(38,	20,	48,	'2017-02-21 12:11:06',	'webkit',	'Opera',	'43.0',	'http://www.apul.cz/',	'www.apul.cz',	'png',	'image/png',	'/WS/shoots/1487675466-www-apul-cz-dell-venue-8-800x1280.png',	'/WS/js/1487675466-www-apul-cz-dell-venue-8-800x1280.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(39,	20,	48,	'2017-02-22 08:09:27',	'webkit',	'Chrome',	'56.0',	'http://www.wpj.cz/',	'www.wpj.cz',	'png',	'image/png',	'/WS/shoots/1487747367-www-wpj-cz-dell-venue-8-800x1280.png',	'/WS/js/1487747367-www-wpj-cz-dell-venue-8-800x1280.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(40,	20,	NULL,	'2017-02-22 08:16:15',	'webkit',	'Chrome',	'56.0',	'https://v4-alpha.getbootstrap.com/components/forms/',	'v4-alpha.getbootstrap.com',	'png',	'image/png',	'/WS/shoots/1487747775-v4-alpha-getbootstrap-com-components-forms-other-1000xMAX.png',	'/WS/js/1487747775-v4-alpha-getbootstrap-com-components-forms-other-1000xMAX.js',	1000,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(42,	20,	37,	'2017-02-26 11:36:14',	'webkit',	'Chrome',	'56.0',	'http://www.tul.cz/',	'www.tul.cz',	'png',	'image/png',	'/WS/shoots/1488105374-www-tul-cz-macbook-air-11-1366x768.png',	'/WS/js/1488105374-www-tul-cz-macbook-air-11-1366x768.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(44,	20,	37,	'2017-02-26 11:37:58',	'webkit',	'Chrome',	'56.0',	'http://www.tul.cz/',	'www.tul.cz',	'jpg',	'image/jpg',	'/WS/shoots/1488105478-www-tul-cz-macbook-air-11-1366x768.jpg',	'/WS/js/1488105478-www-tul-cz-macbook-air-11-1366x768.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(46,	20,	37,	'2017-02-26 11:40:01',	'webkit',	'Chrome',	'56.0',	'https://www.czc.cz/',	'www.czc.cz',	'jpg',	'image/jpg',	'/WS/shoots/1488105601-www-czc-cz-macbook-air-11-1366x768.jpg',	'/WS/js/1488105601-www-czc-cz-macbook-air-11-1366x768.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(47,	20,	37,	'2017-02-26 11:40:48',	'webkit',	'Chrome',	'56.0',	'https://www.czc.cz/',	'www.czc.cz',	'jpg',	'image/jpg',	'/WS/shoots/1488105648-www-czc-cz-macbook-air-11-1366x768.jpg',	'/WS/js/1488105648-www-czc-cz-macbook-air-11-1366x768.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(48,	20,	49,	'2017-02-26 11:45:03',	'webkit',	'Chrome',	'56.0',	'https://www.czc.cz/',	'www.czc.cz',	'jpg',	'image/jpg',	'/WS/shoots/1488105903-www-czc-cz-ipad-768x1024.jpg',	'/WS/js/1488105903-www-czc-cz-ipad-768x1024.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(49,	20,	49,	'2017-02-26 11:45:40',	'webkit',	'Chrome',	'56.0',	'https://www.czc.cz/',	'www.czc.cz',	'jpg',	'image/jpg',	'/WS/shoots/1488105940-www-czc-cz-ipad-768x1024.jpg',	'/WS/js/1488105940-www-czc-cz-ipad-768x1024.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(52,	20,	6,	'2017-03-10 08:06:30',	'webkit',	'Chrome',	'56.0',	'http://www.wpj.cz/',	'www.wpj.cz',	'png',	'image/png',	'/WS/shoots/1489129590-www-wpj-cz-android-one-320x569.png',	'/WS/js/1489129590-www-wpj-cz-android-one-320x569.js',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `id_role` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` char(60) COLLATE utf8_czech_ci NOT NULL COMMENT 'sha1(hash)',
  PRIMARY KEY (`id_user`),
  KEY `id_role` (`id_role`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `user` (`id_user`, `id_role`, `username`, `email`, `password`) VALUES
(20,	3,	'admin',	'admin@example.org',	'$2y$10$sadwKBznA30FwG8I1ycIvepk6pP2AXlcTRc2gPSblQw9YhfUnoZky'),
(21,	1,	'test',	'test@test.cz',	'$2y$10$R.KMK4VJuniHpkMA.9qGwuN4JLSGzsnfGGi10ACtKCER.MrhjLwrW');

DROP TABLE IF EXISTS `user_role`;
CREATE TABLE `user_role` (
  `id_role` int(10) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1,	'User'),
(2,	'Super User'),
(3,	'Admin');

-- 2017-03-10 07:42:14
