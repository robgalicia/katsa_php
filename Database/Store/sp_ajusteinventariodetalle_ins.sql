DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ajusteinventariodetalle_ins $$

CREATE PROCEDURE sp_ajusteinventariodetalle_ins
(IN pidajusteinventario	int,
IN pidarticulo      int,
IN pcantidad        int,
IN pcostounitario   decimal(10,2),
IN pcostototal      decimal(10,2),
IN pquien           varchar(15),
 OUT last_id INT)  

begin

	insert into ajusteinventariodetalle(idajusteinventario,idarticulo,cantidad,costounitario,costototal,quien,cuando)
	values(pidajusteinventario,pidarticulo,pcantidad,pcostounitario,pcostototal,pquien,fn_fecha_actual());

	SET last_id = LAST_INSERT_ID();				
	
	update ajusteinventario set 
		costototal = (select sum(costototal) from ajusteinventariodetalle where idajusteinventario=pidajusteinventario)
	where idajusteinventario=pidajusteinventario;
	
	commit;
end$$

DELIMITER ;