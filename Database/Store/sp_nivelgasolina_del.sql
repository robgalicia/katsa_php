DELIMITER $$

DROP PROCEDURE IF EXISTS sp_nivelgasolina_del $$

CREATE PROCEDURE sp_nivelgasolina_del(IN pidnivelgasolina int)

begin
	delete from nivelgasolina
	where idnivelgasolina=pidnivelgasolina;
	
	commit;
end$$

DELIMITER ;