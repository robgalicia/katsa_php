DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tarjetacombustible_del $$

CREATE PROCEDURE sp_tarjetacombustible_del(IN pidtarjetacombustible smallint)  
begin
	delete from tarjetacombustible
	where idtarjetacombustible=pidtarjetacombustible;
	
	commit;
end$$

DELIMITER ;
