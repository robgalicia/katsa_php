DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencompradetalle_del $$

CREATE PROCEDURE sp_ordencompradetalle_del(IN pidordencompradetalle	int)

begin
	declare vidordencompra int;
	
	select idordencompra into vidordencompra
	from ordencompradetalle
	where idordencompradetalle = pidordencompradetalle;

	delete from ordencompradetalle
	where idordencompradetalle = pidordencompradetalle;
	
	update ordencompra set 
		importetotal = (select sum(total) from ordencompradetalle where idordencompra=vidordencompra)
	where idordencompra=vidordencompra;
	
	commit;
end$$

DELIMITER ;