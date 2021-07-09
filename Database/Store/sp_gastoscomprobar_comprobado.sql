DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_comprobado $$

CREATE PROCEDURE sp_gastoscomprobar_comprobado
(IN pidgastoscomprobar int,
IN pquien varchar(15))
begin
	update gastoscomprobar set
		idestatus=21,	-- COMPROBADO
		fechacomprobacion=fn_fecha_actual(),
		quien=pquien,
		cuando=fn_fecha_actual()
	where idgastoscomprobar=pidgastoscomprobar;
	
	commit;
end$$

DELIMITER ;