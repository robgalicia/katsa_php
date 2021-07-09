DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cliente_all $$

CREATE PROCEDURE sp_cliente_all()

begin
	select 	c.idcliente, c.nombre, c.calle, c.numexterior, ifnull(c.numinterior,'') as numinterior,
			ifnull(c.colonia,'') as colonia, ifnull(c.ciudad,'') as ciudad, 
			ifnull(m.descmunicipio,'') as descmunicipio,
			ifnull(e.descestado,'') as descestado,
			c.codigopostal, c.rfc, ifnull(c.personacontacto,'') as personacontacto			
	from cliente c
		left outer join municipio m on m.idmunicipio=c.idmunicipio and m.idestado=c.idestado
		left outer join estado e on e.idestado=c.idestado
	order by c.nombre;
end$$

DELIMITER ;

