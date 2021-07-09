DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoreferencia_sel $$

CREATE PROCEDURE sp_empleadoreferencia_sel(IN pidempleadoreferencia int)

begin

	select idempleadoreferencia,idempleado,idtipoparentesco,nombre,domicilio,colonia,ciudad,ifnull(idestado,0) as idestado,
			telefono,correoelectronico,fechanacimiento,esbeneficiario, ifnull(porcentaje,0) as porcentaje,
			ifnull(rfc,'') as rfc, ifnull(curp,'') as curp
	from empleadoreferencia
	where idempleadoreferencia = pidempleadoreferencia;

end$$

DELIMITER ;