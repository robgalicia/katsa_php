DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculopoliza_del $$

CREATE PROCEDURE sp_vehiculopoliza_del(IN pidvehiculopoliza int)  

begin
	
	delete from vehiculopoliza
	where idvehiculopoliza=pidvehiculopoliza;
	
	commit;

end$$

DELIMITER ;

