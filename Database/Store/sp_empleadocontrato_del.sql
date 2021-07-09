DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadocontrato_del $$

CREATE PROCEDURE sp_empleadocontrato_del(IN pidempleadocontrato int)  

begin
	
	delete from empleadocontrato
	where idempleadocontrato=pidempleadocontrato;
	
	commit;

end$$

DELIMITER ;

