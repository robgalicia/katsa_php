DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculo_edofuerza $$

CREATE PROCEDURE sp_vehiculo_edofuerza(IN pidestatus smallint)
-- 6	ACTIVO
-- 7	BAJA
begin
	select 	ifnull(m.descmunicipio,'') as municipio, ifnull(c.nombre,'') as cliente,
			ifnull(a.descadscripcion,'') as sitio, ifnull(e.nombrecompleto,'') as nombreempleado,
			ifnull(v.tarjetacombustible,0) as tarjetacombustible,
			concat_ws(' ', ifnull(mv.descmarcavehiculo,''), ifnull(v.submarca,'')) as marcasubmarca,
			ifnull(v.placas,'') as placas, ifnull(v.aniomodelo,0) as modelo, 
			ifnull(ar.nombre,'KATSA') as propietario, ifnull(v.numeconomico,0) as numeconomico,
			concat_ws(' ', ifnull(v.capacidadtanque,0), 'LITROS') as capacidadtanque,			
			st.descestatus as estatus
	from vehiculo v
		left outer join adscripcion a on a.idadscripcion=v.idadscripcionactual
		left outer join municipio m on m.idestado=a.idestado and m.idmunicipio=a.idmunicipio
		left outer join cliente c on c.idcliente=v.idclienteactual
		left outer join empleado e on e.idempleado=v.idempleadoresguardo
		inner join marcavehiculo mv on mv.idmarcavehiculo=v.idmarcavehiculo
		left outer join arrendadora ar on ar.idarrendadora=v.idarrendadora
		inner join estatus st on st.idestatus=v.idestatus
	where v.idestatus=pidestatus
	order by mv.descmarcavehiculo, v.submarca;
end$$

DELIMITER ;
