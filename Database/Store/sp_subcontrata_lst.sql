DELIMITER $$

DROP PROCEDURE IF EXISTS sp_subcontrata_lst $$

CREATE PROCEDURE sp_subcontrata_lst()  
begin
	select idsubcontrata, nombreempresa
	from subcontrata
	order by nombreempresa;
end$$

DELIMITER ;