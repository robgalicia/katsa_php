DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculogasolina_sel $$

CREATE PROCEDURE sp_vehiculogasolina_sel(IN pidvehiculogasolina int)
begin
	select 	idvehiculogasolina, semana, fecha, ifnull(vg.idtarjetacombustible,0) as idtarjetacombustible,
			ifnull(tc.numtarjeta,0) as numtarjeta, ifnull(vg.idvehiculo,0) as idvehiculo,
			concat_ws(' ', ifnull(mv.descmarcavehiculo,''), ifnull(v.submarca,''), ifnull(v.placas,'')) as vehiculo,
			ifnull(vg.idregion,0) as idregion, ifnull(vg.idadscripcion,0) as idadscripcion, ifnull(vg.idcliente,0) as idcliente,
			concat_ws(' ', ifnull(c.nombre,''), ifnull(a.descadscripcion,'')) as servicio,
			ifnull(vg.idempleado,0) as idempleado, ifnull(e.nombrecompleto,'') as nombreempleado,
			ifnull(vg.kilometrajeanterior,0) as kilometrajeanterior, ifnull(vg.niveltanqueantes,'') as niveltanqueantes,
			ifnull(vg.kilometrajeactual,0) as kilometrajeactual, ifnull(vg.niveltanquedespues,'') as niveltanquedespues,
			vg.idtipocombustible, tco.desctipocombustible, vg.cantidadlitros, vg.preciolitro, vg.preciototal,
			ifnull(vg.kilometrosrecorridos,0) as kilometrosrecorridos, ifnull(vg.rendimientolitro,0) as rendimientolitro,
			ifnull(vg.observaciones,'') as observaciones
	from vehiculogasolina vg
		left outer join tarjetacombustible tc on tc.idtarjetacombustible=vg.idtarjetacombustible
		left outer join vehiculo v on v.idvehiculo=vg.idvehiculo
		left outer join marcavehiculo mv on mv.idmarcavehiculo=v.idmarcavehiculo
		left outer join adscripcion a on a.idadscripcion=vg.idadscripcion
		left outer join cliente c on c.idcliente=vg.idcliente
		left outer join empleado e on e.idempleado=vg.idempleado
		inner join tipocombustible tco on tco.idtipocombustible=vg.idtipocombustible
	where idvehiculogasolina=pidvehiculogasolina;

end$$

DELIMITER ;
