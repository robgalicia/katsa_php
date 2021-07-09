DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tipomoneda_lst $$

CREATE PROCEDURE sp_tipomoneda_lst()
begin
	select 	idtipomoneda, desctipomoneda, abreviacion
	from tipomoneda
	order by desctipomoneda;

end$$

DELIMITER ;