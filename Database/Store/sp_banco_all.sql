DELIMITER $$

DROP PROCEDURE IF EXISTS sp_banco_all $$

CREATE PROCEDURE sp_banco_all()
begin
	select 	idbanco, descbanco
	from banco
	order by descbanco;

end$$

DELIMITER ;
