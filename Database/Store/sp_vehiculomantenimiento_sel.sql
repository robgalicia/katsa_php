DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculomantenimiento_sel $$

CREATE PROCEDURE sp_vehiculomantenimiento_sel(IN pidvehiculomantenimiento int)
begin
	select 	idvehiculomantenimiento, fecha, kilometrajeactual, descservicio,
			ifnull(idproveedor,0) as idproveedor, ifnull(importetotal,0) as importetotal,
			ifnull(observaciones,'') as observaciones, ifnull(subtotal,0) as subtotal,
			ifnull(iva,0) as iva, ifnull(idempleadocomision,0) as idempleadocomision,
			ifnull(kmsproxmantenimiento,0) as kmsproxmantenimiento,
			ifnull(fechapago,'') as fechapago, ifnull(referenciapago,'') as referenciapago
	from vehiculomantenimiento
	where idvehiculomantenimiento=pidvehiculomantenimiento;

end$$

DELIMITER ;
