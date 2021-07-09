DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculo_sel $$

CREATE PROCEDURE sp_vehiculo_sel(IN pidvehiculo smallint)  
begin
	select 	v.idvehiculo, v.idmarcavehiculo, mv.descmarcavehiculo,
			ifnull(v.submarca,'') as submarca,
			ifnull(v.aniomodelo,0) as aniomodelo,
			ifnull(v.placas,'') as placas,
			ifnull(v.cilindros,0) as cilindros,
			ifnull(v.numserie,'') as numserie,
			ifnull(v.nummotor,'') as nummotor,
			ifnull(v.tipotransmision,'') as tipotransmision,
			ifnull(v.idtipocombustible,0) as idtipocombustible, ifnull(tc.desctipocombustible,'') as desctipocombustible,
			ifnull(v.capacidadtanque,0) as capacidadtanque,
			ifnull(v.numeconomico,0) as numeconomico,
			ifnull(v.tarjetacombustible,0) as tarjetacombustible,
			ifnull(r.descregion,'') as regionactual,
			ifnull(a.descadscripcion,'') as adscripcionactual,
			ifnull(c.nombre,'') as nombrecliente, 
			ifnull(e.nombrecompleto,'') as empleadoresguardo,
			ifnull(v.esarrendado,'N') as esarrendado, 
			ifnull(v.idarrendadora,0) as idarrendadora, ifnull(ar.nombre,'KATSA') as empresa, 
			ifnull(v.kilometrajeactual,0) as kilometrajeactual,
			ifnull(v.fechakilometraje,'') as fechakilometraje,
			ifnull(v.kilometrajemtto,0) as kilometrajemtto,
			ifnull(v.fechaultimomtto,'') as fechaultimomtto,
			st.descestatus as estatus,
			ifnull(v.observaciones,'') as observaciones,
			ifnull(v.idcolor,0) as idcolor, ifnull(cl.desccolor,'') as desccolor,
			ifnull(v.tienegps,'N') as tienegps, ifnull(v.proveedorgps,'') as proveedorgps,
			ifnull(v.fechabaja,'') as fechabaja, ifnull(v.motivobaja,'') as motivobaja
	from vehiculo v
		inner join marcavehiculo mv on mv.idmarcavehiculo=v.idmarcavehiculo
		left outer join tipocombustible tc on tc.idtipocombustible=v.idtipocombustible
		left outer join region r on r.idregion=v.idregionactual
		left outer join cliente c on c.idcliente=v.idclienteactual
		left outer join adscripcion a on a.idadscripcion=v.idadscripcionactual
		left outer join arrendadora ar on ar.idarrendadora=v.idarrendadora
		inner join estatus st on st.idestatus=v.idestatus
		left outer join empleado e on e.idempleado=v.idempleadoresguardo
		left outer join color cl on cl.idcolor=v.idcolor
	where v.idvehiculo=pidvehiculo;
end$$

DELIMITER ;