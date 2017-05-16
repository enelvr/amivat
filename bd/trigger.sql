---------------------------------------------------------------
- historial director
---------------------------------------------------------------
DROP TRIGGER IF EXISTS tg_historial_director;
DELIMITER $$

CREATE TRIGGER tg_historial_director 
AFTER UPDATE ON director
FOR EACH ROW
BEGIN
	INSERT INTO historial_director
(director_id, plantel_id, nombre_old, cedula_old, tlf_old, correo_old, fecha_old, nombre_new, cedula_new, tlf_new, correo_new, fecha_new) VALUES (OLD.id, OLD.plantel_id, OLD.nombre, OLD.cedula, OLD.tlf, OLD.correo, OLD.fecha, NEW.nombre, NEW.cedula, NEW.tlf, NEW.correo, NEW.fecha);
END;
$$
DELIMITER ;

---------------------------------------------------------------
- historial plantel
---------------------------------------------------------------
DROP TRIGGER IF EXISTS tg_historial_plantel;
DELIMITER $$
CREATE TRIGGER tg_historial_plantel 
AFTER UPDATE ON plantel
FOR EACH ROW
BEGIN
INSERT INTO historial_plantel
(plantel_id, nombreplantel_old, dea_old, municipio_id_old, parroquia_id_old, localidad_old, direccion_old, codest_old, tlfplantel_old, fecha_old, tipoplantel_id_old, nombreplantel_new, dea_new, municipio_id_new, parroquia_id_new, localidad_new, direccion_new, codest_new, tlfplantel_new, fecha_new, tipoplantel_id_new) VALUES (OLD.id, OLD.nombreplantel, OLD.dea, OLD.municipio_id, OLD.parroquia_id, OLD.localidad, OLD.direccion, OLD.codest, OLD.tlfplantel, OLD.fecha, OLD.tipoplantel_id, NEW.nombreplantel, NEW.dea, NEW.municipio_id, NEW.parroquia_id, NEW.localidad, NEW.direccion, NEW.codest, NEW.tlfplantel, NEW.fecha, NEW.tipoplantel_id);
END;
$$
DELIMITER ;

---------------------------------------------------------------
- historial monitor
---------------------------------------------------------------


DROP TRIGGER IF EXISTS tg_historial_monitor;
DELIMITER $$

CREATE TRIGGER tg_historial_monitor 
AFTER UPDATE ON monitor
FOR EACH ROW
BEGIN
INSERT INTO historial_monitor
(monitor_id, tecnico_id_old, tipomonitor_id_old, serial_old, marca_old, pulgadas_old, ubicacion_id_old, soporte_old, estatus_id_old, fecha_old, tecnico_id_new, tipomonitor_id_new, serial_new, marca_new, pulgadas_new, ubicacion_id_new, soporte_new, estatus_id_new, fecha_new)VALUES(OLD.id, OLD.tecnico_id, OLD.tipomonitor_id, OLD.serial, OLD.marca, OLD.pulgadas, OLD.ubicacion_id, OLD.soporte, OLD.estatus_id, OLD.fecha, NEW.tecnico_id, NEW.tipomonitor_id, NEW.serial, NEW.marca, NEW.pulgadas, NEW.ubicacion_id, NEW.soporte, NEW.estatus_id, NEW.fecha);
END;
$$
DELIMITER ;
---------------------------------------------------------------
- historial impresora
---------------------------------------------------------------


DROP TRIGGER IF EXISTS tg_historial_impresora;
DELIMITER $$

CREATE TRIGGER tg_historial_impresora 
AFTER UPDATE ON impresora
FOR EACH ROW
BEGIN
INSERT INTO historial_impresora
(impresora_id, tecnico_id_old, tipoimpresora_id_old, serial_old, marca_old, modelo_old, ubicacion_id_old, soporte_old, estatus_id_old, fecha_old, tecnico_id_new, tipoimpresora_id_new, serial_new, marca_new, modelo_new, ubicacion_id_new, soporte_new, estatus_id_new, fecha_new)VALUES(OLD.id, OLD.tecnico_id, OLD.tipoimpresora_id, OLD.serial, OLD.marca, OLD.modelo, OLD.ubicacion_id, OLD.soporte, OLD.estatus_id, OLD.fecha, NEW.tecnico_id, NEW.tipoimpresora_id, NEW.serial, NEW.marca, NEW.modelo, NEW.ubicacion_id, NEW.soporte, NEW.estatus_id, NEW.fecha);
END;
$$
DELIMITER ;
---------------------------------------------------------------
- historial equipo
---------------------------------------------------------------

DROP TRIGGER IF EXISTS tg_historial_equipo;
DELIMITER $$

CREATE TRIGGER tg_historial_equipo 
AFTER UPDATE ON equipo
FOR EACH ROW
BEGIN
INSERT INTO historial_equipo
(equipo_id, tecnico_id_old, serial_old, marca_old, sistema_old, disco_old, memoria_old, procesador_old, soporte_old, estatus_id_old, ubicacion_id_old, fecha_old, tecnico_id_new, serial_new, marca_new, sistema_new, disco_new, memoria_new, procesador_new, soporte_new, estatus_id_new, ubicacion_id_new, fecha_new)VALUES(OLD.id, OLD.tecnico_id, OLD.serial, OLD.marca, OLD.sistema, OLD.disco, OLD.memoria, OLD.procesador, OLD.soporte, OLD.estatus_id, OLD.ubicacion_id, OLD.fecha, NEW.tecnico_id, NEW.serial, NEW.marca, NEW.sistema, NEW.disco, NEW.memoria, NEW.procesador, NEW.soporte, NEW.estatus_id, NEW.ubicacion_id, NEW.fecha);
END;
$$
DELIMITER ;


