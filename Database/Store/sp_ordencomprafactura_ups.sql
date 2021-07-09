DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencomprafactura_ups $$

CREATE PROCEDURE sp_ordencomprafactura_ups
(IN pidordencomprafactura int,
IN pidordencompra        int,
IN pfechafactura         datetime,
IN prfcproveedor         varchar(13),
IN pnombreproveedor		 varchar(100),
IN ptipoventa            char(1),
IN pidformapago          smallint,
IN preferenciapago       varchar(20),
IN pdiascredito          smallint,
IN pfechavencimiento     datetime,
IN pimportetotal         decimal(12,2),
IN puuid                 varchar(40),
IN pnombrearchivoxml     varchar(100),
IN pnombrearchivopdf     varchar(100),
IN pobservaciones        varchar(100),
IN pquien                varchar(15),
 OUT last_id INT)

begin

	declare vidproveedor int;

	select ifnull(idproveedor,0) into vidproveedor
	from proveedor
	where rfc = prfcproveedor
	limit 1;
	
	if ifnull(vidproveedor,0)=0 then
		insert into proveedor(nombre, idestado, rfc, personafiscal, quien, cuando)
		values(pnombreproveedor, 28, prfcproveedor, 'M', pquien, fn_fecha_actual());

		SET vidproveedor = LAST_INSERT_ID();				
	end if;		

	if pidordencomprafactura = 0 then	

		insert into ordencomprafactura(idordencompra,fechafactura,idproveedor,tipoventa,idformapago,referenciapago,diascredito,
					fechavencimiento,importetotal,uuid,nombrearchivoxml,nombrearchivopdf,observaciones,quien,cuando)
		values(pidordencompra,pfechafactura,vidproveedor,ptipoventa,pidformapago,preferenciapago,pdiascredito,
					pfechavencimiento,pimportetotal,puuid,pnombrearchivoxml,pnombrearchivopdf,pobservaciones,pquien,fn_fecha_actual());

    	SET last_id = LAST_INSERT_ID();				
	else

		update ordencomprafactura SET
			fechafactura=pfechafactura,
			idproveedor=vidproveedor,
			uuid=puuid,
			nombrearchivoxml=pnombrearchivoxml,
			nombrearchivopdf=pnombrearchivopdf,
			tipoventa=ptipoventa,
			idformapago=pidformapago,
			referenciapago=preferenciapago,
			diascredito=pdiascredito,
			fechavencimiento=pfechavencimiento,
			importetotal=pimportetotal,
			observaciones=pobservaciones,
			quien=pquien,
			cuando=fn_fecha_actual()
		where idordencomprafactura = pidordencomprafactura;

		SET last_id = pidordencomprafactura;
	end if;

	commit;
end$$

DELIMITER ;

