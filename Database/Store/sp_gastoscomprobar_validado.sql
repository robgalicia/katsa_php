DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_validado $$

CREATE PROCEDURE sp_gastoscomprobar_validado
(IN pidgastoscomprobar int,
IN pidempleado int,
IN pquien varchar(15))
begin
	update gastoscomprobar set
		idestatus=26,	-- VALIDADO
        fechavalidacion=fn_fecha_actual(),
        idempleadovalidacion=pidempleado,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idgastoscomprobar=pidgastoscomprobar;
	
	commit;
end$$

DELIMITER ;