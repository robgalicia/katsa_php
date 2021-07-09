DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gradoescolaridad_all $$

CREATE PROCEDURE sp_gradoescolaridad_all()
begin
	select 	idgradoescolaridad, descgradoescolaridad
	from gradoescolaridad
	order by descgradoescolaridad;

end$$

DELIMITER ;