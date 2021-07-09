	
DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculoresguardo_del $$

CREATE PROCEDURE sp_vehiculoresguardo_del(IN pidvehiculoresguardo int)

begin

	delete from vehiculoresguardo
	where idvehiculoresguardo=pidvehiculoresguardo;

	commit;
end$$

DELIMITER ;
