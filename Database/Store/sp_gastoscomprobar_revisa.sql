DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_revisa $$

CREATE PROCEDURE sp_gastoscomprobar_revisa
(IN pidgastoscomprobar int,
IN pidempleado int,
IN pquien varchar(15))
begin
	update gastoscomprobar set
		idestatus=16,	-- Revisado
		fecharevision=fn_fecha_actual(),
		idempleadorevisa=pidempleado,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idgastoscomprobar=pidgastoscomprobar;
	
	commit;
end$$

DELIMITER ;
