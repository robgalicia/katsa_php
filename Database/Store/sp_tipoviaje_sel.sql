DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoviaje_sel $$

CREATE PROCEDURE sp_tipoviaje_sel(in pidtipoviaje smallint)  
begin
	select idtipoviaje, desctipoviaje
	from tipoviaje
	where idtipoviaje = pidtipoviaje;
end$$

DELIMITER ;