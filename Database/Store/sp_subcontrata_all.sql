DELIMITER $$

DROP PROCEDURE IF EXISTS sp_subcontrata_all $$

CREATE PROCEDURE sp_subcontrata_all()
begin
	select 	idsubcontrata,nombreempresa
	from subcontrata
	order by nombreempresa;
end$$

DELIMITER ;