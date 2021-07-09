DELIMITER $$

DROP PROCEDURE IF EXISTS sp_proveedor_del $$

CREATE PROCEDURE sp_proveedor_del(IN pidproveedor int)

begin
	delete from proveedor
	where idproveedor=pidproveedor;
	
	commit;
end$$

DELIMITER ;
