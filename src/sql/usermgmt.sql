-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2021 a las 16:15:28
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usermgmt`
--
CREATE DATABASE IF NOT EXISTS `usermgmt` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `usermgmt`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `painters`
--

DROP TABLE IF EXISTS `painters`;
CREATE TABLE IF NOT EXISTS `painters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `painters`
--

INSERT INTO `painters` (`id`, `name`) VALUES
(1, 'Francisco de Goya'),
(2, 'Diego Velázquez'),
(3, 'Van Gogh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paintings`
--

DROP TABLE IF EXISTS `paintings`;
CREATE TABLE IF NOT EXISTS `paintings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `img` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `period` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `technique` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `year` smallint(4) NOT NULL,
  `painter_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paintings`
--

INSERT INTO `paintings` (`id`, `title`, `img`, `description`, `period`, `technique`, `year`, `painter_fk`) VALUES
(1, 'La familia de Carlos IV', 'familia_de_Carlos_IV.jpg', 'Goya comenzó a trabajar en los bocetos —de los que el Prado conserva cinco— en la primavera de 1800. La versión definitiva la pintó entre julio de 1800 y junio de 1801, enviando la cuenta en diciembre de 1801. Perteneció a las colecciones privadas del Palacio Real de Madrid, donde aparece en el inventario de 1814. Pasó a formar parte del recién fundado Museo del Prado en 1824, por orden del rey Fernando VII, quien aparece retratado en el cuadro.', 'Neoclasicismo', 'Óleo sobre lienzo', 1800, 1),
(2, 'Fusilamientos 3 de Mayo', 'fusilamientos_3_mayo.jpg', ' La intención de Goya era plasmar la lucha del pueblo español contra la dominación francesa en el marco del levantamiento del dos de mayo, al inicio de la guerra de la Independencia española. Su pareja es El dos de mayo de 1808 en Madrid —también llamada La carga de los mamelucos—. Ambos cuadros de la misma época y corriente tienen la técnica y cromatismos propios del Goya maduro.', 'Romanticismo', 'Óleo sobre lienzo', 1814, 1),
(4, 'El dormitorio en Arlés', 'habitacion.jpg', 'Representa el dormitorio del pintor durante su estancia en la ciudad francesa de Arlés, un motivo sobre el que pintó tres cuadros casi idénticos. El primero, se conserva en el Museo Van Gogh de Ámsterdam, fue ejecutado en octubre de 1888 y se deterioró en una inundación ocurrida durante la hospitalización del pintor. Cerca de un año después, realizó el que hoy se encuentra en el Art Institute de Chicago; al mismo tiempo hizo otra, hoy en el Museo de Orsay, para su familia en Holanda.', 'Postimpresionismo', 'Óleo sobre lienzo', 1888, 3),
(5, 'Las meninas', 'las_meninas.jpg', 'Acabado en 1656, según Antonio Palomino, fecha unánimemente aceptada por la crítica, corresponde al último periodo estilístico del artista, el de plena madurez. Es una pintura realizada al óleo sobre un lienzo de grandes dimensiones formado por tres bandas de tela cosidas verticalmente, donde las figuras situadas en primer plano se representan a tamaño natural. Es una de las obras pictóricas más analizadas y comentadas en el mundo del arte', 'Barroco', 'Óleo sobre lienzo', 1734, 2),
(6, 'EL triunfo de Baco', 'los_borrachos.jpg', 'El cuadro lo pintó unos cinco años después de su llegada a Madrid procedente de Sevilla, y poco antes de su primer viaje a Italia. En los Sitios Reales Velázquez pudo contemplar la colección de pintura italiana del rey y hubo de quedar impresionado por los cuadros mitológicos con desnudos que tenía la colección, sumamente raros en su Sevilla natal; por lo cual se animó a tratar el mismo género, si bien con un enfoque muy personal.', 'Barroco', 'Óleo sobre lienzo', 1628, 2),
(7, 'Los girasoles', 'los_girasoles.jpg', 'Es una serie de cuadros al óleo realizados por el pintor neerlandés Vincent van Gogh. De la serie hay tres cuadros similares con catorce girasoles en un jarrón, dos con doce girasoles, uno con tres y otro con cinco.\r\nVan Gogh pintó los primeros cuatro cuadros en agosto de 1888, cuando vivía en Arlés, en el sur de Francia, y otros tres similares en enero del año siguiente. Las pinturas están todas ejecutadas en lienzos de cerca de 90 x 70 cm.', 'Postimpresionismo', 'Óleo sobre lienzo', 1888, 3),
(8, 'La maja vestida', 'maja_vestida.jpg', 'En origen, esta pintura y su «hermana», La maja desnuda, recibían el nombre de «gitanas» y no de «majas». Así aparecen en el inventario realizado en 1808 de los bienes de Manuel Godoy,2​ su primer propietario.\r\nEn 1813 fue llevada al Depósito General de Secuestros de la calle Alcalá, donde se refiere por primera vez a «una mujer vestida de maja»,1​ para después ser reclamadas ambas obras por el Tribunal de la Inquisición por ser «pinturas obscenas».', 'Romanticismo', 'Óleo sobre lienzo', 1800, 1),
(9, 'Noche estrellada', 'noche_estrellada.jpg', 'A raíz de la crisis sufrida el 30 de febrero de 1888 que resultó en la automutilación de su oreja izquierda, Van Gogh ingresó voluntariamente en el manicomio de Saint-Paul-de-Mausole el 8 de mayo de 1889.Ubicado en un antiguo monasterio, Saint-Paul-de-Mausole atendía a los ricos y estaba a menos de la mitad de su capacidad cuando llegó Van Gogh, lo que le permitió ocupar no solo un dormitorio en el segundo piso, sino también una habitación en la planta baja para utilizar como estudio de pintura.', 'Posimpresionismo', 'Óleo y Lienzo', 1889, 3),
(10, 'La rendición de Breda', 'rendicion_breda.jpg', 'Para entender desde un punto de vista histórico esta obra de Velázquez, hay que remontarse a lo que estaba sucediendo desde finales del siglo XVI y principios del XVII. Los Países Bajos (liderados por su noble más importante, Guillermo de Orange) estaban inmersos en la guerra de los ochenta años, en la que luchaban por independizarse de España.\r\nVelázquez también se inspiró en determinados pasajes de la comedia El sitio de Breda, de Calderón de la Barca', 'Barroco', 'Óleo sobre lienzo', 1634, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `painter_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `painter_fk`) VALUES
(5, 'ivan', 'ivan2', 'ivan@gmail.com', 2),
(6, 'aaa', 'aaa', 'aaa@aaa.com', 3),
(7, 'aaa', 'aaa', 'aaa@aaa.com', 1),
(8, 'aaa', 'aaa', 'aaa@aaa.com', 1),
(9, 'bbc', 'bbb', 'bbb@bbb.com', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
