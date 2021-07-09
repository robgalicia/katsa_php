DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_rechazado $$

CREATE PROCEDURE sp_gastoscomprobar_rechazado
(IN pidgastoscomprobar int,
IN pquien varchar(15))
begin
	update gastoscomprobar set
		idestatus=18,	-- Rechazado
		fechacancelacion=fn_fecha_actual(),
		quien=pquien,
		cuando=fn_fecha_actual()
	where idgastoscomprobar=pidgastoscomprobar;
	
	commit;
end$$

DELIMITER ;