DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoincidenciaemp_del $$

CREATE PROCEDURE sp_tipoincidenciaemp_del(IN pidtipoincidenciaemp int)

begin
	delete from tipoincidenciaemp
	where idtipoincidenciaemp=pidtipoincidenciaemp;
	
	commit;
end$$

DELIMITER ;
