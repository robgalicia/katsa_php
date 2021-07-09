DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoadscripcion_updfirma $$

CREATE PROCEDURE sp_empleadoadscripcion_updfirma
(IN pidempleadoadscripcion	int,
IN pnombrearchivofirmado	varchar(100),
IN pquien               varchar(15),
 OUT last_id INT)  

begin

	update empleadoadscripcion set
		nombrearchivofirmado=pnombrearchivofirmado,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idempleadoadscripcion=pidempleadoadscripcion;
	
	commit;

end$$

DELIMITER ;

