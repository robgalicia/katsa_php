	
DELIMITER $$

DROP PROCEDURE IF EXISTS sp_opcionesmenu $$

CREATE PROCEDURE sp_opcionesmenu()
begin

	select menuid, nombremenu, padreid
	from menu
	order by ordenmenu;
	
end$$

DELIMITER ;
