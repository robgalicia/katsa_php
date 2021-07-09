DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cotizaciondetalle_ups $$

CREATE PROCEDURE sp_cotizaciondetalle_ups
(IN pidcotizaciondetalle  int,
IN pidcotizacion         int,
IN pidservicio           int,
IN pdescservicio         varchar(1000),
IN pcantidad             int,
IN ppreciounitario       decimal(12,2),
IN pimportetotal         decimal(12,2),
IN pquien                varchar(15),
 OUT last_id INT)  

begin

	if pidcotizaciondetalle = 0 then	
		insert into cotizaciondetalle(idcotizacion,idservicio,descservicio,cantidad,
                    preciounitario,importetotal,quien,cuando)
		values(pidcotizacion,pidservicio,pdescservicio,pcantidad,
                ppreciounitario,pimportetotal,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update cotizaciondetalle SET
            idcotizacion=pidcotizacion,
            idservicio=pidservicio,
            descservicio=pdescservicio,
            cantidad=pcantidad,
            preciounitario=ppreciounitario,
            importetotal=pimportetotal,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idcotizaciondetalle = pidcotizaciondetalle;

		SET last_id = pidcotizaciondetalle;
	end if;

    update cotizacion set
		importetotal = (select sum(importetotal) from cotizaciondetalle where idcotizacion=pidcotizacion)
	where idcotizacion=pidcotizacion;

	commit;
end$$

DELIMITER ;
