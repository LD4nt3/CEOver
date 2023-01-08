-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 10:01 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `consejo`
--

CREATE TABLE `consejo` (
  `id_consejo` bigint(20) NOT NULL,
  `consejo` text NOT NULL,
  `fk_punto` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `con_norma`
--

CREATE TABLE `con_norma` (
  `pk_cone` bigint(20) NOT NULL,
  `fk_norma` bigint(20) NOT NULL,
  `fk_normativa` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `departamento`
--

CREATE TABLE `departamento` (
  `pk_d_id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `Codigo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `normativa`
--

CREATE TABLE `normativa` (
  `id_normativa` bigint(20) NOT NULL,
  `normativa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permisos-co`
--

CREATE TABLE `permisos-co` (
  `pk_perm` bigint(20) NOT NULL,
  `PC` enum('Agregar_normas','Agregar_procedimientos','Agregar_trabajos','Agregar_empleados','Modificar_empleados','Modificar_recompensa','Eliminar_normas','Eliminar_trabajos','Eliminar_recompensa','Eliminar_empleados','Eliminar_procedimientos') NOT NULL,
  `activado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `punto`
--

CREATE TABLE `punto` (
  `id_puntos` bigint(20) NOT NULL,
  `descripcion` text NOT NULL,
  `fk_pro` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_puesto` bigint(20) NOT NULL,
  `permiso` enum('Empleado','Encargado','Administrador','Co-Administrador','Co-encargado') NOT NULL,
  `fk_usuario` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `trabajo`
--

CREATE TABLE `trabajo` (
  `id_trabajo` bigint(20) NOT NULL,
  `trabajo` varchar(500) NOT NULL,
  `archivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `pk_conexion_men` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id_procedimiento` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `punto`
--
ALTER TABLE `punto`
  MODIFY `id_puntos` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `puntuacion`
--
ALTER TABLE `puntuacion`
  MODIFY `id_lugares` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_puesto` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tiempo`
--
ALTER TABLE `tiempo`
  MODIFY `pk_tiempo` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trabajo`
--
ALTER TABLE `trabajo`
  MODIFY `id_trabajo` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_empleado` bigint(20) NOT NULL AUTO_INCREMENT;
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
