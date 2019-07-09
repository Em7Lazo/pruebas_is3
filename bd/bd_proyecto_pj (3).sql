-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2018 a las 07:42:54
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
  `COMBUSTIBLE` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ID_USUARIO` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `L_ORIGEN` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `L_DESTINO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ACTIVIDADES` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `PASAJEROS` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `F_REGISTRO_S` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `HORA_S` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `KILOMETRAJE_FN` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `F_REGISTRO_I` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADO_C` char(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `control_vehicular`
--

INSERT INTO `control_vehicular` (`ID_CONTROL`, `N_PLACA`, `KILOMETRAJE`, `COMBUSTIBLE`, `ID_USUARIO`, `L_ORIGEN`, `L_DESTINO`, `ACTIVIDADES`, `PASAJEROS`, `F_REGISTRO_S`, `HORA_S`, `KILOMETRAJE_FN`, `F_REGISTRO_I`, `ESTADO_C`) VALUES
('00001', 'DOL-734', '7690', '0', '00003', 'SEDE CENTRAL - COCHERA', 'MBJ - CATACAOS', 'DE', 'DE', '23-05-2018', '23:43:43', '8520', '23-05-2018 23:44:43', 'SD'),
('00002', 'EGW-371', '3000', '0', '00003', 'MBJ - CATACAOS', 'MBJ - CATACAOS', 'MOVILIZAR', 'JUAN, EMILIO', '23-05-2018', '23:43:43', '3500', '23-05-2018 23:45:43', 'SD'),
('00003', 'EGW-620', '500', '0', '00003', 'SEDE CENTRAL - COCHERA', 'SEDE CENTRAL - COCHERA', 'MOVILIZAR', 'JUAN PEREZ, DENNYS BAYONA', '23-05-2018', '23:43:43', '600', '23-05-2018 23:53:43', 'SD'),
('00004', 'DOL-734', '8520', '0', '00003', 'SEDE CENTRAL - COCHERA', 'SEDE CENTRAL - COCHERA', 'MOVILIZAR PERSONAL INFORMATICO', 'HJALMAR HERRERA, DENNYS BAYONA', '23-05-2018', '23:43:43', '8888', '23-05-2018 23:47:44', 'SD'),
('00005', 'EGW-371', '3500', '0', '00003', 'SEDE CENTRAL - COCHERA', 'SEDE CENTRAL - COCHERA', 'MOVILIZAR JUECES SUPERIORES', 'VILLALTA, GUERRERO', '24-05-2018', '23:43:43', '4444', '24-05-2018 23:48:46', 'SD'),
('00006', 'DOL-734', '8888', '0', '00003', 'MBJ - CASTILLA', 'MBJ - CASTILLA', 'TRASLADO DE MUEBLES', 'MORIS', '24-05-2018', '23:43:43', '9999', '24-05-2018 23:53:53', 'SD'),
('00007', 'EGW-371', '4444', '0', '00003', 'SEDE CENTRAL - COCHERA', 'SEDE CENTRAL - COCHERA', 'MOVILIZAR PERSONAL DE INFORMATICA', 'JUAN PEREZ', '24-05-2018', '23:43:43', '5555', '24-05-2018 23:27:16', 'SD'),
('00008', 'DOL-734', '9999', '0', '00003', 'SEDE CENTRAL - COCHERA', 'SEDE CENTRAL - COCHERA', 'MOVILIZAR', 'JUAN PEREZ', '25-05-2018', '00:19:29', 'N/I', 'N/R', 'ND'),
('00009', 'EGW-371', '5555', '0', '00006', 'MBJ - CASTILLA', 'MBJ - CASTILLA', 'MOVILIZAR PERSONAL DE INFORMATICA', 'JUAN PEREZ, DENNYS BAYONA', '01-06-2018 00:24:19', '', 'N/I', 'N/R', 'ND'),
('00010', 'EGW-620', '600', '0', '00002', 'MBJ - CATACAOS', 'MBJ - CATACAOS', 'DE', 'DE', '01-06-2018 00:25:30', '', 'N/I', 'N/R', 'ND'),
('00011', 'EGO-830', '125', '0', '00005', 'MBJ - CASTILLA', 'MBJ - CASTILLA', 'DE', 'DE', '01-06-2018 00:26:44', '', 'N/I', 'N/R', 'ND'),
('00012', 'EGB-740', '999', '0', '00004', 'MBJ - CASTILLA', 'MBJ - CASTILLA', 'DE', 'DE', '01-06-2018 00:27:01', '', 'N/I', 'N/R', 'ND'),
('00013', 'EGK-634', '300', '0', '00004', 'MBJ - CASTILLA', 'MBJ - CATACAOS', 'DE', 'DE', '01-06-2018 00:28:00', '', 'N/I', 'N/R', 'ND'),
('00014', 'EGW-620', '600', '0', '00004', 'MBJ - CATACAOS', 'MBJ - CATACAOS', 'MLOVILZAR MOVILIZAR', 'JUAN PEREZ', '01-06-2018 00:33:42', '00:33:42', 'N/I', 'N/R', 'ND');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dt_empleados`
--

CREATE TABLE `dt_empleados` (
  `ID_EMPLEADO` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `EMP_APELLIDOS` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `EMP_NOMBRES` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `DOC_IDENTIDAD` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `EMP_SEXO` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `EMP_EMAIL` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `EMP_TELEFONO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_NAC` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_REG` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `EMP_ESTADO` char(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dt_empleados`
--

INSERT INTO `dt_empleados` (`ID_EMPLEADO`, `EMP_APELLIDOS`, `EMP_NOMBRES`, `DOC_IDENTIDAD`, `EMP_SEXO`, `EMP_EMAIL`, `EMP_TELEFONO`, `FECHA_NAC`, `FECHA_REG`, `EMP_ESTADO`) VALUES
('00001', 'LAZO FLORES', 'CARLOS EMILIO', '70039561', '00004', 'lazo070790@gmail.com', '123456789', '1990-07-07', '2018-01-03', 'AC'),
('00002', 'TIRADO MORANTE', 'MARTIN', '15953211', '00004', 'martin@hotmail.es', '159753', '1886-05-05', '2018-01-03', 'AC'),
('00003', 'ALBURQUEQUE LAARA', 'CESAR AUGUSTO', '02811810', '00004', 'NO RESGITRADO', '948899727', '0001-01-01', '2018-02-01', 'AC'),
('00004', 'GARCES MOGOLLON', 'ELOY RUPERTO', '02785100', '00004', 'NO REGISTRADO', '982184556', '', '2018-02-01', 'AC'),
('00005', 'VILELA CRUZ', 'ROLAND', '02865263', '00004', 'NO REGISTRADO', '947931132', '', '2018-02-01', 'AC'),
('00006', 'BERRU PEÑA', 'ADRIANO', '32545911', '00004', 'NO REGISTRADO', '', '', '2018-02-01', 'AC'),
('00007', 'LOMBARDI SAAVEDRA', 'JIMMY JACKSON', '02862762', '00004', 'NO REGISTRADO', '956403691', '', '2018-02-01', 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dt_parametros`
--

CREATE TABLE `dt_parametros` (
  `ID_PARAMETRO` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `PARAM_DESCRIPCION` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `PARAM_CATEGORIA` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `PARAM_ESTADO` char(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dt_parametros`
--

INSERT INTO `dt_parametros` (`ID_PARAMETRO`, `PARAM_DESCRIPCION`, `PARAM_CATEGORIA`, `PARAM_ESTADO`) VALUES
('00001', 'ADMINISTRADOR', 'NIVEL', 'AC'),
('00002', 'REGISTRADOR', 'NIVEL', 'AC'),
('00003', 'FEMENINO', 'SEXO', 'AC'),
('00004', 'MASCULINO', 'SEXO', 'AC'),
('00005', 'SEDE CENTRAL', 'SEDE', 'AC'),
('00006', 'PROVINCIAL', 'SEDE', 'AC'),
('00007', 'DISTRITAL', 'SEDE', 'AC'),
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
('00018', 'MBJ - CATACAOS', 'DEPENDENCIA', 'AC'),
('00019', 'MBJ - CASTILLA', 'DEPENDENCIA', 'AC'),
('00020', 'MBJ - CHULUCANAS', 'DEPENDENCIA', 'AC'),
('00021', 'MBJ - SECHURA', 'DEPENDENCIA', 'AC'),
('00022', 'HUARMACA', 'DEPENDENCIA', 'AC'),
('00023', 'HUANCABAMBA', 'DEPENDENCIA', 'AC'),
('00024', 'CANCHAQUE', 'DEPENDENCIA', 'AC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dt_usuarios`
--

CREATE TABLE `dt_usuarios` (
  `ID_USUARIO` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `ID_EMPLEADO` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `SEDE` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `ID_NIVEL` char(5) COLLATE utf8_spanish_ci NOT NULL,
  `USUARIO` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `PASS` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `FECHA_REG` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `USUARIO_ESTADO` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `CONTROL_ESTADO` char(2) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dt_usuarios`
--

INSERT INTO `dt_usuarios` (`ID_USUARIO`, `ID_EMPLEADO`, `SEDE`, `ID_NIVEL`, `USUARIO`, `PASS`, `FECHA_REG`, `USUARIO_ESTADO`, `CONTROL_ESTADO`) VALUES
('00001', '00001', 'SEDE CENTRAL', '00001', 'CLAZO', 'E10ADC3949BA59ABBE56E057F20F883E', '2018-01-02', 'AC', 'DS'),
('00002', '00003', 'SEDE CENTRAL', '00016', 'JUAN', 'E10ADC3949BA59ABBE56E057F20F883E', '2018-01-02', 'AC', 'DS'),
('00003', '00004', 'SEDE CENTRAL', '00016', 'NN', 'E10ADC3949BA59ABBE56E057F20F883E', '2018-01-02', 'AC', 'DS'),
('00004', '00005', 'SEDE CENTRAL', '00016', 'NN', 'E10ADC3949BA59ABBE56E057F20F883E', '2018-01-02', 'AC', 'DS'),
('00005', '00006', 'SEDE CENTRAL', '00016', 'NN', 'E10ADC3949BA59ABBE56E057F20F883E', '2018-01-02', 'AC', 'DS'),
('00006', '00007', 'SEDE CENTRAL', '00016', 'NN', 'E10ADC3949BA59ABBE56E057F20F883E', '2018-01-02', 'AC', 'OC');

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
('00018', 'MBJ - CATACAOS', 'DEPENDENCIA', 'AC'),
('00019', 'MBJ - CASTILLA', 'DEPENDENCIA', 'AC'),
('00020', 'MBJ - CHULUCANAS', 'DEPENDENCIA', 'AC'),
('00021', 'MBJ - SECHURA', 'DEPENDENCIA', 'AC'),
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
('00002', '00003', '00005', '00016', 'JUAN', '123', '2018-01-02', 'AC', 'OC'),
('00003', '00004', '00005', '00016', 'NN', 'NN', '2018-01-02', 'AC', 'DS'),
('00004', '00005', '00005', '00016', 'NN', 'NN', '2018-01-02', 'AC', 'OC'),
('00005', '00006', '00005', '00016', 'NN', 'NN', '2018-01-02', 'AC', 'OC'),
('00006', '00007', '00005', '00016', 'NN', 'NN', '2018-01-02', 'AC', 'OC');

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
('00001', 'DOL-734', '00009', 'RANGER', 'NEGRO', '2006', 'PETROLERA', '4', '9999', '2018-02-01', 'AC', 'DS'),
('00002', 'EGW-371', '00011', 'H1', 'AZUL', '2016', 'PETROLERA', '4', '5555', '2018-02-01', 'IN', 'DS'),
('00003', 'EGW-620', '00015', 'URBAN CRUISER', 'AZUL', '2016', 'PETROLERA', '4', '600', '2018-02-01', 'AC', 'OC'),
('00004', 'EGB-740', '00015', 'NAVARA', 'GRIS PERLADO METALICO', '2010', 'PETROLERA', '4', '999', '2018-02-01', 'AC', 'OC'),
('00005', 'EGO-830', '00010', 'EQUINOX', 'NEGRO CON BORDES PLATEADO', '2012', 'GASOLINERA', '4', '125', '2018-02-01', 'AC', 'OC'),
('00006', 'EGK-634', '00012', 'SORENTO', 'BLANCO', '2007', 'GASOLINERA', '4', '300', '2018-02-01', 'IN', 'OC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `control_vehicular`
--
ALTER TABLE `control_vehicular`
  ADD PRIMARY KEY (`ID_CONTROL`);

--
-- Indices de la tabla `dt_empleados`
--
ALTER TABLE `dt_empleados`
  ADD PRIMARY KEY (`ID_EMPLEADO`);

--
-- Indices de la tabla `dt_parametros`
--
ALTER TABLE `dt_parametros`
  ADD PRIMARY KEY (`ID_PARAMETRO`);

--
-- Indices de la tabla `dt_usuarios`
--
ALTER TABLE `dt_usuarios`
  ADD PRIMARY KEY (`ID_USUARIO`);

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
