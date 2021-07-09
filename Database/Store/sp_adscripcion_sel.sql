DELIMITER $$

DROP PROCEDURE IF EXISTS sp_adscripcion_sel $$

CREATE PROCEDURE sp_adscripcion_sel(IN pidadscripcion smallint)  
begin
	select 	idadscripcion, descadscripcion, idregion, ifnull(ubicacion,'') as ubicacion, 
			ifnull(fechainicio,'') as fechainicio, ifnull(fechabaja,'') as fechabaja, 
			ifnull(calle,'') as calle,
			ifnull(numexterior,'') as numexterior,
			ifnull(numinterior,'') as numinterior,
			ifnull(entrecalle,'') as entrecalle,
			ifnull(ylacalle,'') as ylacalle,
			ifnull(colonia,'') as colonia,
			ifnull(codigopostal,0) as codigopostal,
			ifnull(ciudad,'') as ciudad, idmunicipio, idestado,
			ifnull(personacontacto,'') as personacontacto,
			ifnull(telefonocontacto,'') as telefonocontacto,
			ifnull(correoelectronico,'') as correoelectronico,
			ifnull(distanciakms,'') as distanciakms
	from adscripcion
	where idadscripcion=pidadscripcion;
end$$

DELIMITER ;
