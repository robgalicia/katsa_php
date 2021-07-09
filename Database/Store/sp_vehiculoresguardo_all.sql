DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculoresguardo_all $$

CREATE PROCEDURE sp_vehiculoresguardo_all(IN pidvehiculo smallint)  
begin

	select 	vr.idvehiculoresguardo, vr.fecharesguardo, 
			case vr.tiporesguardo when 'I' then 'INICIAL' when 'S' then 'SUPERVISION' else 'TEMPORAL' end as tiporesguardo,
			vr.placas, concat_ws(' ', mv.descmarcavehiculo, v.submarca) as marcavehiculo, v.aniomodelo, ifnull(v.numeconomico,0) as numeconomico,        
			e.nombrecompleto as empleadoresguardo, c.nombre as nombrecliente, a.descadscripcion
	from vehiculoresguardo vr
		inner join vehiculo v on v.idvehiculo=vr.idvehiculo
		inner join marcavehiculo mv on mv.idmarcavehiculo=v.idmarcavehiculo
		inner join empleado e on e.idempleado=vr.idempleadoresguardo
		inner join cliente c on c.idcliente=vr.idcliente
		inner join adscripcion a on a.idadscripcion=vr.idadscripcion
	where vr.idvehiculo=pidvehiculo
	order by vr.fecharesguardo;

end$$

DELIMITER ;