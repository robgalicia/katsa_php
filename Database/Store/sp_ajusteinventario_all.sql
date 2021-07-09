DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ajusteinventario_all $$

CREATE PROCEDURE sp_ajusteinventario_all
(IN pidalmacen smallint, 
IN panio int, 
IN pmes smallint) 
begin

	select 	idajusteinventario, folio, fecha, tai.desctipoajusteinventario,
			e.nombrecompleto as empleadoautoriza, ifnull(observaciones,'') as observaciones,
			ifnull(fechacancelacion,'') as fechacancelacion
	from ajusteinventario ai
		inner join tipoajusteinventario tai on tai.idtipoajusteinventario=ai.idtipoajusteinventario
		inner join empleado e on e.idempleado=ai.idempleadoautoriza
	where ai.idalmacen=pidalmacen
	and year(fecha)=panio and month(fecha)=pmes
	order by fecha desc;

end$$

DELIMITER ;
