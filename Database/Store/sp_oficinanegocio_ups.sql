DELIMITER $$

DROP PROCEDURE IF EXISTS sp_oficinanegocio_ups $$

CREATE PROCEDURE sp_oficinanegocio_ups
(IN pnombrecomercial  varchar(100),
IN pgironegocio varchar(100),
IN pcalle varchar(100),
IN pnumeroext varchar(10),
IN pnumeroint varchar(10),
IN pentrecalles varchar(100),
IN pcolonia varchar(50),
IN pciudad varchar(50),
IN pcodigopostal int,
IN pidestado smallint,
IN pidmunicipio smallint,
IN ptelefono varchar(50),
IN pnombreoficina varchar(50),
IN pcorreoelectronico varchar(50),
IN prepresentantelegal varchar(50),
IN psexorepresentantelegal varchar(1),
IN pquien                varchar(15)
)  

begin

	update oficinanegocio set        
        nombrecomercial = pnombrecomercial,
        gironegocio = pgironegocio,
        calle = pcalle,
        numeroext = pnumeroext,
        numeroint = pnumeroint,
        entrecalles = pentrecalles,
        colonia = pcolonia,
        ciudad = pciudad,
        codigopostal = pcodigopostal,
        idestado = pidestado,
        idmunicipio = pidmunicipio,
        telefono = ptelefono,
        nombreoficina = pnombreoficina,
        correoelectronico = pcorreoelectronico,
        representantelegal = prepresentantelegal,
        sexorepresentantelegal = psexorepresentantelegal,
        quien = pquien,
        cuando = fn_fecha_actual()
		where idoficinanegocio = 1;
	
	commit;
end$$

DELIMITER ;