DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisiciondetalle_upd $$

CREATE PROCEDURE sp_requisiciondetalle_upd
(IN pidrequisiciondetalle	int,
IN pcantidad        int,
IN pimporte         decimal(12,2),
IN ptotal           decimal(12,2),
IN pidproveedor     int,
IN pespecificaciones varchar(100),
IN pquien           varchar(15))  

begin
	declare vidrequisicion int;
	
	select idrequisicion into vidrequisicion
	from requisiciondetalle
	where idrequisiciondetalle = pidrequisiciondetalle;

	update requisiciondetalle set
		cantidad=pcantidad,
		importe=pimporte,
		total=ptotal,
		idproveedor=pidproveedor,
		especificaciones=pespecificaciones,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idrequisiciondetalle = pidrequisiciondetalle;
	
	update requisicion set 
		importetotal = (select sum(total) from requisiciondetalle where idrequisicion=vidrequisicion)
	where idrequisicion=vidrequisicion;
	
	commit;
end$$

DELIMITER ;