DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipoviaje_all $$

CREATE PROCEDURE sp_tipoviaje_all()
begin
	select 	idtipoviaje, desctipoviaje
	from tipoviaje
	order by desctipoviaje;

end$$

DELIMITER ;