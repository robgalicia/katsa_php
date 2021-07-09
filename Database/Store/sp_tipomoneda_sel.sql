DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipomoneda_sel $$

CREATE PROCEDURE sp_tipomoneda_sel(IN pidtipomoneda smallint)
begin
	select 	desctipomoneda, abreviacion
	from tipomoneda
	where idtipomoneda=pidtipomoneda;

end$$

DELIMITER ;