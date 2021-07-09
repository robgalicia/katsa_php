DELIMITER $$

DROP PROCEDURE IF EXISTS sp_salidainventario_ins $$

CREATE PROCEDURE sp_salidainventario_ins
(IN pidtiposalidainventario smallint,
IN pidalmacen            smallint,
IN pidempleadoautoriza   int,
IN pidempleadorecibe	 int,
IN pobservaciones        varchar(100),
IN pcostototal           decimal(10,2),
IN pidregion             smallint,
IN pidadscripcion        smallint,
IN pidcliente            int,
IN piddepartamento       smallint,
IN pquien           varchar(15),
 OUT last_id INT)

begin

	declare vfolio varchar(12);
	
	CALL sp_foliosalidainventario(@folio);
	set vfolio=@folio;

	insert into salidainventario(fechasalida,idtiposalidainventario,folio,idalmacen,idempleadoautoriza,idempleadorecibe,
			observaciones,idregion,idadscripcion,idcliente,iddepartamento,costototal,quien,cuando)
	values(fn_fecha_actual(),pidtiposalidainventario,vfolio,pidalmacen,pidempleadoautoriza,pidempleadorecibe,
			pobservaciones,pidregion,pidadscripcion,pidcliente,piddepartamento,pcostototal,pquien,fn_fecha_actual());

	SET last_id = LAST_INSERT_ID();				
	
	commit;
end$$

DELIMITER ;

