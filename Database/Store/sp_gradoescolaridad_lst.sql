DELIMITER $$

DROP PROCEDURE IF EXISTS sp_gradoescolaridad_lst $$

CREATE PROCEDURE sp_gradoescolaridad_lst()  
begin
	select idgradoescolaridad, descgradoescolaridad
	from gradoescolaridad
	order by idgradoescolaridad;
end$$

DELIMITER ;
