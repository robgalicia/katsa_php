DELIMITER $$

DROP PROCEDURE IF EXISTS sp_marcavehiculo_del $$

CREATE PROCEDURE sp_marcavehiculo_del(IN pidmarcavehiculo int)

begin
	delete from marcavehiculo
	where idmarcavehiculo=pidmarcavehiculo;
	
	commit;
end$$

DELIMITER ;
