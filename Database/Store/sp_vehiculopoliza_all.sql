DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculopoliza_all $$

CREATE PROCEDURE sp_vehiculopoliza_all(IN pidvehiculo smallint)

begin
	select 	vp.idvehiculopoliza, vp.idaseguradora, a.descaseguradora, vp.numpoliza, vp.iniciovigencia, vp.finalvigencia,
			ifnull(vp.fechapago,'') as fechapago, ifnull(vp.importetotal,0) as importetotal,
			ifnull(vp.observaciones,'') as observaciones
   	from vehiculopoliza vp
		inner join aseguradora a on a.idaseguradora=vp.idaseguradora
	where vp.idvehiculo=pidvehiculo
	order by vp.iniciovigencia;

end$$

DELIMITER ;
