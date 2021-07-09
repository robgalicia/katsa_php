DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cotizaciondetalle_sel $$

CREATE PROCEDURE sp_cotizaciondetalle_sel(IN pidcotizaciondetalle int) 
begin

	select 	idcotizacion,idservicio,descservicio,cantidad,preciounitario,importetotal
	from cotizaciondetalle
	where idcotizaciondetalle=pidcotizaciondetalle;

end$$

DELIMITER ;