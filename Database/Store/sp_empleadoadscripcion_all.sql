DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoadscripcion_all $$

CREATE PROCEDURE sp_empleadoadscripcion_all(IN pidempleado int)

begin
	select 	idempleadoadscripcion,fechaadscripcion,ea.idregion,r.descregion,
			ea.idadscripcion, a.descadscripcion,
			ea.idcliente, c.nombre as nombrecliente,
			ea.idpuesto, p.descpuesto, 1 as idformatolegal
   	from empleadoadscripcion ea
		inner join region r on r.idregion=ea.idregion
		inner join adscripcion a on a.idadscripcion=ea.idadscripcion
		inner join cliente c on c.idcliente=ea.idcliente
		inner join puesto p on p.idpuesto=ea.idpuesto
	where idempleado=pidempleado
	order by idempleadoadscripcion;

end$$

DELIMITER ;
