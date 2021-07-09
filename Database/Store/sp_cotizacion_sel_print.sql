DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cotizacion_sel_print $$

CREATE PROCEDURE sp_cotizacion_sel_print(IN pidcotizacion int) 
begin

	select 	c.idcotizacion, c.folio, c.fecha, c.lugarexpedicion, c.asunto, c.idcliente, 
            cte.nombre as nombrecliente, 
            c.personacontacto, c.personacopia, c.tiposervicio, c.lugarservicio, 
            c.ubicacionlugar, c.idempleadofirma, e.nombrecompleto, c.idtipomoneda, m.desctipomoneda,
            c.fechainicio, c.fechafinal, p.descpuesto,
            cd.idcotizaciondetalle, cd.idservicio, cd.descservicio, s.descripcioncorta,
            cd.cantidad, cd.preciounitario, cd.importetotal, fn_fechaletra(now()) as fecha_formal
	from cotizacion c
        inner join empleado e on c.idempleadofirma=e.idempleado
        inner join puesto p on p.idpuesto=e.idpuestotabulador
        inner join cliente cte on cte.idcliente=c.idcliente
        inner join cotizaciondetalle cd on cd.idcotizacion=c.idcotizacion
        inner join servicio s on s.idservicio=cd.idservicio
        inner join tipomoneda m on m.idtipomoneda=c.idtipomoneda        
	where c.idcotizacion=pidcotizacion;

end$$

DELIMITER ;