DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculoincidencia_del $$

CREATE PROCEDURE sp_vehiculoincidencia_del(IN pidvehiculoincidencia int)  

begin
	
	delete from vehiculoincidencia
	where idvehiculoincidencia=pidvehiculoincidencia;
	
	commit;

end$$

DELIMITER ;

