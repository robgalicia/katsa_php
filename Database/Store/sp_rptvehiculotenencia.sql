DELIMITER $$

DROP PROCEDURE IF EXISTS sp_rptvehiculotenencia $$

CREATE PROCEDURE sp_rptvehiculotenencia(IN pfechaini date, IN pfechafin date)

begin
	select 	ifnull(v.placas,'') as placas, concat_ws(' ', ifnull(mv.descmarcavehiculo,''), ifnull(v.submarca,'')) as marcasubmarca,
			ifnull(v.aniomodelo,0) as modelo, ifnull(v.numeconomico,0) as numeconomico,
			vt.fechapago, ifnull(vt.importepagado,0) as importepagado, vt.fechavigencia
   	from vehiculotenencia vt
		inner join vehiculo v on v.idvehiculo=vt.idvehiculo
		inner join marcavehiculo mv on mv.idmarcavehiculo=v.idmarcavehiculo
	where convert(vt.fechavigencia,date) between pfechaini and pfechafin
	order by vt.fechavigencia;

end$$

DELIMITER ;
