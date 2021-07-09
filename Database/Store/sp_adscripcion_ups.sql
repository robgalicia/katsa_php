DELIMITER $$

DROP PROCEDURE IF EXISTS sp_adscripcion_ups $$

CREATE PROCEDURE sp_adscripcion_ups
(IN pidadscripcion		smallint,
IN pdescadscripcion     varchar(50),
IN pidregion 			smallint,
IN pubicacion           varchar(100),
IN pfechainicio         datetime,
IN pfechabaja           datetime,
IN pcalle               varchar(50),
IN pnumexterior         varchar(20),
IN pnuminterior         varchar(20),
IN pentrecalle          varchar(50),
IN pylacalle            varchar(50),
IN pcolonia             varchar(50),
IN pcodigopostal        int,
IN pciudad              varchar(30),
IN pidmunicipio         smallint,
IN pidestado            smallint,
IN ppersonacontacto     varchar(50),
IN ptelefonocontacto    varchar(30),
IN pcorreoelectronico   varchar(50),
IN pdistanciakms		int,
IN pquien           	varchar(15),
 OUT last_id INT)  

begin
	if pidadscripcion = 0 then	

		insert into adscripcion(descadscripcion,idregion,ubicacion,fechainicio,fechabaja,calle,numexterior,
					numinterior,entrecalle,ylacalle,colonia,codigopostal,ciudad,idmunicipio,idestado,
					personacontacto,telefonocontacto,correoelectronico,distanciakms,quien,cuando)
		values(pdescadscripcion,pidregion,pubicacion,pfechainicio,pfechabaja,pcalle,pnumexterior,
					pnuminterior,pentrecalle,pylacalle,pcolonia,pcodigopostal,pciudad,pidmunicipio,pidestado,
					ppersonacontacto,ptelefonocontacto,pcorreoelectronico,pdistanciakms,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update adscripcion SET
			descadscripcion=pdescadscripcion,
			idregion=pidregion,
			ubicacion=pubicacion,
			fechainicio=pfechainicio,
			fechabaja=pfechabaja,
			calle=pcalle,
			numexterior=pnumexterior,
			numinterior=pnuminterior,
			entrecalle=pentrecalle,
			ylacalle=pylacalle,
			colonia=pcolonia,
			codigopostal=pcodigopostal,
			ciudad=pciudad,
			idmunicipio=pidmunicipio,
			idestado=pidestado,
			personacontacto=ppersonacontacto,
			telefonocontacto=ptelefonocontacto,
			correoelectronico=pcorreoelectronico,
			distanciakms=pdistanciakms,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idadscripcion = pidadscripcion;

		SET last_id = pidadscripcion;
	end if;

	commit;
end$$

DELIMITER ;
