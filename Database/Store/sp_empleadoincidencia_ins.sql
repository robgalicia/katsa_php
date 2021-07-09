DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoincidencia_ins $$

CREATE PROCEDURE sp_empleadoincidencia_ins
(IN pidempleado    		int,
IN pidtipoincidenciaemp smallint,
IN pfechaincidencia     datetime,
IN pidempleadoregistra  int,
IN pobservaciones       varchar(100),
IN pquien               varchar(15),
 OUT last_id INT)  


begin

	insert into empleadoincidencia(idempleado,idtipoincidenciaemp,fechaincidencia,idempleadoregistra,fecharegistro,observaciones,quien,cuando)
	values(pidempleado,pidtipoincidenciaemp,pfechaincidencia,pidempleadoregistra,fn_fecha_actual(),pobservaciones,pquien,fn_fecha_actual());

   	SET last_id = LAST_INSERT_ID();	
	
	commit;
end$$

DELIMITER ;

