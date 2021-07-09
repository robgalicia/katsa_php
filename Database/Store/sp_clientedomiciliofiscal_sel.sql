DELIMITER $$

DROP PROCEDURE IF EXISTS sp_clientedomiciliofiscal_sel $$

CREATE PROCEDURE sp_clientedomiciliofiscal_sel(IN pidclientedomiciliofiscal int)

begin

	select 	idcliente, nombre, c.nombrecomercial, 
			ifnull(c.calle,'') as calle, ifnull(c.numexterior,'') as numexterior, ifnull(c.numinterior,'') as numinterior,
			ifnull(c.colonia,'') as colonia, ifnull(c.ciudad,'') as ciudad, 
			ifnull(c.idmunicipio,0) as idmunicipio, ifnull(m.descmunicipio,'') as descmunicipio,
			ifnull(c.idestado,0) as idestado, ifnull(e.descestado,'') as descestado,
			ifnull(c.codigopostal,0) as codigopostal, ifnull(c.rfc,'') as rfc,
			ifnull(c.personacontacto,'') as personacontacto,
			ifnull(c.telefonocontacto,'') as telefonocontacto,
			ifnull(c.correoelectronico,'') as correoelectronico,
			ifnull(c.cveusocfdi,'') as cveusocfdi, ifnull(porcentajeiva,0) as porcentajeiva
	from clientedomiciliofiscal c
		left outer join municipio m on m.idmunicipio=c.idmunicipio and m.idestado=c.idestado
		left outer join estado e on e.idestado=c.idestado
	where idclientedomiciliofiscal = pidclientedomiciliofiscal;

end$$

DELIMITER ;