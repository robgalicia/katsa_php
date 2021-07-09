DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculomantenimiento_all $$

CREATE PROCEDURE sp_vehiculomantenimiento_all(IN pidvehiculo smallint)
begin
	select 	vm.idvehiculomantenimiento, vm.fecha, vm.kilometrajeactual, vm.descservicio,
			ifnull(p.nombre,'') as proveedorservicio, ifnull(vm.importetotal,0) as importetotal,
			ifnull(vm.observaciones,'') as observaciones, ifnull(vm.subtotal,0) as subtotal,
			ifnull(vm.iva,0) as iva
	from vehiculomantenimiento vm
		inner join proveedor p on p.idproveedor=vm.idproveedor
	where vm.idvehiculo=pidvehiculo
	order by fecha;

end$$

DELIMITER ;
