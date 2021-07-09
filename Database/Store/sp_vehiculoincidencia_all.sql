DELIMITER $$

DROP PROCEDURE IF EXISTS sp_vehiculoincidencia_all $$

CREATE PROCEDURE sp_vehiculoincidencia_all(IN pidvehiculo smallint)

begin
	select 	vi.idvehiculoincidencia, vi.fechaincidencia, ti.desctipoincidenciaveh, ifnull(vi.observaciones,'') as observaciones
   	from vehiculoincidencia vi
		inner join tipoincidenciaveh ti on ti.idtipoincidenciaveh=vi.idtipoincidenciaveh
	where vi.idvehiculo=pidvehiculo
	order by vi.fechaincidencia desc;

end$$

DELIMITER ;
