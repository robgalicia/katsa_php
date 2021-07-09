DELIMITER $$

DROP PROCEDURE IF EXISTS sp_proveedor_sel $$

CREATE PROCEDURE sp_proveedor_sel(IN pidproveedor int)
begin
	select 	idproveedor, nombre, ifnull(representante,'') as representante, ifnull(direccion,'') as direccion,
			ifnull(colonia,'') as colonia, ifnull(ciudad,'') as ciudad, ifnull(idestado,0) as idestado,
			ifnull(codigopostal,'') as codigopostal, ifnull(rfc,'') as rfc,
			ifnull(telefono,'') as telefono, ifnull(correoelectronico,'') as correoelectronico,
			ifnull(diascredito,0) as diascredito, ifnull(idbancodeposito,0) as idbancodeposito,
			ifnull(cuentadeposito,'') as cuentadeposito, ifnull(cuentacontable,'') as cuentacontable, 
			personafiscal
	from proveedor		
	where idproveedor = pidproveedor;

end$$

DELIMITER ;

