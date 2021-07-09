DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipocombustible_lst $$

CREATE PROCEDURE sp_tipocombustible_lst()
begin
	select 	idtipocombustible, desctipocombustible
	from tipocombustible
	order by idtipocombustible;
end$$

DELIMITER ;