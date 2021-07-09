DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisicion_autoriza $$

CREATE PROCEDURE sp_requisicion_autoriza
(IN pidrequisicion int,
IN pidempleado int,
IN pquien varchar(15))
begin
	update requisicion set
		idestatus=11,	-- Autorizado
		fechaautorizacion=fn_fecha_actual(),
		idempleadoautoriza=pidempleado,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idrequisicion=pidrequisicion;
	
	commit;
end$$

DELIMITER ;