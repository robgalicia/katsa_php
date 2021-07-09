DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoreferencia_all $$

CREATE PROCEDURE sp_empleadoreferencia_all(IN pidempleado int)

begin

	select idempleadoreferencia,er.idtipoparentesco,tp.desctipoparentesco,
			nombre,domicilio,colonia,ciudad,ifnull(idestado,0) as idestado,
			telefono,correoelectronico,ifnull(fechanacimiento,'') as fechanacimiento,
			esbeneficiario, ifnull(porcentaje,0) as porcentaje,
			ifnull(er.rfc,'') as rfc, ifnull(er.curp,'') as curp
	from empleadoreferencia er
		inner join tipoparentesco tp on tp.idtipoparentesco=er.idtipoparentesco
	where idempleado = pidempleado
	order by tp.desctipoparentesco;

end$$

DELIMITER ;

