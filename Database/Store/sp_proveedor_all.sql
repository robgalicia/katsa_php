DELIMITER $$

DROP PROCEDURE IF EXISTS sp_proveedor_all $$

CREATE PROCEDURE sp_proveedor_all()
begin
	select 	idproveedor, nombre, ifnull(representante,'') as representante, ifnull(rfc,'') as rfc
	from proveedor
	order by nombre;

end$$

DELIMITER ;
