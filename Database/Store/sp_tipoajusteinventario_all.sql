DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoajusteinventario_all $$

CREATE PROCEDURE sp_tipoajusteinventario_all()  
begin
	select 	idtipoajusteinventario, desctipoajusteinventario, tipomovimiento
	from tipoajusteinventario
	order by idtipoajusteinventario;
end$$

DELIMITER ;
