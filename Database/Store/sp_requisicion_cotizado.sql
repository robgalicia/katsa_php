DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisicion_cotizado $$

CREATE PROCEDURE sp_requisicion_cotizado
(IN pidrequisicion int,
IN pquien varchar(15))
begin
	update requisicion set
		idestatus=28,	-- Cotizado
		quien=pquien,
		cuando=fn_fecha_actual()
	where idrequisicion=pidrequisicion
    and idestatus=10;   --	REVISADO
	
	commit;
end$$

DELIMITER ;