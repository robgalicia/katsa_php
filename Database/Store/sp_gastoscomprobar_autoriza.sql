DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_autoriza $$

CREATE PROCEDURE sp_gastoscomprobar_autoriza
(IN pidgastoscomprobar int,
IN pidempleado int,
IN pquien varchar(15))
begin
	update gastoscomprobar set
		idestatus=17,	-- Autorizado
		fechaautorizacion=fn_fecha_actual(),
		idempleadoautoriza=pidempleado,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idgastoscomprobar=pidgastoscomprobar;
	
	commit;
end$$

DELIMITER ;