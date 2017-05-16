CREATE TABLE `tipousuario` (
  `id` int(11) NOT NULL auto_increment,
  `descripcion` varchar(100) NOT NULL,
 PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(15) NOT NULL,
   `clave` varchar(11) NOT NULL,
   `tipo_usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `parroquia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `municipio_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`),
  KEY `fk_parroquia_municipio_idx` (`municipio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
ALTER TABLE `parroquia`
  ADD CONSTRAINT `fk_parroquia_municipio` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;



CREATE TABLE IF NOT EXISTS `tipoplantel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `plantel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreplantel` varchar(145) NOT NULL,
  `dea` varchar(10) NOT NULL,
  `municipio_id` int(11) NOT NULL,
  `parroquia_id` int(11) NOT NULL,
  `localidad` varchar(145) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `codest` varchar(145) NOT NULL,
  `tlfplantel` varchar(20) NOT NULL,
   `fecha` date NOT NULL,
   `tipoplantel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_plantel_municipio1_idx` (`municipio_id`),
  KEY `fk_plantel_parroquia1_idx` (`parroquia_id`),
  KEY `fk_plantel_tipoplantel1_idx` (`tipoplantel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `plantel`
  ADD CONSTRAINT `fk_plantel_municipio1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plantel_parroquia1` FOREIGN KEY (`parroquia_id`) REFERENCES `parroquia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plantel_tipoplantel1` FOREIGN KEY (`tipoplantel_id`) REFERENCES `tipoplantel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


CREATE TABLE IF NOT EXISTS `historial_plantel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plantel_id` int(11) NOT NULL,
  `nombreplantel_old` varchar(145) NOT NULL,
  `dea_old` varchar(10) NOT NULL,
  `municipio_id_old` int(11) NOT NULL,
  `parroquia_id_old` int(11) NOT NULL,
  `localidad_old` varchar(145) NOT NULL,
  `direccion_old` varchar(50) NOT NULL,
  `codest_old` varchar(145) NOT NULL,
  `tlfplantel_old` varchar(20) NOT NULL,
   `fecha_old` date NOT NULL,
   `tipoplantel_id_old` int(11) NOT NULL,
    `nombreplantel_new` varchar(145) NOT NULL,
  `dea_new` varchar(10) NOT NULL,
  `municipio_id_new` int(11) NOT NULL,
  `parroquia_id_new` int(11) NOT NULL,
  `localidad_new` varchar(145) NOT NULL,
  `direccion_new` varchar(50) NOT NULL,
  `codest_new` varchar(145) NOT NULL,
  `tlfplantel_new` varchar(20) NOT NULL,
   `fecha_new` date NOT NULL,
   `tipoplantel_id_new` int(11) NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `director` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plantel_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `tlf` varchar(11) NOT NULL,
  `correo` varchar(145) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `plantel_id` (`plantel_id`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `tlf` (`tlf`),
  KEY `fk_director_plantel1_idx` (`plantel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
ALTER TABLE `director`
  ADD CONSTRAINT `director_plantel1` FOREIGN KEY (`plantel_id`) REFERENCES `plantel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


CREATE TABLE IF NOT EXISTS `laboratorio`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`plantel_id` int(11) NOT NULL,
`equipon` varchar(10) NOT NULL,
`equipoope` varchar(10) NOT NULL,
`equipoino` varchar(10) NOT NULL,
`internet` varchar(10) NOT NULL,
`mesasexistente` varchar(10) NOT NULL,
`mesasbuena` varchar(10) NOT NULL,
`mesasmala` varchar(10) NOT NULL,
`mesasnec` varchar(10) NOT NULL,
`nsillas` varchar(10) NOT NULL,
`sillasbuen` varchar(10) NOT NULL,
`sillasmalas` varchar(10) NOT NULL,
`sillasnecesarias` varchar(10) NOT NULL,
`electricidadbuena` varchar(10) NOT NULL,
`electricidadrep` varchar(10) NOT NULL,
`airesbuenos` varchar(10) NOT NULL,
`airesrep` varchar(10) NOT NULL,
`iluminacionbuena` varchar(10) NOT NULL,
`iluminacionrep` varchar(10) NOT NULL, 
`filtraciones` varchar(10) NOT NULL,
`fecha` date NOT NULL,
PRIMARY KEY (`id`),
 KEY `fk_laboratorio_plantel1_idx` (`plantel_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `laboratorio`
  ADD CONSTRAINT `fk_laboratorio_plantel1` FOREIGN KEY (`plantel_id`) REFERENCES `plantel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;



CREATE TABLE IF NOT EXISTS `tipo_contrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `descripcion_UNIQUE` (`descripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `tecnico`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ncargo` varchar(100) NOT NULL,
  `fcargo` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `tipo_contrato_id` int(11) NOT NULL,
  `cobra` varchar(100) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tecnico_tipo_contrato1_idx` (`tipo_contrato_id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



 CREATE TABLE IF NOT EXISTS `requipo`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estatus_id` int(11) NOT NULL,
   `tipoplantel_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_requipo_estatus_idx` (`estatus_id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



 CREATE TABLE IF NOT EXISTS `rmonitor`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estatus_id` int(11) NOT NULL,
    `tipoplantel_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rmonitor_estatus_idx` (`estatus_id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


 CREATE TABLE IF NOT EXISTS `rimpresora`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estatus_id` int(11) NOT NULL,
     `tipoplantel_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rimpresora_estatus_idx` (`estatus_id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `vplantel`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoplantel_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `tipomonitor`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `ubicacion`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;




CREATE TABLE IF NOT EXISTS `tipoimpresora`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `estatus`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
   ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;



CREATE TABLE IF NOT EXISTS `equipo`(
 `id` int(11) NOT NULL AUTO_INCREMENT,
`plantel_id` int(11) NOT NULL,
`tecnico_id` int(11) NOT NULL,
`serial` varchar(150) NOT NULL,
`marca` varchar(50) NOT NULL,
`sistema` varchar(30) NOT NULL,
`disco` varchar(10) NOT NULL,
`memoria` varchar(10) NOT NULL,
`procesador` varchar(10) NOT NULL,
`soporte` varchar(500) NOT NULL,
`estatus_id` int(11) NOT NULL,
`ubicacion_id` int(11) NOT NULL,
 `fecha` date NOT NULL,
PRIMARY KEY (`id`),
 KEY `fk_equipo_plantel1_idx` (`plantel_id`),
 KEY `fk_equipo_tecnico1_idx` (`tecnico_id`),
 KEY `fk_equipo_estatus1_idx` (`estatus_id`),
 KEY `fk_equipo_ubicacion1_idx` (`ubicacion_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 
 ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_plantel1` FOREIGN KEY (`plantel_id`) REFERENCES `plantel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `equipo_tecnico1` FOREIGN KEY (`tecnico_id`) REFERENCES `tecnico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `equipo_estatus1` FOREIGN KEY (`estatus_id`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `equipo_ubicacion1` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;



 CREATE TABLE IF NOT EXISTS `impresora`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`plantel_id` int(11) NOT NULL,
`tecnico_id` int(11) NOT NULL,
`tipoimpresora_id` int(11) NOT NULL,
`serial` varchar(50) NOT NULL,
`marca` varchar(50) NOT NULL,
`modelo` varchar(30) NOT NULL,
`ubicacion_id` int(11) NOT NULL,
`soporte` varchar(500) NOT NULL,
`estatus_id` int(11) NOT NULL,
 `fecha` date NOT NULL,
PRIMARY KEY (`id`),
 KEY `fk_impresora_plantel1_idx` (`plantel_id`),
 KEY `fk_impresora_tecnico1_idx` (`tecnico_id`),
 KEY `fk_impresora_tipoimpresora1_idx` (`tipoimpresora_id`),
 KEY `fk_impresora_ubicacion1_idx` (`ubicacion_id`),
 KEY `fk_impresora_estatus1_idx` (`estatus_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 
 ALTER TABLE `impresora`
  ADD CONSTRAINT `impresora_plantel1` FOREIGN KEY (`plantel_id`) REFERENCES `plantel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `impresora_tecnico1` FOREIGN KEY (`tecnico_id`) REFERENCES `tecnico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `impresora_tipoimpresora1` FOREIGN KEY (`tipoimpresora_id`) REFERENCES `tipoimpresora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `impresora_ubicacion1` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `impresora_estatus1` FOREIGN KEY (`estatus_id`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


CREATE TABLE IF NOT EXISTS `monitor`(
 `id` int(11) NOT NULL AUTO_INCREMENT,
`plantel_id` int(11) NOT NULL,
`tecnico_id` int(11) NOT NULL,
`tipomonitor_id` int(11) NOT NULL,
`serial` varchar(150) NOT NULL,
`marca` varchar(50) NOT NULL,
`pulgadas` varchar(30) NOT NULL,
`ubicacion_id` int(11) NOT NULL,
`soporte` varchar(500) NOT NULL,
`estatus_id` int(11) NOT NULL,
 `fecha` date NOT NULL,
PRIMARY KEY (`id`),
 KEY `fk_monitor_plantel1_idx` (`plantel_id`),
 KEY `fk_monitor_tecnico1_idx` (`tecnico_id`),
 KEY `fk_monitor_tipomonitor1_idx` (`tipomonitor_id`),
 KEY `fk_monitor_ubicacion1_idx` (`ubicacion_id`),
 KEY `fk_monitor_estatus1_idx` (`estatus_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
 
 ALTER TABLE `monitor`
  ADD CONSTRAINT `monitor_plantel1` FOREIGN KEY (`plantel_id`) REFERENCES `plantel` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `monitor_tecnico1` FOREIGN KEY (`tecnico_id`) REFERENCES `tecnico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `monitor_tipomonitor1` FOREIGN KEY (`tipomonitor_id`) REFERENCES `tipomonitor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `monitor_ubicacion1` FOREIGN KEY (`ubicacion_id`) REFERENCES `ubicacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `monitor_estatus1` FOREIGN KEY (`estatus_id`) REFERENCES `estatus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;



  CREATE TABLE IF NOT EXISTS `historial_director` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `director_id` int(11) NOT NULL,
  `plantel_id` int(11) NOT NULL,
  `nombre_old` varchar(100) NOT NULL,
  `cedula_old` varchar(11) NOT NULL,
  `tlf_old` varchar(11) NOT NULL,
  `correo_old` varchar(145) NOT NULL,
  `fecha_old` date NOT NULL,
  `nombre_new` varchar(100) NOT NULL,
  `cedula_new` varchar(11) NOT NULL,
  `tlf_new` varchar(11) NOT NULL,
  `correo_new` varchar(145) NOT NULL,
  `fecha_new` date NOT NULL,
  PRIMARY KEY (`id`));



CREATE TABLE IF NOT EXISTS `historial_impresora`(
 `id` int(11) NOT NULL AUTO_INCREMENT,
`impresora_id` int(11) NOT NULL,
`tecnico_id_old` int(11) NOT NULL,
`tipoimpresora_id_old` int(11) NOT NULL,
`serial_old` varchar(150) NOT NULL,
`marca_old` varchar(50) NOT NULL,
`modelo_old` varchar(30) NOT NULL,
`ubicacion_id_old` int(11) NOT NULL,
`soporte_old` varchar(500) NOT NULL,
`estatus_id_old` int(11) NOT NULL,
 `fecha_old` date NOT NULL,
`tecnico_id_new` int(11) NOT NULL,
`tipoimpresora_id_new` int(11) NOT NULL,
`serial_new` varchar(150) NOT NULL,
`marca_new` varchar(50) NOT NULL,
`modelo_new` varchar(30) NOT NULL,
`ubicacion_id_new` int(11) NOT NULL,
`soporte_new` varchar(500) NOT NULL,
`estatus_id_new` int(11) NOT NULL,
 `fecha_new` date NOT NULL,
PRIMARY KEY (`id`));




CREATE TABLE IF NOT EXISTS `historial_monitor`(
 `id` int(11) NOT NULL AUTO_INCREMENT,
`monitor_id` int(11) NOT NULL,
`tecnico_id_old` int(11) NOT NULL,
`tipomonitor_id_old` int(11) NOT NULL,
`serial_old` varchar(150) NOT NULL,
`marca_old` varchar(50) NOT NULL,
`pulgadas_old` varchar(30) NOT NULL,
`ubicacion_id_old` int(11) NOT NULL,
`soporte_old` varchar(500) NOT NULL,
`estatus_id_old` int(11) NOT NULL,
 `fecha_old` date NOT NULL,
`tecnico_id_new` int(11) NOT NULL,
`tipomonitor_id_new` int(11) NOT NULL,
`serial_new` varchar(150) NOT NULL,
`marca_new` varchar(50) NOT NULL,
`pulgadas_new` varchar(30) NOT NULL,
`ubicacion_id_new` int(11) NOT NULL,
`soporte_new` varchar(500) NOT NULL,
`estatus_id_new` int(11) NOT NULL,
 `fecha_new` date NOT NULL,
PRIMARY KEY (`id`));



CREATE TABLE IF NOT EXISTS `historial_equipo`(
 `id` int(11) NOT NULL AUTO_INCREMENT,
`equipo_id` int(11) NOT NULL,
`tecnico_id_old` int(11) NOT NULL,
`serial_old` varchar(150) NOT NULL,
`marca_old` varchar(50) NOT NULL,
`sistema_old` varchar(30) NOT NULL,
`disco_old` varchar(10) NOT NULL,
`memoria_old` varchar(10) NOT NULL,
`procesador_old` varchar(10) NOT NULL,
`soporte_old` varchar(500) NOT NULL,
`estatus_id_old` int(11) NOT NULL,
`ubicacion_id_old` int(11) NOT NULL,
 `fecha_old` date NOT NULL,
`tecnico_id_new` int(11) NOT NULL,
`serial_new` varchar(150) NOT NULL,
`marca_new` varchar(50) NOT NULL,
`sistema_new` varchar(30) NOT NULL,
`disco_new` varchar(10) NOT NULL,
`memoria_new` varchar(10) NOT NULL,
`procesador_new` varchar(10) NOT NULL,
`soporte_new` varchar(500) NOT NULL,
`estatus_id_new` int(11) NOT NULL,
`ubicacion_id_new` int(11) NOT NULL,
 `fecha_new` date NOT NULL,
PRIMARY KEY (`id`));


INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(1, 'Z.E.M.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(2, 'C.E.A.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(3, 'C.C.B');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(4, 'C.C.P.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(5, 'C.D.I.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(6, 'C.D.O.F.S.D.F.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(7, 'C.E.N.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(8, 'C.E.I.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(9, 'C.E.I.N.B.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(10, 'C.E.F.O.I.N');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(11, 'C.P/C.P.E.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(12, 'C.T.N.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(13, 'E.B.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(14, 'E.B.B.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(15, 'E.B.C.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(16, 'E.B.I.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(17, 'E.B.U.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(18, 'E.I.N.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(19, 'E.T.A.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(20, 'E.T.A.R.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(21, 'E.T.I.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(22, 'I.E.E.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(23, 'I.E.E.B.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(24, 'J.I.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(25, 'J.I.B.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(26, 'L.B.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(27, 'N.E.R.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(28, 'T.E.L.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(29, 'U.E.B.B.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(30, 'U.E.E.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(31, 'U.E.C.P.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(32, 'U.N.E.F.I.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(33, 'U.E.F.I.R.');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(34, 'U.E.I.R');
INSERT INTO `tipoplantel` (`id`, `descripcion`) VALUES
(35, 'U.E.');

INSERT INTO `ubicacion` (`id`, `descripcion`) VALUES
(1, 'LABORATORIO');

INSERT INTO `ubicacion` (`id`, `descripcion`) VALUES
(2, 'OFICINAS');


INSERT INTO `tipoimpresora` (`id`, `descripcion`) VALUES
(1, 'CARTUCHO');
INSERT INTO `tipoimpresora` (`id`, `descripcion`) VALUES
(2, 'LASER');


INSERT INTO `tipomonitor` (`id`, `descripcion`) VALUES
(1, 'CRT');
INSERT INTO `tipomonitor` (`id`, `descripcion`) VALUES
(2, 'LCD');
INSERT INTO `tipomonitor` (`id`, `descripcion`) VALUES
(3, 'LED');
INSERT INTO `tipomonitor` (`id`, `descripcion`) VALUES
(4, 'DLP');


INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(1, 'MATURIN');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(2, 'ACOSTA');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(3, 'AGUASAY');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(4, 'BOLIVAR');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(5, 'CARIPE');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(6, 'CEDEÑO');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(7, 'EZEQUIEL ZAMORA');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(8, 'LIBERTADOR');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(9, 'PIAR');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(10, 'PUNCERES');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(11, 'SANTA BARBARA');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(12, 'SOTILLO');
INSERT INTO `municipio` (`id`, `descripcion`) VALUES
(13, 'URACOA');


INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(1, 'LOS GODOS', 1);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(2, 'BOQUERON', 1);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(3, 'EL COROZO', 1);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(4, 'EL FURRIAL', 1);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(5, 'JUSEPIN', 1);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(6, 'LA PICA', 1);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(7, 'LAS COCUIZAS', 1);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(8, 'SAN SIMON', 1);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(9, 'SANTA CRUZ', 1);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(10, 'SAN VICENTE', 1);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(11, 'SAN ANTONIO', 2);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(12, 'SAN FRANCISCO', 2);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(13, 'AGUASAY', 3);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(14, 'CARIPITO', 4);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(15, 'CARIPE', 5);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(16, 'EL GUACHARO', 5);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(17, 'LA GUANOTA', 5);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(18, 'SABANA DE PIEDRA', 5);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(19, 'SAN AGUSTIN', 5);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(20, 'TERESEN', 5);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(21, 'CAICARA', 6);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(22, 'AREO', 6);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(23, 'SAN FELIX', 6);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(24, 'VIENTO FRESCO', 6);

INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(25, 'PUNTA DE MATA', 7);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(26, 'EL TEJERO', 7);

INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(27, 'TEMBLADOR', 8);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(28, 'CHAGUARAMAS', 8);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(29, 'LAS ALHUACAS', 8);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(30, 'TABASCA', 8);


INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(31, 'ARAGUA', 9);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(32, 'APARICIO', 9);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(33, 'CHAGUARAMAL', 9);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(34, 'EL PINTO', 9);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(35, 'GUANAGUANA', 9);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(36, 'LA TOSCANA', 9);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(37, 'TAGUAYA', 9);

INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(38, 'QUIRIQUIRE', 10);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(39, 'CACHIPO', 10);

INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(40, 'SANTA BARBARA', 11);

INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(41, 'BARRANCAS', 12);
INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(42, 'BARRANCOS DE FAJARDO', 12);

INSERT INTO `parroquia` (`id`, `descripcion`, `municipio_id`) VALUES
(43, 'URACOA', 13);




INSERT INTO `estatus` (`id`, `descripcion`) VALUES
(1, 'OPERATIVO');

INSERT INTO `estatus` (`id`, `descripcion`) VALUES
(2, 'INOPERATIVO');

INSERT INTO `plantel` VALUES ('1', 'DIVISION DE ACADEMICA', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');

INSERT INTO `plantel` VALUES ('2', 'DIVISION DE ADMINISTRACION', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');

INSERT INTO `plantel` VALUES ('3', 'DIVISION DE ASESORIA LEGAL', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');

INSERT INTO `plantel` VALUES ('4', 'DIVISION DE CULTURA', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');

INSERT INTO `plantel` VALUES ('5', 'DIVISION DE REGISTRO CONTROL Y EVALUACION DE ESTUDIOS', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');

INSERT INTO `plantel` VALUES ('6', 'DIVISION DE DEPORTE', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');

INSERT INTO `plantel` VALUES ('7', 'DIVISION DE PROTECCION Y DESARROLLO ESTUDIANTIL', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');

INSERT INTO `plantel` VALUES ('8', 'DESPACHO ZONAL', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');

INSERT INTO `plantel` VALUES ('9', 'DIVISION DE INFORMATICA Y SISTEMA', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');

INSERT INTO `plantel` VALUES ('10', 'DIVISION DE PLANIFICACION Y PRESUPUESTO', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');

INSERT INTO `plantel` VALUES ('11', 'DIVISION DE PERSONAL', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');

INSERT INTO `plantel` VALUES ('12', 'DIVISION DE SUPERVISION', 'SIN CODIGO', '1', '8', 'MATURIN', 'ZONA EDUCATIVA', 'SIN CODIGO', 'SIN TELEFONO', '2014-01-27', '1');




INSERT INTO `tipo_contrato` VALUES ('1', 'CONTRATADO');
INSERT INTO `tipo_contrato` VALUES ('2', 'FIJO');

INSERT INTO `tecnico` VALUES ('1', '17486845', 'ELIOMAR J. ORDAZ M.', 'LCDO. INFORMATICA', 'JEFE DIV. INFORMATICA Y SISTEMAS', 'LCDO. INFORMATICA', '1', 'ZONA EDUCATIVA MONAGAS', '04262921364', 'ELIOMARORDAZUBV@HOTMAIL.COM');

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `tipo_usuario_id`) VALUES
(1, 'admin', 'admin', 1);



