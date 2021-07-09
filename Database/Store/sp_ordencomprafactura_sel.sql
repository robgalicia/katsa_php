DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencomprafactura_sel $$

CREATE PROCEDURE sp_ordencomprafactura_sel(IN pidordencomprafactura int)
begin
	select 	ocf.idordencompra, ocf.fechafactura, 
            ocf.idproveedor, p.nombre as nombreproveedor,
            ocf.tipoventa, ocf.idformapago, fp.descformapago, ifnull(ocf.referenciapago,'') as referenciapago,
            ifnull(ocf.diascredito,0) as diascreditofac, ifnull(ocf.fechavencimiento,'') as fechavencimiento,
            ocf.importetotal, ifnull(ocf.uuid,'') as uuid, ifnull(ocf.nombrearchivoxml,'') as nombrearchivoxml,
            ifnull(ocf.nombrearchivopdf,'') as nombrearchivopdf, ifnull(ocf.observaciones,'') as observaciones,
            ifnull(p.rfc,'') as rfc, ifnull(p.diascredito,0) as diascreditoprov
	from ordencomprafactura ocf
		inner join proveedor p on p.idproveedor=ocf.idproveedor
        inner join formapago fp on fp.idformapago=ocf.idformapago
	where ocf.idordencomprafactura=pidordencomprafactura;
end$$

DELIMITER ;