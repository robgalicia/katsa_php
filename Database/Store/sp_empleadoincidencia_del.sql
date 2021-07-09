DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoincidencia_del $$

CREATE PROCEDURE sp_empleadoincidencia_del(IN pidempleadoincidencia int)  

begin
	
	delete from empleadoincidencia
	where idempleadoincidencia=pidempleadoincidencia;
	
	commit;

end$$

DELIMITER ;

