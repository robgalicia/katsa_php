DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompradetalle_upd $$

CREATE PROCEDURE sp_ordencompradetalle_upd
(IN pidordencompradetalle	int,
IN pcantidad        int,
IN pimporte         decimal(12,2),
IN ptotal			decimal(12,2),
IN pquien           varchar(15))  

begin
	declare vidordencompra int;
	
	select idordencompra into vidordencompra
	from ordencompradetalle
	where idordencompradetalle = pidordencompradetalle;

	update ordencompradetalle set
		cantidad=pcantidad,
		importe=pimporte,
		total=ptotal,
		quien=pquien,
		cuando=fn_fecha_actual()
	where idordencompradetalle = pidordencompradetalle;
	
	update ordencompra set 
		importetotal = (select sum(total) from ordencompradetalle where idordencompra=vidordencompra)
	where idordencompra=vidordencompra;
	
	commit;
end$$

DELIMITER ;