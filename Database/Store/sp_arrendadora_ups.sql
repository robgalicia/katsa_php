DELIMITER $$

DROP PROCEDURE IF EXISTS sp_arrendadora_ups $$

CREATE PROCEDURE sp_arrendadora_ups
(IN pidarrendadora  smallint,
IN pnombre		 varchar(100),
IN pcalle             varchar(100),
IN pnumexterior       varchar(20),
IN pnuminterior     varchar(20),
IN pcolonia   varchar(50),
IN pciudad   varchar(50),
IN pidmunicipio   smallint,
IN pidestado   smallint,
IN pcodigopostal   int,
IN prfc   varchar(13),
IN ppersonacontacto   varchar(50),
IN ptelefonocontacto   varchar(50),
IN pcorreoelectronico   varchar(50),
IN pquien                varchar(15),
 OUT last_id INT)

begin
	if pidarrendadora = 0 then	

		insert into arrendadora(nombre,calle,numexterior,numinterior,colonia,ciudad,idmunicipio,idestado,
		codigopostal,rfc,personacontacto,telefonocontacto,correoelectronico,quien,cuando)
		values(pnombre,pcalle,pnumexterior,pnuminterior,pcolonia,pciudad,pidmunicipio,pidestado,pcodigopostal,prfc,ppersonacontacto,ptelefonocontacto,pcorreoelectronico,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update arrendadora SET
			nombre=pnombre,
            calle=pcalle,
            numexterior=pnumexterior,
            numinterior=pnuminterior,
            colonia=pcolonia,
			ciudad=pciudad,
			idmunicipio=pidmunicipio,
			idestado=pidestado,
			codigopostal=pcodigopostal,
			rfc=prfc,
			personacontacto=ppersonacontacto,
			telefonocontacto=ptelefonocontacto,
			correoelectronico=pcorreoelectronico,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idarrendadora = pidarrendadora;

		SET last_id = pidarrendadora;
	end if;

	commit;
end$$

DELIMITER ;
