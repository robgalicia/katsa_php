DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cuentabancaria_del $$

CREATE PROCEDURE sp_cuentabancaria_del(IN pidcuentabancaria smallint)

begin
	delete from cuentabancaria
	where idcuentabancaria=pidcuentabancaria;
	
	commit;
end$$

DELIMITER ;
