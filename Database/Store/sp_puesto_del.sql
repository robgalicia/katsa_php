DELIMITER $$

DROP PROCEDURE IF EXISTS sp_puesto_del $$

CREATE PROCEDURE sp_puesto_del(IN pidpuesto smallint)  
begin
	delete from puesto
	where idpuesto=pidpuesto;
	
	commit;
end$$

DELIMITER ;
