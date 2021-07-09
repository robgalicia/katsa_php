DELIMITER $$

DROP PROCEDURE IF EXISTS sp_cliente_ups $$

CREATE PROCEDURE sp_cliente_ups
(IN pidcliente            int,
IN pnombre               varchar(100),
IN pnombrecomercial      varchar(100),
IN pcalle                varchar(100),
IN pnumexterior          varchar(20),
IN pnuminterior          varchar(20),
IN pcolonia              varchar(50),
IN pciudad               varchar(50),
IN pidmunicipio          smallint,
IN pidestado             smallint,
IN pcodigopostal         int,
IN prfc                  varchar(13),
IN ppersonacontacto      varchar(50),
IN ptelefonocontacto     varchar(50),
IN pcorreoelectronico    varchar(50),
IN pcveusocfdi           varchar(3),
IN pporcentajeiva		 decimal(6,2),
IN pquien                varchar(15),
 OUT last_id INT)

begin
	if pidcliente = 0 then	

		insert into cliente(nombre,nombrecomercial,calle,numexterior,numinterior,colonia,ciudad,idmunicipio,idestado,
					codigopostal,rfc,personacontacto,telefonocontacto,correoelectronico,cveusocfdi,porcentajeiva,quien,cuando)
		values(pnombre,pnombrecomercial,pcalle,pnumexterior,pnuminterior,pcolonia,pciudad,pidmunicipio,pidestado,
					pcodigopostal,prfc,ppersonacontacto,ptelefonocontacto,pcorreoelectronico,pcveusocfdi,pporcentajeiva,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update cliente SET
			nombre = pnombre,
			nombrecomercial = pnombrecomercial,
			calle = pcalle,
			numexterior = pnumexterior,
			numinterior = pnuminterior,
			colonia = pcolonia,
			ciudad = pciudad,
			idmunicipio = pidmunicipio,
			idestado = pidestado,
			codigopostal = pcodigopostal,
			rfc = prfc,
			personacontacto = ppersonacontacto,
			telefonocontacto = ptelefonocontacto,
			correoelectronico = pcorreoelectronico,
			cveusocfdi = pcveusocfdi,
			porcentajeiva = pporcentajeiva,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idcliente = pidcliente;

		SET last_id = pidcliente;
	end if;

	commit;
end$$

DELIMITER ;

