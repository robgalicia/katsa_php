DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisicion_revisa $$

CREATE PROCEDURE sp_requisicion_revisa
(IN pidrequisicion int,
IN pidempleado int,
IN pquien varchar(15))
begin
	update requisicion set
		idestatus=10,	-- Revisado
		fecharevision=fn_fecha_actual(),
		idempleadorevisa=pidempleado,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idrequisicion=pidrequisicion;
	
	commit;
end$$

DELIMITER ;
