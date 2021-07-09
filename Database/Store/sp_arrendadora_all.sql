DELIMITER $$

DROP PROCEDURE IF EXISTS sp_arrendadora_all $$

CREATE PROCEDURE sp_arrendadora_all()
begin
	select 	idarrendadora,nombre, ifnull(calle,'') as calle,
            ifnull(numexterior,'') as numexterior, 
			ifnull(numinterior,'') as numinterior, 
            ifnull(colonia,'') as colonia, 
            ifnull(ciudad,'') as ciudad,
            ifnull(idmunicipio,'') as idmunicipio,
            ifnull(idestado,'') as idestado,
            ifnull(codigopostal,0) as codigopostal,
            ifnull(rfc,0) as rfc,
            ifnull(personacontacto,'') as personacontacto,
			ifnull(telefonocontacto,'') as telefonocontacto,
            ifnull(correoelectronico,'') as correoelectronico
        from arrendadora
        order by idarrendadora;

end$$

DELIMITER ;
