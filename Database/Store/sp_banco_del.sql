DELIMITER $$

DROP PROCEDURE IF EXISTS sp_banco_del $$

CREATE PROCEDURE sp_banco_del(IN pidbanco int)

begin
	delete from banco
	where idbanco=pidbanco;
	
	commit;
end$$

DELIMITER ;
