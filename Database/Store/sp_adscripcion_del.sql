DELIMITER $$

DROP PROCEDURE IF EXISTS sp_adscripcion_del $$

CREATE PROCEDURE sp_adscripcion_del(IN pidadscripcion smallint)  
begin
	delete from adscripcion
	where idadscripcion=pidadscripcion;
	
	commit;
end$$

DELIMITER ;
