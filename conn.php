<?php
$servername = "localhost";
$username = "id4nt3";
$password = "pipomuere666";
$dbname = "Ceover";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$mysqli = new mysqli('localhost', 'id4nt3', 'pipomuere666', 'Ceover') or die("No se pudo connectar");
$mysqli->set_charset("utf8");
$result = $mysqli->query("SELECT nombre FROM empresa");
    $cont = $result->num_rows;

    echo $cont;

$agregado="CREATE TABLE `agregado".$cont."` (
  `id_agregado` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `apellido_m` varchar(80) NOT NULL,
  `apellido_p` varchar(80) NOT NULL,
  `domicilio` varchar(200) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL,
  PRIMARY KEY (`id_agregado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$conexion_men="CREATE TABLE `conexion_men".$cont."` (
  `fk_usuario` bigint(11) NOT NULL,
  `Remitente` bigint(20) NOT NULL,
  `tiempo` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `pk_conexion_men` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pk_conexion_men`),
  KEY `fk_usuario` (`fk_usuario`),
  KEY `Remitente` (`Remitente`),
  CONSTRAINT `conexion_men".$cont."_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario".$cont."` (`id_empleado`) ON DELETE CASCADE,
  CONSTRAINT `conexion_men".$cont."_ibfk_3` FOREIGN KEY (`Remitente`) REFERENCES `usuario".$cont."` (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$consejo="CREATE TABLE `consejo".$cont."` (
  `id_consejo` bigint(20) NOT NULL AUTO_INCREMENT,
  `consejo` text NOT NULL,
  `fk_punto` bigint(20) NOT NULL,
  PRIMARY KEY (`id_consejo`),
  KEY `fk_punto` (`fk_punto`),
  CONSTRAINT `consejo".$cont."_ibfk_1` FOREIGN KEY (`fk_punto`) REFERENCES `punto".$cont."` (`id_puntos`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$contt="CREATE TABLE `cont".$cont."` (
  `pk_cont` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_trabajo` bigint(20) NOT NULL,
  `fk_punto` bigint(20) NOT NULL,
  `calificacion` float NOT NULL,
  PRIMARY KEY (`pk_cont`),
  KEY `fk_trabajo` (`fk_trabajo`),
  KEY `fk_punto` (`fk_punto`),
  CONSTRAINT `cont".$cont."_ibfk_1` FOREIGN KEY (`fk_trabajo`) REFERENCES `trabajo".$cont."` (`id_trabajo`),
  CONSTRAINT `cont".$cont."_ibfk_2` FOREIGN KEY (`fk_punto`) REFERENCES `punto".$cont."` (`id_puntos`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$con_norma="CREATE TABLE `con_norma".$cont."` (
  `pk_cone` bigint(20) NOT NULL AUTO_INCREMENT,
  `fk_norma` bigint(20) NOT NULL,
  `fk_normativa` bigint(20) NOT NULL,
  `Estado` enum('Activo','Inactivo','','') NOT NULL,
  PRIMARY KEY (`pk_cone`),
  KEY `fk_trabajo` (`fk_norma`),
  KEY `fk_punto` (`fk_normativa`),
  CONSTRAINT `con_norma".$cont."_ibfk_1` FOREIGN KEY (`fk_norma`) REFERENCES `norma".$cont."` (`id_norma`),
  CONSTRAINT `con_norma".$cont."_ibfk_2` FOREIGN KEY (`fk_normativa`) REFERENCES `normativa".$cont."` (`id_normativa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$departamento="CREATE TABLE `departamento".$cont."` (
  `pk_d_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `Codigo` varchar(10) NOT NULL,
  PRIMARY KEY (`pk_d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$eliminado_b="CREATE TABLE `eliminado_b".$cont."` (
  `id_eliminado` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `apellido_m` varchar(80) NOT NULL,
  `apellido_p` varchar(80) NOT NULL,
  `domicilio` varchar(200) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `fk_dep` int(11) DEFAULT NULL,
  `dia` varchar(20) NOT NULL,
  `hora` varchar(20) NOT NULL,
  PRIMARY KEY (`id_eliminado`),
  KEY `eliminado_b".$cont."_ibfk_1` (`fk_dep`),
  CONSTRAINT `eliminado_b".$cont."_ibfk_1` FOREIGN KEY (`fk_dep`) REFERENCES `departamento".$cont."` (`pk_d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$informe="CREATE TABLE `informe".$cont."` (
  `id_informe` int(11) NOT NULL,
  `informe` text NOT NULL,
  `fk_trabajo` bigint(11) NOT NULL,
  `fk_usuario` bigint(11) NOT NULL,
  PRIMARY KEY (`id_informe`),
  KEY `fk_trabajo` (`fk_trabajo`),
  KEY `fk_usuario` (`fk_usuario`),
  CONSTRAINT `informe".$cont."_ibfk_1` FOREIGN KEY (`fk_trabajo`) REFERENCES `trabajo".$cont."` (`id_trabajo`),
  CONSTRAINT `informe".$cont."_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario".$cont."` (`id_empleado`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$norma="CREATE TABLE `norma".$cont."` (
  `id_norma` bigint(20) NOT NULL AUTO_INCREMENT,
  `norma` text NOT NULL,
  `descripcion` text NOT NULL,
  `Estado` enum('Activo','Inactivo','','') NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`id_norma`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$normativa="CREATE TABLE `normativa".$cont."` (
  `id_normativa` bigint(20) NOT NULL AUTO_INCREMENT,
  `normativa` text NOT NULL,
  `Estado` enum('Activo','Inactivo','','') NOT NULL,
  PRIMARY KEY (`id_normativa`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$permisos_co="CREATE TABLE `permisos_co".$cont."` (
  `pk_perm` bigint(20) NOT NULL AUTO_INCREMENT,
  `PC` enum('Agregar_normas','Agregar_procedimientos','Agregar_trabajos','Agregar_empleados','Modificar_empleados','Modificar_recompensa','Eliminar_normas','Modificar_trabajos','Eliminar_recompensa','Eliminar_empleados','Eliminar_procedimientos') NOT NULL,
  `activado` tinyint(1) NOT NULL,
  PRIMARY KEY (`pk_perm`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$procedimiento="CREATE TABLE `procedimiento".$cont."` (
  `id_procedimiento` bigint(20) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(20) NOT NULL,
  `Nombre` varchar(80) NOT NULL,
  `procedimiento` text NOT NULL,
  `Revision` varchar(20) NOT NULL,
  `fk_norma` bigint(20) NOT NULL,
  `Estado` enum('Activo','Inactivo','','') NOT NULL,
  PRIMARY KEY (`id_procedimiento`),
  KEY `fk_norma` (`fk_norma`),
  CONSTRAINT `procedimiento".$cont."_ibfk_1` FOREIGN KEY (`fk_norma`) REFERENCES `norma".$cont."` (`id_norma`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$punto="CREATE TABLE `punto".$cont."` (
  `id_puntos` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `fk_pro` bigint(11) NOT NULL,
  `Estado` enum('Activo','Inactivo','','') NOT NULL,
  PRIMARY KEY (`id_puntos`),
  KEY `fk_pro` (`fk_pro`),
  CONSTRAINT `punto".$cont."_ibfk_1` FOREIGN KEY (`fk_pro`) REFERENCES `procedimiento".$cont."` (`id_procedimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$puntuacion="CREATE TABLE `puntuacion".$cont."` (
  `id_lugares` bigint(20) NOT NULL AUTO_INCREMENT,
  `recompensa` varchar(200) NOT NULL DEFAULT 'No hay recompensa',
  `fk_usuario` bigint(11) NOT NULL,
  `calificacion` float(4) NOT NULL,
  PRIMARY KEY (`id_lugares`),
  KEY `fk_usuario` (`fk_usuario`),
  CONSTRAINT `puntuacion".$cont."_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario".$cont."` (`id_empleado`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$rol="CREATE TABLE `rol".$cont."` (
  `id_puesto` bigint(20) NOT NULL AUTO_INCREMENT,
  `permiso` enum('Empleado','Encargado','Administrador','Co-Administrador','Co-encargado') NOT NULL,
  `fk_usuario` bigint(20) NOT NULL,
  PRIMARY KEY (`id_puesto`),
  KEY `fk_usuario` (`fk_usuario`),
  CONSTRAINT `rol".$cont."_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario".$cont."` (`id_empleado`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$tiempo="CREATE TABLE `tiempo".$cont."` (
  `pk_tiempo` bigint(20) NOT NULL AUTO_INCREMENT,
  `tiempo_i` varchar(25) NOT NULL,
  `hora_i` varchar(20) NOT NULL,
  `tiempo_f` varchar(25) NOT NULL,
  `hora_f` varchar(20) NOT NULL,
  `fk_trabajo` bigint(20) NOT NULL,
  `fk_usuario` bigint(20) NOT NULL,
  `Estado` enum('Entregado','En Proceso','Con problemas','Tarde','No entregado') NOT NULL,
  `Observaciones` varchar(5000) DEFAULT 'Sin observaciones',
  `DescribeT` varchar(5000) NOT NULL DEFAULT 'Sin descripcion',
  `calificado` varchar(40) DEFAULT 'sin calificar',
  `version` varchar(1000) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`pk_tiempo`),
  KEY `fk_trabajo` (`fk_trabajo`),
  KEY `fk_usuario` (`fk_usuario`),
  CONSTRAINT `tiempo".$cont."_ibfk_1` FOREIGN KEY (`fk_trabajo`) REFERENCES `trabajo".$cont."` (`id_trabajo`),
  CONSTRAINT `tiempo".$cont."_ibfk_2` FOREIGN KEY (`fk_usuario`) REFERENCES `usuario".$cont."` (`id_empleado`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$trabajo="CREATE TABLE `trabajo".$cont."` (
  `id_trabajo` bigint(20) NOT NULL AUTO_INCREMENT,
  `trabajo` varchar(500) NOT NULL,
  `archivo` text NOT NULL,
  PRIMARY KEY (`id_trabajo`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$usuario = "CREATE TABLE `usuario".$cont."` (
  `id_empleado` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) NOT NULL,
  `apellido_m` varchar(80) NOT NULL,
  `apellido_p` varchar(80) NOT NULL,
  `domicilio` varchar(200) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `fk_dep` int(11) NOT NULL,
  `imagen` text NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `fk_dep` (`fk_dep`),
  CONSTRAINT `usuario".$cont."_ibfk_1` FOREIGN KEY (`fk_dep`) REFERENCES `departamento".$cont."` (`pk_d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

$vistas="CREATE TABLE `vistas".$cont."` (
  `pk_vista` int(11) NOT NULL AUTO_INCREMENT,
  `pers` enum('mejores_calificaciones','peores_calificaciones','trabajos_problematicos','empleado_del_mes') NOT NULL,
  `activado` varchar(5) NOT NULL,
  PRIMARY KEY (`pk_vista`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
/////////////////////////////////////////////0 fk
if ($conn->query($agregado) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($departamento) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($norma) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($normativa) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


if ($conn->query($permisos_co) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


if ($conn->query($vistas) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($trabajo) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

/////////////////////////////////////////////1 fk

if ($conn->query($usuario) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($rol) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($procedimiento) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($punto) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($consejo) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}








////////////////////////////////////////////////////// 2 fk


if ($conn->query($puntuacion) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



if ($conn->query($conexion_men) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



if ($conn->query($contt) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



if ($conn->query($eliminado_b) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($informe) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


if ($conn->query($tiempo) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if ($conn->query($con_norma) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}



session_start();
$tipo=$_SESSION['tipo'];
$activado=1; 
$Activo="Activo";
$contra=$_SESSION['pas'];
$usuario=$_SESSION['acor'];
$passw=password_hash($contra, PASSWORD_BCRYPT);
  $sql = "INSERT INTO departamento$cont(nombre) VALUES  ('Administracion')";
        mysqli_query($mysqli,$sql);
  
$numb='Administrador';
  $sql = "INSERT INTO usuario$cont(nombre,correo,pass,fk_dep) VALUES  ('".$numb."','".$usuario."','".$passw."','1')";
        mysqli_query($mysqli,$sql);
        
$sql = "INSERT INTO rol$cont(permiso,fk_usuario) VALUES  ('Administrador','1')";
        mysqli_query($mysqli,$sql);

$vistass1="mejores_calificaciones";
  $sql = "INSERT INTO vistas$cont(pers,activado) VALUES  ('".$vistass1."','".$activado."')";
        mysqli_query($mysqli,$sql);
        
$vistass2="peores_calificaciones";
  $sql = "INSERT INTO vistas$cont(pers,activado) VALUES  ('".$vistass2."','".$activado."')";
        mysqli_query($mysqli,$sql);
$vistass3="trabajos_problematicos";
  $sql = "INSERT INTO vistas$cont(pers,activado) VALUES  ('".$vistass3."','".$activado."')";
        mysqli_query($mysqli,$sql);
$vistass4="empleado_del_mes";
  $sql = "INSERT INTO vistas$cont(pers,activado) VALUES  ('".$vistass4."','".$activado."')";
        mysqli_query($mysqli,$sql);


$permisos_coo1="Agregar_normas";
  $sql = "INSERT INTO permisos_co$cont(PC,activado) VALUES  ('".$permisos_coo1."','".$activado."')";
        mysqli_query($mysqli,$sql);
$permisos_coo2="Agregar_procedimientos";
  $sql = "INSERT INTO permisos_co$cont(PC,activado) VALUES  ('".$permisos_coo2."','".$activado."')";
        mysqli_query($mysqli,$sql);
$permisos_coo3="Agregar_trabajos";
  $sql = "INSERT INTO permisos_co$cont(PC,activado) VALUES  ('".$permisos_coo3."','".$activado."')";
        mysqli_query($mysqli,$sql);
$permisos_coo4="Agregar_empleados";
  $sql = "INSERT INTO permisos_co$cont(PC,activado) VALUES  ('".$permisos_coo4."','".$activado."')";
        mysqli_query($mysqli,$sql);
$permisos_coo5="Modificar_empleados";
  $sql = "INSERT INTO permisos_co$cont(PC,activado) VALUES  ('".$permisos_coo5."','".$activado."')";
        mysqli_query($mysqli,$sql);
$permisos_coo6="Modificar_recompensa";
  $sql = "INSERT INTO permisos_co$cont(PC,activado) VALUES  ('".$permisos_coo6."','".$activado."')";
        mysqli_query($mysqli,$sql);
$permisos_coo7="Eliminar_normas";
  $sql = "INSERT INTO permisos_co$cont(PC,activado) VALUES  ('".$permisos_coo7."','".$activado."')";
        mysqli_query($mysqli,$sql);
$permisos_coo8="Modificar_trabajos";
  $sql = "INSERT INTO permisos_co$cont(PC,activado) VALUES  ('".$permisos_coo8."','".$activado."')";
        mysqli_query($mysqli,$sql);
$permisos_coo9="Eliminar_empleados";
  $sql = "INSERT INTO permisos_co$cont(PC,activado) VALUES  ('".$permisos_coo9."','".$activado."')";
        mysqli_query($mysqli,$sql);
$permisos_coo10="Eliminar_procedimientos";
  $sql = "INSERT INTO permisos_co$cont(PC,activado) VALUES  ('".$permisos_coo10."','".$activado."')";
        mysqli_query($mysqli,$sql);



if($tipo=='Hotelera'){
$normah1="NOM-07-TUR-2002";
  $sql = "INSERT INTO norma$cont(norma,Estado) VALUES  ('".$normah1."','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen1h1="El empleado mantuvo el área en condiciones adecuadas para la preparación de alimentos";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H01-PRO-01','".$procen1h1."','A','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen1h2="El empleado uso el material en condiciones adecuadas para no soltar tanto humo";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H01-PRO-02','".$procen1h2."','A','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen1h3="Mantuvo  un procedimiento documentado sobre el manejo de sus materiales y comportamientos((en el caso de estar en la cocina: utensilios de cocina, alimentos, cantidad de los materiales)(en el caso de ser mesero: contar con el conocimiento de las mesas y las personas que pidieron el platillo, calma para hablar con los clientes))";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H01-PRO-03','".$procen1h3."','A','1','".$Activo."')";
        mysqli_query($mysqli,$sql);


$normah2="NOM-011-TUR-2001";
  $sql = "INSERT INTO norma$cont(norma,Estado) VALUES  ('".$normah2."','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen2h1="Fueron respetuosos con el cliente";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H02-PRO-01','".$procen2h1."','A','2','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen2h2="Cumplieron su deber e informaron correctamente a los clientes";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H02-PRO-02','".$procen2h2."','A','2','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen2h3="Mantuvieron su lugar en todo momento para vigilar la zona";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H02-PRO-03','".$procen2h3."','A','2','".$Activo."')";
        mysqli_query($mysqli,$sql);


$normah3="NOM-09-TUR-2002";
  $sql = "INSERT INTO norma$cont(norma,Estado) VALUES  ('".$normah3."','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen3h1="Tiene el uniforme bien arreglado";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H03-PRO-01','".$procen3h1."','A','3','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen3h2="Cuenta con trípticos de información";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H03-PRO-02','".$procen3h2."','A','3','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen3h3="Cuenta con el conocimiento de todo su departamento";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H03-PRO-03','".$procen3h3."','A','3','".$Activo."')";
        mysqli_query($mysqli,$sql);

$normah4="NOM-06-TUR-2002";
  $sql = "INSERT INTO norma$cont(norma,Estado) VALUES  ('".$normah4."','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen4h1="Cuenta con su material";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H04-PRO-01','".$procen4h1."','A','4','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen4h2="Mantiene en condiciones óptimas su material de seguridad(médicos, salvavidas,seguridad)";
 $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H04-PRO-02','".$procen4h2."','A','4','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen4h3="Conoce y realiza las actividades de las áreas indicadas (dependiendo de su departamento)";
 $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('H04-PRO-03','".$procen4h3."','A','4','".$Activo."')";
        mysqli_query($mysqli,$sql);

$normatividadh="Ho1-Mucama Limpieza: – Verificar que la habitación no tenga ningún daño (muebles quemados, cortinas rotas, vidrios rotos, etc.) – Colgar la ropa del huésped en el closet, ordenar y acomodar revistas o libros, etc. – Sacar la basura del cuarto y del baño al carrito y cambiarle la bolsa plástica al basurero si estuviera sucia. – Desempolvar la habitación y sus muebles. – Tender las camas, en caso de que las sábanas estén muy sucias o en mal estado, cambiarlas. Siguiendo la política del hotel. – Limpiar mesas de noche,escritorio, cuadros, lámparas y teléfono de la habitación. – Limpiar y sacudir el closet  y verificar el número de ganchos. – Barrer y limpiar el piso. – Regar y verificar que las plantas de la habitación se encuentre en buen estado. – Limpiar la puerta exterior y asegurarse de cerrarla perfectamente. – Anotar en su reporte el estado de la habitación (vacío y limpio, ocupado, etc) ";
 $sql = "INSERT INTO normativa$cont(normativa,Estado) VALUES  ('".$normatividadh."','".$Activo."')";
        mysqli_query($mysqli,$sql);
 $sql = "INSERT INTO con_norma$cont(fk_norma,fk_normativa,Estado) VALUES  ('4','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
 $sql = "INSERT INTO con_norma$cont(fk_norma,fk_normativa,Estado) VALUES  ('3','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
 $sql = "INSERT INTO con_norma$cont(fk_norma,fk_normativa,Estado) VALUES  ('2','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
 $sql = "INSERT INTO con_norma$cont(fk_norma,fk_normativa,Estado) VALUES  ('1','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
}

if($tipo=='Gastronomica'){
$normag1="Norma ISO 22000";
  $sql = "INSERT INTO norma$cont(norma,Estado) VALUES  ('".$normag1."','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen1g1="El empleado fue calmado y paciente con los clientes en todo momento";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('G01-PRO-01','".$procen1g1."','A','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen1g2="El empleado acato en todo momento con las órdenes de su superior y las realizo correctamente";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('G01-PRO-02','".$procen1g2."','A','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen1g3="Mantuvo  un procedimiento documentado sobre el manejo de sus materiales y comportamientos((en el caso de estar en la cocina: utensilios de cocina, alimentos, cantidad de los materiales)(en el caso de ser mesero: contar con el conocimiento de las mesas y las personas que pidieron el platillo, calma para hablar con los clientes))";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('G01-PRO-03','".$procen1g3."','A','1','".$Activo."')";
        mysqli_query($mysqli,$sql);


$normag2="NOM-093-SSA1-1994";
  $sql = "INSERT INTO norma$cont(norma,Estado) VALUES  ('".$normag2."','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen2g1="Realizó revisión de gestión para evaluar el rendimiento del Sistema de Gestión de la Inocuidad Alimentaria.";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('G02-PRO-01','".$procen2g1."','A','2','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen2g2="Se llevó un control continuamente el Sistema de Gestión de la Inocuidad Alimentaria.";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('G02-PRO-02','".$procen2g2."','A','2','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen2g3="Uso Correcto del material Uso guantes uso redecilla Realizó su rol de acuerdo a las especificaciones de seguridad(lavarse las manos, contar con su material,mantener su blusa/camisa/mangas siempre abrochados)";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('G02-PRO-03','".$procen2g3."','A','2','".$Activo."')";
        mysqli_query($mysqli,$sql);


$normag3="NOM-016-STPS-1993";
  $sql = "INSERT INTO norma$cont(norma,Estado) VALUES  ('".$normag3."','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen3g1="El empleado cumple con su tarea respectiva (limpiar los materiales, mantener los instrumentos de cocina desinfectados, cocinar correctamente, llevar con seguridad el platillo a los clientes)";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('G03-PRO-01','".$procen3g1."','A','3','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen3g2="El empleado mantiene su uniforme correcto en todo momento (mantener su placa de identificación, blusa/camisa abrochada, manos desinfectadas)";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('G03-PRO-02','".$procen3g2."','A','3','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen3g3="El empleado se comportó correctamente con los clientes y/o su encargado";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('G03-PRO-03','".$procen3g3."','A','3','".$Activo."')";
        mysqli_query($mysqli,$sql);
$procen3g4="Se llevó correctamente los platillos a los clientes";
  $sql = "INSERT INTO procedimiento$cont(Codigo,procedimiento,Revision,fk_norma,Estado) VALUES  ('G03-PRO-04','".$procen3g4."','A','3','".$Activo."')";
        mysqli_query($mysqli,$sql);
        
        
$normatividadg="Ga1-Mesero: -Atención al comensal. -Tomar orden del comensal. -Constantemente presentarse a la mesa para saber si el cliente necesita algo. -Llevar los platillos a la mesa -Ser cordial. ";

 $sql = "INSERT INTO normativa$cont(normativa,Estado) VALUES  ('".$normatividadg."','".$Activo."')";
        mysqli_query($mysqli,$sql);
 $sql = "INSERT INTO con_norma$cont(fk_norma,fk_normativa,Estado) VALUES  ('3','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
 $sql = "INSERT INTO con_norma$cont(fk_norma,fk_normativa,Estado) VALUES  ('2','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
 $sql = "INSERT INTO con_norma$cont(fk_norma,fk_normativa,Estado) VALUES  ('1','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
    
}


$puntoo1="Calidad de trabajo";
 $sql = "INSERT INTO punto$cont(descripcion,fk_pro,Estado) VALUES  ('".$puntoo1."','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
$consej1="Establece un proceso de mejora continua";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej1."','1')";
        mysqli_query($mysqli,$sql);
$consej2="Sigue mejorando, aunque fracases y aprende de tus errores.";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej2."','1')";
        mysqli_query($mysqli,$sql);


$puntoo2="Disposición del empleado al realizarlo";
 $sql = "INSERT INTO punto$cont(descripcion,fk_pro,Estado) VALUES  ('".$puntoo2."','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
$consej3="Tu vida puede ser un desorden, pero con tiempo y paciencia y una lista, puedes tener más tiempo para realizar las cosas.";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej3."','2')";
        mysqli_query($mysqli,$sql);
$consej4="No te frustres si tu trabajo no te sale, o está cerca el tiempo límite, toma pequeños descansos de 8 minutos, esto te ayudará a pensar con más claridad.";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej4."','2')";
        mysqli_query($mysqli,$sql);


$puntoo3="Eficiencia del resultado";
 $sql = "INSERT INTO punto$cont(descripcion,fk_pro,Estado) VALUES  ('".$puntoo3."','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
$consej5=" Es recomendable hacer un listado de tareas pendientes";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej5."','3')";
        mysqli_query($mysqli,$sql);
$consej6="Dedica más tiempo a tus tareas, esto mejorará tu eficiencia en ellos";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej6."','3')";
        mysqli_query($mysqli,$sql);


$puntoo4="Cooperación entre compañeros";
 $sql = "INSERT INTO punto$cont(descripcion,fk_pro,Estado) VALUES  ('".$puntoo4."','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
$consej7="Comunícate con mayor eficiencia con tu equipo";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej7."','4')";
        mysqli_query($mysqli,$sql);
$consej8="Empieza a trabajar en equipo, trabajen juntos para resolver cada problema de su deber.";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej8."','4')";
        mysqli_query($mysqli,$sql);


$puntoo5="Cumplimiento de reglas normas o estándares definidos";
 $sql = "INSERT INTO punto$cont(descripcion,fk_pro,Estado) VALUES  ('".$puntoo5."','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
$consej9="De la teoría a la práctica. No solo lo leas eh ignores, si no llévalo a la práctica.";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej9."','5')";
        mysqli_query($mysqli,$sql);
$consej10="Obedece las reglas en todo momento";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej10."','5')";
        mysqli_query($mysqli,$sql);

$puntoo6="Resultados en tiempo adecuado";
 $sql = "INSERT INTO punto$cont(descripcion,fk_pro,Estado) VALUES  ('".$puntoo6."','1','".$Activo."')";
        mysqli_query($mysqli,$sql);
$consej11="Intenta Organizarte más, elegir tiempos para hacer una cosa a la vez.";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej11."','6')";
        mysqli_query($mysqli,$sql);
$consej12="Has un vistazo rápido a todo el trabajo que tienes que hacer, y empieza con lo más fácil de poco en poco,  esto para que siempre haya un avance";
 $sql = "INSERT INTO consejo$cont(consejo,fk_punto) VALUES  ('".$consej12."','6')";
        mysqli_query($mysqli,$sql);
        
  $carpeta = 'imagenestra/empresa/'.$cont;
  echo $carpeta;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
  $carpeta = 'imagenestra/empresa/'.$cont.'/Usuario';
  echo $carpeta;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}
  $carpeta = 'imagenestra/empresa/'.$cont.'/diagramas';
  echo $carpeta;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

  $carpeta = 'imagenestra/empresa/'.$cont.'/norma';
  echo $carpeta;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

 $carpeta = 'imagenestra/empresa/'.$cont.'/backup';
  echo $carpeta;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

  $carpeta = 'imagenestra/empresa/'.$cont.'/norma/FILES';
  echo $carpeta;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

  $carpeta = 'imagenestra/empresa/'.$cont.'/Usuario/1';
  echo $carpeta;
if (!file_exists($carpeta)) {
    mkdir($carpeta, 0777, true);
}

        
$conn->close();

header('location: home.html');
?>