DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoviaje_lst $$

CREATE PROCEDURE sp_tipoviaje_lst()  
begin
	select idtipoviaje, desctipoviaje
	from tipoviaje
	order by desctipoviaje;
end$$

DELIMITER ;