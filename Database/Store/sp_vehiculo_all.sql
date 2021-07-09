DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculo_all $$

CREATE PROCEDURE sp_vehiculo_all()  
begin
	select 	v.idvehiculo, ifnull(v.placas,'') as placas, mv.descmarcavehiculo, ifnull(v.submarca,'') as submarca,
			ifnull(v.aniomodelo,0) as aniomodelo, ifnull(v.numeconomico,0) as numeconomico,
			ifnull(c.nombre,'') as nombrecliente, ifnull(a.descadscripcion,'') as adscripcionactual,
			ifnull(ar.nombre,'KATSA') as empresa, st.descestatus as estatus 
	from vehiculo v
		inner join marcavehiculo mv on mv.idmarcavehiculo=v.idmarcavehiculo
		left outer join cliente c on c.idcliente=v.idclienteactual
		left outer join adscripcion a on a.idadscripcion=v.idadscripcionactual
		left outer join arrendadora ar on ar.idarrendadora=v.idarrendadora
		inner join estatus st on st.idestatus=v.idestatus
	order by mv.descmarcavehiculo, v.submarca;
end$$

DELIMITER ;