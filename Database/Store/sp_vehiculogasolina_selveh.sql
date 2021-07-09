DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculogasolina_selveh $$

CREATE PROCEDURE sp_vehiculogasolina_selveh(IN pidvehiculo int)
begin
	select 	vg.fecha, ifnull(tc.numtarjeta,0) as numtarjeta, 
			concat_ws(' ', ifnull(c.nombre,''), ifnull(a.descadscripcion,'')) as servicio,
			ifnull(e.nombrecompleto,'') as nombreempleado,
			ifnull(vg.kilometrajeanterior,0) as kilometrajeanterior, ifnull(vg.niveltanqueantes,'') as niveltanqueantes,
			ifnull(vg.kilometrajeactual,0) as kilometrajeactual, ifnull(vg.niveltanquedespues,'') as niveltanquedespues,
			tco.desctipocombustible, vg.cantidadlitros, vg.preciolitro, vg.preciototal,
			ifnull(vg.kilometrosrecorridos,0) as kilometrosrecorridos, ifnull(vg.rendimientolitro,0) as rendimientolitro
	from vehiculogasolina vg
		left outer join tarjetacombustible tc on tc.idtarjetacombustible=vg.idtarjetacombustible
		left outer join adscripcion a on a.idadscripcion=vg.idadscripcion
		left outer join cliente c on c.idcliente=vg.idcliente
		left outer join empleado e on e.idempleado=vg.idempleado
		inner join tipocombustible tco on tco.idtipocombustible=vg.idtipocombustible
	where vg.idvehiculo=pidvehiculo
	order by vg.fecha desc;

end$$

DELIMITER ;
