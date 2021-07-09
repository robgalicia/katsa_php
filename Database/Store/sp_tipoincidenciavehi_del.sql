DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoincidenciavehi_del $$

CREATE PROCEDURE sp_tipoincidenciavehi_del(IN pidtipoincidenciaveh int)

begin
	delete from tipoincidenciaveh
	where idtipoincidenciaveh=pidtipoincidenciaveh;
	
	commit;
end$$

DELIMITER ;
