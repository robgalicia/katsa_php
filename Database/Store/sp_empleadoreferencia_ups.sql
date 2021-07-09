DELIMITER $$

DROP PROCEDURE IF EXISTS sp_empleadoreferencia_ups $$

CREATE PROCEDURE sp_empleadoreferencia_ups
(IN pidempleadoreferencia int,
IN pidempleado           int,
IN pidtipoparentesco     smallint,
IN pnombre               varchar(50),
IN pdomicilio            varchar(50),
IN pcolonia              varchar(50),
IN pciudad               varchar(50),
IN pidestado             smallint,
IN ptelefono             varchar(50),
IN pcorreoelectronico    varchar(50),
IN pfechanacimiento      datetime,
IN pesbeneficiario       char(1),
IN pporcentaje			 decimal(6,2),
IN pquien                varchar(15),
IN prfc                	varchar(13),
IN pcurp                varchar(18),
 OUT last_id INT)  

begin
	if pidempleadoreferencia = 0 then	

		insert into empleadoreferencia(idempleado,idtipoparentesco,nombre,domicilio,colonia,ciudad,idestado,telefono,
					correoelectronico,fechanacimiento,esbeneficiario,porcentaje,rfc,curp,quien,cuando)
		values(pidempleado,pidtipoparentesco,pnombre,pdomicilio,pcolonia,pciudad,pidestado,ptelefono,
					pcorreoelectronico,pfechanacimiento,pesbeneficiario,pporcentaje,prfc,pcurp,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update empleadoreferencia SET
				idempleado=pidempleado,
				idtipoparentesco=pidtipoparentesco,
				nombre=pnombre,
				domicilio=pdomicilio,
				colonia=pcolonia,
				ciudad=pciudad,
				idestado=pidestado,
				telefono=ptelefono,
				correoelectronico=pcorreoelectronico,
				fechanacimiento=pfechanacimiento,
				esbeneficiario=pesbeneficiario,
				porcentaje=pporcentaje,
				rfc=prfc,
				curp=pcurp,
				quien=pquien,
				cuando=fn_fecha_actual()
		where idempleadoreferencia = pidempleadoreferencia;

		SET last_id = pidempleadoreferencia;
	end if;

	commit;
end$$

DELIMITER ;

