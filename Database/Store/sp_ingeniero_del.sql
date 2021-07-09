DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ingeniero_del $$

CREATE PROCEDURE sp_ingeniero_del(IN pidingeniero int)  
begin
	delete from ingeniero
	where idingeniero=pidingeniero;

    commit;
end$$

DELIMITER ;