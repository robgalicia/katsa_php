DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculoincidencia_ins $$

CREATE PROCEDURE sp_vehiculoincidencia_ins
(IN pidvehiculo          smallint,
IN pfechaincidencia      datetime,
IN pidtipoincidenciaveh  smallint,
IN pidempleadoregistra   int,
IN pobservaciones        varchar(100),
IN pquien                varchar(15),
 OUT last_id INT)  

begin

	insert into vehiculoincidencia(idvehiculo,fechaincidencia,idtipoincidenciaveh,idempleadoregistra,fecharegistro,observaciones,quien,cuando)
	values(pidvehiculo,pfechaincidencia,pidtipoincidenciaveh,pidempleadoregistra,fn_fecha_actual(),pobservaciones,pquien,fn_fecha_actual());

   	SET last_id = LAST_INSERT_ID();	
	
	commit;
end$$

DELIMITER ;

