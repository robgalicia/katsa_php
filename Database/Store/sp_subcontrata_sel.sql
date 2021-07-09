DELIMITER $$

DROP PROCEDURE IF EXISTS sp_subcontrata_sel $$

CREATE PROCEDURE sp_subcontrata_sel(IN pidsubcontrata smallint)  
begin
	select 	nombreempresa
	from subcontrata
	where idsubcontrata=pidsubcontrata;
end$$

DELIMITER ;