DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptvehiculogasolina_detalle $$

CREATE PROCEDURE sp_rptvehiculogasolina_detalle(IN pfechaini date, IN pfechafin date)
begin
	select 	pfechaini as fechaini, pfechafin as fechafin, semana, fecha, 
			ifnull(tc.numtarjeta,0) as numtarjeta,
			concat_ws(' ', ifnull(c.nombre,''), ifnull(a.descadscripcion,'')) as servicio,
			ifnull(e.nombrecompleto,'') as nombreempleado,
			concat_ws(' ', ifnull(mv.descmarcavehiculo,''), ifnull(v.submarca,''), ifnull(v.placas,'')) as vehiculo,
			ifnull(vg.kilometrajeanterior,0) as kilometrajeanterior, ifnull(vg.niveltanqueantes,'') as niveltanqueantes,
			ifnull(vg.kilometrajeactual,0) as kilometrajeactual, ifnull(vg.niveltanquedespues,'') as niveltanquedespues,
			vg.cantidadlitros, tco.desctipocombustible, vg.preciolitro, vg.preciototal,
			ifnull(vg.kilometrosrecorridos,0) as kilometrosrecorridos, ifnull(vg.rendimientolitro,0) as rendimientolitro
	from vehiculogasolina vg
		left outer join tarjetacombustible tc on tc.idtarjetacombustible=vg.idtarjetacombustible
		left outer join vehiculo v on v.idvehiculo=vg.idvehiculo
		left outer join marcavehiculo mv on mv.idmarcavehiculo=v.idmarcavehiculo
		left outer join adscripcion a on a.idadscripcion=vg.idadscripcion
		left outer join cliente c on c.idcliente=vg.idcliente
		left outer join empleado e on e.idempleado=vg.idempleado
		inner join tipocombustible tco on tco.idtipocombustible=vg.idtipocombustible
	where convert(vg.fecha,date) between pfechaini and pfechafin
	order by vg.fecha, tc.numtarjeta;

end$$

DELIMITER ;
