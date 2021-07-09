DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculotenencia_del $$

CREATE PROCEDURE sp_vehiculotenencia_del(IN pidvehiculotenencia int)  

begin
	
	delete from vehiculotenencia
	where idvehiculotenencia=pidvehiculotenencia;
	
	commit;

end$$

DELIMITER ;

