DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tarjetacombustible_lst $$

CREATE PROCEDURE sp_tarjetacombustible_lst()  
begin
	select 	tc.idtarjetacombustible, concat(tc.numtarjeta, ' - ', ifnull(e.nombrecompleto,'')) as numtarjeta
	from tarjetacombustible tc
		left outer join empleado e on tc.idempleadoresguardo=e.idempleado
	where tc.fechabaja is null
	order by tc.numtarjeta;
end$$

DELIMITER ;
