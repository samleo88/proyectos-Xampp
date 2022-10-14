SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS programmer;

USE programmer;

DROP TABLE IF EXISTS actas;

CREATE TABLE `actas` (
  `idActa` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(200) NOT NULL,
  `Archivo` varchar(20000) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `idNumeroAsignacion` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  PRIMARY KEY (`idActa`),
  KEY `idNumeroAsignacion` (`idNumeroAsignacion`),
  KEY `idDocente` (`idDocente`),
  CONSTRAINT `actas_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`) ON UPDATE CASCADE,
  CONSTRAINT `actas_ibfk_2` FOREIGN KEY (`idNumeroAsignacion`) REFERENCES `numeros_asignaciones` (`idNumeroAsignacion`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE IF EXISTS asignaciones;

CREATE TABLE `asignaciones` (
  `idAsignacion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `idTurno` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `Estado` varchar(11) NOT NULL,
  `NumeroAsignacion` int(11) NOT NULL,
  PRIMARY KEY (`idAsignacion`),
  KEY `idDocente` (`idDocente`),
  KEY `idAsignatura` (`idAsignatura`),
  KEY `idGrupo` (`idGrupo`),
  KEY `idTurno` (`idTurno`),
  KEY `idHorario` (`idHorario`),
  CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`),
  CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`),
  CONSTRAINT `asignaciones_ibfk_3` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`),
  CONSTRAINT `asignaciones_ibfk_4` FOREIGN KEY (`idTurno`) REFERENCES `turnos` (`idTurno`),
  CONSTRAINT `asignaciones_ibfk_5` FOREIGN KEY (`idHorario`) REFERENCES `horarios` (`idHorario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO asignaciones VALUES("1","INFORMATICA FORENSE","3","3","1","1","1","1","1");
INSERT INTO asignaciones VALUES("2","CRIPTOGRAFIA","3","5","1","1","1","1","2");
INSERT INTO asignaciones VALUES("3","ETHICAL HACKING","3","6","3","3","14","1","3");



DROP TABLE IF EXISTS asignaturas;

CREATE TABLE `asignaturas` (
  `idAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `NombreAsignatura` varchar(50) NOT NULL,
  `Idcarrera` int(11) NOT NULL,
  `IdGrupo` int(11) NOT NULL,
  `Idcuatrimestre` int(11) NOT NULL,
  PRIMARY KEY (`idAsignatura`),
  KEY `Idcarrera` (`Idcarrera`),
  KEY `IdGrupo` (`IdGrupo`),
  KEY `Idcuatrimestre` (`Idcuatrimestre`),
  CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`Idcarrera`) REFERENCES `carreras` (`idCarrera`),
  CONSTRAINT `asignaturas_ibfk_2` FOREIGN KEY (`IdGrupo`) REFERENCES `grupos` (`idGrupo`),
  CONSTRAINT `asignaturas_ibfk_3` FOREIGN KEY (`Idcuatrimestre`) REFERENCES `cuatrimestres` (`idCuatrimestre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO asignaturas VALUES("3","INFORMATICA FORENCE","2","1","1");
INSERT INTO asignaturas VALUES("5","CRIPTOGRAFIA","2","2","1");
INSERT INTO asignaturas VALUES("6","ETHICAL HACKING","2","3","1");



DROP TABLE IF EXISTS carreras;

CREATE TABLE `carreras` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCarrera` varchar(50) NOT NULL,
  PRIMARY KEY (`idCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO carreras VALUES("2","CIBERSEC");



DROP TABLE IF EXISTS cuatrimestres;

CREATE TABLE `cuatrimestres` (
  `idCuatrimestre` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCuatrimestre` varchar(50) NOT NULL,
  PRIMARY KEY (`idCuatrimestre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO cuatrimestres VALUES("1","2020-1");
INSERT INTO cuatrimestres VALUES("2","2020 -2");



DROP TABLE IF EXISTS docentes;

CREATE TABLE `docentes` (
  `idDocente` int(11) NOT NULL AUTO_INCREMENT,
  `NombresDocente` varchar(50) NOT NULL,
  `ApellidosDocente` varchar(50) NOT NULL,
  `CedulaDocente` varchar(16) NOT NULL,
  `CorreoDocente` varchar(50) NOT NULL,
  `CelularDocente` varchar(8) NOT NULL,
  `TelefonoDocente` varchar(8) NOT NULL,
  `DireccionDocente` varchar(250) NOT NULL,
  `Estado` int(1) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO docentes VALUES("3","OSMAN","FERRER","12345678","OFERRERMA@uninpahu.edu.co","12345678","12345678","CALLE UNINPAHU ","1","images/fotos_perfil/perfil.jpg");



DROP TABLE IF EXISTS entrega_tareas;

CREATE TABLE `entrega_tareas` (
  `idEntregaTareas` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoTareaDocente` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `CodigoEnvioTarea` int(11) NOT NULL,
  `Archivo` varchar(20000) NOT NULL,
  `FechaEntrega` date DEFAULT NULL,
  PRIMARY KEY (`idEntregaTareas`),
  KEY `idEstudiante` (`idEstudiante`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `entrega_tareas_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`),
  CONSTRAINT `entrega_tareas_ibfk_2` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS estudiantes;

CREATE TABLE `estudiantes` (
  `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `CarnetEstudiante` varchar(20) NOT NULL,
  `NombresEstudiante` varchar(50) NOT NULL,
  `ApellidosEstudiante` varchar(50) NOT NULL,
  `CedulaEstudiante` varchar(16) NOT NULL,
  `CorreoEstudiante` varchar(50) NOT NULL,
  `CelularEstudiante` varchar(20) NOT NULL,
  `TelefonoEstudiante` varchar(8) NOT NULL,
  `DireccionEstudiante` varchar(250) NOT NULL,
  `Estado` int(1) NOT NULL,
  `IdGrupo` int(11) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEstudiante`),
  KEY `IdGrupo` (`IdGrupo`),
  CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`IdGrupo`) REFERENCES `grupos` (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO estudiantes VALUES("4","234567","CARLOS JAVIER","TEJERO ROJAS","79697863","CTEJERORO@UNINPAHU.EDU.CO","31187647","4775391","CARRERA SIEMPRE VIVA A LA FELICIDAD","1","1","images/fotos_perfil/carlos.jpg");
INSERT INTO estudiantes VALUES("5","2019044555","SERGIO","GUANEME","1022997542","SGUANEMEMO@UNINPAHU.EDU.CO","32147483","32147483","carrera 102 # 20 -22","1","1","images/fotos_perfil/sergio.jpeg");
INSERT INTO estudiantes VALUES("6","2020190295","SAMIL LEONEL","SANCHEZ ACEVEDO","1019024527","SSANCHEZAC@UNINPAHU.EDU.CO","31876255","435538","CALLE 15 # 23-21","1","3","images/fotos_perfil/perfil.jpg");



DROP TABLE IF EXISTS evaluaciones;

CREATE TABLE `evaluaciones` (
  `idEvaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Unidad` varchar(50) NOT NULL,
  `Tarea` varchar(50) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `Puntaje` int(11) NOT NULL,
  `FechaEvaluacion` date NOT NULL,
  PRIMARY KEY (`idEvaluacion`),
  KEY `idDocente` (`idDocente`),
  KEY `idEstudiante` (`idEstudiante`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`),
  CONSTRAINT `evaluaciones_ibfk_2` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`),
  CONSTRAINT `evaluaciones_ibfk_3` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS grupos;

CREATE TABLE `grupos` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroGrupo` varchar(50) NOT NULL,
  `NombreGrupo` varchar(50) NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO grupos VALUES("1","001","INFORMATICA FORENSE");
INSERT INTO grupos VALUES("2","002","CRIPTOGRAFIA");
INSERT INTO grupos VALUES("3","003","ETHICAL HACKING");



DROP TABLE IF EXISTS horarios;

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreHorario` varchar(50) NOT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO horarios VALUES("1","7:00 - 9:00");
INSERT INTO horarios VALUES("2","9:00 -11:00");
INSERT INTO horarios VALUES("3","11:00-13:00");
INSERT INTO horarios VALUES("4","13:00-15:00");
INSERT INTO horarios VALUES("5","15:00-17:00");
INSERT INTO horarios VALUES("6","17:00-19:00");
INSERT INTO horarios VALUES("7","19:00-21:00");
INSERT INTO horarios VALUES("8","21:00-23:00");
INSERT INTO horarios VALUES("9","8:00-10:00");
INSERT INTO horarios VALUES("10","10:00-12:00");
INSERT INTO horarios VALUES("11","12:00-14:00");
INSERT INTO horarios VALUES("12","14:00-16:00");
INSERT INTO horarios VALUES("13","16:00-18:00");
INSERT INTO horarios VALUES("14","18:00-20:00");
INSERT INTO horarios VALUES("15","20:00-22:00");
INSERT INTO horarios VALUES("16","7:00");
INSERT INTO horarios VALUES("17","8:00");
INSERT INTO horarios VALUES("18","9:00");
INSERT INTO horarios VALUES("19","10:00");
INSERT INTO horarios VALUES("20","11:00");
INSERT INTO horarios VALUES("21","12:00");
INSERT INTO horarios VALUES("22","13:00");
INSERT INTO horarios VALUES("23","14:00");
INSERT INTO horarios VALUES("24","15:00");
INSERT INTO horarios VALUES("25","16:00");
INSERT INTO horarios VALUES("26","17:00");
INSERT INTO horarios VALUES("27","18:00");
INSERT INTO horarios VALUES("28","19:00");
INSERT INTO horarios VALUES("29","20:00");
INSERT INTO horarios VALUES("30","21:00");
INSERT INTO horarios VALUES("31","22:00");



DROP TABLE IF EXISTS inscripciones_asignaturas;

CREATE TABLE `inscripciones_asignaturas` (
  `idInscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `idCarrera` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `fechaInscripcion` date NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idInscripcion`),
  KEY `idCarrera` (`idCarrera`),
  KEY `idAsignatura` (`idAsignatura`),
  KEY `idEstudiante` (`idEstudiante`),
  CONSTRAINT `inscripciones_asignaturas_ibfk_1` FOREIGN KEY (`idCarrera`) REFERENCES `carreras` (`idCarrera`),
  CONSTRAINT `inscripciones_asignaturas_ibfk_2` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`),
  CONSTRAINT `inscripciones_asignaturas_ibfk_3` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO inscripciones_asignaturas VALUES("6","2","3","4","2020-04-02","INSCRITO");
INSERT INTO inscripciones_asignaturas VALUES("7","2","3","5","2020-04-15","INSCRITO");
INSERT INTO inscripciones_asignaturas VALUES("8","2","6","6","2020-05-28","INSCRITO");



DROP TABLE IF EXISTS material_didactico;

CREATE TABLE `material_didactico` (
  `idMaterialDidactico` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(200) NOT NULL,
  `Archivo` varchar(20000) NOT NULL,
  `CodigoMaterial` int(11) NOT NULL,
  `Fecha_subida` date DEFAULT NULL,
  `idNumeroAsignacion` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  PRIMARY KEY (`idMaterialDidactico`),
  KEY `idNumeroAsignacion` (`idNumeroAsignacion`),
  KEY `idDocente` (`idDocente`),
  CONSTRAINT `material_didactico_ibfk_1` FOREIGN KEY (`idNumeroAsignacion`) REFERENCES `numeros_asignaciones` (`idNumeroAsignacion`),
  CONSTRAINT `material_didactico_ibfk_2` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS mensajes;

CREATE TABLE `mensajes` (
  `idMensaje` int(11) NOT NULL AUTO_INCREMENT,
  `Remitente` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `Mensaje` varchar(500) NOT NULL,
  `FechaEnvio` date DEFAULT NULL,
  PRIMARY KEY (`idMensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS niveles;

CREATE TABLE `niveles` (
  `idNivel` int(11) NOT NULL AUTO_INCREMENT,
  `NombreNivel` varchar(50) NOT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO niveles VALUES("1","administrador");
INSERT INTO niveles VALUES("2","usuario");
INSERT INTO niveles VALUES("3","administrador");
INSERT INTO niveles VALUES("4","INACTIVO");



DROP TABLE IF EXISTS numeros_asignaciones;

CREATE TABLE `numeros_asignaciones` (
  `idNumeroAsignacion` int(11) NOT NULL AUTO_INCREMENT,
  `numeroAsignado` int(11) NOT NULL,
  `IdDocente` int(11) NOT NULL,
  PRIMARY KEY (`idNumeroAsignacion`),
  KEY `IdDocente` (`IdDocente`),
  CONSTRAINT `numeros_asignaciones_ibfk_1` FOREIGN KEY (`IdDocente`) REFERENCES `docentes` (`idDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO numeros_asignaciones VALUES("1","1","3");
INSERT INTO numeros_asignaciones VALUES("2","2","3");
INSERT INTO numeros_asignaciones VALUES("3","3","3");



DROP TABLE IF EXISTS plan_estudio;

CREATE TABLE `plan_estudio` (
  `idPlan` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `CantidadAsignaturas` int(11) NOT NULL,
  PRIMARY KEY (`idPlan`),
  KEY `idCarrera` (`idCarrera`),
  CONSTRAINT `plan_estudio_ibfk_1` FOREIGN KEY (`idCarrera`) REFERENCES `carreras` (`idCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO plan_estudio VALUES("1","SEMILLERO CIBERSEGURIDAD","2","11");



DROP TABLE IF EXISTS planificacion_tareas;

CREATE TABLE `planificacion_tareas` (
  `idPlanificacion` int(11) NOT NULL AUTO_INCREMENT,
  `idDocente` int(11) NOT NULL,
  `idNumeroAsignacion` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Unidad` varchar(50) NOT NULL,
  `DescripcionUnidad` varchar(200) NOT NULL,
  `Tarea` varchar(50) NOT NULL,
  `DescripcionTarea` varchar(200) NOT NULL,
  `FechaPublicacion` date NOT NULL,
  `FechaPresentacion` date NOT NULL,
  `CodigoTarea` int(11) NOT NULL,
  PRIMARY KEY (`idPlanificacion`),
  KEY `idDocente` (`idDocente`),
  KEY `idNumeroAsignacion` (`idNumeroAsignacion`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `planificacion_tareas_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`),
  CONSTRAINT `planificacion_tareas_ibfk_2` FOREIGN KEY (`idNumeroAsignacion`) REFERENCES `numeros_asignaciones` (`idNumeroAsignacion`),
  CONSTRAINT `planificacion_tareas_ibfk_3` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO planificacion_tareas VALUES("2","3","1","3","Unidad II","METODOLOGIA DEL DELITO INFORMATICO","REALIAR UNA METODOLOGIA DEL DELITO INFORMATICO","PRESENTAR EN FORMATO APA LA METODOLOGIA DEL DELITO INFORMATICO","2020-03-25","2020-03-17","101");



DROP TABLE IF EXISTS turnos;

CREATE TABLE `turnos` (
  `idTurno` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTurno` varchar(50) NOT NULL,
  PRIMARY KEY (`idTurno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO turnos VALUES("1","MANANA");
INSERT INTO turnos VALUES("2","TARDE");
INSERT INTO turnos VALUES("3","NOCHE");



DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `idUsuario` smallint(6) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(50) NOT NULL,
  `PassUsuario` varchar(150) NOT NULL,
  `NivelUsuario` int(11) NOT NULL,
  `Codigo` int(150) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `NivelUsuario` (`NivelUsuario`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`NivelUsuario`) REFERENCES `niveles` (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO usuarios VALUES("15","CTEJERORO@UNINPAHU.EDU.CO","79697863","3","4","images/fotos_perfil/carlos.jpg");
INSERT INTO usuarios VALUES("16","OFERRERMA@uninpahu.edu.co","12345678","2","3","");
INSERT INTO usuarios VALUES("17","jhon@uninpahu.edu.co","123","1","2019","images/fotos_perfil/john.jpeg");
INSERT INTO usuarios VALUES("18","ADMIN","123","1","1010","images/fotos_perfil/perfil.jpg");
INSERT INTO usuarios VALUES("19","SGUANEMEMO@UNINPAHU.EDU.CO","1022997542","3","5","images/fotos_perfil/sergio.jpeg");
INSERT INTO usuarios VALUES("20","SSANCHEZAC@UNINPAHU.EDU.CO","1019024527","3","6","");



DROP TABLE IF EXISTS years_academicos;

CREATE TABLE `years_academicos` (
  `idYearAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `NombreYear` varchar(50) NOT NULL,
  PRIMARY KEY (`idYearAcademico`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO years_academicos VALUES("2","2020");
INSERT INTO years_academicos VALUES("3","2021");



SET FOREIGN_KEY_CHECKS=1;