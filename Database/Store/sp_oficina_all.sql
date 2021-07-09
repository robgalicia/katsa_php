DELIMITER $$

DROP PROCEDURE IF EXISTS sp_oficina_all $$

CREATE PROCEDURE sp_oficina_all()  
begin
	select 	idoficinanegocio,nombrecomercial,ifnull(gironegocio,'') as gironegocio,calle,
            numeroext,ifnull(numeroint,'') as numeroint,ifnull(entrecalles,'') as entrecalles,colonia,
            ciudad,codigopostal,idestado,idmunicipio,ifnull(telefono,'') as telefono,
            ifnull(nombreoficina,'') as nombreoficina,ifnull(correoelectronico,'') as correoelectronico,
            representantelegal,sexorepresentantelegal
	from oficinanegocio ofn;
end$$

DELIMITER ;
