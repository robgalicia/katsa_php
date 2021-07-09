DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cotizacion_all $$

CREATE PROCEDURE sp_cotizacion_all
(IN panio int, 
IN pmes smallint) 
begin

	select 	c.idcotizacion, c.folio, c.fecha, cte.nombre as nombrecliente, 
            c.tiposervicio, c.lugarservicio
	from cotizacion c
        inner join cliente cte on cte.idcliente=c.idcliente
	where year(c.fecha)=panio and month(c.fecha)=pmes
	order by c.fecha;

end$$

DELIMITER ;
