-- Servicio Web en PHP por Jose Hernández
-- https://josehernandez.es/2011/01/18/servicio-web-php.html
-- https://web.archive.org/web/20201026070426/https://josehernandez.es/2011/01/18/servicio-web-php.html

CREATE USER IF NOT EXISTS 'coches'@'localhost' IDENTIFIED WITH mysql_native_password BY 'coches';

GRANT ALL PRIVILEGES ON coches.* TO 'coches'@'localhost';

CREATE DATABASE IF NOT EXISTS `coches`;

USE `coches`;


CREATE TABLE IF NOT EXISTS `marcas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=10 ;


INSERT INTO `marcas` (`id`, `marca`) VALUES
(1, 'Ford'),
(2, 'Seat'),
(3, 'Nissan'),
(4, 'Audi'),
(5, 'BMW'),
(6, 'Citroen');



CREATE TABLE IF NOT EXISTS `modelos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `marca` bigint unsigned NOT NULL,
  `modelo` varchar(75) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`marca`) REFERENCES `marcas`(`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=37 ;


INSERT INTO `modelos` (`id`, `marca`, `modelo`) VALUES
(1, 1, 'Ka'),
(2, 1, 'Fiesta'),
(3, 1, 'Focus'),
(4, 1, 'Kuga'),
(5, 1, 'Mondeo'),
(6, 1, 'C-Max'),
(7, 1, 'Galaxy'),
(8, 2, 'Altea'),
(9, 2, 'Arosa'),
(10, 2, 'Córdoba'),
(11, 2, 'Exeo'),
(12, 2, 'Ibiza'),
(13, 2, 'León'),
(14, 3, 'Micra'),
(15, 3, 'Note'),
(16, 3, 'Pathfinder'),
(17, 3, 'Almera'),
(18, 3, 'Qashqai'),
(19, 4, 'A1'),
(20, 4, 'A2'),
(21, 4, 'A3'),
(22, 4, 'A4'),
(23, 4, 'A5'),
(24, 4, 'A6'),
(25, 4, 'A7'),
(26, 4, 'A8'),
(27, 5, 'Serie 1'),
(28, 5, 'Serie 3'),
(29, 5, 'Serie 5'),
(30, 5, 'Serie 6'),
(31, 5, 'Serie 7'),
(32, 6, 'C2'),
(33, 6, 'C3'),
(34, 6, 'C4'),
(35, 6, 'Xsara'),
(36, 6, 'Xsara Picasso');
