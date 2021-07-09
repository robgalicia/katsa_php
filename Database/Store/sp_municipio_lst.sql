DELIMITER $$

DROP PROCEDURE IF EXISTS sp_municipio_lst $$

CREATE PROCEDURE sp_municipio_lst(in pidestado smallint)  
begin
	select idmunicipio, descmunicipio
	from municipio
	where idestado=pidestado
	order by descmunicipio;
end$$

DELIMITER ;
