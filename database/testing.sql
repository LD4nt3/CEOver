-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 09:41 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empresa`
--

-- --------------------------------------------------------

--
-- Table structure for table `agregado`
--

CREATE TABLE `agregado` (
  `id_agregado` bigint(20) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido_m` varchar(80) NOT NULL,
  `apellido_p` varchar(80) NOT NULL,
  `domicilio` varchar(200) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conexion_men`
--

CREATE TABLE `conexion_men` (
  `fk_usuario` bigint(11) NOT NULL,
  `Remitente` bigint(20) NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `pk_conexion_men` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conexion_men`
--

INSERT INTO `conexion_men` (`fk_usuario`, `Remitente`, `tiempo`, `mensaje`, `pk_conexion_men`) VALUES
(1, 3, '08/01/2019 3:08:13 PM', 'hola', 1),
(3, 1, '08/01/2019 3:09:13 PM', 'rola', 2),
(1, 3, '08/01/2019 4:11:13 PM', 'simon', 3),
(1, 3, '08/01/2019 5:11:20 PM', 'simona', 4),
(3, 1, '08/01/2019 5:11:10 PM', 'aja', 5),
(1, 7, '10/01/2019 2:58:36 AM', 'wwww', 41),
(1, 7, '10/01/2019 2:58:53 AM', 'wwww', 42),
(1, 7, '10/01/2019 2:59:58 AM', 'eee', 43),
(1, 7, '10/01/2019 3:03:34 AM', 'eee', 44),
(1, 7, '10/01/2019 3:48:05 AM', 'dad', 45),
(1, 7, '10/01/2019 3:48:30 AM', 'ee', 46),
(1, 7, '10/01/2019 3:57:08 AM', 'aaa', 47),
(1, 7, '10/01/2019 3:59:12 AM', 'ee', 48),
(1, 7, '10/01/2019 4:02:35 AM', 'ee', 49),
(1, 7, '10/01/2019 4:47:03 AM', 'xxx', 50),
(1, 3, '10/01/2019 4:48:15 AM', 'ee', 51),
(3, 1, '10/01/2019 5:48:15 AM', 'adasd', 52),
(3, 1, '10/01/2019 5:58:15 AM', 'lel', 53),
(3, 1, '10/01/2019 5:58:15 AM', 'jamas', 54),
(3, 1, '10/01/2019 6:58:15 AM', 'nunca', 55),
(3, 1, '10/01/2019 5:58:16 AM', 'eee', 56),
(3, 1, '10/01/2019 6:59:16 AM', 'xxx', 57),
(3, 1, '10/01/2019 7:00:16 AM', 'xxx', 58),
(3, 1, '10/01/2019 7:02:16 AM', 'ensartar', 59),
(1, 7, '10/01/2019 6:59:29 PM', 'ee', 60),
(3, 1, '10/01/2019 7:03:16 AM', 'no jamas', 61),
(1, 3, '10/01/2019 7:00:35 PM', 'ee paro', 62),
(1, 3, '10/01/2019 7:01:23 PM', 'mmm?', 63),
(1, 3, '10/01/2019 7:01:42 PM', 'bueno', 64),
(1, 3, '10/01/2019 7:03:24 PM', 'no mientan', 65),
(1, 3, '10/01/2019 8:12:02 PM', 'èe', 66),
(1, 3, '10/01/2019 8:12:06 PM', 'aa', 67),
(1, 3, '10/01/2019 8:14:51 PM', 'xx', 68),
(1, 3, '10/01/2019 8:15:35 PM', 'aa', 69),
(1, 3, '10/01/2019 8:15:42 PM', 'ee', 70),
(1, 7, '10/01/2019 8:17:44 PM', 'hmm', 71),
(1, 7, '10/01/2019 8:17:48 PM', 'aa', 72),
(1, 3, '10/01/2019 8:25:44 PM', 'ee', 73),
(1, 7, '10/01/2019 8:27:48 PM', 'ee', 74),
(1, 7, '10/01/2019 8:27:53 PM', 'xxx', 75),
(1, 3, '10/01/2019 8:28:30 PM', 'xx', 76),
(1, 3, '10/01/2019 8:28:40 PM', 'ee', 77),
(1, 7, '10/01/2019 8:45:46 PM', 'ee', 78),
(1, 7, '10/01/2019 8:53:37 PM', 'xx', 79),
(1, 3, '10/01/2019 8:53:40 PM', 'ee', 80),
(1, 3, '10/01/2019 8:53:45 PM', 'jaj', 81),
(3, 1, '10/01/2019 7:04:16 AM', 'uu', 82),
(3, 1, '10/01/2019 7:14:16 AM', 'ee', 83),
(1, 3, '10/01/2019 9:12:52 PM', 'èee', 84),
(3, 1, '10/01/2019 7:15:16 AM', 'rr', 85),
(3, 1, '10/01/2019 7:15:18 AM', 'eee', 86),
(3, 1, '10/01/2019 7:15:19 AM', 'eee', 87),
(3, 1, '10/01/2019 7:16:19 AM', 'eee', 88),
(3, 1, '10/01/2019 7:18:19 AM', 'eee', 89),
(3, 1, '10/01/2019 7:18:19 AM', 'aaa', 90),
(3, 1, '10/01/2019 7:18:21 AM', 'aaa', 91),
(3, 1, '10/01/2019 7:18:21 AM', 'aaa', 92),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 93),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 94),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 95),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 96),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 97),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 98),
(1, 3, '10/01/2019 9:38:13 PM', 'aaa', 99),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 100),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 101),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 102),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 103),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 104),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 105),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 106),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 107),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 108),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 109),
(3, 1, '10/01/2019 7:19:21 AM', 'aaa', 110),
(3, 1, '10/01/2019 7:19:41 AM', 'eee', 111),
(3, 1, '10/01/2019 7:19:41 AM', 'eee', 112),
(3, 1, '10/01/2019 7:19:41 AM', 'eee', 113);

-- --------------------------------------------------------

--
-- Table structure for table `consejo`
--

CREATE TABLE `consejo` (
  `id_consejo` bigint(20) NOT NULL,
  `consejo` text NOT NULL,
  `fk_punto` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consejo`
--

INSERT INTO `consejo` (`id_consejo`, `consejo`, `fk_punto`) VALUES
(1, 'Establece un proceso de mejora continua', 1),
(2, 'Sigue mejorando, aunque fracases y aprende de tus errores.', 1),
(3, 'Comunícate con mayor eficiencia con tu equipo', 4),
(4, 'Empieza a trabajar en equipo, trabajen juntos para resolver cada problema de su deber.', 4),
(5, '“De la teoría a la práctica.” No solo lo leas eh ignores, si no llévalo a la práctica.', 5),
(6, 'Obedece las reglas en todo momento\r\n', 5),
(7, 'Intenta Organizarte más, elegir tiempos para hacer una cosa a la vez.', 6),
(8, 'Has un vistazo rápido a todo el trabajo que tienes que hacer, y empieza con lo más fácil de poco en poco,  esto para que siempre haya un avance', 6),
(9, ' Hacer un listado de tareas', 3),
(10, 'Dedica más tiempo a tus tareas, esto mejorará tu eficiencia en ellos', 3),
(11, 'Tu vida puede ser un desorden, pero con tiempo y paciencia y una lista, puedes tener más tiempo para realizar las cosas.\r\n', 2),
(12, 'No te frustres si tu trabajo no te sale, o está cerca el tiempo límite, toma pequeños descansos de 8 minutos,\r\nesto te ayudará a pensar con más claridad.\r\n', 2);

-- --------------------------------------------------------

--
-- Table structure for table `consuper`
--

CREATE TABLE `consuper` (
  `pk_consuper` bigint(20) NOT NULL,
  `fk_usuario` bigint(20) NOT NULL,
  `fk_perm` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cont`
--

CREATE TABLE `cont` (
  `pk_cont` bigint(20) NOT NULL,
  `fk_trabajo` bigint(20) NOT NULL,
  `fk_punto` bigint(20) NOT NULL,
  `calificacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cont`
--

INSERT INTO `cont` (`pk_cont`, `fk_trabajo`, `fk_punto`, `calificacion`) VALUES
(1, 1, 2, 4.5),
(2, 2, 6, 0.5),
(3, 1, 1, 0.4),
(11, 29, 3, 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `con_norma`
--

CREATE TABLE `con_norma` (
  `pk_cone` bigint(20) NOT NULL,
  `fk_norma` bigint(20) NOT NULL,
  `fk_normativa` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `con_norma`
--

INSERT INTO `con_norma` (`pk_cone`, `fk_norma`, `fk_normativa`) VALUES
(98, 41, 118),
(99, 41, 119),
(100, 44, 124),
(101, 44, 125),
(102, 44, 126),
(103, 45, 127),
(104, 45, 128),
(105, 45, 129),
(106, 45, 129),
(108, 47, 132),
(109, 47, 133);

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `pk_d_id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `Codigo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departamento`
--

INSERT INTO `departamento` (`pk_d_id`, `nombre`, `Codigo`) VALUES
(1, 'Meseros', '8D212'),
(3, 'Cocina', 'W2342'),
(4, 'sure', '38RJ9'),
(5, 'eeese', 'PYIJ5'),
(6, 'eeese', 'C4MPO'),
(7, 'mero', 'RBSNA');

-- --------------------------------------------------------

--
-- Table structure for table `eliminado_b`
--

CREATE TABLE `eliminado_b` (
  `id_eliminado` bigint(20) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido_m` varchar(80) NOT NULL,
  `apellido_p` varchar(80) NOT NULL,
  `domicilio` varchar(200) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `fk_dep` int(11) DEFAULT NULL,
  `dia` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `empresa`
--

CREATE TABLE `empresa` (
  `pk_empresa` bigint(20) NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `informe`
--

CREATE TABLE `informe` (
  `id_informe` int(11) NOT NULL,
  `informe` text NOT NULL,
  `fk_trabajo` bigint(11) NOT NULL,
  `fk_usuario` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `norma`
--

CREATE TABLE `norma` (
  `id_norma` bigint(20) NOT NULL,
  `norma` text NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `norma`
--

INSERT INTO `norma` (`id_norma`, `norma`, `descripcion`) VALUES
(38, 'pastel', 'is a'),
(39, 'nomi', 'naomi'),
(40, 'anita', 'lava'),
(41, 'ñ', 'ñ'),
(42, 'hsiwd', 'indwidn'),
(43, 'hsiwd', 'indwidn'),
(44, 'ocen', 'man'),
(45, 'NOM2018', 'hola'),
(46, 'dwddwd', 'dwdwd'),
(47, 'victori', 'vict');

-- --------------------------------------------------------

--
-- Table structure for table `normativa`
--

CREATE TABLE `normativa` (
  `id_normativa` bigint(20) NOT NULL,
  `normativa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `normativa`
--

INSERT INTO `normativa` (`id_normativa`, `normativa`) VALUES
(111, 'lie'),
(112, 'die'),
(113, 'la britany'),
(114, 'se la '),
(115, 'come'),
(116, 'la'),
(117, 'pichula'),
(118, 'ñ'),
(119, 'ñ'),
(120, 'dnid'),
(121, 'ocean man'),
(122, 'dnid'),
(123, 'ocean man'),
(124, 'kkk'),
(125, 'sopa deu macaco'),
(126, 'uma delisia'),
(127, 'la mucama tiene que limpiar'),
(128, 'hola'),
(129, 'como '),
(130, 'como'),
(131, 'efe'),
(132, 'seeet '),
(133, 'victory');

-- --------------------------------------------------------

--
-- Table structure for table `permisos-co`
--

CREATE TABLE `permisos-co` (
  `pk_perm` bigint(20) NOT NULL,
  `PC` enum('Agregar_normas','Agregar_procedimientos','Agregar_trabajos','Agregar_empleados','Modificar_empleados','Modificar_recompensa','Eliminar_normas','Eliminar_trabajos','Eliminar_recompensa','Eliminar_empleados','Eliminar_procedimientos') NOT NULL,
  `activado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permisos-co`
--

INSERT INTO `permisos-co` (`pk_perm`, `PC`, `activado`) VALUES
(1, 'Agregar_normas', 0),
(2, 'Agregar_procedimientos', 0),
(3, 'Agregar_trabajos', 0),
(4, 'Agregar_empleados', 0),
(5, 'Modificar_empleados', 0),
(6, 'Modificar_recompensa', 0),
(7, 'Eliminar_normas', 0),
(8, 'Eliminar_trabajos', 0),
(9, 'Modificar_recompensa', 0),
(10, 'Eliminar_empleados', 0),
(11, 'Eliminar_procedimientos', 0);

-- --------------------------------------------------------

--
-- Table structure for table `procedimiento`
--

CREATE TABLE `procedimiento` (
  `id_procedimiento` bigint(20) NOT NULL,
  `Codigo` varchar(20) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `procedimiento` text NOT NULL,
  `Revision` varchar(20) NOT NULL,
  `fk_norma` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `procedimiento`
--

INSERT INTO `procedimiento` (`id_procedimiento`, `Codigo`, `Nombre`, `procedimiento`, `Revision`, `fk_norma`) VALUES
(39, 'koo', 'koko', 'kokoko', 'A', 38),
(41, 'a', 'a', 'a', 'a', 40);

-- --------------------------------------------------------

--
-- Table structure for table `punto`
--

CREATE TABLE `punto` (
  `id_puntos` bigint(20) NOT NULL,
  `descripcion` text NOT NULL,
  `fk_pro` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `punto`
--

INSERT INTO `punto` (`id_puntos`, `descripcion`, `fk_pro`) VALUES
(1, 'eee', NULL),
(2, 'Disposicion del empleado al realizarlo', NULL),
(3, 'dadadd', 39),
(4, 'Cooperación entre compañeros\r\n', 39),
(5, 'Cumplimiento de reglas normas o estándares definidos', NULL),
(6, 'Resultados en tiempo adecuado', 39);

-- --------------------------------------------------------

--
-- Table structure for table `puntuacion`
--

CREATE TABLE `puntuacion` (
  `id_lugares` bigint(20) NOT NULL,
  `recompensa` varchar(200) DEFAULT NULL,
  `fk_usuario` bigint(11) NOT NULL,
  `fk_puntos` bigint(20) NOT NULL,
  `calificacion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `puntuacion`
--

INSERT INTO `puntuacion` (`id_lugares`, `recompensa`, `fk_usuario`, `fk_puntos`, `calificacion`) VALUES
(1, 'un pipo bailando gambino y un clorox', 3, 1, 100),
(2, 'nada', 4, 1, 90),
(3, 'nada', 5, 1, 4),
(4, NULL, 5, 3, 3),
(5, NULL, 5, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_puesto` bigint(20) NOT NULL,
  `permiso` enum('Empleado','Encargado','Administrador','Co-Administrador','Co-encargado') NOT NULL,
  `fk_usuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_puesto`, `permiso`, `fk_usuario`) VALUES
(4, 'Encargado', 1),
(6, 'Empleado', 14),
(7, 'Empleado', 1),
(8, 'Empleado', 9),
(9, 'Administrador', 10),
(10, 'Administrador', 4),
(11, 'Co-Administrador', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiempo`
--

CREATE TABLE `tiempo` (
  `pk_tiempo` bigint(20) NOT NULL,
  `tiempo_i` varchar(25) NOT NULL,
  `tiempo_f` varchar(25) NOT NULL,
  `fk_trabajo` bigint(20) NOT NULL,
  `fk_usuario` bigint(20) NOT NULL,
  `Estado` enum('Entregado','En Proceso','Con problemas','Tarde','No entregado') NOT NULL,
  `Observaciones` text NOT NULL,
  `DescribeT` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiempo`
--

INSERT INTO `tiempo` (`pk_tiempo`, `tiempo_i`, `tiempo_f`, `fk_trabajo`, `fk_usuario`, `Estado`, `Observaciones`, `DescribeT`) VALUES
(17, '2018-12-12', '2018-12-18', 2, 6, 'Entregado', 'omned', ''),
(18, '2018-12-12', '2018-12-18', 2, 6, 'Entregado', 'omned', ''),
(19, '2018-12-12', '2018-12-18', 2, 7, 'Entregado', 'omned', ''),
(22, '2018-12-17', '2018-12-17', 1, 8, 'Entregado', 'nude', ''),
(23, '2018-12-17', '2018-12-17', 29, 9, 'Entregado', 'turururururisndi', ''),
(24, '2018-12-17', '2018-12-17', 29, 9, 'Entregado', 'turururururisndi', ''),
(25, '2018-12-17', '2018-12-17', 1, 13, 'Entregado', 'turururururisndi', '');

-- --------------------------------------------------------

--
-- Table structure for table `trabajo`
--

CREATE TABLE `trabajo` (
  `id_trabajo` bigint(20) NOT NULL,
  `trabajo` varchar(500) NOT NULL,
  `archivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trabajo`
--

INSERT INTO `trabajo` (`id_trabajo`, `trabajo`, `archivo`) VALUES
(1, 'Puesta de mesa', 'swisnw'),
(2, 'Atencion al cliente', 'smiwmsimws'),
(3, 'Ordenamiento de masas', 'idniedne'),
(4, 'Atender a los clientes VIP', 'dowmdw'),
(5, 'hola', ''),
(6, 'hola', ''),
(7, 'hola', ''),
(8, 'hablerto', ''),
(9, 'hablerto', ''),
(10, 'ultraviolento', ''),
(11, 'aaaa', ''),
(12, 'aaaa', ''),
(13, 'jowjo', ''),
(14, 'jowjo', ''),
(15, 'violina', ''),
(16, 'freedom', ''),
(17, 'allibaba', ''),
(18, 'glado0s', ''),
(19, 'eom', ''),
(20, 'odeom', ''),
(21, 'odeom', ''),
(22, 'odeom', ''),
(23, 'odeom', ''),
(24, 'odeom', ''),
(25, 'coco', ''),
(26, 'prueba2', ''),
(27, 'prueba2', ''),
(28, 'elfreddys', ''),
(29, 'Proyecto de velocidad de cocina', ''),
(30, 'volvere', ''),
(31, 'holamundocruel', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_empleado` bigint(20) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `apellido_m` varchar(80) NOT NULL,
  `apellido_p` varchar(80) NOT NULL,
  `domicilio` varchar(200) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `fk_dep` int(11) DEFAULT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_empleado`, `nombre`, `apellido_m`, `apellido_p`, `domicilio`, `celular`, `correo`, `pass`, `fk_dep`, `imagen`) VALUES
(1, 'Ana Maria', 'Polo', 'Roblez', 'dweded', 445454, 'prueba@gmail.com', '$2y$10$oB02X/qWXDfNYGNoJ6rB1edRF9aTiO.ZBQU3zMdKWR6905Dwoi6fu', 1, ''),
(3, 'Mateo', 'Robles', 'Ruelas', 'love me ', 12121222, 'imu@gmail.com', '$2y$10$oB02X/qWXDfNYGNoJ6rB1edRF9aTiO.ZBQU3zMdKWR6905Dwoi6fu', 1, 'ioji'),
(4, 'Juan', 'Lopez', 'Torres', 'el cielo', 24928382, 'kiki@gmail.com', '$2y$10$oB02X/qWXDfNYGNoJ6rB1edRF9aTiO.ZBQU3zMdKWR6905Dwoi6fu', 3, ''),
(5, 'Hector', 'Antonio', 'Hectarias', 'Hectaria64', 2329283, 'hectorin130@gmail.com', '$2y$10$oB02X/qWXDfNYGNoJ6rB1edRF9aTiO.ZBQU3zMdKWR6905Dwoi6fu', 3, 'soijd'),
(6, 'Novo', 'Alfaro', 'Berlanga', 'yo', 39384, 'bailalo@gmail.com', '$2y$10$oB02X/qWXDfNYGNoJ6rB1edRF9aTiO.ZBQU3zMdKWR6905Dwoi6fu', 1, ''),
(7, 'Sandra', 'Mirrales', 'Quero', 'okdowkd', 8948393, 'hola@gmail.com', '$2y$10$oB02X/qWXDfNYGNoJ6rB1edRF9aTiO.ZBQU3zMdKWR6905Dwoi6fu', 1, ''),
(8, 'Juan', 'Bodoque', 'Carlos', 'av siempre viva', 92929292, 'carlosduty@gmail.com', '$2y$10$oB02X/qWXDfNYGNoJ6rB1edRF9aTiO.ZBQU3zMdKWR6905Dwoi6fu', 1, ''),
(9, 'Amparo', 'Lara', 'Molto', 'this man', 911, 'VIH@gmail.com', '$2y$10$oB02X/qWXDfNYGNoJ6rB1edRF9aTiO.ZBQU3zMdKWR6905Dwoi6fu', 3, ''),
(10, 'Maria Rosa', 'Dieguez', 'de la Hoz', 'this man', 911, 'VIH@gmail.com', '$2y$10$oB02X/qWXDfNYGNoJ6rB1edRF9aTiO.ZBQU3zMdKWR6905Dwoi6fu', 3, ''),
(13, 'Inmaculada', 'Megias', 'Hurtado', 'o', 22, 'o', '$2y$10$oB02X/qWXDfNYGNoJ6rB1edRF9aTiO.ZBQU3zMdKWR6905Dwoi6fu', 1, ''),
(14, 'lul', 'XC', 'XD', 'POR AHI', 666666, '666@666.com', '$2y$10$YZxI3onRH2StkDp6PmJ2IOmm6hUL8OPgZzFt/Y/2ZLeTC.cc1xvvO', NULL, ''),
(15, 'jojo', 'jojo', 'jojo', 'jojo', 2232, 'ploisla898989@gmail.com', '$2y$10$Gbs6QBVGnoMVVGqpPG.RnuVuVnrwIvitnU7CCtbJNtMnM8BjBTfte', NULL, ''),
(16, 'Karla Zoe', 'Alvarado', 'Casas', 'a', 3333946238, 'a', '$2y$10$JP9R7wsyMHVRCUaCwKTI.ux5AjBkraJBrQW7/MI2kekUZVbFYWr.O', NULL, ''),
(17, 'pablo', 'smdow', 'israel', 'oemf', 23241, 'gossa@gmail.com', '$2y$10$ItxoTLqB3tHrg1YSlWSc2.5ax1LsEA7E.q0f0L2gkicU4CwCoH/I2', NULL, ''),
(20, 'mail', 'mail', 'mail', 'mail', 22423, 'mail', '$2y$10$H25okneHMtEbQFkyznzSNObiQsWwzoHVEgfUTuhNZTY2BDH3YFmz.', NULL, ''),
(21, 'prueba3', 'p', 'prueba3', 'p', 131312, 'p', '$2y$10$c0Tq0er5NN0P8SbUb4Sv3.c5jkWcrFQCwgVW2mK/WceBhpwJjcnCG', NULL, ''),
(22, 'Michael', 'lg', 'ipsum', 'comv', 131312, 'o', '$2y$10$XOjjd/eRerjUxeIj7AHTHe.Fjj52i90gGONtIqiOxTAEdAgMUFJo2', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agregado`
--
ALTER TABLE `agregado`
  ADD PRIMARY KEY (`id_agregado`);

--
-- Indexes for table `conexion_men`
--
ALTER TABLE `conexion_men`
  ADD PRIMARY KEY (`pk_conexion_men`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `Remitente` (`Remitente`);

--
-- Indexes for table `consejo`
--
ALTER TABLE `consejo`
  ADD PRIMARY KEY (`id_consejo`),
  ADD KEY `fk_punto` (`fk_punto`);

--
-- Indexes for table `consuper`
--
ALTER TABLE `consuper`
  ADD PRIMARY KEY (`pk_consuper`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_perm` (`fk_perm`);

--
-- Indexes for table `cont`
--
ALTER TABLE `cont`
  ADD PRIMARY KEY (`pk_cont`),
  ADD KEY `fk_trabajo` (`fk_trabajo`),
  ADD KEY `fk_punto` (`fk_punto`);

--
-- Indexes for table `con_norma`
--
ALTER TABLE `con_norma`
  ADD PRIMARY KEY (`pk_cone`),
  ADD KEY `fk_norma` (`fk_norma`),
  ADD KEY `fk_normativa` (`fk_normativa`);

--
-- Indexes for table `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`pk_d_id`);

--
-- Indexes for table `eliminado_b`
--
ALTER TABLE `eliminado_b`
  ADD PRIMARY KEY (`id_eliminado`),
  ADD KEY `eliminado_b_ibfk_1` (`fk_dep`);

--
-- Indexes for table `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`pk_empresa`);

--
-- Indexes for table `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id_informe`),
  ADD KEY `fk_trabajo` (`fk_trabajo`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indexes for table `norma`
--
ALTER TABLE `norma`
  ADD PRIMARY KEY (`id_norma`);

--
-- Indexes for table `normativa`
--
ALTER TABLE `normativa`
  ADD PRIMARY KEY (`id_normativa`);

--
-- Indexes for table `permisos-co`
--
ALTER TABLE `permisos-co`
  ADD PRIMARY KEY (`pk_perm`);

--
-- Indexes for table `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD PRIMARY KEY (`id_procedimiento`),
  ADD KEY `fk_norma` (`fk_norma`);

--
-- Indexes for table `punto`
--
ALTER TABLE `punto`
  ADD PRIMARY KEY (`id_puntos`),
  ADD KEY `fk_pro` (`fk_pro`);

--
-- Indexes for table `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD PRIMARY KEY (`id_lugares`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_puntos` (`fk_puntos`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_puesto`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indexes for table `tiempo`
--
ALTER TABLE `tiempo`
  ADD PRIMARY KEY (`pk_tiempo`),
  ADD KEY `fk_trabajo` (`fk_trabajo`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Indexes for table `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`id_trabajo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `usuario_ibfk_1` (`fk_dep`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agregado`
--
ALTER TABLE `agregado`
  MODIFY `id_agregado` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `conexion_men`
--
ALTER TABLE `conexion_men`
  MODIFY `pk_conexion_men` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `consejo`
--
ALTER TABLE `consejo`
  MODIFY `id_consejo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `consuper`
--
ALTER TABLE `consuper`
  MODIFY `pk_consuper` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cont`
--
ALTER TABLE `cont`
  MODIFY `pk_cont` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `con_norma`
--
ALTER TABLE `con_norma`
  MODIFY `pk_cone` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `departamento`
--
ALTER TABLE `departamento`
  MODIFY `pk_d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `eliminado_b`
--
ALTER TABLE `eliminado_b`
  MODIFY `id_eliminado` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `empresa`
--
ALTER TABLE `empresa`
  MODIFY `pk_empresa` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `norma`
--
ALTER TABLE `norma`
  MODIFY `id_norma` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `normativa`
--
ALTER TABLE `normativa`
  MODIFY `id_normativa` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
--
-- AUTO_INCREMENT for table `permisos-co`
--
ALTER TABLE `permisos-co`
  MODIFY `pk_perm` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `procedimiento`
--
ALTER TABLE `procedimiento`
  MODIFY `id_procedimiento` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `punto`
--
ALTER TABLE `punto`
  MODIFY `id_puntos` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `puntuacion`
--
ALTER TABLE `puntuacion`
  MODIFY `id_lugares` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_puesto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tiempo`
--
ALTER TABLE `tiempo`
  MODIFY `pk_tiempo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id_trabajo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_empleado` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `conexion_men`
--
ALTER TABLE `conexion_men`
  ADD CONSTRAINT `conexion_men_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_empleado`),
  ADD CONSTRAINT `conexion_men_ibfk_3` FOREIGN KEY (`Remitente`) REFERENCES `usuario` (`id_empleado`);

--
-- Constraints for table `consejo`
--
ALTER TABLE `consejo`
  ADD CONSTRAINT `consejo_ibfk_1` FOREIGN KEY (`fk_punto`) REFERENCES `punto` (`id_puntos`);

--
-- Constraints for table `consuper`
--
ALTER TABLE `consuper`
  ADD CONSTRAINT `consuper_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_empleado`),
  ADD CONSTRAINT `consuper_ibfk_2` FOREIGN KEY (`fk_perm`) REFERENCES `permisos-co` (`pk_perm`);

--
-- Constraints for table `cont`
--
ALTER TABLE `cont`
  ADD CONSTRAINT `cont_ibfk_1` FOREIGN KEY (`fk_trabajo`) REFERENCES `trabajo` (`id_trabajo`),
  ADD CONSTRAINT `cont_ibfk_2` FOREIGN KEY (`fk_punto`) REFERENCES `punto` (`id_puntos`);

--
-- Constraints for table `con_norma`
--
ALTER TABLE `con_norma`
  ADD CONSTRAINT `con_norma_ibfk_1` FOREIGN KEY (`fk_norma`) REFERENCES `norma` (`id_norma`),
  ADD CONSTRAINT `con_norma_ibfk_2` FOREIGN KEY (`fk_normativa`) REFERENCES `normativa` (`id_normativa`);

--
-- Constraints for table `eliminado_b`
--
ALTER TABLE `eliminado_b`
  ADD CONSTRAINT `eliminado_b_ibfk_1` FOREIGN KEY (`fk_dep`) REFERENCES `departamento` (`pk_d_id`);

--
-- Constraints for table `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `informe_ibfk_1` FOREIGN KEY (`fk_trabajo`) REFERENCES `trabajo` (`id_trabajo`),
  ADD CONSTRAINT `informe_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_empleado`);

--
-- Constraints for table `procedimiento`
--
ALTER TABLE `procedimiento`
  ADD CONSTRAINT `procedimiento_ibfk_1` FOREIGN KEY (`fk_norma`) REFERENCES `norma` (`id_norma`);

--
-- Constraints for table `punto`
--
ALTER TABLE `punto`
  ADD CONSTRAINT `punto_ibfk_1` FOREIGN KEY (`fk_pro`) REFERENCES `procedimiento` (`id_procedimiento`);

--
-- Constraints for table `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD CONSTRAINT `puntuacion_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_empleado`),
  ADD CONSTRAINT `puntuacion_ibfk_3` FOREIGN KEY (`fk_puntos`) REFERENCES `punto` (`id_puntos`);

--
-- Constraints for table `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `rol_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_empleado`);

--
-- Constraints for table `tiempo`
--
ALTER TABLE `tiempo`
  ADD CONSTRAINT `tiempo_ibfk_1` FOREIGN KEY (`fk_trabajo`) REFERENCES `trabajo` (`id_trabajo`),
  ADD CONSTRAINT `tiempo_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario` (`id_empleado`) ON DELETE CASCADE;

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_dep`) REFERENCES `departamento` (`pk_d_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
