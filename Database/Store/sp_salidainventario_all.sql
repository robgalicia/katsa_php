DELIMITER $$

DROP PROCEDURE IF EXISTS sp_salidainventario_all $$

CREATE PROCEDURE sp_salidainventario_all
(IN pidalmacen smallint, 
IN panio int, 
IN pmes smallint) 
begin

	select 	idsalidainventario, folio, fechasalida, tsi.desctiposalidainventario,
			e.nombrecompleto as empleadoautoriza, ifnull(observaciones,'') as observaciones,
			ifnull(fechacancelacion,'') as fechacancelacion
	from salidainventario si
		inner join tiposalidainventario tsi on tsi.idtiposalidainventario=si.idtiposalidainventario
		inner join empleado e on e.idempleado=si.idempleadoautoriza
	where si.idalmacen=pidalmacen
	and year(fechasalida)=panio and month(fechasalida)=pmes
	order by fechasalida desc;

end$$

DELIMITER ;
