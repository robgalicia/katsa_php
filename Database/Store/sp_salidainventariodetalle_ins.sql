DELIMITER $$

DROP PROCEDURE IF EXISTS sp_salidainventariodetalle_ins $$

CREATE PROCEDURE sp_salidainventariodetalle_ins
(IN pidsalidainventario	int,
IN pidarticulo      int,
IN pcantidad        int,
IN pcostounitario   decimal(10,2),
IN pcostototal      decimal(10,2),
IN pquien           varchar(15),
 OUT last_id INT)  

begin

	insert into salidainventariodetalle(idsalidainventario,idarticulo,cantidad,costounitario,costototal,quien,cuando)
	values(pidsalidainventario,pidarticulo,pcantidad,pcostounitario,pcostototal,pquien,fn_fecha_actual());

	SET last_id = LAST_INSERT_ID();				
	
	update salidainventario set 
		costototal = (select sum(costototal) from salidainventariodetalle where idsalidainventario=pidsalidainventario)
	where idsalidainventario=pidsalidainventario;
	
	commit;
end$$

DELIMITER ;