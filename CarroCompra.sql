-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-04-2017 a las 16:00:13
-- Versión del servidor: 5.1.30
-- Versión de PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `CarroCompras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE IF NOT EXISTS `auditoria` (
  `CODIGO` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `CODIGO_USUARIO` varchar(10) NOT NULL,
  `FECHA` datetime NOT NULL,
  `ACCION` varchar(100) NOT NULL,
  `ID_AFECTADO` varchar(50) NOT NULL,
  PRIMARY KEY (`CODIGO`),
  KEY `FK_auditoria_1` (`CODIGO_USUARIO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcar la base de datos para la tabla `auditoria`
--

INSERT INTO `auditoria` (`CODIGO`, `CODIGO_USUARIO`, `FECHA`, `ACCION`, `ID_AFECTADO`) VALUES
(1, 'marquin', '2017-03-30 12:25:31', 'INGRESO', ''),
(2, 'marquin', '2017-03-30 14:50:50', 'INGRESO', ''),
(3, 'marquin', '2017-03-31 15:16:06', 'INGRESO', ''),
(4, 'marquin', '2017-04-05 14:47:12', 'INGRESO', ''),
(5, 'marquin', '2017-04-05 14:57:21', 'menu-INGRESO', '0'),
(6, 'marquin', '2017-04-05 14:57:32', 'funciones-INGRESO', '80'),
(7, 'marquin', '2017-04-05 14:58:11', 'menu-INGRESO', '0'),
(8, 'marquin', '2017-04-05 14:58:20', 'funciones-INGRESO', '81'),
(9, 'marquin', '2017-04-05 14:59:49', 'menu-INGRESO', '0'),
(10, 'marquin', '2017-04-05 15:00:38', 'menu-INGRESO', '0'),
(11, 'marquin', '2017-04-05 15:01:29', 'menu-INGRESO', '0'),
(12, 'marquin', '2017-04-05 15:01:39', 'funciones-INGRESO', '82'),
(13, 'marquin', '2017-04-05 15:01:46', 'funciones-INGRESO', '83'),
(14, 'marquin', '2017-04-05 15:01:50', 'funciones-INGRESO', '84'),
(15, 'marquin', '2017-04-05 15:02:51', 'menu-MODIFICO', '3.0'),
(16, 'marquin', '2017-04-05 15:03:00', 'menu-MODIFICO', '3.1'),
(17, 'marquin', '2017-04-05 15:05:51', 'CC_Categorias-INGRESO', '2'),
(18, 'marquin', '2017-04-05 15:06:47', 'CC_Categorias-INGRESO', '3'),
(19, 'marquin', '2017-04-05 15:10:02', 'CC_Producto-INGRESO', '1'),
(20, 'marquin', '2017-04-05 15:10:45', 'CC_Producto-INGRESO', '2'),
(21, 'marquin', '2017-04-05 15:11:58', 'CC_Producto-INGRESO', '3'),
(22, 'marquin', '2017-04-05 15:12:42', 'CC_Producto-INGRESO', '4'),
(23, 'marquin', '2017-04-05 15:20:05', 'menu-INGRESO', '0'),
(24, 'marquin', '2017-04-05 15:20:37', 'menu-INGRESO', '0'),
(25, 'marquin', '2017-04-05 15:20:52', 'funciones-INGRESO', '85'),
(26, 'marquin', '2017-04-05 15:22:01', 'funciones-INGRESO', '86');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CC_Categorias`
--

CREATE TABLE IF NOT EXISTS `CC_Categorias` (
  `cat_categoria_Id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_descripcion` varchar(100) NOT NULL,
  `cat_nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`cat_categoria_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `CC_Categorias`
--

INSERT INTO `CC_Categorias` (`cat_categoria_Id`, `cat_descripcion`, `cat_nombre`) VALUES
(2, 'Conjunto de conocimientos y actividades que están relacionados con los ingredientes, recetas.', 'GASTRONOMIA'),
(3, 'Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.', 'SALUD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CC_Clientes`
--

CREATE TABLE IF NOT EXISTS `CC_Clientes` (
  `cli_identificacion` varchar(13) NOT NULL,
  `cli_nombre` varchar(200) NOT NULL,
  `gen_codigo_genero` int(5) NOT NULL,
  `cli_fecha_nacimiento` date NOT NULL,
  `cli_direccion` varchar(200) NOT NULL,
  `cli_telefono` varchar(50) NOT NULL,
  `cli_email` varchar(100) NOT NULL,
  UNIQUE KEY `cli_identificacion` (`cli_identificacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `CC_Clientes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CC_Generos`
--

CREATE TABLE IF NOT EXISTS `CC_Generos` (
  `gen_codigo_genero` int(11) NOT NULL AUTO_INCREMENT,
  `gen_nombre_genero` varchar(50) NOT NULL,
  PRIMARY KEY (`gen_codigo_genero`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `CC_Generos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CC_Pedidos`
--

CREATE TABLE IF NOT EXISTS `CC_Pedidos` (
  `ped_codigo` int(5) NOT NULL,
  `ped_fecha` date NOT NULL,
  `cli_identificacion` varchar(13) NOT NULL,
  `pro_codigo` varchar(13) NOT NULL,
  `ped_cantidad` int(13) NOT NULL,
  `ped_iva` int(5) NOT NULL,
  `ped_fecha_entrega` date NOT NULL,
  PRIMARY KEY (`ped_codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `CC_Pedidos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CC_Producto`
--

CREATE TABLE IF NOT EXISTS `CC_Producto` (
  `pro_codigo` int(13) NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(50) NOT NULL,
  `cat_categoria_id` int(11) NOT NULL,
  `pro_imagen` varchar(250) DEFAULT NULL,
  `pro_descripcion` varchar(256) DEFAULT NULL,
  `pro_precio` varchar(10) NOT NULL,
  `pro_stock` varchar(10) NOT NULL,
  `pro_material` varchar(25) DEFAULT NULL,
  `pro_color` varchar(10) DEFAULT NULL,
  `pro_largo` varchar(10) DEFAULT NULL,
  `pro_ancho` varchar(10) DEFAULT NULL,
  `pro_alto` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`pro_codigo`),
  UNIQUE KEY `pro_codigo` (`pro_codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `CC_Producto`
--

INSERT INTO `CC_Producto` (`pro_codigo`, `pro_nombre`, `cat_categoria_id`, `pro_imagen`, `pro_descripcion`, `pro_precio`, `pro_stock`, `pro_material`, `pro_color`, `pro_largo`, `pro_ancho`, `pro_alto`) VALUES
(1, '100 MANERAS PARA MANTENERSE JOVEN', 3, '04725-9781445448725.jpg', 'Editorial: ALBATROS ISBN: 9789502409771 Idioma: ESPAÑOL', '18.00', '100', NULL, NULL, NULL, NULL, NULL),
(2, '101 CONSEJOS PARA MANTENERSE SANO CON DIABETE', 3, 'a27c0-9789502409771.jpg', 'Editorial: ALBATROS ISBN: 9789502409771 Idioma: ESPAÑOL', '18', '50', NULL, NULL, NULL, NULL, NULL),
(3, '1 CALDO 100 SOPAS', 2, 'b14dc-9781445405674.jpg', 'Editorial: LOVE FOOD ISBN: 9781445405674 Idioma: ESPAÑOL', '9.60', '100', NULL, NULL, NULL, NULL, NULL),
(4, '1 MASA 100 TORTITAS Y GOFRES', 2, '46fd9-9781781864180.jpg', 'Editorial: PARRAGON ISBN: 9781781864180 Idioma: ESPAÑOL', '8', '100', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones`
--

CREATE TABLE IF NOT EXISTS `funciones` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_rol` int(11) NOT NULL,
  `codigo_menu` varchar(6) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fk_funciones_rol1_idx` (`codigo_rol`),
  KEY `fk_funciones_menu1_idx` (`codigo_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='union de submenu con usuarios para crear menu en la web' AUTO_INCREMENT=87 ;

--
-- Volcar la base de datos para la tabla `funciones`
--

INSERT INTO `funciones` (`codigo`, `codigo_rol`, `codigo_menu`) VALUES
(2, 1, '0'),
(3, 1, '1'),
(4, 1, '1.3'),
(5, 1, '1.2'),
(6, 1, '1.1'),
(7, 1, '0.1'),
(8, 1, '1.4'),
(50, 1, '1.5'),
(72, 1, '1.6'),
(80, 1, '2'),
(81, 1, '2.0'),
(82, 1, '3'),
(83, 1, '3.1'),
(84, 1, '3.0'),
(85, 1, '4'),
(86, 1, '4.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `codigo_menu` varchar(6) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL COMMENT 'Menu que aparece en la web....tipo tendra 0 o 1(menu principal y submenu respectivamente)',
  `url` varchar(80) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `icono` varchar(50) NOT NULL DEFAULT 'i-home',
  `prioridad` int(11) NOT NULL,
  PRIMARY KEY (`codigo_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `menu`
--

INSERT INTO `menu` (`codigo_menu`, `nombre`, `url`, `tipo`, `icono`, `prioridad`) VALUES
('0', 'DASHBOARD', 'dashboard', 'M', 'i-home', 0),
('0.1', 'Inicio', 'admin/main_page', 'S', 'i-home', 0),
('1', 'ADMINISTRACION', NULL, 'M', 'i-cog', 0),
('1.1', 'Usuarios', 'admin/users/show', 'S', 'i-home', 0),
('1.2', 'Menus', 'admin/menu/show', 'S', 'i-home', 0),
('1.3', 'Funciones', 'admin/funciones/show', 'S', 'i-home', 0),
('1.4', 'Roles', 'admin/roles/show', 'S', 'i-home', 0),
('1.5', 'Iconos Menu', 'admin/icons', 'S', '', 0),
('1.6', 'Auditoria', 'admin/auditoria/show', 'S', '', 0),
('2', 'CLIENTES', 'pages/clientes/show', 'M', 'i-group', 0),
('2.0', 'Lista', 'admin/pages/clientes/show', 'S', '', 0),
('3', 'PRODUCTOS', NULL, 'M', 'i-shopping-bag', 0),
('3.0', 'Categorias', 'admin/pages/categorias/show', 'S', '', 0),
('3.1', 'Libros', 'admin/pages/productos/show', 'S', '', 0),
('4', 'PEDIDOS', NULL, 'M', 'i-shopping-cart-3', 0),
('4.0', 'No Pagados', 'admin/pages/pedidos/show', 'S', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina_inicio`
--

CREATE TABLE IF NOT EXISTS `pagina_inicio` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `pagina_inicio`
--

INSERT INTO `pagina_inicio` (`codigo`, `titulo`, `mensaje`) VALUES
(1, 'BIENVENIDOS AL SISTEMA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `codigo_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `observacion` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`codigo_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `rol`
--

INSERT INTO `rol` (`codigo_rol`, `nombre`, `observacion`) VALUES
(1, 'Administrador', 'Permisos de administrar todo el sistema.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigo_usuarios` varchar(8) NOT NULL COMMENT 'Para ingreso al sistema Ej: (mteran)',
  `nombre` varchar(20) DEFAULT 'Nombre' COMMENT 'Nombre completo...para mostrar en la web',
  `apellido` varchar(20) DEFAULT 'Apellido' COMMENT 'Apellido del usuario para mostrar en la web',
  `clave` varchar(256) DEFAULT '1234' COMMENT 'Clave de ingreso al sistema',
  `imagen` varchar(250) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT '0',
  `codigo_rol` int(11) NOT NULL,
  PRIMARY KEY (`codigo_usuarios`),
  KEY `fk_usuarios_rol1_idx` (`codigo_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contiene usuarios del sistema';

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo_usuarios`, `nombre`, `apellido`, `clave`, `imagen`, `estado`, `codigo_rol`) VALUES
('marquin', 'Marco', 'Teran', '202cb962ac59075b964b07152d234b70', '60193-3b7ab-marquinteran.jpg', 1, 1);
