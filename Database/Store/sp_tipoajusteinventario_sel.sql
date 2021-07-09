DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoajusteinventario_sel $$

CREATE PROCEDURE sp_tipoajusteinventario_sel(IN pidtipoajusteinventario int)

begin
	
    select 	idtipoajusteinventario, desctipoajusteinventario, tipomovimiento
	from tipoajusteinventario
	where idtipoajusteinventario=pidtipoajusteinventario;
	
end$$

DELIMITER ;