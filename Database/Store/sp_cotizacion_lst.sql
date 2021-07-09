DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cotizacion_lst $$

CREATE PROCEDURE sp_cotizacion_lst(IN pidcliente int) 
begin

	select idcotizacion, folio
	from cotizacion
	where idcliente=pidcliente;

end$$

DELIMITER ;
