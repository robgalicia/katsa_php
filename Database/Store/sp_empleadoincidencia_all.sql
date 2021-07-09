DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoincidencia_all $$

CREATE PROCEDURE sp_empleadoincidencia_all(IN pidempleado int)

begin
	select 	ei.idempleadoincidencia, e.nombrecompleto, ti.desctipoincidenciaemp, ei.fechaincidencia, ifnull(ei.observaciones,'') as observaciones
   	from empleadoincidencia ei
		inner join empleado e on e.idempleado=ei.idempleado 
		inner join tipoincidenciaemp ti on ti.idtipoincidenciaemp=ei.idtipoincidenciaemp
	where ei.idempleado=pidempleado
	order by ei.fechaincidencia desc;

end$$

DELIMITER ;
