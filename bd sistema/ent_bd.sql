-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2013 a las 20:01:52
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ent_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chuto`
--

CREATE TABLE IF NOT EXISTS `chuto` (
  `Placal_Chuto` varchar(50) NOT NULL,
  `Serial_Carroceria` varchar(50) DEFAULT 'NULL',
  `Serial_Motor` varchar(50) DEFAULT 'NULL',
  `Modelo` varchar(50) DEFAULT 'NULL',
  `foto_chuto` varchar(250) DEFAULT 'NULL',
  `Km_recorridos` double DEFAULT NULL,
  `Observaciones` varchar(250) DEFAULT NULL,
  `Unidad` varchar(10) DEFAULT NULL,
  `Marca_Chuto_ID_Marca` int(11) NOT NULL,
  `Condicion_Chuto_ID_Condicion` int(11) NOT NULL,
  `Flota_ID_Flota` int(11) NOT NULL,
  `Ubicacion_ID_Ubicacion` int(11) NOT NULL,
  `Estatus_ID_Estatus` int(11) NOT NULL,
  `num_mant` int(11) DEFAULT NULL,
  PRIMARY KEY (`Placal_Chuto`),
  KEY `Chuto_Condicion_Chuto_FK` (`Condicion_Chuto_ID_Condicion`),
  KEY `Chuto_Estatus_FK` (`Estatus_ID_Estatus`),
  KEY `Chuto_Flota_FK` (`Flota_ID_Flota`),
  KEY `Chuto_Marca_Chuto_FK` (`Marca_Chuto_ID_Marca`),
  KEY `Chuto_Ubicacion_FK` (`Ubicacion_ID_Ubicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `chuto`
--

INSERT INTO `chuto` (`Placal_Chuto`, `Serial_Carroceria`, `Serial_Motor`, `Modelo`, `foto_chuto`, `Km_recorridos`, `Observaciones`, `Unidad`, `Marca_Chuto_ID_Marca`, `Condicion_Chuto_ID_Condicion`, `Flota_ID_Flota`, `Ubicacion_ID_Ubicacion`, `Estatus_ID_Estatus`, `num_mant`) VALUES
('00BGAE', '1FUYDSZB3WL909096', NULL, NULL, 'fotos_chutos/00BGAE/no_image.jpg', 0, NULL, NULL, 4, 2, 1, 10, 4, NULL),
('00PABA', '8XGAA13Y01V035130', NULL, NULL, 'fotos_chutos/00PABA/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('00UVAU', '8ATS2JSH06X052559', NULL, NULL, 'fotos_chutos/00UVAU/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('02BAAA', '02BAAA', NULL, NULL, 'fotos_chutos/02BAAA/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('02DDAH', '8XGAA14Y0XV001203', NULL, NULL, 'fotos_chutos/02DDAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('02UABH', '1FUYDZYB9TH597505', NULL, NULL, 'fotos_chutos/02UABH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('03MKAO', '93ZS2MSH068702881', NULL, NULL, 'fotos_chutos/03MKAO/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 9, 5, NULL),
('05GDAV', '3AKJA6CG97DX69104', NULL, NULL, 'fotos_chutos/05GDAV/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 8, 5, NULL),
('05PABA', '8XGAA14Y0XV001246', NULL, NULL, 'fotos_chutos/05PABA/no_image.jpg', 0, 'GRUA', NULL, 5, 3, 1, 5, 5, NULL),
('05UVAU', '8ATS2JSH06X052571', NULL, NULL, 'fotos_chutos/05UVAU/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 4, 5, NULL),
('06TKAA', '1FUYDZYB0VH597508', NULL, NULL, 'fotos_chutos/06TKAA/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('06UVAU', '8ATS2JSH06X052572', NULL, NULL, 'fotos_chutos/06UVAU/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 5, NULL),
('084ACP', '084ACP', NULL, NULL, 'fotos_chutos/084ACP/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('088GBX', '088GBX', NULL, NULL, 'fotos_chutos/088GBX/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('09MABL', '09MABL', NULL, NULL, 'fotos_chutos/09MABL/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('09SVAM', '09SVAM', NULL, NULL, 'fotos_chutos/09SVAM/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('09ZDAV', '93ZS2MRH068703207', NULL, NULL, 'fotos_chutos/09ZDAV/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('0AW476261', '0AW476261', NULL, NULL, 'fotos_chutos/0AW476261/no_image.jpg', 0, NULL, 'X-61', 5, 1, 3, 2, 5, NULL),
('0AW478849', 'B0AW478849', NULL, NULL, 'fotos_chutos/0AW478849/no_image.jpg', 0, 'DESMANTELADO', 'X-', 5, 3, 3, 3, 3, NULL),
('0AW478866', '0AW478866', NULL, NULL, 'fotos_chutos/0AW478866/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 3, 4, NULL),
('0AW492508', '0AW492508', NULL, NULL, 'fotos_chutos/0AW492508/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 3, 4, NULL),
('10DDAH', '8XGAA14Y0XV001211', NULL, NULL, 'fotos_chutos/10DDAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('10DKAT', '3AKJA6CGX7DZ13436', NULL, NULL, 'fotos_chutos/10DKAT/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 4, 5, NULL),
('10UVAU', '10UVAU', NULL, NULL, 'fotos_chutos/10UVAU/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('117UAI', 'R612SXHDV7747', NULL, NULL, 'fotos_chutos/117UAI/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('11CKAL', '11CKAL', NULL, NULL, 'fotos_chutos/11CKAL/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('11TKAA', '1FUYDZYB9VH597507', NULL, NULL, 'fotos_chutos/11TKAA/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('125VBT', '125VBT', NULL, NULL, 'fotos_chutos/125VBT/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('12CDAH', '8XGAA14Y0XV001180', NULL, NULL, 'fotos_chutos/12CDAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('13CKAT', '3AKJA6CG07DZ13493', NULL, NULL, 'fotos_chutos/13CKAT/no_image.jpg', 0, 'PLAN RECUPERACION', NULL, 5, 3, 1, 3, 5, NULL),
('148ACG', 'R612SXHDV7744', NULL, NULL, 'fotos_chutos/148ACG/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('14LGAH', '1FUYDSZB8XL984300', NULL, NULL, 'fotos_chutos/14LGAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('14UVAU', '8XVS4WSS86V500362', NULL, NULL, 'fotos_chutos/14UVAU/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 5, NULL),
('14YVAM', '14YVAM', NULL, NULL, 'fotos_chutos/14YVAM/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('16UVAU', '8XVS4WSS46V500364', NULL, NULL, 'fotos_chutos/16UVAU/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 5, NULL),
('18JDAP', 'WJMS2NSJ024256881', NULL, NULL, 'fotos_chutos/18JDAP/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 5, 5, NULL),
('18UVAU', '8XVS4WSS06V500366', NULL, NULL, 'fotos_chutos/18UVAU/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('198SAX', '198SAX', NULL, NULL, 'fotos_chutos/198SAX/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('19FSAP', '3AKJA6CG68DZ49951', NULL, NULL, 'fotos_chutos/19FSAP/no_image.jpg', 0, NULL, 'X-', 5, 1, 1, 3, 5, NULL),
('19HDAV', '3AKJA6CGX7DX69130', NULL, NULL, 'fotos_chutos/19HDAV/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 8, 5, NULL),
('1AW476303', 'B1AW476303', NULL, NULL, 'fotos_chutos/1AW476303/no_image.jpg', 0, 'PRUEBA DE CARRETERA', 'X-', 5, 3, 3, 5, 3, NULL),
('1AW476494', 'B1AW476494', NULL, NULL, 'fotos_chutos/1AW476494/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-38', 5, 3, 3, 3, 3, NULL),
('1AW478908', 'B1AW478908', NULL, NULL, 'fotos_chutos/1AW478908/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-84', 5, 3, 3, 3, 3, NULL),
('1AW492548', '1AW492548', NULL, NULL, 'fotos_chutos/1AW492548/no_image.jpg', 0, NULL, 'X-109', 5, 2, 3, 2, 5, NULL),
('21HDAT', '8XGAA14Y0XV001203', NULL, NULL, 'fotos_chutos/21HDAT/no_image.jpg', 0, NULL, 'X-', 5, 1, 1, 5, 5, NULL),
('22HSAD', NULL, NULL, NULL, 'fotos_chutos/22HSAD/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('22JDAH', '8XGAA14Y0YV005917', NULL, NULL, 'fotos_chutos/22JDAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('24TDAE', 'CH613TV95550', NULL, NULL, 'fotos_chutos/24TDAE/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('24XMAK', '1M1AA13Y5XW096465', NULL, NULL, 'fotos_chutos/24XMAK/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('25VFAG', NULL, NULL, NULL, 'fotos_chutos/25VFAG/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('26DGBA', '8ATS2JSH06X052803', NULL, NULL, 'fotos_chutos/26DGBA/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 5, NULL),
('26VGAX', '93ZS2JSH058701187', NULL, NULL, 'fotos_chutos/26VGAX/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('26XMAK', '1M1AA13Y7XW096466', NULL, NULL, 'fotos_chutos/26XMAK/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('27DGBA', '8ATS2JSH06X052804', NULL, NULL, 'fotos_chutos/27DGBA/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('284MBO', 'R612SXHDV8970', NULL, NULL, 'fotos_chutos/284MBO/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('29PJAH', '3AKJA6CG08DZ56202', NULL, NULL, 'fotos_chutos/29PJAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 8, 5, NULL),
('29TDAO', NULL, NULL, NULL, 'fotos_chutos/29TDAO/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('2AW492557', 'B2AW492557', NULL, NULL, 'fotos_chutos/2AW492557/no_image.jpg', 0, NULL, 'X-119', 5, 1, 3, 2, 5, NULL),
('2AW492655', 'B2AW492655', NULL, NULL, 'fotos_chutos/2AW492655/no_image.jpg', 0, NULL, 'X-16', 5, 1, 3, 2, 5, NULL),
('30NDAM', '8XGAA14Y02V001602', NULL, NULL, 'fotos_chutos/30NDAM/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('31NDAM', '8XGAA14Y02V001603', NULL, NULL, 'fotos_chutos/31NDAM/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('32NDAM', '8XGAA14Y02V001604', NULL, NULL, 'fotos_chutos/32NDAM/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('33DGBA', '8XVS4WSS86V500393', NULL, NULL, 'fotos_chutos/33DGBA/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 5, 5, NULL),
('34DGBA', '8XVS4WSS66V500394', NULL, NULL, 'fotos_chutos/34DGBA/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('34KABG', NULL, NULL, NULL, 'fotos_chutos/34KABG/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('364VBP', NULL, NULL, NULL, 'fotos_chutos/364VBP/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('38CAAU', '8XGAA14Y01V001404', NULL, NULL, 'fotos_chutos/38CAAU/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('39ZOAC', NULL, NULL, NULL, 'fotos_chutos/39ZOAC/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('3AW476321', 'B3AW476321', NULL, NULL, 'fotos_chutos/3AW476321/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-52', 5, 3, 3, 3, 3, NULL),
('3AW476366', 'B3AW476366', NULL, NULL, 'fotos_chutos/3AW476366/no_image.jpg', 0, 'MOTOR DAÑADO', 'X-2', 5, 3, 3, 5, 3, NULL),
('3AW476402', '3AW476402', NULL, NULL, 'fotos_chutos/3AW476402/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 3, 4, NULL),
('3AW476495', 'B3AW476495', NULL, NULL, 'fotos_chutos/3AW476495/no_image.jpg', 0, NULL, 'X-47', 5, 3, 3, 3, 3, NULL),
('3AW478912', '3AW478912', NULL, NULL, 'fotos_chutos/3AW478912/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 4, 3, NULL),
('3AW478926', 'B3AW478926', NULL, NULL, 'fotos_chutos/3AW478926/no_image.jpg', 0, NULL, 'X-118', 5, 1, 3, 2, 5, NULL),
('3AW492552', 'B3AW492552', NULL, NULL, 'fotos_chutos/3AW492552/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 3, 3, NULL),
('3AW492566', '3AW492566', NULL, NULL, 'fotos_chutos/3AW492566/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 4, 4, NULL),
('43DMAR', '8XGAA13Y01V034642', NULL, NULL, 'fotos_chutos/43DMAR/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('43LVBA', NULL, NULL, NULL, 'fotos_chutos/43LVBA/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('43PDAE', 'CH613TV92632', NULL, NULL, 'fotos_chutos/43PDAE/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('43ZPAA', NULL, NULL, NULL, 'fotos_chutos/43ZPAA/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('443GBY', 'R612SXHDV8968', NULL, NULL, 'fotos_chutos/443GBY/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('44GGAY', '3AKJC5CV46DV21103', NULL, NULL, 'fotos_chutos/44GGAY/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('4AW478935', '4AW478935', NULL, NULL, 'fotos_chutos/4AW478935/no_image.jpg', 0, NULL, 'X-', 5, 3, 3, 5, 3, NULL),
('4AW492639', 'B4AW492639', NULL, NULL, 'fotos_chutos/4AW492639/no_image.jpg', 0, NULL, 'X-', 5, 2, 3, 2, 5, NULL),
('502GBB', 'R612SXHDV7746', NULL, NULL, 'fotos_chutos/502GBB/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('50ABAI', '1M1AD08Y9XW002596', NULL, NULL, 'fotos_chutos/50ABAI/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('515AAT', 'R6097V17692', NULL, NULL, 'fotos_chutos/515AAT/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('516AAT', 'R609TV27584', NULL, NULL, 'fotos_chutos/516AAT/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('51ABAI', '1M1AD08Y6XW002622', NULL, NULL, 'fotos_chutos/51ABAI/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('51KGAJ', NULL, NULL, NULL, 'fotos_chutos/51KGAJ/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('52DGBM', NULL, NULL, NULL, 'fotos_chutos/52DGBM/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('56FFAM', '1M1AG11Y96M047801', NULL, NULL, 'fotos_chutos/56FFAM/no_image.jpg', 0, NULL, 'X-', 5, 1, 1, 2, 5, NULL),
('56JFAM', '1M1AG11Y56M052574', NULL, NULL, 'fotos_chutos/56JFAM/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('56KFAM', '1M1AG11Y36M052573', NULL, NULL, 'fotos_chutos/56KFAM/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('56XDAE', 'CH613HDTV01129', NULL, NULL, 'fotos_chutos/56XDAE/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('57DMAR', '8XGAA13Y01V034644', NULL, NULL, 'fotos_chutos/57DMAR/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('57XMAF', NULL, NULL, NULL, 'fotos_chutos/57XMAF/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('57XVAZ', '3AKJA6CG38DY94049', NULL, NULL, 'fotos_chutos/57XVAZ/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 3, 5, NULL),
('58XDAE', 'CH613HDTV01131', NULL, NULL, 'fotos_chutos/58XDAE/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('596VCB', NULL, NULL, NULL, 'fotos_chutos/596VCB/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('59XKAN', '8XVS4WSS46V500400', NULL, NULL, 'fotos_chutos/59XKAN/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('5AW476336', 'B5AW476336', NULL, NULL, 'fotos_chutos/5AW476336/no_image.jpg', 0, NULL, 'X-', 5, 3, 3, 4, 3, NULL),
('5AW476482', 'B5AW476482', NULL, NULL, 'fotos_chutos/5AW476482/no_image.jpg', 0, 'A DESINCORPORAR', 'X-48', 5, 3, 3, 6, 4, NULL),
('602GBO', 'R611SXV27157', NULL, NULL, 'fotos_chutos/602GBO/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('606GBO', 'R611SXV27041', NULL, NULL, 'fotos_chutos/606GBO/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('60KGAH', '1FUYDSZB5XL984299', NULL, NULL, 'fotos_chutos/60KGAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('61EDAS', '8ATS2J5405X051354', NULL, NULL, 'fotos_chutos/61EDAS/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('61XVAZ', '3AKJA6CG28DZ49865', NULL, NULL, 'fotos_chutos/61XVAZ/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 3, 5, NULL),
('62XKAN', '8XVS4WSS96V500403', NULL, NULL, 'fotos_chutos/62XKAN/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('63KGAH', '1FUYDSZ2B7XL984305', NULL, NULL, 'fotos_chutos/63KGAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('65XKAN', '8XVS4WSS56V500422', NULL, NULL, 'fotos_chutos/65XKAN/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('680DAY', NULL, NULL, NULL, 'fotos_chutos/680DAY/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('684XEO', 'RD688SXHDTV12865', NULL, NULL, 'fotos_chutos/684XEO/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('689GAP', 'R611SXV22364', NULL, NULL, 'fotos_chutos/689GAP/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('698GAP', 'R611SXV29901', NULL, NULL, 'fotos_chutos/698GAP/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('69HDAV', '3AKJA6CG97DX87070', NULL, NULL, 'fotos_chutos/69HDAV/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 3, 5, NULL),
('6AW476328', 'B6AW476328', NULL, NULL, 'fotos_chutos/6AW476328/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-104', 5, 3, 3, 4, 3, NULL),
('6AW476457', 'B6AW476457', NULL, NULL, 'fotos_chutos/6AW476457/no_image.jpg', 0, NULL, 'X-50', 5, 1, 3, 2, 5, NULL),
('6AW478872', 'B6AW478872', NULL, NULL, 'fotos_chutos/6AW478872/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('70XMAN', NULL, NULL, NULL, 'fotos_chutos/70XMAN/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('72LAAW', '8XGAA13Y01V034643', NULL, NULL, 'fotos_chutos/72LAAW/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('756XCL', 'R686TV18491', NULL, NULL, 'fotos_chutos/756XCL/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('760XCL', 'R686TV18495', NULL, NULL, 'fotos_chutos/760XCL/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('777KAL', NULL, NULL, NULL, 'fotos_chutos/777KAL/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('77AMBE', '93ZS2MRH068703209', NULL, NULL, 'fotos_chutos/77AMBE/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 3, 4, NULL),
('77VGBA', '3AKJA6CG97DW84666', NULL, NULL, 'fotos_chutos/77VGBA/no_image.jpg', 0, NULL, 'X-', 5, 2, 1, 3, 5, NULL),
('786VCC', NULL, NULL, NULL, 'fotos_chutos/786VCC/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('78AMBE', '93ZS2MRH068703268', NULL, NULL, 'fotos_chutos/78AMBE/no_image.jpg', 0, NULL, 'X-', 5, 1, 1, 2, 5, NULL),
('78CDAH', '8XGAA14Y0XV001192', NULL, NULL, 'fotos_chutos/78CDAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('78KMBL', NULL, NULL, NULL, 'fotos_chutos/78KMBL/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('799VCG', NULL, NULL, NULL, 'fotos_chutos/799VCG/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('79CDAH', '8XGAA14Y0XV001193', NULL, NULL, 'fotos_chutos/79CDAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('7AW476287', 'B7AW476287', NULL, NULL, 'fotos_chutos/7AW476287/no_image.jpg', 0, NULL, 'X-42', 5, 2, 3, 2, 5, NULL),
('7AW492604', '7AW492604', NULL, NULL, 'fotos_chutos/7AW492604/no_image.jpg', 0, NULL, 'X-49', 5, 3, 3, 1, 6, NULL),
('80AMBE', '93ZS2MRH068703226', NULL, NULL, 'fotos_chutos/80AMBE/no_image.jpg', 0, NULL, 'X-', 5, 1, 1, 2, 5, NULL),
('80PAAP', '1M1AA13YXXW107217', NULL, NULL, 'fotos_chutos/80PAAP/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 3, 5, NULL),
('80SGBL', NULL, NULL, NULL, 'fotos_chutos/80SGBL/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('80WDAE', 'CH613HDTV01084', NULL, NULL, 'fotos_chutos/80WDAE/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('82IRAE', NULL, NULL, NULL, 'fotos_chutos/82IRAE/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('83BNAI', '3AKJA6CGX7DZ13115', NULL, NULL, 'fotos_chutos/83BNAI/no_image.jpg', 0, NULL, 'X-', 5, 2, 1, 2, 5, NULL),
('83HSAM', '3AKJA6CG67DX57735', NULL, NULL, 'fotos_chutos/83HSAM/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('84HSAM', '3AKJA6CG87DX57736', NULL, NULL, 'fotos_chutos/84HSAM/no_image.jpg', 0, NULL, 'X- ', 5, 1, 1, 2, 5, NULL),
('84SGBL', NULL, NULL, NULL, 'fotos_chutos/84SGBL/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('857XGW', 'R162SXHDV3931', NULL, NULL, 'fotos_chutos/857XGW/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('85SGBL', NULL, NULL, NULL, 'fotos_chutos/85SGBL/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('86WDAE', 'CH613HDTV01090', NULL, NULL, 'fotos_chutos/86WDAE/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('87SGBL', NULL, NULL, NULL, 'fotos_chutos/87SGBL/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('87SOAD', '3AKJA6CGX7DZ13551', NULL, NULL, 'fotos_chutos/87SOAD/no_image.jpg', 0, NULL, 'X-', 5, 1, 1, 3, 5, NULL),
('88WMBI', '3AKJC5CVX8D232346', NULL, NULL, 'fotos_chutos/88WMBI/no_image.jpg', 0, 'PLAN RECUPERACION', NULL, 5, 3, 1, 3, 5, NULL),
('896XZE', '1FUYDZYB7TH597499', NULL, NULL, 'fotos_chutos/896XZE/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('89FAAH', '1M1AA13Y7XW107241', NULL, NULL, 'fotos_chutos/89FAAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('8AW476234', 'B8AW476234', NULL, NULL, 'fotos_chutos/8AW476234/no_image.jpg', 0, NULL, 'X-103', 5, 1, 3, 3, 3, NULL),
('8AW476279', 'B8AW476279', NULL, NULL, 'fotos_chutos/8AW476279/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('8AW478954', 'B8AW478954', NULL, NULL, 'fotos_chutos/8AW478954/no_image.jpg', 0, NULL, 'X-66', 5, 2, 3, 2, 5, NULL),
('8AW492496', 'B8AW492496', NULL, NULL, 'fotos_chutos/8AW492496/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 3, 3, NULL),
('8AW492594', '8AW492594', NULL, NULL, 'fotos_chutos/8AW492594/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 4, 3, NULL),
('911AAT', 'R609TV28338', NULL, NULL, 'fotos_chutos/911AAT/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('91CGBG', '3AKJA6CGX7DW84871', NULL, NULL, 'fotos_chutos/91CGBG/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 4, 4, NULL),
('91FABB', NULL, NULL, NULL, 'fotos_chutos/91FABB/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('91PDAE', 'RD688SXLDTV40534', NULL, NULL, 'fotos_chutos/91PDAE/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('928GAP', 'R611SXV28690', NULL, NULL, 'fotos_chutos/928GAP/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('92BDAH', '8XGAA14Y0XV001160', NULL, NULL, 'fotos_chutos/92BDAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('92HAAV', 'R609PV27326', NULL, NULL, 'fotos_chutos/92HAAV/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 4, 5, NULL),
('92YGBA', '3AKJC3CV17DW85877', NULL, NULL, 'fotos_chutos/92YGBA/no_image.jpg', 0, 'BACKUP', NULL, 5, 3, 1, 2, 5, NULL),
('94IGAK', '1M1AA13Y9WW089677', NULL, NULL, 'fotos_chutos/94IGAK/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('95TVAU', '8ATS2JSH06X052554', NULL, NULL, 'fotos_chutos/95TVAU/no_image.jpg', 0, NULL, 'X-', 5, 1, 1, 2, 5, NULL),
('96KVBB', NULL, NULL, NULL, 'fotos_chutos/96KVBB/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('96TVAU', '8ATS2JSH06X052555', NULL, NULL, 'fotos_chutos/96TVAU/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 5, 3, NULL),
('97CDAH', '8XGAA14Y0XV001198', NULL, NULL, 'fotos_chutos/97CDAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('97WDAE', 'CH613HDTV01101', NULL, NULL, 'fotos_chutos/97WDAE/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('980ACK', 'R609PV31756', NULL, NULL, 'fotos_chutos/980ACK/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('988VBG', 'R612SXHV8307', NULL, NULL, 'fotos_chutos/988VBG/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 7, 4, NULL),
('99GGAH', '1FVXDSZB6WL959983', NULL, NULL, 'fotos_chutos/99GGAH/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('99WDAE', 'CH613HDTV01103', NULL, NULL, 'fotos_chutos/99WDAE/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 10, 4, NULL),
('9AW476291', NULL, NULL, NULL, 'fotos_chutos/9AW476291/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('9AW476338', 'B9AW476338', NULL, NULL, 'fotos_chutos/9AW476338/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('9AW492538', '9AW492538', NULL, NULL, 'fotos_chutos/9AW492538/no_image.jpg', 0, NULL, 'X-', 5, 3, 3, 3, 3, NULL),
('A01AF3D', NULL, NULL, NULL, 'fotos_chutos/A01AF3D/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A06AA6A', '1M1AA13Y0YW119779', NULL, NULL, 'fotos_chutos/A06AA6A/no_image.jpg', 0, NULL, NULL, 5, 3, 1, 3, 5, NULL),
('A06BV0G', '8AW478856', NULL, NULL, 'fotos_chutos/A06BV0G/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 4, 4, NULL),
('A06BV5G', 'B5AW476532', NULL, NULL, 'fotos_chutos/A06BV5G/no_image.jpg', 0, NULL, 'X-', 5, 3, 3, 3, 3, NULL),
('A06BV6G', '1AW476561', NULL, NULL, 'fotos_chutos/A06BV6G/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 3, 4, NULL),
('A06BV8G', '0AW476485', NULL, NULL, 'fotos_chutos/A06BV8G/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 3, 4, NULL),
('A08BV2G', 'B7AW478864', NULL, NULL, 'fotos_chutos/A08BV2G/no_image.jpg', 0, 'BACKUP', 'X-62', 5, 3, 3, 2, 5, NULL),
('A15AF6N', NULL, NULL, NULL, 'fotos_chutos/A15AF6N/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A15AK9T', 'B9AW492488', NULL, NULL, 'fotos_chutos/A15AK9T/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-41', 5, 3, 3, 3, 3, NULL),
('A16BR6V', NULL, NULL, NULL, 'fotos_chutos/A16BR6V/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A29AE8O', NULL, NULL, NULL, 'fotos_chutos/A29AE8O/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A32AK2T', 'B3AW492423', NULL, NULL, 'fotos_chutos/A32AK2T/no_image.jpg', 0, 'BACKUP', 'X-40', 5, 3, 3, 2, 5, NULL),
('A34AK3T', '1AW492615', NULL, NULL, 'fotos_chutos/A34AK3T/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 4, 4, NULL),
('A35AX3M', NULL, NULL, NULL, 'fotos_chutos/A35AX3M/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A38BF2S', 'B6AW478919', NULL, NULL, 'fotos_chutos/A38BF2S/no_image.jpg', 0, NULL, 'X-73', 5, 3, 3, 5, 3, NULL),
('A38BF3S', 'B3AW476397', NULL, NULL, 'fotos_chutos/A38BF3S/no_image.jpg', 0, 'BACKUP', 'X-', 5, 3, 3, 2, 5, NULL),
('A38BF5S', 'B7AW478881', NULL, NULL, 'fotos_chutos/A38BF5S/no_image.jpg', 0, 'CAMARA DAÑADA', 'X-31', 5, 3, 3, 5, 3, NULL),
('A38BF6S', 'B8AW476346', NULL, NULL, 'fotos_chutos/A38BF6S/no_image.jpg', 0, NULL, 'X-53', 5, 3, 3, 5, 3, NULL),
('A39AF0V', NULL, NULL, NULL, 'fotos_chutos/A39AF0V/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A40AE6C', 'B7AW478931', NULL, NULL, 'fotos_chutos/A40AE6C/no_image.jpg', 0, NULL, 'X-10', 5, 1, 3, 2, 5, NULL),
('A40AE7C', 'B4AW476487', NULL, NULL, 'fotos_chutos/A40AE7C/no_image.jpg', 0, 'MOTOR DAÑADO', NULL, 5, 3, 3, 5, 3, NULL),
('A40AE8C', 'B3AW476240', NULL, NULL, 'fotos_chutos/A40AE8C/no_image.jpg', 0, 'PROCESO DESINCORPORACION', 'X-32', 5, 3, 3, 5, 3, NULL),
('A40AE9C', 'B5AW478930', NULL, NULL, 'fotos_chutos/A40AE9C/no_image.jpg', 0, NULL, 'X-51', 5, 1, 3, 2, 5, NULL),
('A40BF8S', 'B2AW476231', NULL, NULL, 'fotos_chutos/A40BF8S/no_image.jpg', 0, 'PRUEBA DE CARRETERA', 'X-56', 5, 3, 3, 5, 3, NULL),
('A40BF9S', 'B1AW476253', NULL, NULL, 'fotos_chutos/A40BF9S/no_image.jpg', 0, NULL, 'X-64', 5, 1, 3, 2, 5, NULL),
('A41AE0C', 'B4AW476392', NULL, NULL, 'fotos_chutos/A41AE0C/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-115', 5, 3, 3, 4, 3, NULL),
('A41AE1C', '0AW476373', NULL, NULL, 'fotos_chutos/A41AE1C/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('A41AE3C', 'B2AW478898', NULL, NULL, 'fotos_chutos/A41AE3C/no_image.jpg', 0, 'AIRE ACONDICIONADO', 'X-34', 5, 3, 3, 5, 3, NULL),
('A41AE4C', 'B8AW476458', NULL, NULL, 'fotos_chutos/A41AE4C/no_image.jpg', 0, NULL, 'X-39', 5, 2, 3, 2, 5, NULL),
('A41AE5C', 'B5AW476501', NULL, NULL, 'fotos_chutos/A41AE5C/no_image.jpg', 0, 'CHOCADO/ DESMANTELADO', 'X-', 5, 3, 3, 5, 3, NULL),
('A41AE6C', 'B9AW476291', NULL, NULL, 'fotos_chutos/A41AE6C/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('A41AE7C', 'B7AW476256', NULL, NULL, 'fotos_chutos/A41AE7C/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-7', 5, 3, 3, 3, 3, NULL),
('A41BF0J', 'B8AW476329', NULL, NULL, 'fotos_chutos/A41BF0J/no_image.jpg', 0, 'CHOCADO/FISCALIA', 'X-18', 5, 3, 3, 1, 1, NULL),
('A41BF1S', 'B0AW476308', NULL, NULL, 'fotos_chutos/A41BF1S/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 4, 3, NULL),
('A42AE2C', '5AW478880', NULL, NULL, 'fotos_chutos/A42AE2C/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 4, 3, NULL),
('A42AE3C', 'B2AW476259', NULL, NULL, 'fotos_chutos/A42AE3C/no_image.jpg', 0, 'BACKUP', 'X-26', 5, 3, 3, 2, 5, NULL),
('A42AE4C', '2AW478948', NULL, NULL, 'fotos_chutos/A42AE4C/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 4, 3, NULL),
('A42AE5C', 'B0AW476387', NULL, NULL, 'fotos_chutos/A42AE5C/no_image.jpg', 0, NULL, 'X-36', 5, 1, 3, 2, 5, NULL),
('A42AE6C', 'BXAW476414', NULL, NULL, 'fotos_chutos/A42AE6C/no_image.jpg', 0, NULL, 'X-113', 5, 3, 3, 3, 3, NULL),
('A42AE8C', 'B6AW476281', NULL, NULL, 'fotos_chutos/A42AE8C/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('A42AE9C', 'B9AW478901', NULL, NULL, 'fotos_chutos/A42AE9C/no_image.jpg', 0, NULL, 'X-75', 5, 1, 3, 2, 5, NULL),
('A42BF0S', 'B5AW476465', NULL, NULL, 'fotos_chutos/A42BF0S/no_image.jpg', 0, 'BACKUP', 'X-', 5, 3, 3, 2, 5, NULL),
('A42BF2S', 'B3AW476481', NULL, NULL, 'fotos_chutos/A42BF2S/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('A42BF3S', 'B5AW476479', NULL, NULL, 'fotos_chutos/A42BF3S/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 3, 3, NULL),
('A43AE0C', 'XAW476283', NULL, NULL, 'fotos_chutos/A43AE0C/no_image.jpg', 0, NULL, 'X-', 5, 3, 3, 4, 3, NULL),
('A43AE7C', 'B6AW476295', NULL, NULL, 'fotos_chutos/A43AE7C/no_image.jpg', 0, NULL, 'X-23', 5, 2, 3, 3, 3, NULL),
('A44AE2C', 'B1AW476317', NULL, NULL, 'fotos_chutos/A44AE2C/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 5, 3, NULL),
('A44AE5C', 'B1AW476236', NULL, NULL, 'fotos_chutos/A44AE5C/no_image.jpg', 0, NULL, 'X-54', 5, 1, 3, 2, 5, NULL),
('A47AD5J', 'XAW492631', NULL, NULL, 'fotos_chutos/A47AD5J/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 4, 3, NULL),
('A47AD8J', '1AW476284', NULL, NULL, 'fotos_chutos/A47AD8J/no_image.jpg', 0, NULL, 'X-97', 5, 1, 3, 2, 5, NULL),
('A47AD9J', 'B7AW476435', NULL, NULL, 'fotos_chutos/A47AD9J/no_image.jpg', 0, NULL, 'X-44', 5, 2, 3, 2, 5, NULL),
('A47AK9T', 'B9AW476310', NULL, NULL, 'fotos_chutos/A47AK9T/no_image.jpg', 0, NULL, 'X-8', 5, 1, 3, 2, 5, NULL),
('A48AD3J', 'B5AW478958', NULL, NULL, 'fotos_chutos/A48AD3J/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 4, 3, NULL),
('A48AD6J', '0AW478852', NULL, NULL, 'fotos_chutos/A48AD6J/no_image.jpg', 0, NULL, 'X-108', 5, 1, 3, 2, 5, NULL),
('A48AK2T', 'B2AW476262', NULL, NULL, 'fotos_chutos/A48AK2T/no_image.jpg', 0, NULL, 'X-12', 5, 1, 3, 4, 3, NULL),
('A48AK4T', '4AW476313', NULL, NULL, 'fotos_chutos/A48AK4T/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 4, 4, NULL),
('A48AK6T', 'B5AW478863', NULL, NULL, 'fotos_chutos/A48AK6T/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('A48AK7T', 'B8AW476430', NULL, NULL, 'fotos_chutos/A48AK7T/no_image.jpg', 0, 'DESMANTELADO', 'X-', 5, 3, 3, 3, 3, NULL),
('A48AK8T', 'B0AW476311', NULL, NULL, 'fotos_chutos/A48AK8T/no_image.jpg', 0, 'BACKUP', 'X-13', 5, 3, 3, 2, 5, NULL),
('A48AK9T', 'B0AW476468', NULL, NULL, 'fotos_chutos/A48AK9T/no_image.jpg', 0, 'PROCESO DESINCORPORACION', 'X-', 5, 3, 3, 5, 3, NULL),
('A49AD1J', 'B4AW476456', NULL, NULL, 'fotos_chutos/A49AD1J/no_image.jpg', 0, NULL, 'X-77', 5, 1, 3, 2, 5, NULL),
('A49AD3J', '2AW492509', NULL, NULL, 'fotos_chutos/A49AD3J/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('A49AD6J', 'B9AW492474', NULL, NULL, 'fotos_chutos/A49AD6J/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-58', 5, 3, 3, 4, 3, NULL),
('A49AF2P', 'B9AW492619', NULL, NULL, 'fotos_chutos/A49AF2P/no_image.jpg', 0, NULL, 'X-86', 5, 1, 3, 2, 5, NULL),
('A49AK1T', 'B5AW476353', NULL, NULL, 'fotos_chutos/A49AK1T/no_image.jpg', 0, 'A DESINCORPORAR', 'X-35', 5, 3, 3, 1, 4, NULL),
('A49AK2T', 'B6AW476264', NULL, NULL, 'fotos_chutos/A49AK2T/no_image.jpg', 0, 'MOTOR DAÑADO', 'X-114', 5, 3, 3, 5, 3, NULL),
('A49AK3T', 'B2AW478920', NULL, NULL, 'fotos_chutos/A49AK3T/no_image.jpg', 0, 'MOTOR DAÑADO', 'X-92', 5, 2, 3, 5, 3, NULL),
('A49AK4T', 'B7AW476368', NULL, NULL, 'fotos_chutos/A49AK4T/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('A49AK6T', 'B1AW478942', NULL, NULL, 'fotos_chutos/A49AK6T/no_image.jpg', 0, NULL, 'X-93', 5, 1, 3, 4, 3, NULL),
('A51AD9J', 'B7AW476404', NULL, NULL, 'fotos_chutos/A51AD9J/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 5, 3, NULL),
('A52AD0J', 'B7AW478895', NULL, NULL, 'fotos_chutos/A52AD0J/no_image.jpg', 0, 'DIA DIA', 'X-45', 5, 1, 3, 3, 5, NULL),
('A52AD3J', '9AW476257', NULL, NULL, 'fotos_chutos/A52AD3J/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 4, 3, NULL),
('A52AD8J', 'B4AW476327', NULL, NULL, 'fotos_chutos/A52AD8J/no_image.jpg', 0, 'MOTOR DAÑADO ojo', 'X-116', 5, 3, 3, 5, 3, NULL),
('A52AE1C', 'B2AW476505', NULL, NULL, 'fotos_chutos/A52AE1C/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-67', 5, 3, 3, 4, 3, NULL),
('A52AE2C', 'B3AW476450', NULL, NULL, 'fotos_chutos/A52AE2C/no_image.jpg', 0, 'DESMANTELADO', 'X-', 5, 3, 3, 3, 3, NULL),
('A52AE3C', 'B5AW478846', NULL, NULL, 'fotos_chutos/A52AE3C/no_image.jpg', 0, 'MOTOR DAÑADO', 'X-89', 5, 3, 3, 5, 3, NULL),
('A52AE4C', 'B4AW476280', NULL, NULL, 'fotos_chutos/A52AE4C/no_image.jpg', 0, NULL, 'X-11', 5, 1, 3, 2, 5, NULL),
('A52AE5C', '0AW476213', NULL, NULL, 'fotos_chutos/A52AE5C/no_image.jpg', 0, 'DESMANTELADO', 'X-', 5, 3, 3, 3, 3, NULL),
('A52AE6C', 'B4AW478868', NULL, NULL, 'fotos_chutos/A52AE6C/no_image.jpg', 0, NULL, 'X-6', 5, 1, 3, 5, 3, NULL),
('A52AE7C', '8AW476427', NULL, NULL, 'fotos_chutos/A52AE7C/no_image.jpg', 0, 'A DESINCORPORAR', 'X-19', 5, 3, 3, 3, 4, NULL),
('A52AE8C', 'B3AW476254', NULL, NULL, 'fotos_chutos/A52AE8C/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 3, 3, NULL),
('A52AE9C', '0AW476227', NULL, NULL, 'fotos_chutos/A52AE9C/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 3, 4, NULL),
('A52BF9S', '1AW476348', NULL, NULL, 'fotos_chutos/A52BF9S/no_image.jpg', 0, 'PLAN ALTERNO RECUPERACION', 'X-87', 5, 3, 3, 4, 3, NULL),
('A53AC4Y', NULL, NULL, NULL, 'fotos_chutos/A53AC4Y/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A53AD1J', '6AW476216', NULL, NULL, 'fotos_chutos/A53AD1J/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 4, 3, NULL),
('A53AD4J', 'BXAW478955', NULL, NULL, 'fotos_chutos/A53AD4J/no_image.jpg', 0, NULL, 'X-71', 5, 1, 3, 2, 5, NULL),
('A53AD7J', 'B1AW478861', NULL, NULL, 'fotos_chutos/A53AD7J/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-57', 5, 3, 3, 3, 3, NULL),
('A53AE0C', '9AW478834', NULL, NULL, 'fotos_chutos/A53AE0C/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 3, 3, NULL),
('A53AE1C', 'BXAW478857', NULL, NULL, 'fotos_chutos/A53AE1C/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('A53AE2C', 'B4AW478949', '', '', 'fotos_chutos/A53AE2C/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-29', 5, 1, 3, 3, 2, NULL),
('A53AE3C', 'B4AW476229', NULL, NULL, 'fotos_chutos/A53AE3C/no_image.jpg', 0, 'MOTOR DAÑADO', 'X-79', 5, 3, 3, 5, 3, NULL),
('A53AE4C', 'B8AW478940', NULL, NULL, 'fotos_chutos/A53AE4C/no_image.jpg', 0, NULL, 'X-17', 5, 1, 3, 2, 5, NULL),
('A53AE5C', '7AW476340', NULL, NULL, 'fotos_chutos/A53AE5C/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 3, 4, NULL),
('A53AE6C', 'BXAW476493', NULL, NULL, 'fotos_chutos/A53AE6C/no_image.jpg', 0, NULL, 'X-27', 5, 3, 3, 5, 3, NULL),
('A53AE7C', 'B9AW476517', NULL, NULL, 'fotos_chutos/A53AE7C/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('A53AE8C', 'B5AW478913', NULL, NULL, 'fotos_chutos/A53AE8C/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-110', 5, 3, 3, 4, 3, NULL),
('A53AE9C', 'B1AW478830', NULL, NULL, 'fotos_chutos/A53AE9C/no_image.jpg', 0, NULL, 'X-', 5, 2, 3, 2, 5, NULL),
('A53BF0S', 'B8AW476413', NULL, NULL, 'fotos_chutos/A53BF0S/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-85', 5, 3, 3, 4, 3, NULL),
('A53BF2S', '3AW478862', NULL, NULL, 'fotos_chutos/A53BF2S/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-33', 5, 3, 3, 3, 3, NULL),
('A54AC5Y', NULL, NULL, NULL, 'fotos_chutos/A54AC5Y/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A54AD0J', 'B5AW492648', NULL, NULL, 'fotos_chutos/A54AD0J/no_image.jpg', 0, NULL, 'X-59', 5, 1, 3, 2, 5, NULL),
('A54AE0C', 'B0AW478933', NULL, NULL, 'fotos_chutos/A54AE0C/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-120', 5, 3, 3, 3, 3, NULL),
('A54AE4C', 'B2AW492526', NULL, NULL, 'fotos_chutos/A54AE4C/no_image.jpg', 0, 'BACKUP', 'X-43', 5, 3, 3, 2, 5, NULL),
('A54AE6C', 'B0AW492556', NULL, NULL, 'fotos_chutos/A54AE6C/no_image.jpg', 0, 'SISTEMA DE INYECCION', 'X-76', 5, 3, 3, 5, 3, NULL),
('A54AE8C', 'B9AW492670', '', '', 'fotos_chutos/A54AE8C/no_image.jpg', 0, '', 'X-78', 5, 2, 3, 2, 5, NULL),
('A54AE9C', 'B3AW476318', NULL, NULL, 'fotos_chutos/A54AE9C/no_image.jpg', 0, NULL, 'X-24', 5, 1, 3, 2, 5, NULL),
('A54BF6S', 'B5AW476496', NULL, NULL, 'fotos_chutos/A54BF6S/no_image.jpg', 0, 'PLAN ALTERNO RECUPERACION', 'X-1', 5, 3, 3, 3, 3, NULL),
('A55AE0C', '2AW476214', NULL, NULL, 'fotos_chutos/A55AE0C/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 4, 4, NULL),
('A55AE3C', 'B1AW478813', NULL, NULL, 'fotos_chutos/A55AE3C/no_image.jpg', 0, NULL, 'X-91', 5, 2, 3, 2, 5, NULL),
('A55AE6C', '6AW478953', NULL, NULL, 'fotos_chutos/A55AE6C/no_image.jpg', 0, 'DIA DIA', 'X-9', 5, 1, 3, 5, 5, NULL),
('A55AE7C', 'B4AW478899', NULL, NULL, 'fotos_chutos/A55AE7C/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-83', 5, 3, 3, 3, 3, NULL),
('A58AE1C', 'B8AW476332', '', '', 'fotos_chutos/A58AE1C/no_image.jpg', 0, '', 'X-21', 5, 1, 3, 2, 5, NULL),
('A58AE3C', '3AW476349', NULL, NULL, 'fotos_chutos/A58AE3C/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 3, 3, NULL),
('A58AE5C', 'B2AW478867', NULL, NULL, 'fotos_chutos/A58AE5C/no_image.jpg', 0, NULL, 'X-107', 5, 2, 3, 2, 5, NULL),
('A59AE2C', 'B0AW476230', NULL, NULL, 'fotos_chutos/A59AE2C/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-30', 5, 3, 3, 4, 3, NULL),
('A59AE3C', 'B0AW476440', NULL, NULL, 'fotos_chutos/A59AE3C/no_image.jpg', 0, NULL, 'X-20', 5, 3, 3, 5, 3, NULL),
('A59BF4S', 'B2AW492591', NULL, NULL, 'fotos_chutos/A59BF4S/no_image.jpg', 0, NULL, 'X-106', 5, 2, 3, 4, 3, NULL),
('A59BF8S', 'B9AW476260', NULL, NULL, 'fotos_chutos/A59BF8S/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-72', 5, 3, 3, 3, 3, NULL),
('A59BF9S', 'B3AW492602', NULL, NULL, 'fotos_chutos/A59BF9S/no_image.jpg', 0, 'DISPONIBLE', 'X-122', 5, 3, 3, 5, 3, NULL),
('A60AB0O', 'B9AW476534', NULL, NULL, 'fotos_chutos/A60AB0O/no_image.jpg', 0, NULL, 'X-', 5, 1, 3, 2, 5, NULL),
('A60AB1O', 'B8AW476248', NULL, NULL, 'fotos_chutos/A60AB1O/no_image.jpg', 0, NULL, 'X-69', 5, 3, 3, 2, 5, NULL),
('A60AB2O', 'B4AW476540', NULL, NULL, 'fotos_chutos/A60AB2O/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 4, 3, NULL),
('A60AB3O', '8AW476220', NULL, NULL, 'fotos_chutos/A60AB3O/no_image.jpg', 0, 'A DESINCORPORAR', 'X-', 5, 3, 3, 4, 4, NULL),
('A60AB4O', 'B7AW476550', NULL, NULL, 'fotos_chutos/A60AB4O/no_image.jpg', 0, 'COMITÉ PCP', 'X-3', 5, 1, 3, 5, 3, NULL),
('A60AB5O', 'B6AW476510', NULL, NULL, 'fotos_chutos/A60AB5O/no_image.jpg', 0, NULL, 'X-82', 5, 2, 3, 2, 5, NULL),
('A60AB6O', 'B8AW478906', NULL, NULL, 'fotos_chutos/A60AB6O/no_image.jpg', 0, 'BACKUP', 'X-46', 5, 3, 3, 2, 5, NULL),
('A60AB7O', 'B7AW476502', NULL, NULL, 'fotos_chutos/A60AB7O/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-', 5, 3, 3, 4, 3, NULL),
('A60AB8O', 'B7AW476273', NULL, NULL, 'fotos_chutos/A60AB8O/no_image.jpg', 0, 'CHOCADO', 'X-5', 5, 3, 3, 5, 3, NULL),
('A60BF3S', 'B7AW476290', NULL, NULL, 'fotos_chutos/A60BF3S/no_image.jpg', 0, NULL, 'X-95', 5, 2, 3, 2, 5, NULL),
('A61BF2S', 'B5AW492665', NULL, NULL, 'fotos_chutos/A61BF2S/no_image.jpg', 0, NULL, 'X-117', 5, 1, 3, 2, 5, NULL),
('A62AE5C', 'B4AW476473', NULL, NULL, 'fotos_chutos/A62AE5C/no_image.jpg', 0, 'DIA DIA', 'X-4', 5, 1, 3, 5, 5, NULL),
('A62BF3S', 'B0AW478916', NULL, NULL, 'fotos_chutos/A62BF3S/no_image.jpg', 0, NULL, 'X-68', 5, 1, 3, 2, 5, NULL),
('A62BF5S', 'B2AW476357', NULL, NULL, 'fotos_chutos/A62BF5S/no_image.jpg', 0, 'PRUEBA DE CARRETERA', 'X-', 5, 3, 3, 5, 3, NULL),
('A62BF6S', 'B1AW492520', NULL, NULL, 'fotos_chutos/A62BF6S/no_image.jpg', 0, NULL, 'X-121', 5, 1, 3, 2, 5, NULL),
('A63AE2C', 'BXAW476302', NULL, NULL, 'fotos_chutos/A63AE2C/no_image.jpg', 0, 'BACKUP', 'X-22', 5, 3, 3, 2, 5, NULL),
('A63AE3C', 'B9AW476422', '', '', 'fotos_chutos/A63AE3C/no_image.jpg', 0, '', 'X-105', 5, 2, 3, 2, 5, NULL),
('A64AY1M', NULL, NULL, NULL, 'fotos_chutos/A64AY1M/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A67AN0G', NULL, NULL, NULL, 'fotos_chutos/A67AN0G/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A67BE6S', 'B9AW478848', NULL, NULL, 'fotos_chutos/A67BE6S/no_image.jpg', 0, 'GRUA', 'X-81', 5, 3, 3, 5, 5, NULL),
('A68AE2D', NULL, NULL, NULL, 'fotos_chutos/A68AE2D/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A70AG0A', NULL, NULL, NULL, 'fotos_chutos/A70AG0A/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A80BG0A', NULL, NULL, NULL, 'fotos_chutos/A80BG0A/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A80BG1A', NULL, NULL, NULL, 'fotos_chutos/A80BG1A/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A90AH4U', 'B9AW478946', NULL, NULL, 'fotos_chutos/A90AH4U/no_image.jpg', 0, NULL, 'X-74', 5, 1, 3, 2, 5, NULL),
('A91AS2G', NULL, NULL, NULL, 'fotos_chutos/A91AS2G/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('A91AS3G', NULL, NULL, NULL, 'fotos_chutos/A91AS3G/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('AA190SD', NULL, NULL, NULL, 'fotos_chutos/AA190SD/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('AB814BA', NULL, NULL, NULL, 'fotos_chutos/AB814BA/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('B2AW476522', 'B2AW476522', NULL, NULL, 'fotos_chutos/B2AW476522/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('B8AW476761', 'B8AW476761', NULL, NULL, 'fotos_chutos/B8AW476761/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('B9AW476436', 'B9AW476436', NULL, NULL, 'fotos_chutos/B9AW476436/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('DBG-06M', 'DBG-06M', NULL, NULL, 'fotos_chutos/DBG-06M/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('DBG-13M', 'DBG-13M', NULL, NULL, 'fotos_chutos/DBG-13M/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('DBG-14M', 'DBG-14M', NULL, NULL, 'fotos_chutos/DBG-14M/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('DBG-17M', 'DBG-17M', NULL, NULL, 'fotos_chutos/DBG-17M/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('EAO-11H', 'EAO-11H', NULL, NULL, 'fotos_chutos/EAO-11H/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('LZZ5CLVB0DA723906', 'LZZ5CLVB0DA723906', NULL, NULL, 'fotos_chutos/LZZ5CLVB0DA723906/no_image.jpg', 0, NULL, 'GUATIRE 06', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB0DA723954', 'LZZ5CLVB0DA723954', NULL, NULL, 'fotos_chutos/LZZ5CLVB0DA723954/no_image.jpg', 0, NULL, 'GUATIRE 46', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB0DA724022', 'LZZ5CLVB0DA724022', NULL, NULL, 'fotos_chutos/LZZ5CLVB0DA724022/no_image.jpg', 0, NULL, 'GUATIRE 15', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB0DA724120', 'LZZ5CLVB0DA724120', NULL, NULL, 'fotos_chutos/LZZ5CLVB0DA724120/no_image.jpg', 0, NULL, 'GUATIRE 08', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB0DA724411', 'LZZ5CLVB0DA724411', NULL, NULL, 'fotos_chutos/LZZ5CLVB0DA724411/no_image.jpg', 0, NULL, 'GUATIRE 47', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB0DA724490', 'LZZ5CLVB0DA724490', NULL, NULL, 'fotos_chutos/LZZ5CLVB0DA724490/no_image.jpg', 0, NULL, 'GUATIRE 35', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB1DA724076', 'LZZ5CLVB1DA724076', NULL, NULL, 'fotos_chutos/LZZ5CLVB1DA724076/no_image.jpg', 0, NULL, 'GUATIRE 53', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB1DA724126', 'LZZ5CLVB1DA724126', NULL, NULL, 'fotos_chutos/LZZ5CLVB1DA724126/no_image.jpg', 0, 'PRESTANDO APOYO EN PDG CONDUCTOR JACKSON CEDEÑO ', 'CLM 06', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB1DA724286', 'LZZ5CLVB1DA724286', NULL, NULL, 'fotos_chutos/LZZ5CLVB1DA724286/no_image.jpg', 0, NULL, 'GUATIRE 36', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB1DA724370', 'LZZ5CLVB1DA724370', NULL, NULL, 'fotos_chutos/LZZ5CLVB1DA724370/no_image.jpg', 0, NULL, 'GUATIRE 27', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB1DA724403', 'LZZ5CLVB1DA724403', NULL, NULL, 'fotos_chutos/LZZ5CLVB1DA724403/no_image.jpg', 0, 'CHOCADO', 'GUATIRE 34', 5, 3, 4, 5, 3, NULL),
('LZZ5CLVB1DA724496', 'LZZ5CLVB1DA724496', NULL, NULL, 'fotos_chutos/LZZ5CLVB1DA724496/no_image.jpg', 0, NULL, 'GUATIRE 22', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB1DA724501', 'LZZ5CLVB1DA724501', NULL, NULL, 'fotos_chutos/LZZ5CLVB1DA724501/no_image.jpg', 0, NULL, 'GUATIRE 20', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB2DA723910', 'LZZ5CLVB2DA723910', NULL, NULL, 'fotos_chutos/LZZ5CLVB2DA723910/no_image.jpg', 0, NULL, 'GUATIRE 04', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB2DA724121', 'LZZ5CLVB2DA724121', NULL, NULL, 'fotos_chutos/LZZ5CLVB2DA724121/no_image.jpg', 0, NULL, 'GUATIRE 05', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB2DA724507', 'LZZ5CLVB2DA724507', NULL, NULL, 'fotos_chutos/LZZ5CLVB2DA724507/no_image.jpg', 0, NULL, 'GUATIRE 31', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB3DA723978', 'LZZ5CLVB3DA723978', NULL, NULL, 'fotos_chutos/LZZ5CLVB3DA723978/no_image.jpg', 0, NULL, 'GUATIRE 25', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB3DA724029', 'LZZ5CLVB3DA724029', NULL, NULL, 'fotos_chutos/LZZ5CLVB3DA724029/no_image.jpg', 0, NULL, 'GUATIRE 49', 5, 3, 4, 5, 3, NULL),
('LZZ5CLVB3DA724046', 'LZZ5CLVB3DA724046', NULL, NULL, 'fotos_chutos/LZZ5CLVB3DA724046/no_image.jpg', 0, NULL, 'GUATIRE 54', 5, 3, 4, 1, 1, NULL),
('LZZ5CLVB3DA724063', 'LZZ5CLVB3DA724063', NULL, NULL, 'fotos_chutos/LZZ5CLVB3DA724063/no_image.jpg', 0, NULL, 'GUATIRE 01', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB3DA724077', 'LZZ5CLVB3DA724077', NULL, NULL, 'fotos_chutos/LZZ5CLVB3DA724077/no_image.jpg', 0, NULL, 'GUATIRE 28', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB3DA724158', 'LZZ5CLVB3DA724158', NULL, NULL, 'fotos_chutos/LZZ5CLVB3DA724158/no_image.jpg', 0, NULL, 'GUATIRE 37', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB3DA724239', 'LZZ5CLVB3DA724239', NULL, NULL, 'fotos_chutos/LZZ5CLVB3DA724239/no_image.jpg', 0, NULL, 'GUATIRE 42', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB4DA724069', 'LZZ5CLVB4DA724069', NULL, NULL, 'fotos_chutos/LZZ5CLVB4DA724069/no_image.jpg', 0, NULL, 'GUATIRE 07', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB4DA724167', 'LZZ5CLVB4DA724167', NULL, NULL, 'fotos_chutos/LZZ5CLVB4DA724167/no_image.jpg', 0, NULL, 'GUATIRE 12', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB4DA724234', 'LZZ5CLVB4DA724234', NULL, NULL, 'fotos_chutos/LZZ5CLVB4DA724234/no_image.jpg', 0, NULL, 'CLM 05', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB4DA724363', 'LZZ5CLVB4DA724363', NULL, NULL, 'fotos_chutos/LZZ5CLVB4DA724363/no_image.jpg', 0, NULL, 'GUATIRE 23', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB4DA724377', 'LZZ5CLVB4DA724377', NULL, NULL, 'fotos_chutos/LZZ5CLVB4DA724377/no_image.jpg', 0, NULL, 'GUATIRE 19', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB4DA724427', 'LZZ5CLVB4DA724427', NULL, NULL, 'fotos_chutos/LZZ5CLVB4DA724427/no_image.jpg', 0, NULL, 'GUATIRE 17', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB4DA724489', 'LZZ5CLVB4DA724489', NULL, NULL, 'fotos_chutos/LZZ5CLVB4DA724489/no_image.jpg', 0, NULL, 'GUATIRE 26', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB5DA723917', 'LZZ5CLVB5DA723917', NULL, NULL, 'fotos_chutos/LZZ5CLVB5DA723917/no_image.jpg', 0, NULL, 'GUATIRE 38', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB5DA724131', 'LZZ5CLVB5DA724131', NULL, NULL, 'fotos_chutos/LZZ5CLVB5DA724131/no_image.jpg', 0, NULL, 'GUATIRE 10', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB5DA724145', 'LZZ5CLVB5DA724145', NULL, NULL, 'fotos_chutos/LZZ5CLVB5DA724145/no_image.jpg', 0, 'BACKUP', 'CLM 02', 5, 3, 4, 2, 5, NULL),
('LZZ5CLVB5DA724226', 'LZZ5CLVB5DA724226', NULL, NULL, 'fotos_chutos/LZZ5CLVB5DA724226/no_image.jpg', 0, NULL, 'GUATIRE 11', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB5DA724260', 'LZZ5CLVB5DA724260', NULL, NULL, 'fotos_chutos/LZZ5CLVB5DA724260/no_image.jpg', 0, NULL, 'GUATIRE 45', 5, 2, 4, 5, 3, NULL),
('LZZ5CLVB5DA724274', 'LZZ5CLVB5DA724274', NULL, NULL, 'fotos_chutos/LZZ5CLVB5DA724274/no_image.jpg', 0, NULL, 'GUATIRE 29', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB5DA724291', 'LZZ5CLVB5DA724291', NULL, NULL, 'fotos_chutos/LZZ5CLVB5DA724291/no_image.jpg', 0, 'BACKUP', 'CLM 07', 5, 3, 4, 2, 5, NULL),
('LZZ5CLVB5DA724372', 'LZZ5CLVB5DA724372', NULL, NULL, 'fotos_chutos/LZZ5CLVB5DA724372/no_image.jpg', 0, NULL, 'GUATIRE 41', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB5DA724422', 'LZZ5CLVB5DA724422', NULL, NULL, 'fotos_chutos/LZZ5CLVB5DA724422/no_image.jpg', 0, NULL, 'GUATIRE 16', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB6DA723912', 'LZZ5CLVB6DA723912', NULL, NULL, 'fotos_chutos/LZZ5CLVB6DA723912/no_image.jpg', 0, NULL, 'GUATIRE 52', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB6DA724137', 'LZZ5CLVB6DA724137', NULL, NULL, 'fotos_chutos/LZZ5CLVB6DA724137/no_image.jpg', 0, NULL, 'GUATIRE 43', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB6DA724171', 'LZZ5CLVB6DA724171', NULL, NULL, 'fotos_chutos/LZZ5CLVB6DA724171/no_image.jpg', 0, NULL, 'GUATIRE 03', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB6DA724266', 'LZZ5CLVB6DA724266', NULL, NULL, 'fotos_chutos/LZZ5CLVB6DA724266/no_image.jpg', 0, NULL, 'GUATIRE 02', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB6DA724381', 'LZZ5CLVB6DA724381', NULL, NULL, 'fotos_chutos/LZZ5CLVB6DA724381/no_image.jpg', 0, NULL, 'GUATIRE 30', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB7DA724163', 'LZZ5CLVB7DA724163', NULL, NULL, 'fotos_chutos/LZZ5CLVB7DA724163/no_image.jpg', 0, NULL, 'GUATIRE 18', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB7DA724230', 'LZZ5CLVB7DA724230', NULL, NULL, 'fotos_chutos/LZZ5CLVB7DA724230/no_image.jpg', 0, NULL, 'GUATIRE 21', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB7DA724289', 'LZZ5CLVB7DA724289', NULL, NULL, 'fotos_chutos/LZZ5CLVB7DA724289/no_image.jpg', 0, NULL, 'GUATIRE 39', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB7DA724423', 'LZZ5CLVB7DA724423', NULL, NULL, 'fotos_chutos/LZZ5CLVB7DA724423/no_image.jpg', 0, NULL, 'GUATIRE 48', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB8DA723863', 'LZZ5CLVB8DA723863', '', '', 'fotos_chutos/LZZ5CLVB8DA723863/no_image.jpg', 0, '', 'GUATIRE 50', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB8DA724057', 'LZZ5CLVB8DA724057', NULL, NULL, 'fotos_chutos/LZZ5CLVB8DA724057/no_image.jpg', 0, NULL, 'GUATIRE 09', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB8DA724382', 'LZZ5CLVB8DA724382', NULL, NULL, 'fotos_chutos/LZZ5CLVB8DA724382/no_image.jpg', 0, NULL, 'GUATIRE 14', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB9DA723970', 'LZZ5CLVB9DA723970', NULL, NULL, 'fotos_chutos/LZZ5CLVB9DA723970/no_image.jpg', 0, NULL, 'GUATIRE 13', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB9DA724021', 'LZZ5CLVB9DA724021', NULL, NULL, 'fotos_chutos/LZZ5CLVB9DA724021/no_image.jpg', 0, NULL, 'GUATIRE 44', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB9DA724066', 'LZZ5CLVB9DA724066', NULL, NULL, 'fotos_chutos/LZZ5CLVB9DA724066/no_image.jpg', 0, 'BACKUP', 'CLM 01', 5, 3, 4, 2, 5, NULL),
('LZZ5CLVB9DA724133', 'LZZ5CLVB9DA724133', NULL, NULL, 'fotos_chutos/LZZ5CLVB9DA724133/no_image.jpg', 0, NULL, 'GUATIRE 51', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB9DA724276', 'LZZ5CLVB9DA724276', NULL, NULL, 'fotos_chutos/LZZ5CLVB9DA724276/no_image.jpg', 0, NULL, 'CLM 03', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVB9DA724293', 'LZZ5CLVB9DA724293', NULL, NULL, 'fotos_chutos/LZZ5CLVB9DA724293/no_image.jpg', 0, NULL, 'GUATIRE 24', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB9DA724388', 'LZZ5CLVB9DA724388', NULL, NULL, 'fotos_chutos/LZZ5CLVB9DA724388/no_image.jpg', 0, NULL, 'GUATIRE 32', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVB9DA724391', 'LZZ5CLVB9DA724391', NULL, NULL, 'fotos_chutos/LZZ5CLVB9DA724391/no_image.jpg', 0, NULL, 'GUATIRE 33', 5, 2, 4, 2, 5, NULL),
('LZZ5CLVBXDA723959', 'LZZ5CLVBXDA723959', NULL, NULL, 'fotos_chutos/LZZ5CLVBXDA723959/no_image.jpg', 0, 'BACKUP', 'CLM 04', 5, 3, 4, 2, 5, NULL),
('LZZ5CLVBXDA724156', 'LZZ5CLVBXDA724156', NULL, NULL, 'fotos_chutos/LZZ5CLVBXDA724156/no_image.jpg', 0, NULL, 'GUATIRE 55', 5, 1, 4, 2, 5, NULL),
('LZZ5CLVBXDA724500', 'LZZ5CLVBXDA724500', NULL, NULL, 'fotos_chutos/LZZ5CLVBXDA724500/no_image.jpg', 0, NULL, 'GUATIRE 40', 5, 1, 4, 2, 5, NULL),
('SBA-86R', 'SBA-86R', NULL, NULL, 'fotos_chutos/SBA-86R/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('WAB-09E', 'WAB-09E', NULL, NULL, 'fotos_chutos/WAB-09E/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('WAB-10E', 'WAB-10E', NULL, NULL, 'fotos_chutos/WAB-10E/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('XAW476221', 'BXAW476221', NULL, NULL, 'fotos_chutos/XAW476221/no_image.jpg', 0, NULL, 'X-14', 5, 2, 3, 2, 5, NULL),
('XAW476261', 'XAW476261', NULL, NULL, 'fotos_chutos/XAW476261/no_image.jpg', 0, NULL, NULL, 5, 3, 5, 10, 7, NULL),
('XAW492564', 'XAW492564', NULL, NULL, 'fotos_chutos/XAW492564/no_image.jpg', 0, 'PLAN DE RECUPERACION', 'X-25', 5, 1, 3, 4, 3, NULL),
('XAW492614', 'XAW492614', NULL, NULL, 'fotos_chutos/XAW492614/no_image.jpg', 0, 'MOTOR DAÑADO', 'X-55', 5, 3, 3, 5, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ch_cd`
--

CREATE TABLE IF NOT EXISTS `ch_cd` (
  `Conductor_ID_Conductor` int(11) NOT NULL,
  `Chuto_Placal_Chuto` varchar(50) NOT NULL,
  PRIMARY KEY (`Conductor_ID_Conductor`,`Chuto_Placal_Chuto`),
  KEY `CH_CD_Chuto_FK` (`Chuto_Placal_Chuto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `ch_cd`
--

INSERT INTO `ch_cd` (`Conductor_ID_Conductor`, `Chuto_Placal_Chuto`) VALUES
(4250631, '0AW476261'),
(8732076, '19FSAP'),
(10634443, '1AW492548'),
(11159498, '1AW492548'),
(5518493, '21HDAT'),
(16058160, '2AW492557'),
(13692167, '2AW492655'),
(11128269, '3AW478926'),
(10112093, '3AW492552'),
(6104413, '4AW492639'),
(13845043, '4AW492639'),
(6557399, '56FFAM'),
(10692739, '6AW476457'),
(12455337, '6AW478872'),
(10809766, '77VGBA'),
(12830492, '77VGBA'),
(11930863, '78AMBE'),
(11480818, '7AW476287'),
(11925628, '7AW476287'),
(14851808, '80AMBE'),
(12829205, '83BNAI'),
(14384561, '83BNAI'),
(6224598, '84HSAM'),
(13979923, '87SOAD'),
(8101645, '8AW476234'),
(5764807, '8AW476279'),
(8751115, '8AW478954'),
(9953869, '8AW478954'),
(17119024, '95TVAU'),
(5458359, 'A40AE6C'),
(10098860, 'A40AE9C'),
(7945775, 'A40BF9S'),
(10817364, 'A41AE1C'),
(10977861, 'A41AE4C'),
(15199260, 'A41AE4C'),
(9886678, 'A41AE6C'),
(15696596, 'A42AE5C'),
(12298069, 'A42AE8C'),
(10515145, 'A42AE9C'),
(6840890, 'A42BF2S'),
(6418621, 'A43AE7C'),
(15648280, 'A43AE7C'),
(6398377, 'A44AE5C'),
(5118689, 'A47AD8J'),
(10180753, 'A47AD9J'),
(14992676, 'A47AD9J'),
(10097887, 'A47AK9T'),
(4914577, 'A48AK2T'),
(6925896, 'A48AK6T'),
(9480709, 'A49AD1J'),
(7372092, 'A49AD3J'),
(15331567, 'A49AF2P'),
(8943526, 'A49AK6T'),
(5118171, 'A51AD9J'),
(14495609, 'A52AD0J'),
(5542830, 'A52AE4C'),
(16343803, 'A52AE6C'),
(16804436, 'A52AE8C'),
(12826975, 'A53AD4J'),
(13126542, 'A53AE2C'),
(5137516, 'A53AE4C'),
(6074711, 'A53AE7C'),
(6840606, 'A53AE9C'),
(11488090, 'A53AE9C'),
(12960796, 'A54AD0J'),
(11488074, 'A54AE8C'),
(13978871, 'A54AE8C'),
(633315, 'A54AE9C'),
(6399429, 'A55AE3C'),
(10822373, 'A55AE3C'),
(13692422, 'A55AE6C'),
(16074029, 'A58AE1C'),
(13979127, 'A58AE3C'),
(4399816, 'A58AE5C'),
(5893735, 'A58AE5C'),
(8754629, 'A59BF4S'),
(12613916, 'A59BF4S'),
(3063578, 'A60AB0O'),
(8751826, 'A60AB5O'),
(8755083, 'A60AB5O'),
(5513338, 'A60BF3S'),
(14127473, 'A60BF3S'),
(16420164, 'A61BF2S'),
(6994729, 'A62AE5C'),
(13845199, 'A62BF3S'),
(6273242, 'A62BF6S'),
(9913393, 'A63AE3C'),
(10515144, 'A63AE3C'),
(10093491, 'A90AH4U'),
(3885580, 'LZZ5CLVB0DA723906'),
(13749533, 'LZZ5CLVB0DA723906'),
(11604142, 'LZZ5CLVB0DA723954'),
(5017188, 'LZZ5CLVB0DA724022'),
(7744880, 'LZZ5CLVB0DA724022'),
(13123844, 'LZZ5CLVB0DA724120'),
(8378875, 'LZZ5CLVB0DA724411'),
(11670017, 'LZZ5CLVB0DA724490'),
(12294242, 'LZZ5CLVB0DA724490'),
(10110379, 'LZZ5CLVB1DA724076'),
(11900154, 'LZZ5CLVB1DA724126'),
(13419988, 'LZZ5CLVB1DA724286'),
(15023195, 'LZZ5CLVB1DA724370'),
(16086231, 'LZZ5CLVB1DA724370'),
(6045636, 'LZZ5CLVB1DA724496'),
(5606810, 'LZZ5CLVB1DA724501'),
(14045303, 'LZZ5CLVB1DA724501'),
(7922857, 'LZZ5CLVB2DA723910'),
(12616771, 'LZZ5CLVB2DA723910'),
(10096717, 'LZZ5CLVB2DA724121'),
(13978217, 'LZZ5CLVB2DA724121'),
(6683824, 'LZZ5CLVB2DA724507'),
(5525594, 'LZZ5CLVB3DA723978'),
(12613681, 'LZZ5CLVB3DA724063'),
(13568291, 'LZZ5CLVB3DA724077'),
(15662222, 'LZZ5CLVB3DA724077'),
(6390382, 'LZZ5CLVB3DA724158'),
(10099107, 'LZZ5CLVB3DA724158'),
(15768751, 'LZZ5CLVB3DA724239'),
(11556989, 'LZZ5CLVB4DA724069'),
(16341443, 'LZZ5CLVB4DA724069'),
(13232574, 'LZZ5CLVB4DA724167'),
(14688813, 'LZZ5CLVB4DA724167'),
(81176421, 'LZZ5CLVB4DA724363'),
(8351901, 'LZZ5CLVB4DA724377'),
(16091083, 'LZZ5CLVB4DA724377'),
(3807334, 'LZZ5CLVB4DA724427'),
(13151808, 'LZZ5CLVB4DA724427'),
(10217325, 'LZZ5CLVB4DA724489'),
(4854807, 'LZZ5CLVB5DA723917'),
(6160204, 'LZZ5CLVB5DA723917'),
(5022394, 'LZZ5CLVB5DA724131'),
(8749819, 'LZZ5CLVB5DA724226'),
(12829567, 'LZZ5CLVB5DA724226'),
(4887416, 'LZZ5CLVB5DA724260'),
(5031061, 'LZZ5CLVB5DA724260'),
(10549310, 'LZZ5CLVB5DA724274'),
(14350036, 'LZZ5CLVB5DA724372'),
(14494667, 'LZZ5CLVB5DA724422'),
(6837879, 'LZZ5CLVB6DA723912'),
(8758058, 'LZZ5CLVB6DA724137'),
(11118059, 'LZZ5CLVB6DA724137'),
(10097178, 'LZZ5CLVB6DA724171'),
(13834108, 'LZZ5CLVB6DA724171'),
(6360079, 'LZZ5CLVB6DA724266'),
(10116491, 'LZZ5CLVB6DA724381'),
(11647307, 'LZZ5CLVB7DA724163'),
(3632291, 'LZZ5CLVB7DA724230'),
(12952385, 'LZZ5CLVB7DA724230'),
(3713390, 'LZZ5CLVB7DA724289'),
(4814711, 'LZZ5CLVB7DA724289'),
(10536531, 'LZZ5CLVB7DA724423'),
(12454145, 'LZZ5CLVB8DA723863'),
(8752715, 'LZZ5CLVB8DA724382'),
(10071981, 'LZZ5CLVB8DA724382'),
(4821911, 'LZZ5CLVB9DA723970'),
(16094443, 'LZZ5CLVB9DA724021'),
(13845614, 'LZZ5CLVB9DA724133'),
(4484705, 'LZZ5CLVB9DA724293'),
(13568260, 'LZZ5CLVB9DA724293'),
(5519137, 'LZZ5CLVB9DA724388'),
(6477729, 'LZZ5CLVB9DA724388'),
(13448093, 'LZZ5CLVB9DA724391'),
(14453714, 'LZZ5CLVB9DA724391'),
(6563705, 'LZZ5CLVBXDA724156'),
(16096406, 'LZZ5CLVBXDA724500'),
(10481574, 'XAW476221'),
(81650009, 'XAW476221'),
(14687793, 'XAW492564');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `ID_Ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Ciudad` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Ciudad`),
  UNIQUE KEY `Nombre_Ciudad` (`Nombre_Ciudad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Volcar la base de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ID_Ciudad`, `Nombre_Ciudad`) VALUES
(3, 'Antimano'),
(43, 'Aragua'),
(5, 'Archipielago De Los Roques'),
(6, 'Brion'),
(7, 'Caraballeda'),
(8, 'Carayaca'),
(9, 'Catia La Mar'),
(10, 'Caucagua'),
(11, 'Charallave'),
(12, 'Coche'),
(13, 'Colonia Tovar'),
(14, 'Cua'),
(15, 'Cupira'),
(16, 'El  Guapo'),
(17, 'El Jarillo'),
(18, 'Garenas'),
(19, 'Gran Caracas'),
(20, 'Guarenas'),
(21, 'Guatire'),
(22, 'Higuerote'),
(23, 'La Guaira'),
(24, 'Libertador'),
(25, 'Los Anaucos'),
(26, 'Los Teques'),
(27, 'Maiquetia'),
(28, 'Miranda'),
(29, 'Naiguata'),
(44, 'No Asignado'),
(30, 'Ocumare Del Tuy'),
(31, 'Paracotos'),
(32, 'Rio Chico'),
(33, 'San Antonio'),
(34, 'San Bernardino'),
(35, 'San Casimiro'),
(36, 'San Jose De Rio Chico'),
(37, 'Santa Lucia'),
(38, 'Santa Teresa Del Tuy'),
(39, 'Santos Michelena'),
(40, 'Tacarigua De Mamporal'),
(41, 'Tejerias'),
(42, 'Vargas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `ID_Cli` int(11) NOT NULL,
  `Nombre_Cli` varchar(50) DEFAULT 'NULL',
  `RIF_Cli` varchar(50) DEFAULT 'NULL',
  `Razon_Social_Cli` varchar(50) DEFAULT 'NULL',
  `Direccion_Cli` varchar(100) DEFAULT 'NULL',
  `Telefono_Cli` varchar(20) DEFAULT 'NULL',
  `Distancia_Cli` double DEFAULT NULL,
  `Tiempo_Cli` double DEFAULT NULL,
  `Tipo_Cliente_ID_Tipo` int(11) DEFAULT NULL,
  `Distrito_ID_Dtto` int(11) DEFAULT NULL,
  `Mayorista_ID_Mayorista` int(11) DEFAULT NULL,
  `Estado_ID_Edo` int(11) DEFAULT NULL,
  `Zona_Com_ID_Zona` int(11) DEFAULT NULL,
  `Ciudad_ID_Ciudad` int(11) DEFAULT NULL,
  `Municipio_ID_Mcpio` int(11) DEFAULT NULL,
  `Sede_ID_Sede` int(11) DEFAULT NULL,
  `Lat` varchar(20) DEFAULT NULL,
  `Lon` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_Cli`),
  KEY `Cliente_Ciudad_FK` (`Ciudad_ID_Ciudad`),
  KEY `Cliente_Distrito_FK` (`Distrito_ID_Dtto`),
  KEY `Cliente_Estado_FK` (`Estado_ID_Edo`),
  KEY `Cliente_Mayorista_FK` (`Mayorista_ID_Mayorista`),
  KEY `Cliente_Municipio_FK` (`Municipio_ID_Mcpio`),
  KEY `Cliente_Sede_FK` (`Sede_ID_Sede`),
  KEY `Cliente_Tipo_Cliente_FK` (`Tipo_Cliente_ID_Tipo`),
  KEY `Cliente_Zona_Com_FK` (`Zona_Com_ID_Zona`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `cliente`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion_chuto`
--

CREATE TABLE IF NOT EXISTS `condicion_chuto` (
  `ID_Condicion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Cond` varchar(20) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Condicion`),
  UNIQUE KEY `Nombre_Cond` (`Nombre_Cond`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `condicion_chuto`
--

INSERT INTO `condicion_chuto` (`ID_Condicion`, `Nombre_Cond`) VALUES
(2, 'Dupla'),
(3, 'No asignado'),
(1, 'Solo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE IF NOT EXISTS `conductor` (
  `ID_Conductor` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT 'NULL',
  `Apellido` varchar(20) DEFAULT 'NULL',
  `Telefono` varchar(20) DEFAULT 'NULL',
  `foto` varchar(200) DEFAULT 'NULL',
  `Km_Conductor` double DEFAULT NULL,
  PRIMARY KEY (`ID_Conductor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`ID_Conductor`, `Nombre`, `Apellido`, `Telefono`, `foto`, `Km_Conductor`) VALUES
(633315, 'Oscar Eduardo', 'Morales', '4168070814', 'fotos_conductor/633315/sinfoto.png', NULL),
(3063578, 'Jose', 'Prias', NULL, 'fotos_conductor/3063578/sinfoto.png', NULL),
(3632291, 'Carlos', 'Garcia', NULL, 'fotos_conductor/3632291/sinfoto.png', NULL),
(3713390, 'Angel Enrique', 'Mejias', '4141801706', 'fotos_conductor/3713390/sinfoto.png', NULL),
(3807334, 'Gilberto', 'Gerardi', NULL, 'fotos_conductor/3807334/sinfoto.png', NULL),
(3885580, 'Edgar', 'Martinez', '4142120337', 'fotos_conductor/3885580/sinfoto.png', NULL),
(4250631, 'Jesus', 'Sanz', '4143896628', 'fotos_conductor/4250631/sinfoto.png', NULL),
(4399816, 'HectorJose', 'Prada', '4142509642', 'fotos_conductor/4399816/sinfoto.png', NULL),
(4484705, 'Guillermo', 'Araque', '4142880633', 'fotos_conductor/4484705/sinfoto.png', NULL),
(4814711, 'Simon', 'Kajale', '4269161934', 'fotos_conductor/4814711/sinfoto.png', NULL),
(4821911, 'Luis', 'Cardenas', '4149005191', 'fotos_conductor/4821911/sinfoto.png', NULL),
(4854807, 'Francisco', 'Tovar', '4142225943', 'fotos_conductor/4854807/sinfoto.png', NULL),
(4887416, 'Miguel', 'Alfonzo', '4164079183', 'fotos_conductor/4887416/sinfoto.png', NULL),
(4914577, 'Juan', 'Zapata', NULL, 'fotos_conductor/4914577/sinfoto.png', NULL),
(5017188, 'Oscar', 'Reinoso', '4166205161', 'fotos_conductor/5017188/sinfoto.png', NULL),
(5022394, 'Pedro', 'Medina', '4141015260', 'fotos_conductor/5022394/sinfoto.png', NULL),
(5031061, 'Ciro', 'Molina', '4140271482', 'fotos_conductor/5031061/sinfoto.png', NULL),
(5118171, 'David', 'Silva', '4261207630', 'fotos_conductor/5118171/sinfoto.png', NULL),
(5118689, 'Jose', 'Hernandez', '4141142004', 'fotos_conductor/5118689/sinfoto.png', NULL),
(5137516, 'Victor', 'Marcano', '4142065151', 'fotos_conductor/5137516/sinfoto.png', NULL),
(5458359, 'Mario', 'Graterol', '4169189170', 'fotos_conductor/5458359/sinfoto.png', NULL),
(5513338, 'Tulio', 'Garcia', '4242139033', 'fotos_conductor/5513338/sinfoto.png', NULL),
(5518493, 'Freddy', 'Gomez', '4143105038', 'fotos_conductor/5518493/sinfoto.png', NULL),
(5519137, 'Tomas', 'Peña', '4142678832', 'fotos_conductor/5519137/sinfoto.png', 80),
(5525594, 'Angel', 'Mendez', '4241110893', 'fotos_conductor/5525594/sinfoto.png', NULL),
(5542830, 'Ender', 'Valvuena', '4143777199', 'fotos_conductor/5542830/sinfoto.png', NULL),
(5606810, 'Luis Avimelec', 'Goicochea', '4164024416', 'fotos_conductor/5606810/sinfoto.png', NULL),
(5764807, 'Victor', 'Silva', '4167195895', 'fotos_conductor/5764807/sinfoto.png', NULL),
(5893735, 'Luis', 'Hernandez Cornejo', '4141129705', 'fotos_conductor/5893735/sinfoto.png', 123),
(6018581, 'Jose', 'Delgado', '4148130960', 'fotos_conductor/6018581/sinfoto.png', NULL),
(6045636, 'Jose', 'Araque', NULL, 'fotos_conductor/6045636/sinfoto.png', NULL),
(6074711, 'Jesus Ramon', 'Torres', NULL, 'fotos_conductor/6074711/sinfoto.png', NULL),
(6104413, 'Esteban', 'Bermudez', NULL, 'fotos_conductor/6104413/sinfoto.png', NULL),
(6160204, 'Hernan Ysaias', 'Castillo', '4241328100', 'fotos_conductor/6160204/sinfoto.png', NULL),
(6224598, 'Gerardo', 'Marquez', NULL, 'fotos_conductor/6224598/sinfoto.png', NULL),
(6273242, 'Jesus', 'Perdomo', '4267989683', 'fotos_conductor/6273242/sinfoto.png', NULL),
(6360079, 'Luis', 'Velasquez', '4123705924', 'fotos_conductor/6360079/sinfoto.png', 168),
(6390382, 'Alexis', 'Ochoa', '4162156562', 'fotos_conductor/6390382/sinfoto.png', NULL),
(6398377, 'Fernando', 'Arevalo', '4142939893', 'fotos_conductor/6398377/sinfoto.png', NULL),
(6399429, 'Juan', 'Lafont', '4168326071', 'fotos_conductor/6399429/sinfoto.png', NULL),
(6418621, 'Rafael', 'Liscano', '4149172912', 'fotos_conductor/6418621/sinfoto.png', NULL),
(6477729, 'Jorge', 'Mendoza', NULL, 'fotos_conductor/6477729/sinfoto.png', NULL),
(6557399, 'Maximo', 'Rojas Davila', NULL, 'fotos_conductor/6557399/sinfoto.png', NULL),
(6563705, 'Nelson', 'Cisnero', '4263189051', 'fotos_conductor/6563705/sinfoto.png', 80),
(6683824, 'JoseErasmo', 'Serrano', '4163115683', 'fotos_conductor/6683824/sinfoto.png', NULL),
(6837879, 'Angel', 'Guarata', '4168354964', 'fotos_conductor/6837879/sinfoto.png', NULL),
(6840606, 'Jose', 'Rodriguez', '4266140200', 'fotos_conductor/6840606/sinfoto.png', NULL),
(6840890, 'Domingo', 'Claudio', '4142081705', 'fotos_conductor/6840890/sinfoto.png', NULL),
(6925896, 'Pedro', 'Leon Cruz', '4242438183', 'fotos_conductor/6925896/sinfoto.png', NULL),
(6994729, 'Adelo', 'Morales', '4162040829', 'fotos_conductor/6994729/sinfoto.png', NULL),
(7372092, 'Victor', 'Tona', '4269179333', 'fotos_conductor/7372092/sinfoto.png', NULL),
(7744880, 'Ysilio', 'Borjas', NULL, 'fotos_conductor/7744880/sinfoto.png', NULL),
(7922857, 'Orlando', 'Carrillo', '4242394438', 'fotos_conductor/7922857/sinfoto.png', NULL),
(7945775, 'Jose', 'Ramirez', '4169182231', 'fotos_conductor/7945775/sinfoto.png', NULL),
(8101645, 'EduardoEnrique', 'Garcia', '4267726826', 'fotos_conductor/8101645/sinfoto.png', 80),
(8351901, 'Evelio', 'Pantoja', '4263202937', 'fotos_conductor/8351901/sinfoto.png', 80),
(8378875, 'Victor', 'Ricardiz', '4264045373', 'fotos_conductor/8378875/sinfoto.png', NULL),
(8732076, 'Argeni', 'Garcia', '4140191612', 'fotos_conductor/8732076/sinfoto.png', NULL),
(8749819, 'Ruben', 'Morales', NULL, 'fotos_conductor/8749819/sinfoto.png', NULL),
(8751115, 'Enrique', 'Santaella', '4242428974', 'fotos_conductor/8751115/sinfoto.png', NULL),
(8751826, 'Cesar', 'Lujan', '4268202339', 'fotos_conductor/8751826/sinfoto.png', NULL),
(8752715, 'Fabian', 'Toro', '4168257121', 'fotos_conductor/8752715/sinfoto.png', NULL),
(8754629, 'Ysrrael', 'Lara', NULL, 'fotos_conductor/8754629/sinfoto.png', NULL),
(8755083, 'Manuel', 'Lujan', NULL, 'fotos_conductor/8755083/sinfoto.png', NULL),
(8758058, 'Nestor', 'Quintana', NULL, 'fotos_conductor/8758058/sinfoto.png', NULL),
(8943526, 'Wolfgang', 'Villarroel', '4148370581', 'fotos_conductor/8943526/sinfoto.png', NULL),
(9480709, 'Pedro', 'Olivares', '414186114', 'fotos_conductor/9480709/sinfoto.png', NULL),
(9886678, 'Rafael', 'Carrasquel', '4169368063', 'fotos_conductor/9886678/sinfoto.png', NULL),
(9913393, 'Jose Alvaro', 'Garcia', '4143692326', 'fotos_conductor/9913393/sinfoto.png', 30),
(9953869, 'Fidel', 'Garcia', '4263155532', 'fotos_conductor/9953869/sinfoto.png', NULL),
(10071981, 'Jose Esteban', 'Toro', NULL, 'fotos_conductor/10071981/sinfoto.png', NULL),
(10093491, 'Anmir', 'Carrero', NULL, 'fotos_conductor/10093491/sinfoto.png', NULL),
(10096717, 'Richard', 'Ananguren', '4143105038', 'fotos_conductor/10096717/sinfoto.png', NULL),
(10097178, 'Jesus', 'Varguilla', '4142596798', 'fotos_conductor/10097178/sinfoto.png', NULL),
(10097887, 'Pablo', 'Vasquez', '4167099722', 'fotos_conductor/10097887/sinfoto.png', NULL),
(10098860, 'Vicente', 'Echenique', '4242805880', 'fotos_conductor/10098860/sinfoto.png', NULL),
(10099107, 'Florencio', 'Ochoa', '4266153036', 'fotos_conductor/10099107/sinfoto.png', NULL),
(10110379, 'Nelson', 'Caraballo', NULL, 'fotos_conductor/10110379/sinfoto.png', NULL),
(10110956, 'Simon', 'Araque', '4241980153', 'fotos_conductor/10110956/sinfoto.png', NULL),
(10112093, 'Franklin', 'Mavarez', '4140102010', 'fotos_conductor/10112093/sinfoto.png', NULL),
(10116491, 'Francisco', 'Torres', '4242338770', 'fotos_conductor/10116491/sinfoto.png', NULL),
(10180753, 'Jesus', 'Campos', NULL, 'fotos_conductor/10180753/sinfoto.png', NULL),
(10217325, 'Jose Luis', 'Fernandez', NULL, 'fotos_conductor/10217325/sinfoto.png', NULL),
(10481574, 'Daniel', 'Colmenares', NULL, 'fotos_conductor/10481574/sinfoto.png', 16),
(10515144, 'Alfredo', 'Guevara', '4164212881', 'fotos_conductor/10515144/sinfoto.png', NULL),
(10515145, 'Douglas', 'Guevara', '4168179855', 'fotos_conductor/10515145/sinfoto.png', NULL),
(10536531, 'Julian', 'Capote', '4167119093', 'fotos_conductor/10536531/sinfoto.png', 80),
(10549310, 'Yomar', 'Pinto', '4142904764', 'fotos_conductor/10549310/sinfoto.png', NULL),
(10634443, 'Gustavo', 'Alvarez', '4142393696', 'fotos_conductor/10634443/sinfoto.png', NULL),
(10692739, 'Jose', 'Guarata', '4241998939', 'fotos_conductor/10692739/sinfoto.png', NULL),
(10809766, 'Reinaldo', 'Gonzalez', '4162176431', 'fotos_conductor/10809766/sinfoto.png', NULL),
(10817364, 'Pedro', 'Villarroel', '4262921313', 'fotos_conductor/10817364/sinfoto.png', NULL),
(10822373, 'Angel', 'Contreras', '4269118277', 'fotos_conductor/10822373/sinfoto.png', NULL),
(10977861, 'Ramon', 'Goita', '4269138376', 'fotos_conductor/10977861/sinfoto.png', NULL),
(11118059, 'Jesus', 'Bernal', '4149256007', 'fotos_conductor/11118059/sinfoto.png', NULL),
(11128269, 'Juan', 'Pacheco', NULL, 'fotos_conductor/11128269/sinfoto.png', NULL),
(11159498, 'Carlos', 'Garcia', '4241543281', 'fotos_conductor/11159498/sinfoto.png', NULL),
(11480818, 'Luis', 'Gil', NULL, 'fotos_conductor/11480818/sinfoto.png', NULL),
(11488074, 'Cesar', 'Chapellin', '4164215108', 'fotos_conductor/11488074/sinfoto.png', NULL),
(11488090, 'Jesus', 'Rodriguez', '4261056008', 'fotos_conductor/11488090/sinfoto.png', NULL),
(11556989, 'Luis', 'Niño', '4141346480', 'fotos_conductor/11556989/sinfoto.png', NULL),
(11604142, 'Jesus ', 'Villasmil Peña', '4142095994', 'fotos_conductor/11604142/sinfoto.png', NULL),
(11647307, 'Erling', 'Gomez', '4248241907', 'fotos_conductor/11647307/sinfoto.png', NULL),
(11670017, 'Ramon', 'Guerra Velasquez', '4143704396', 'fotos_conductor/11670017/sinfoto.png', NULL),
(11900154, 'Jackson', 'Cedeño', '4165372813', 'fotos_conductor/11900154/sinfoto.png', 80),
(11925628, 'Tomas', 'Sanchez', NULL, 'fotos_conductor/11925628/sinfoto.png', NULL),
(11930863, 'Luis', 'Machado', '4164031068', 'fotos_conductor/11930863/sinfoto.png', NULL),
(12294242, 'Jose Daniel', 'Rodriguez', '4168059071', 'fotos_conductor/12294242/sinfoto.png', NULL),
(12298069, 'Wilman', 'Machado', '4261048847', 'fotos_conductor/12298069/sinfoto.png', NULL),
(12454145, 'Giovanny', 'Serrano', '4269177275', 'fotos_conductor/12454145/sinfoto.png', NULL),
(12455337, 'Orlando', 'Rondon', NULL, 'fotos_conductor/12455337/sinfoto.png', NULL),
(12613681, 'Luis', 'Toro', '4163116021', 'fotos_conductor/12613681/sinfoto.png', NULL),
(12613916, 'Ismael', 'Martinez', NULL, 'fotos_conductor/12613916/sinfoto.png', NULL),
(12616771, 'Jerry', 'Maldonado', '4242575863', 'fotos_conductor/12616771/sinfoto.png', NULL),
(12826975, 'JoseLuis', 'Velasquez', '4264052294', 'fotos_conductor/12826975/sinfoto.png', NULL),
(12829205, 'Jesus', 'Gutierrez', '4142223823', 'fotos_conductor/12829205/sinfoto.png', NULL),
(12829567, 'Anibal', 'Hernandez', '4141131183', 'fotos_conductor/12829567/sinfoto.png', NULL),
(12830492, 'Pablo', 'Inojosa', '4142489319', 'fotos_conductor/12830492/sinfoto.png', NULL),
(12952385, 'Carlos', 'Garcia Salazar', '4242417228', 'fotos_conductor/12952385/sinfoto.png', NULL),
(12960796, 'Yovany', 'Cardoza', '4242344223', 'fotos_conductor/12960796/sinfoto.png', NULL),
(13123844, 'Relly', 'Salas', '4141741251', 'fotos_conductor/13123844/sinfoto.png', NULL),
(13126542, 'Jose', 'Silva', '4241600573', 'fotos_conductor/13126542/sinfoto.png', NULL),
(13151808, 'Jimmy', 'Nuñez', '4144911896', 'fotos_conductor/13151808/sinfoto.png', NULL),
(13223079, 'Manuel', 'Barrera', NULL, 'fotos_conductor/13223079/sinfoto.png', NULL),
(13232574, 'Leonaldo', 'Flame', NULL, 'fotos_conductor/13232574/sinfoto.png', 30),
(13419988, 'Gabriel', 'DosReis', NULL, 'fotos_conductor/13419988/sinfoto.png', NULL),
(13448093, 'Deibis', 'Gonzalez', '4265104960', 'fotos_conductor/13448093/sinfoto.png', NULL),
(13568260, 'Douglas', 'Ojeda', '4149122764', 'fotos_conductor/13568260/sinfoto.png', NULL),
(13568291, 'Alexander', 'Serrano', '4266142363', 'fotos_conductor/13568291/sinfoto.png', NULL),
(13692167, 'Jose Gregorio', 'Martinez', '4142904760', 'fotos_conductor/13692167/sinfoto.png', NULL),
(13692422, 'Yonathan', 'Corro', '4164079851', 'fotos_conductor/13692422/sinfoto.png', NULL),
(13749533, 'Elsdrift', 'Martinez', '4143047449', 'fotos_conductor/13749533/sinfoto.png', NULL),
(13834108, 'Angel', 'Toro', '4142305566', 'fotos_conductor/13834108/sinfoto.png', NULL),
(13845043, 'Jesus', 'Cruz', '4267040430', 'fotos_conductor/13845043/sinfoto.png', 0.2),
(13845199, 'Oswaldo', 'Mujica', '4164248241', 'fotos_conductor/13845199/sinfoto.png', NULL),
(13845614, 'Victor', 'Echenique', '4265194843', 'fotos_conductor/13845614/sinfoto.png', 80),
(13978217, 'Juan', 'Sojo', NULL, 'fotos_conductor/13978217/sinfoto.png', NULL),
(13978871, 'Cesar Augusto', 'Chapellin', '4164215108', 'fotos_conductor/13978871/sinfoto.png', NULL),
(13979127, 'Darwin', 'Carrillo', '4149900212', 'fotos_conductor/13979127/sinfoto.png', NULL),
(13979923, 'Frank', 'Villalobos', '4142727754', 'fotos_conductor/13979923/sinfoto.png', NULL),
(14045303, 'Jose Luis', 'Goicochea', '4261059935', 'fotos_conductor/14045303/sinfoto.png', NULL),
(14127473, 'Jairo', 'Garcia', NULL, 'fotos_conductor/14127473/sinfoto.png', NULL),
(14350036, 'Jose', 'Torres', '4149127165', 'fotos_conductor/14350036/sinfoto.png', NULL),
(14384561, 'Edward', 'Marin', NULL, 'fotos_conductor/14384561/sinfoto.png', NULL),
(14453714, 'Yirmer', 'Mendoza', NULL, 'fotos_conductor/14453714/sinfoto.png', NULL),
(14494667, 'Kawalkys', 'Davila', '4247432772', 'fotos_conductor/14494667/sinfoto.png', NULL),
(14494958, 'Orlando', 'Rodriguez', NULL, 'fotos_conductor/14494958/sinfoto.png', NULL),
(14495609, 'Oswaldo', 'Sanchez', '4168256928', 'fotos_conductor/14495609/sinfoto.png', NULL),
(14687793, 'Adalberto', 'Navas', '4269089599', 'fotos_conductor/14687793/sinfoto.png', NULL),
(14688813, 'Jesus', 'Renjifo', NULL, 'fotos_conductor/14688813/sinfoto.png', NULL),
(14851808, 'Marcos', 'Sanz', '4242095965', 'fotos_conductor/14851808/sinfoto.png', NULL),
(14992676, 'Danis', 'Arcile', NULL, 'fotos_conductor/14992676/sinfoto.png', NULL),
(15023195, 'Alexander', 'Capote', '4242040135', 'fotos_conductor/15023195/sinfoto.png', NULL),
(15199260, 'Tony', 'Ramirez', '4167162590', 'fotos_conductor/15199260/sinfoto.png', NULL),
(15331567, 'JoseLuis', 'Acosta', '4141863048', 'fotos_conductor/15331567/sinfoto.png', NULL),
(15648280, 'Jean Piero', 'Colmenares', '4167040422', 'fotos_conductor/15648280/sinfoto.png', NULL),
(15662222, 'Jose Luis', 'Serrano', '4166423434', 'fotos_conductor/15662222/sinfoto.png', NULL),
(15696596, 'Casto', 'Añanguren', '4164290546', 'fotos_conductor/15696596/sinfoto.png', NULL),
(15768751, 'Nilson', 'Suarez', '4164122886', 'fotos_conductor/15768751/sinfoto.png', 80),
(16058160, 'Richar', 'Pacheco', '4169333735', 'fotos_conductor/16058160/sinfoto.png', NULL),
(16074029, 'Rafael', 'Frias', '4162124676', 'fotos_conductor/16074029/sinfoto.png', NULL),
(16086231, 'Miguel', 'Valera', '4123974827', 'fotos_conductor/16086231/sinfoto.png', NULL),
(16091083, 'Evelio', 'Pantoja', '4261051223', 'fotos_conductor/16091083/sinfoto.png', NULL),
(16094443, 'Ruben', 'Bracamonte', '4267157835', 'fotos_conductor/16094443/sinfoto.png', NULL),
(16096406, 'Hermes', 'Garcia', '4162087097', 'fotos_conductor/16096406/sinfoto.png', NULL),
(16341443, 'Jesus', 'Bencomo', NULL, 'fotos_conductor/16341443/sinfoto.png', NULL),
(16343803, 'Jean Carlos', 'Niño', NULL, 'fotos_conductor/16343803/sinfoto.png', NULL),
(16358299, 'Gerardo', 'Medina', '4126309064', 'fotos_conductor/16358299/sinfoto.png', NULL),
(16420164, 'German', 'Marquez', '4241781736', 'fotos_conductor/16420164/sinfoto.png', NULL),
(16804436, 'Fran', 'Gonzalez', '4241228749', 'fotos_conductor/16804436/sinfoto.png', NULL),
(17119024, 'Pedro', 'Marquez', NULL, 'fotos_conductor/17119024/sinfoto.png', NULL),
(81176421, 'Juan', 'Martin', '4263188451', 'fotos_conductor/81176421/sinfoto.png', NULL),
(81650009, 'Ramon', 'Baca', '4169366894', 'fotos_conductor/81650009/sinfoto.png', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `ID_Dpto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Dpto` varchar(50) DEFAULT 'NULL',
  `Sede` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Dpto`),
  UNIQUE KEY `Nombre_Dpto` (`Nombre_Dpto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`ID_Dpto`, `Nombre_Dpto`, `Sede`) VALUES
(1, 'Cicent', 'Guatire'),
(2, 'Finanzas', 'Guatire');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE IF NOT EXISTS `distrito` (
  `ID_Dtto` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Dtto` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Dtto`),
  UNIQUE KEY `Nombre_Dtto` (`Nombre_Dtto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`ID_Dtto`, `Nombre_Dtto`) VALUES
(1, 'Metropolitano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `ID_Edo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Edo` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Edo`),
  UNIQUE KEY `Nombre_Edo` (`Nombre_Edo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcar la base de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID_Edo`, `Nombre_Edo`) VALUES
(1, 'Amazonas'),
(2, 'Anzoategui'),
(3, 'Apure '),
(4, 'Aragua'),
(5, 'Barinas'),
(6, 'Bolivar'),
(7, 'Carabobo '),
(8, 'Cojedes '),
(9, 'Delta Amacuro'),
(10, 'Distrito Capital'),
(11, 'Guarico'),
(12, 'Lara'),
(13, 'Merida'),
(14, 'Miranda'),
(15, 'Monagas'),
(24, 'No Asignado'),
(16, 'Nueva Esparta'),
(17, 'Portuguesa'),
(18, 'Sucre'),
(19, 'Tachira'),
(20, 'Trujillo'),
(21, 'Vargas'),
(22, 'Yaracuy'),
(23, 'Zulia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE IF NOT EXISTS `estatus` (
  `ID_Estatus` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Estatus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_Estatus`),
  UNIQUE KEY `Nombre_Estatus` (`Nombre_Estatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`ID_Estatus`, `Nombre_Estatus`) VALUES
(4, 'A Desincorporar'),
(1, 'Fiscalia'),
(3, 'Inoperativo'),
(5, 'Mantenimiento'),
(7, 'No asignado'),
(2, 'Operativo'),
(6, 'Planta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flota`
--

CREATE TABLE IF NOT EXISTS `flota` (
  `ID_Flota` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Flota` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Flota`),
  UNIQUE KEY `Nombre_Flota` (`Nombre_Flota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `flota`
--

INSERT INTO `flota` (`ID_Flota`, `Nombre_Flota`) VALUES
(1, 'Absorbida'),
(3, 'Howo 2010'),
(2, 'Howo 2011'),
(4, 'Howo 2012'),
(5, 'No Asignado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca_chuto`
--

CREATE TABLE IF NOT EXISTS `marca_chuto` (
  `ID_Marca` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Marca` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Marca`),
  UNIQUE KEY `Nombre_Marca` (`Nombre_Marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `marca_chuto`
--

INSERT INTO `marca_chuto` (`ID_Marca`, `Nombre_Marca`) VALUES
(4, 'Freightliner'),
(3, 'Iveco'),
(2, 'Mack'),
(5, 'No asignado'),
(1, 'Sinotruk');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mayorista`
--

CREATE TABLE IF NOT EXISTS `mayorista` (
  `ID_Mayorista` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_May` varchar(100) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Mayorista`),
  UNIQUE KEY `Nombre_May` (`Nombre_May`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcar la base de datos para la tabla `mayorista`
--

INSERT INTO `mayorista` (`ID_Mayorista`, `Nombre_May`) VALUES
(2, 'Betapetrol'),
(3, 'Bp'),
(4, 'Ccm'),
(5, 'Deltaven'),
(6, 'Llanopetrol'),
(7, 'Mobil'),
(12, 'No Asignado'),
(1, 'Pdvsa'),
(9, 'Petrocanarias'),
(10, 'Texaco'),
(11, 'Trebolgas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `ID_Mcpio` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Mcpio` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Mcpio`),
  UNIQUE KEY `Nombre_Mcpio` (`Nombre_Mcpio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcar la base de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`ID_Mcpio`, `Nombre_Mcpio`) VALUES
(24, 'Acevedo'),
(27, 'Andres Bello'),
(1, 'Baruta'),
(25, 'Brion'),
(28, 'Carenero'),
(20, 'Chacao'),
(15, 'Cristobal Rojas'),
(19, 'Dependencias Federales'),
(2, 'El Hatillo'),
(4, 'Guaicaipuro'),
(9, 'Independencia'),
(11, 'Lander '),
(3, 'Libertador'),
(6, 'Los Salias'),
(10, 'Mario Briceño Iragorry'),
(30, 'No asignado'),
(23, 'Paez'),
(8, 'Paz Castillo'),
(26, 'Pedro Gual'),
(22, 'Plaza'),
(14, 'San Casimiro'),
(5, 'Santiago Mariño'),
(16, 'Santos Michelena'),
(7, 'Simon Bolivar'),
(29, 'Sucre'),
(12, 'Urdaneta'),
(18, 'Vargas'),
(21, 'Zamora');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `ID_Rol` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Rol` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Rol`),
  UNIQUE KEY `Nombre_Rol` (`Nombre_Rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_Rol`, `Nombre_Rol`) VALUES
(1, 'Administrador'),
(2, 'Operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE IF NOT EXISTS `sede` (
  `ID_Sede` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Sede` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Sede`),
  UNIQUE KEY `Nombre_Sede` (`Nombre_Sede`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `sede`
--

INSERT INTO `sede` (`ID_Sede`, `Nombre_Sede`) VALUES
(5, 'No asignado'),
(4, 'PCLM'),
(2, 'PDG'),
(3, 'PDY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `Id_Tv` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Tv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`Id_Tv`, `Nombre`) VALUES
(1, 'Tiempo'),
(2, 'Velocidad'),
(3, 'Distancia'),
(4, 'Cantidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE IF NOT EXISTS `tipo_cliente` (
  `ID_Tipo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Tipo` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Tipo`),
  UNIQUE KEY `Nombre_Tipo` (`Nombre_Tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`ID_Tipo`, `Nombre_Tipo`) VALUES
(4, 'Aeropuertos'),
(6, 'Distribuidores'),
(1, 'E/S '),
(2, 'E/S Privados'),
(3, 'Emplazamiento'),
(8, 'Industriales'),
(10, 'No Asignado'),
(9, 'Puerto'),
(7, 'TermoElectrica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE IF NOT EXISTS `ubicacion` (
  `ID_Ubicacion` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Ubicacion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_Ubicacion`),
  UNIQUE KEY `Nombre_Ubicacion` (`Nombre_Ubicacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`ID_Ubicacion`, `Nombre_Ubicacion`) VALUES
(7, 'El Tigrito'),
(1, 'Fiscalia'),
(3, 'Girabofoly'),
(8, 'Meber'),
(10, 'No asignado'),
(2, 'Operaciones'),
(4, 'Poder Integral'),
(5, 'Sede Mantenimiento'),
(6, 'Serviflete'),
(9, 'Taller Campo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `ID_Usuario` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT 'NULL',
  `Apellido` varchar(50) DEFAULT 'NULL',
  `Telefono` varchar(50) DEFAULT 'NULL',
  `Email` varchar(50) DEFAULT 'NULL',
  `Login` varchar(50) DEFAULT 'NULL',
  `Clave` varchar(50) DEFAULT 'NULL',
  `Rol_ID_Rol` int(11) NOT NULL,
  `Departamento_ID_Dpto` int(11) NOT NULL,
  `Pregunta` varchar(50) DEFAULT 'NULL',
  `Respuesta` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Usuario`),
  KEY `Usuario_Departamento_FK` (`Departamento_ID_Dpto`),
  KEY `Usuario_Rol_FK` (`Rol_ID_Rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_Usuario`, `Nombre`, `Apellido`, `Telefono`, `Email`, `Login`, `Clave`, `Rol_ID_Rol`, `Departamento_ID_Dpto`, `Pregunta`, `Respuesta`) VALUES
(17503044, 'Jesus', 'Garcia', '4247128151', 'jesusegarcia@gmail.com', 'j1', 'j1', 1, 1, 'Cual es el nombre de tu mascota?', 'doki');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE IF NOT EXISTS `viajes` (
  `Fecha_Viaje` date NOT NULL,
  `Hora_Salida` time NOT NULL,
  `Tipo_Id_Tv` int(11) NOT NULL,
  `Num_Despacho` int(11) DEFAULT NULL,
  `Velocidad` int(11) DEFAULT NULL,
  `Ubicacion` varchar(200) DEFAULT NULL,
  `Latitud` varchar(20) DEFAULT NULL,
  `Longitud` varchar(20) DEFAULT NULL,
  `Usuario_ID_Usuario` int(11) DEFAULT NULL,
  `CH_CD_Conductor_ID_Conductor` int(11) DEFAULT NULL,
  `CH_CD_Chuto_Placal_Chuto` varchar(50) DEFAULT NULL,
  `Cliente_ID_Cli` int(11) DEFAULT NULL,
  `id_conductor` varchar(20) DEFAULT NULL,
  `nombre_cliente` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Fecha_Viaje`,`Tipo_Id_Tv`,`Hora_Salida`),
  KEY `Viajes_CH_CD_FK` (`CH_CD_Conductor_ID_Conductor`,`CH_CD_Chuto_Placal_Chuto`),
  KEY `Viajes_Cliente_FK` (`Cliente_ID_Cli`),
  KEY `Viajes_Tipo_FK` (`Tipo_Id_Tv`),
  KEY `Viajes_Usuario_FK` (`Usuario_ID_Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `viajes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_com`
--

CREATE TABLE IF NOT EXISTS `zona_com` (
  `ID_Zona` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_zona` varchar(50) DEFAULT 'NULL',
  PRIMARY KEY (`ID_Zona`),
  UNIQUE KEY `Nombre_zona` (`Nombre_zona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcar la base de datos para la tabla `zona_com`
--

INSERT INTO `zona_com` (`ID_Zona`, `Nombre_zona`) VALUES
(13, 'Caracas IV'),
(12, 'Caracas V'),
(6, 'Miranda I'),
(7, 'Miranda II'),
(9, 'Miranda III'),
(10, 'Miranda IV'),
(11, 'Miranda V'),
(14, 'No asignado'),
(4, 'Vargas I'),
(5, 'Vargas II');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `chuto`
--
ALTER TABLE `chuto`
  ADD CONSTRAINT `Chuto_Condicion_Chuto_FK` FOREIGN KEY (`Condicion_Chuto_ID_Condicion`) REFERENCES `condicion_chuto` (`ID_Condicion`),
  ADD CONSTRAINT `Chuto_Estatus_FK` FOREIGN KEY (`Estatus_ID_Estatus`) REFERENCES `estatus` (`ID_Estatus`),
  ADD CONSTRAINT `Chuto_Flota_FK` FOREIGN KEY (`Flota_ID_Flota`) REFERENCES `flota` (`ID_Flota`),
  ADD CONSTRAINT `Chuto_Marca_Chuto_FK` FOREIGN KEY (`Marca_Chuto_ID_Marca`) REFERENCES `marca_chuto` (`ID_Marca`),
  ADD CONSTRAINT `Chuto_Ubicacion_FK` FOREIGN KEY (`Ubicacion_ID_Ubicacion`) REFERENCES `ubicacion` (`ID_Ubicacion`);

--
-- Filtros para la tabla `ch_cd`
--
ALTER TABLE `ch_cd`
  ADD CONSTRAINT `CH_CD_Chuto_FK` FOREIGN KEY (`Chuto_Placal_Chuto`) REFERENCES `chuto` (`Placal_Chuto`),
  ADD CONSTRAINT `CH_CD_Conductor_FK` FOREIGN KEY (`Conductor_ID_Conductor`) REFERENCES `conductor` (`ID_Conductor`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `Cliente_Ciudad_FK` FOREIGN KEY (`Ciudad_ID_Ciudad`) REFERENCES `ciudad` (`ID_Ciudad`),
  ADD CONSTRAINT `Cliente_Distrito_FK` FOREIGN KEY (`Distrito_ID_Dtto`) REFERENCES `distrito` (`ID_Dtto`),
  ADD CONSTRAINT `Cliente_Estado_FK` FOREIGN KEY (`Estado_ID_Edo`) REFERENCES `estado` (`ID_Edo`),
  ADD CONSTRAINT `Cliente_Mayorista_FK` FOREIGN KEY (`Mayorista_ID_Mayorista`) REFERENCES `mayorista` (`ID_Mayorista`),
  ADD CONSTRAINT `Cliente_Municipio_FK` FOREIGN KEY (`Municipio_ID_Mcpio`) REFERENCES `municipio` (`ID_Mcpio`),
  ADD CONSTRAINT `Cliente_Sede_FK` FOREIGN KEY (`Sede_ID_Sede`) REFERENCES `sede` (`ID_Sede`),
  ADD CONSTRAINT `Cliente_Tipo_Cliente_FK` FOREIGN KEY (`Tipo_Cliente_ID_Tipo`) REFERENCES `tipo_cliente` (`ID_Tipo`),
  ADD CONSTRAINT `Cliente_Zona_Com_FK` FOREIGN KEY (`Zona_Com_ID_Zona`) REFERENCES `zona_com` (`ID_Zona`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `Usuario_Departamento_FK` FOREIGN KEY (`Departamento_ID_Dpto`) REFERENCES `departamento` (`ID_Dpto`),
  ADD CONSTRAINT `Usuario_Rol_FK` FOREIGN KEY (`Rol_ID_Rol`) REFERENCES `rol` (`ID_Rol`);

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `Viajes_CH_CD_FK` FOREIGN KEY (`CH_CD_Conductor_ID_Conductor`, `CH_CD_Chuto_Placal_Chuto`) REFERENCES `ch_cd` (`Conductor_ID_Conductor`, `Chuto_Placal_Chuto`),
  ADD CONSTRAINT `Viajes_Cliente_FK` FOREIGN KEY (`Cliente_ID_Cli`) REFERENCES `cliente` (`ID_Cli`),
  ADD CONSTRAINT `Viajes_Tipo_FK` FOREIGN KEY (`Tipo_Id_Tv`) REFERENCES `tipo` (`Id_Tv`),
  ADD CONSTRAINT `Viajes_Usuario_FK` FOREIGN KEY (`Usuario_ID_Usuario`) REFERENCES `usuario` (`ID_Usuario`);
