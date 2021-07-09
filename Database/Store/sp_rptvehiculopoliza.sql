DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptvehiculopoliza $$

CREATE PROCEDURE sp_rptvehiculopoliza(IN pfechaini date, IN pfechafin date)

begin
	select 	ifnull(v.placas,'') as placas, concat_ws(' ', ifnull(mv.descmarcavehiculo,''), ifnull(v.submarca,'')) as marcasubmarca,
			ifnull(v.aniomodelo,0) as modelo, ifnull(v.numeconomico,0) as numeconomico,
			vp.numpoliza, a.descaseguradora, ifnull(vp.fechapago,'') as fechapago,
			vp.iniciovigencia, vp.finalvigencia
   	from vehiculopoliza vp
		inner join aseguradora a on a.idaseguradora=vp.idaseguradora
		inner join vehiculo v on v.idvehiculo=vp.idvehiculo
		inner join marcavehiculo mv on mv.idmarcavehiculo=v.idmarcavehiculo
	where convert(vp.finalvigencia,date) between pfechaini and pfechafin
	order by vp.finalvigencia;

end$$

DELIMITER ;
