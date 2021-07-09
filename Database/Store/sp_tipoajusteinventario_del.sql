DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoajusteinventario_del $$

CREATE PROCEDURE sp_tipoajusteinventario_del(IN pidtipoajusteinventario int)

begin
	delete from tipoajusteinventario
	where idtipoajusteinventario=pidtipoajusteinventario;
	
	commit;
end$$

DELIMITER ;