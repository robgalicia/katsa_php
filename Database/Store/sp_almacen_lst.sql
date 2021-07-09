DELIMITER $$

DROP PROCEDURE IF EXISTS sp_almacen_lst $$

CREATE PROCEDURE sp_almacen_lst()  
begin
	select idalmacen, descalmacen
	from almacen
	order by descalmacen;
end$$

DELIMITER ;
