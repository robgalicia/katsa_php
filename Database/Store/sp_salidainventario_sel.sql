DELIMITER $$

DROP PROCEDURE IF EXISTS sp_salidainventario_sel $$

CREATE PROCEDURE sp_salidainventario_sel(IN pidsalidainventario int) 
begin

	select 	si.folio, si.fechasalida, si.idregion, si.idadscripcion, si.idcliente, si.iddepartamento,
			si.idtiposalidainventario, tsi.desctiposalidainventario, si.idalmacen, m.descalmacen,
			si.idempleadoautoriza, e.nombrecompleto as empleadoautoriza, 
			ifnull(observaciones,'') as observaciones,
			si.costototal as costototalsal,
			si.idempleadorecibe, er.nombrecompleto as empleadorecibe,
			ifnull(si.fechacancelacion,'') as fechacancelacion,
			ifnull(si.idempleadocancela,0) as idempleadocancela, ifnull(ec.nombrecompleto,'') as empleadocancela,
			ifnull(si.motivocancelacion,'') as motivocancelacion,
			ifnull(a.codigoarticulo,'') as codigoarticulo, a.descarticulo, sid.cantidad, sid.costounitario, sid.costototal
	from salidainventario si
		inner join tiposalidainventario tsi on tsi.idtiposalidainventario=si.idtiposalidainventario
		inner join empleado e on e.idempleado=si.idempleadoautoriza
		inner join empleado er on er.idempleado=si.idempleadorecibe
		inner join almacen m on m.idalmacen=si.idalmacen
		left outer join empleado ec on ec.idempleado=si.idempleadocancela
		inner join salidainventariodetalle sid on sid.idsalidainventario=si.idsalidainventario
		inner join articulo a on a.idarticulo=sid.idarticulo
	where si.idsalidainventario=pidsalidainventario;

end$$

DELIMITER ;




