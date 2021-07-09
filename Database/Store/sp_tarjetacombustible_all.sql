DELIMITER $$

DROP PROCEDURE IF EXISTS sp_tarjetacombustible_all $$

CREATE PROCEDURE sp_tarjetacombustible_all()  
begin
	select 	tc.idtarjetacombustible, tc.numtarjeta, ifnull(tc.idempleadoresguardo,0) as idempleadoresguardo, 
			ifnull(e.nombrecompleto,'') as empleadoresguardo, ifnull(tc.fecharesguardo,'') as fecharesguardo, 
			ifnull(tc.fechabaja,'') as fechabaja
	from tarjetacombustible tc
		left outer join empleado e on tc.idempleadoresguardo=e.idempleado
	order by tc.numtarjeta;
end$$

DELIMITER ;
