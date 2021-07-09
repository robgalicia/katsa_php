DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadocontrato_updfirma $$

CREATE PROCEDURE sp_empleadocontrato_updfirma
(IN pidempleadocontrato 	int,
IN pfechafirma				datetime,
IN pnombrearchivofirmado	varchar(100),
IN pquien               	varchar(15)) 

begin
	
	update empleadocontrato set
		fechafirma=pfechafirma,
		nombrearchivofirmado=pnombrearchivofirmado,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idempleadocontrato=pidempleadocontrato;
	
	commit;

end$$

DELIMITER ;

