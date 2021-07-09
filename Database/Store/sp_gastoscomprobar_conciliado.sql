DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gastoscomprobar_conciliado $$

CREATE PROCEDURE sp_gastoscomprobar_conciliado
(IN pidgastoscomprobar int,
IN pcomentarioscomprobacion varchar(100),
IN pquien varchar(15))
begin
	update gastoscomprobar set
		idestatus=22,	-- CONCILIADO
		comentariosconciliacion=pcomentarios,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idgastoscomprobar=pidgastoscomprobar;
	
	commit;
end$$

DELIMITER ;
