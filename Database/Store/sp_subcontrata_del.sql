DELIMITER $$

DROP PROCEDURE IF EXISTS sp_subcontrata_del $$

CREATE PROCEDURE sp_subcontrata_del(IN pidsubcontrata smallint)  
begin
	delete from subcontrata
	where idsubcontrata=pidsubcontrata;

    commit;
end$$

DELIMITER ;