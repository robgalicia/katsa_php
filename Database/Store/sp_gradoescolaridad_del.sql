DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gradoescolaridad_del $$

CREATE PROCEDURE sp_gradoescolaridad_del(IN pidgradoescolaridad int)

begin
	delete from gradoescolaridad
	where idgradoescolaridad=pidgradoescolaridad;
	
	commit;
end$$

DELIMITER ;
