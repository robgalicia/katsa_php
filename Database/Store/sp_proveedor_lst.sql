DELIMITER $$

DROP PROCEDURE IF EXISTS sp_proveedor_lst $$

CREATE PROCEDURE sp_proveedor_lst()  
begin
	select idproveedor, nombre
	from proveedor
	order by nombre;
end$$

DELIMITER ;
