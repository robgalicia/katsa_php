DELIMITER $$

DROP PROCEDURE IF EXISTS sp_requisiciondetalle_ins $$

CREATE PROCEDURE sp_requisiciondetalle_ins
(IN pidrequisicion	int,
IN pidarticulo      int,
IN pcantidad        int,
IN pimporte         decimal(12,2),
IN ptotal           decimal(12,2),
IN pidproveedor     int,
IN pespecificaciones varchar(100),
IN pquien           varchar(15),
 OUT last_id INT)  

begin

	declare vidproveedor int;

	set vidproveedor=pidproveedor;

	if pidproveedor=0 then
		set vidproveedor=null;
	end if;

	insert into requisiciondetalle(idrequisicion,idarticulo,cantidad,importe,total,idproveedor,especificaciones,quien,cuando)
	values(pidrequisicion,pidarticulo,pcantidad,pimporte,ptotal,vidproveedor,pespecificaciones,pquien,fn_fecha_actual());

	SET last_id = LAST_INSERT_ID();				
	
	update requisicion set 
		importetotal = (select sum(total) from requisiciondetalle where idrequisicion=pidrequisicion)
	where idrequisicion=pidrequisicion;
	
	commit;
end$$

DELIMITER ;