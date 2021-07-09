DELIMITER $$

DROP PROCEDURE IF EXISTS sp_ordencomprafactura_vencidas $$

CREATE PROCEDURE sp_ordencomprafactura_vencidas(IN pidregion smallint, IN pfechafinal date)

begin

	select 	ocf.idordencomprafactura, oc.folio as folioordencompra, oc.fechaorden, p.nombre as nombreproveedor,
			ocf.importetotal, ocf.fechafactura, ocf.fechavencimiento, ifnull(ocf.fechapagoprogramado,'') as fechapagoprogramado
	from ordencomprafactura ocf
		inner join ordencompra oc on oc.idordencompra=ocf.idordencompra
		inner join proveedor p on p.idproveedor=ocf.idproveedor
	where oc.idregion=pidregion
	and convert(ocf.fechavencimiento,date) <= pfechafinal
	and ocf.fechapagado is null
	order by ocf.fechavencimiento desc;

end$$

DELIMITER ;

