DELIMITER $$

DROP PROCEDURE IF EXISTS sp_proveedor_ups $$

CREATE PROCEDURE sp_proveedor_ups
(IN pidproveedor         int,
IN pnombre               varchar(100),
IN prepresentante        varchar(50),
IN pdireccion            varchar(100),
IN pcolonia              varchar(50),
IN pciudad               varchar(50),
IN pidestado             smallint,
IN pcodigopostal         varchar(6),
IN prfc                  varchar(13),
IN ptelefono             varchar(30),
IN pcorreoelectronico    varchar(50),
IN pdiascredito          tinyint,
IN pidbancodeposito      smallint,
IN pcuentadeposito       varchar(20),
IN pcuentacontable       varchar(15),
IN ppersonafiscal        char(1),
IN pquien                varchar(15),
 OUT last_id INT)

begin
	if pidproveedor = 0 then	

		insert into proveedor(nombre,representante,direccion,colonia,ciudad,idestado,codigopostal,rfc,telefono,correoelectronico,
					diascredito,idbancodeposito,cuentadeposito,cuentacontable,personafiscal,quien,cuando)
		values(pnombre,prepresentante,pdireccion,pcolonia,pciudad,pidestado,pcodigopostal,prfc,ptelefono,pcorreoelectronico,
					pdiascredito,pidbancodeposito,pcuentadeposito,pcuentacontable,ppersonafiscal,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else
		update proveedor SET
			nombre=pnombre,
			representante=prepresentante,
			direccion=pdireccion,
			colonia=pcolonia,
			ciudad=pciudad,
			idestado=pidestado,
			codigopostal=pcodigopostal,
			rfc=prfc,
			telefono=ptelefono,
			correoelectronico=pcorreoelectronico,
			diascredito=pdiascredito,
			idbancodeposito=pidbancodeposito,
			cuentadeposito=pcuentadeposito,
			cuentacontable=pcuentacontable,
			personafiscal=ppersonafiscal,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idproveedor = pidproveedor;

		SET last_id = pidproveedor;
	end if;

	commit;
end$$

DELIMITER ;

