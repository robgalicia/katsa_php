DELIMITER $$

DROP PROCEDURE IF EXISTS sp_adscripcion_lst $$

CREATE PROCEDURE sp_adscripcion_lst(IN pidregion smallint)  
begin
	select idadscripcion, descadscripcion, ifnull(distanciakms,0) as distanciakms
	from adscripcion
	where idregion=pidregion
	order by descadscripcion;
end$$

DELIMITER ;
