DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_cancela $$

CREATE PROCEDURE sp_gastoscomprobar_cancela
(IN pidgastoscomprobar int,
IN pquien varchar(15))
begin
	update gastoscomprobar set
		idestatus=19,	-- Cancelado
		fechacancelacion=fn_fecha_actual(),
		quien=pquien,
		cuando=fn_fecha_actual()
	where idgastoscomprobar=pidgastoscomprobar;
	
	commit;
end$$

DELIMITER ;




