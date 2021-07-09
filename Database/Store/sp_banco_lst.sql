DELIMITER $$

DROP PROCEDURE IF EXISTS sp_banco_lst $$

CREATE PROCEDURE sp_banco_lst()  
begin
	select idbanco, descbanco
	from banco
	order by descbanco;
end$$

DELIMITER ;
