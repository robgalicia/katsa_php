DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipomoneda_all $$

CREATE PROCEDURE sp_tipomoneda_all()
begin
	select 	idtipomoneda, desctipomoneda, abreviacion
	from tipomoneda
	order by desctipomoneda;

end$$

DELIMITER ;