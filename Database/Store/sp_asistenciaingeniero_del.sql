DELIMITER $$

DROP PROCEDURE IF EXISTS sp_asistenciaingeniero_del $$

CREATE PROCEDURE sp_asistenciaingeniero_del(IN pidasistenciaingeniero int)

begin
	delete from asistenciaingeniero
	where idasistenciaingeniero=pidasistenciaingeniero;
	
	commit;
end$$

DELIMITER ;