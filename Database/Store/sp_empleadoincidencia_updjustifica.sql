DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoincidencia_updjustifica $$

CREATE PROCEDURE sp_empleadoincidencia_updjustifica
(IN pidempleadoincidencia 	int,
IN pnombrearchivojustifica	varchar(100),
IN pcomentariosjustifica	varchar(100),
IN pquien               	varchar(15)) 

begin
	
	update empleadoincidencia set
		nombrearchivojustifica=pnombrearchivojustifica,
		comentariosjustifica=pcomentariosjustifica,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idempleadoincidencia=pidempleadoincidencia;
	
	commit;

end$$

DELIMITER ;

