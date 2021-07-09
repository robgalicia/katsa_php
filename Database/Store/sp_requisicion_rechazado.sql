DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisicion_rechazado $$

CREATE PROCEDURE sp_requisicion_rechazado
(IN pidrequisicion int,
IN pquien varchar(15))
begin
	update requisicion set
		idestatus=12,	-- Rechazado
		fechacancelacion=fn_fecha_actual(),
		quien=pquien,
		cuando=fn_fecha_actual()
	where idrequisicion=pidrequisicion;
	
	commit;
end$$

DELIMITER ;