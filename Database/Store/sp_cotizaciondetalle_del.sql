DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cotizaciondetalle_del $$

CREATE PROCEDURE sp_cotizaciondetalle_del(IN pidcotizaciondetalle int) 
begin

    declare vidcotizacion int;

    select idcotizacion into vidcotizacion
    from cotizaciondetalle
    where idcotizaciondetalle=pidcotizaciondetalle; 

	delete from cotizaciondetalle
	where idcotizaciondetalle=pidcotizaciondetalle;

    update cotizacion set
		importetotal = (select sum(importetotal) from cotizaciondetalle where idcotizacion=vidcotizacion)
	where idcotizacion=vidcotizacion;

    commit;
end$$

DELIMITER ;