DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisicion_cancela $$

CREATE PROCEDURE sp_requisicion_cancela
(IN pidrequisicion int,
IN pquien varchar(15))
begin
	update requisicion set
		idestatus=13,	-- Cancelado
		fechacancelacion=fn_fecha_actual(),
		quien=pquien,
		cuando=fn_fecha_actual()
	where idrequisicion=pidrequisicion;
	
	commit;
end$$

DELIMITER ;




