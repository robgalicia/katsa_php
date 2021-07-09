DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculotenencia_all $$

CREATE PROCEDURE sp_vehiculotenencia_all(IN pidvehiculo smallint)

begin
	select 	idvehiculotenencia, fechapago, ifnull(importepagado,0) as importepagado, fechavigencia, 
			placas, foliotarjeta
   	from vehiculotenencia
	where idvehiculo=pidvehiculo
	order by fechapago;

end$$

DELIMITER ;

