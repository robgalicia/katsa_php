DELIMITER $$

DROP PROCEDURE IF EXISTS sp_arrendadora_del $$

CREATE PROCEDURE sp_arrendadora_del(IN pidarrendadora int)

begin
	delete from arrendadora
	where idarrendadora=pidarrendadora;
	
	commit;
end$$

DELIMITER ;
