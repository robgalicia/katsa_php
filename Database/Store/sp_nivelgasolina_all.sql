DELIMITER $$

DROP PROCEDURE IF EXISTS sp_nivelgasolina_all $$

CREATE PROCEDURE sp_nivelgasolina_all()
begin
	select 	idnivelgasolina, descnivelgasolina
	from nivelgasolina
	order by descnivelgasolina;

end$$

DELIMITER ;
