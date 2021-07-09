DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cotizacion_sel $$

CREATE PROCEDURE sp_cotizacion_sel(IN pidcotizacion int) 
begin

	select 	c.idcotizacion, c.folio, c.fecha, c.lugarexpedicion, c.asunto, c.idcliente, 
            cte.nombre as nombrecliente, 
            c.personacontacto, c.personacopia, c.tiposervicio, c.lugarservicio, 
            c.ubicacionlugar, c.idempleadofirma, c.idtipomoneda,
            c.fechainicio, c.fechafinal,
            cd.idcotizaciondetalle, cd.idservicio, cd.descservicio,
            cd.cantidad, cd.preciounitario, cd.importetotal
	from cotizacion c
        inner join cliente cte on cte.idcliente=c.idcliente
        inner join cotizaciondetalle cd on cd.idcotizacion=c.idcotizacion
	where c.idcotizacion=pidcotizacion;

end$$

DELIMITER ;

