-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2018 a las 05:15:09
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_proyecto_pj`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_vehicular`
--

CREATE TABLE `control_vehicular` (
  `ID_CONTROL` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `N_PLACA` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `KILOMETRAJE` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `COMBUTIBLE` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ID_USUARIO` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `L_ORIGEN` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `L_DESTINO` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ACTIVIDADES` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `F_REGISTRO_S` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `KILOMETRAJE_FN` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `F_REGISTRO_I` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO_C` char(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `control_vehicular`
--

INSERT INTO `control_vehicular` (`ID_CONTROL`, `N_PLACA`, `KILOMETRAJE`, `COMBUTIBLE`, `ID_USUARIO`, `L_ORIGEN`, `L_DESTINO`, `ACTIVIDADES`, `F_REGISTRO_S`, `KILOMETRAJE_FN`, `F_REGISTRO_I`, `ESTADO_C`) VALUES
('00001', 'DOL-734', '900', '', '00003', 'SEDE CENTRAL - COCHERA', 'MODULO BASICO DE JUSTICIA', 'MOVILIZAR', '2018-02-06 10:57:22', '1000', '2018-02-06 10:58:03', 'SD'),
('00002', 'EGK-634', '100', '', '00004', 'SEDE CENTRAL - COCHERA', 'MODULO BASICO DE JUSTICIA', 'MOVILIZAR', '2018-02-06 10:57:44', '200', '2018-02-06 10:58:10', 'SD'),
('00003', 'DOL-734', '1000', '', '00003', 'SEDE CENTRAL - COCHERA', 'HUARMACA', 'MOVILIZAR', '2018-02-06 10:58:40', '1200', '2018-02-06 11:47:00', 'SD'),
('00004', 'EGK-634', '200', '', '00004', 'SEDE CENTRAL - COCHERA', 'MODULO BASICO DE JUSTICIA', 'MOVILIZAR', '2018-02-06 10:58:55', '300', '2018-02-06 11:47:09', 'SD'),
('00005', 'DOL-734', '1200', '', '00003', 'SEDE CENTRAL - COCHERA', 'MODULO BASICO DE JUSTICIA', 'MOVILIZAR', '2018-02-06 11:49:00', '1500', '2018-02-06 11:57:50', 'SD'),
('00006', 'DOL-734', '1500', '', '00003', 'SEDE CENTRAL - COCHERA', 'MODULO BASICO DE JUSTICIA', 'LLEVAR MUEBLES', '2018-02-06 11:58:36', '1520', '2018-02-06 11:59:09', 'SD'),
('00007', 'DOL-734', '1520', '', '00004', 'SEDE CENTRAL - COCHERA', 'MODULO BASICO DE JUSTICIA', 'MOVILIZAR', '2018-02-06 11:59:33', '1540', '2018-02-06 12:06:25', 'SD'),
('00008', 'DOL-734', '1540', '', '00003', 'MODULO BASICO DE JUSTICIA', 'MODULO BASICO DE JUSTICIA', 'MOVILIZAR', '2018-02-06 12:06:49', '1600', '2018-02-06 12:43:06', 'SD'),
('00009', 'EGO-830', '100', '', '00004', 'MODULO BASICO DE JUSTICIA', 'SEDE CENTRAL - COCHERA', 'MOVILIZAR', '2018-02-06 12:07:26', '120', '2018-02-06 14:01:14', 'SD'),
('00010', 'EGW-620', '100', '', '00005', 'SEDE CENTRAL - COCHERA', 'HUANCABAMBA', 'MOVILIZAR PERSONAL DE ODECMA', '2018-02-06 13:06:03', '0', '0', 'ND'),
('00011', 'DOL-734', '', '', '0', '', '', '', '2018-04-19 21:17:26', '0', '0', 'ND');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `emp_apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `emp_nombres` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `documento_identidad` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `emp_sexo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `emp_email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `emp_telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `emp_fecha_nacimiento` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `emp_fecha_registro` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `estado_empleado` char(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `emp_apellidos`, `emp_nombres`, `documento_identidad`, `emp_sexo`, `emp_email`, `emp_telefono`, `emp_fecha_nacimiento`, `emp_fecha_registro`, `estado_empleado`) VALUES
('00001', 'LAZO FLORES', 'CARLOS EMILIO', '70039561', '00004', 'lazo070790@gmail.com', '123456789', '1990-07-07', '2018-01-03', 'AC'),
('00002', 'TIRADO MORANTE', 'MARTIN', '15953211', '00004', 'martin@hotmail.es', '159753', '1886-05-05', '2018-01-03', 'AC'),
('00003', 'ALBURQUEQUE LAARA', 'CESAR AUGUSTO', '02811810', '00004', 'NO RESGITRADO', '948899727', '0001-01-01', '2018-02-01', 'AC'),
('00004', 'GARCES MOGOLLON', 'ELOY RUPERTO', '02785100', '00004', 'NO REGISTRADO', '982184556', '', '2018-02-01', 'AC'),
('00005', 'VILELA CRUZ', 'ROLAND', '02865263', '00004', 'NO REGISTRADO', '947931132', '', '2018-02-01', 'AC'),
('00006', 'BERRU PEÑA', 'ADRIANO', '32545911', '00004', 'NO REGISTRADO', '', '', '2018-02-01', 'AC'),
('00007', 'LOMBARDI SAAVEDRA', 'JIMMY JACKSON', '02862762', '00004', 'NO REGISTRADO', '956403691', '', '2018-02-01', 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `id_parametro` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_parametro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `categoria_parametro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado_parametro` char(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`id_parametro`, `descripcion_parametro`, `categoria_parametro`, `estado_parametro`) VALUES
('00001', 'ADMINISTRADOR', 'NIVEL', 'AC'),
('00002', 'REGISTRADOR', 'NIVEL', 'AC'),
('00003', 'FEMENINO', 'SEXO', 'AC'),
('00004', 'MASCULINO', 'SEXO', 'AC'),
('00005', 'SEDE CENTRAL', 'SEDES', 'AC'),
('00006', 'PROVINCIAL', 'SEDES', 'AC'),
('00007', 'DISTRITAL', 'SEDES', 'AC'),
('00008', 'TOYOTA', 'MARCA', 'AC'),
('00009', 'FORD', 'MARCA', 'AC'),
('00010', 'CHEVROLET', 'MARCA', 'AC'),
('00011', 'HYUNDAI', 'MARCA', 'AC'),
('00012', 'KIA', 'MARCA', 'AC'),
('00013', 'HONDA', 'MARCA', 'IN'),
('00014', 'JEEP', 'MARCA', 'IN'),
('00015', 'NISSAN', 'MARCA', 'AC'),
('00016', 'CONDUCTOR', 'NIVEL', 'AC'),
('00017', 'SEDE CENTRAL - COCHERA', 'DEPENDENCIA', 'AC'),
('00018', 'MODULO BASICO DE JUSTICIA - CATACAOS', 'DEPENDENCIA', 'AC'),
('00019', 'MODULO BASICO DE JUSTICIA - CASTILLA', 'DEPENDENCIA', 'AC'),
('00020', 'MODULO BASICO DE JUSTICIA - CHULUCANAS', 'DEPENDENCIA', 'AC'),
('00021', 'MODULO BASICO DE JUSTICIA - SECHURA', 'DEPENDENCIA', 'AC'),
('00022', 'HUARMACA', 'DEPENDENCIA', 'AC'),
('00023', 'HUANCABAMBA', 'DEPENDENCIA', 'AC'),
('00024', 'CANCHAQUE', 'DEPENDENCIA', 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `id_persona` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `id_sede` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `id_nivel` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `estado_usuario` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `CONTROL_ESTADO` char(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_persona`, `id_sede`, `id_nivel`, `usuario`, `pass`, `fecha_registro`, `estado_usuario`, `CONTROL_ESTADO`) VALUES
('00001', '00001', '00005', '00001', 'CLAZO', '123', '2018-01-02', 'AC', 'DS'),
('00002', '00002', '00005', '00016', 'JUAN', '123', '12-04-2018', 'AC', 'DS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `ID_VEHICULO` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `N_PLACA` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ID_MARCA` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `MODELO` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `COLOR` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ANIO` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `COMBUSTIBLE` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `CILINDRAJE` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `KILOMETRAJE_AC` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `F_REGISTRO` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO_VEHICULO` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `CONTROL_ESTADO` char(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`ID_VEHICULO`, `N_PLACA`, `ID_MARCA`, `MODELO`, `COLOR`, `ANIO`, `COMBUSTIBLE`, `CILINDRAJE`, `KILOMETRAJE_AC`, `F_REGISTRO`, `ESTADO_VEHICULO`, `CONTROL_ESTADO`) VALUES
('00001', 'DOL-734', '00009', 'RANGER', 'NEGRO', '2006', 'PETROLERA', '4', '1600', '2018-02-01', 'AC', 'OC'),
('00002', 'EGW-371', '00011', 'H1', 'AZUL', '2016', 'PETROLERA', '4', '100', '2018-02-01', 'AC', 'DS'),
('00003', 'EGW-620', '00015', 'URBAN CRUISER', 'AZUL', '2016', 'PETROLERA', '4', '100', '2018-02-01', 'AC', 'OC'),
('00004', 'EGB-740', '00015', 'NAVARA', 'GRIS PERLADO METALICO', '2010', 'PETROLERA', '4', '950', '2018-02-01', 'AC', 'OC'),
('00005', 'EGO-830', '00010', 'EQUINOX', 'NEGRO CON BORDES PLATEADO', '2012', 'GASOLINERA', '4', '120', '2018-02-01', 'AC', 'DS'),
('00006', 'EGK-634', '00012', 'SORENTO', 'BLANCO', '2007', 'GASOLINERA', '4', '300', '2018-02-01', 'AC', 'DS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `control_vehicular`
--
ALTER TABLE `control_vehicular`
  ADD PRIMARY KEY (`ID_CONTROL`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`id_parametro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`ID_VEHICULO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
