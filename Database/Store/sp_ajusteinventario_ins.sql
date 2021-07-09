DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ajusteinventario_ins $$

CREATE PROCEDURE sp_ajusteinventario_ins
(IN pfecha 					datetime,
IN pidalmacen            	smallint,
IN pidtipoajusteinventario 	smallint,
IN pidempleadoautoriza   	int,
IN pobservaciones        	varchar(100),
IN pquien           		varchar(15),
 OUT last_id INT)

begin

	declare vfolio varchar(12);
	
	CALL sp_folioajusteinventario(@folio);
	set vfolio=@folio;

	insert into ajusteinventario(fecha,idtipoajusteinventario,folio,idalmacen,idempleadoautoriza,observaciones,costototal,quien,cuando)
	values(pfecha,pidtipoajusteinventario,vfolio,pidalmacen,pidempleadoautoriza,pobservaciones,0,pquien,fn_fecha_actual());

	SET last_id = LAST_INSERT_ID();				
	
	commit;
end$$

DELIMITER ;