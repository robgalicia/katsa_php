DELIMITER $$

DROP PROCEDURE IF EXISTS sp_region_del $$

CREATE PROCEDURE sp_region_del(IN pidregion smallint)  
begin
	delete from region
	where idregion=pidregion;
	
	commit;
end$$

DELIMITER ;
